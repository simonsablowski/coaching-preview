$(document).ready(function() {
	$('#type').change(configure);
	$('#generate').click(generate);
	$('#convert').click(convert);
	$('#test').click(test);
});

function addItem(item) {
	var clone = item.find('.list-item:last').clone(true);
	item.append(clone);
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
	
	$('#Object').html($('#' + $('#type').val()).html());
	
	$('#configuration .add').click(function() {
		addItem($(this).parents('#configuration').find('.list:last'));
	});
	$('#configuration .remove').click(function() {
		removeItem($(this).parents('.list-item'));
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
	
	$('#configuration .list-item[rel^="{"]').each(function(i, row) {
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
	$('#properties').val($.toJSON(object.properties));
	
	var type = '$' + object.type;
	var key = object.key ? ':' + object.key : '';
	var description = object.description ? "\n\n" + object.description : '';
	var properties = '(' + $('#properties').val().substring(1, $('#properties').val().length - 1) + ')';
	$('#modelingName').val(object.title);
	$('#modelingDescription').val(type + key + properties + description);
}

function convert() {
	var description = $('#modelingDescription').val();
	var matches = description.match(/([\s\S]+\s+)?\$(\w+)(:(\w+))?\(([^\v]*)\)(\s+[\s\S]+)?/);
	var object = {};
	object.type = matches[2];
	object.key = matches[4];
	object.title = $('#title').val();
	object.description = $.trim(matches[6]);
	object.properties = $.evalJSON('{' + matches[5] + '}');
	$('#object').val($.toJSON(object));
	
	test(false);
}

function test(gen) {
	if (gen || typeof gen == undefined) generate();
	
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
	
		$('#preview').show();
		$(document).click(function(e) {
			// $('#preview:visible').hide();
		});
	}
}