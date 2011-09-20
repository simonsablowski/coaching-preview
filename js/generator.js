$(document).ready(function() {
	$('#type').change(configure);
	$('#generate').click(generate);
	$('#convert').click(convert);
	$('#test').click(test);
});

function addItem(item) {
	var clone = item.children().last().clone();
	item.append(clone);
	clone.children('p:last').children('a.remove').click(function() {
		removeItem(clone);
	});
}

function removeItem(item) {
	if (item.siblings().length > 0) {
		item.remove();
	}
}

function configure() {
	if (!$('#type').val() || !$('#' + $('#type').val()).html()) {
		return;
	}
	
	$('#configuration').html($('#' + $('#type').val()).html());
	
	$('#configuration a.add').click(function() {
		addItem($(this).parent().siblings('ul:first'));
	});
	$('#configuration a.remove').click(function() {
		removeItem($(this).parent().parent());
	});
}

function generate() {
	if (!$('#type').val()) {
		return;
	}
	
	var object = {};
	object.type = $('#type').val();
	object.key = $('#key').val() || undefined;
	object.title = $('#title').val();
	object.description = $('#description').val();
	object.properties = {};
	
	$('#configuration li[rel^="{"]').each(function(i, row) {
		var values = [];
		$(row).find('input, select, textarea').each(function(j, element) {
			values.push($(element).val());
		});
		var extension = $.evalJSON($.vsprintf($(row).attr('rel'), values));
		for (var key in extension) {
			if (typeof extension[key] == 'object' && extension[key].length && object.properties[key]) {
				$.merge(object.properties[key], extension[key]);
			} else {
				object.properties = $.extend(true, object.properties, extension);
			}
		}
	});
	
	$('#object').val($.toJSON(object));
	
	/*var type = '$' + object.type;
	var key = object.key ? ':' + object.key : '';
	var description = object.description ? "\n\n" + object.description : '';
	var properties = '(' + $('#properties').val().substring(1, $('#properties').val().length - 1) + ')';
	$('#modelingName').val(object.title);
	$('#modelingDescription').val(type + key + properties + description);*/
}

function convert() {
	/*var description = $('#modelingDescription').val();
	var matches = description.match(/([\s\S]+\s+)?\$(\w+)(:(\w+))?\(([^\v]*)\)(\s+[\s\S]+)?/);
	var object = {};
	object.type = matches[2];
	object.key = matches[4];
	object.title = $('#title').val();
	object.description = $.trim(matches[6]);
	object.properties = $.evalJSON('{' + matches[5] + '}');
	$('#object').val($.toJSON(object));*/
}

function test() {
	generate();
	
	/*var object = $('#object').val();
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
	}*/
}