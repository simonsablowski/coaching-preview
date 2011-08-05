$(document).ready(function() {
	$('#generate').click(function() {
		var object = {};
		object.type = $('#type').val();
		object.key = $('#key').val() || undefined;
		object.title = $('#title').val();
		object.description = $('#description').val();
		object.properties = $.evalJSON($('#properties').val());
		$('#object').val($.toJSON(object));
		
		var type = '$' + object.type;
		var key = object.key ? ':' + object.key : '';
		var description = object.description ? "\n\n" + object.description : '';
		var properties = '(' + $('#properties').val().substring(1, $('#properties').val().length - 1) + ')';
		$('#bizagi').val(type + key + properties + description);
	});
	
	$('#convert').click(function() {
		var description = $('#bizagi').val();
		var matches = description.match(/([\s\S]+\s+)?\$(\w+)(:(\w+))?\(([^\v]*)\)(\s+[\s\S]+)?/);
		var object = {};
		object.type = matches[2];
		object.key = matches[4];
		object.title = $('#title').val();
		object.description = $.trim(matches[6]);
		object.properties = $.evalJSON('{' + matches[5] + '}');
		$('#object').val($.toJSON(object));
	});
	
	$('#test').click(function() {
		var object = $('#object').val();
		var objectSequence = {};
		objectSequence.objects = [];
		if (object) {
			objectSequence.objects.push($.evalJSON(object));
			
			var host = 'http://localhost';
			
			MotivadoPlayer({
				baseServiceUrl: host + '/motivado-ui/',
				basePlayerUrl: host + '/player/',
				baseAssetUrl: host + '/player/assets/',
				baseVideoUrl: 'http://videos.motivado.de/',
				localMode: 'true',
				objectSequence: $.toJSON(objectSequence),
				debugMode: 'true',
				element: 'preview'
			});
		}
	});
});