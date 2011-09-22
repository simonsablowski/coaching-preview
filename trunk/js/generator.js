function Generator() {
	Generator.objects = [];
	Generator.current = {};
	
	Generator.construct = function() {
		$('.type').change(Generator.configure);
		$('.generate').click(Generator.generate);
		$('.convert').click(Generator.convert);
		$('.test').click(Generator.test);
	};
	
	Generator.configure = function() {
		if (!$('.type').val() || !$('#' + $('.type').val()).html()) {
			return;
		}
		
		Generator.clearCode();
		Generator.loadConfigurationOptions();
		Generator.addListFunctionality();
		Generator.enableInputElements();
		Generator.addToggleFunctionality();
		Generator.addCloseFunctionality();
	};
	
	Generator.clearCode = function() {
		$('.code').val('');
	};
	
	Generator.loadConfigurationOptions = function() {
		$('.prototype').html($('#' + $('.type').val()).html());
	};
	
	Generator.addListFunctionality = function() {
		$('.configuration .add').unbind('click').click(Generator.addListItem);
		$('.configuration .remove').unbind('click').click(Generator.removeListItem);
	};
	
	Generator.addListItem = function() {
		var item = $(this).parents('.options').find('.list');
		var clone = item.find('.list-item:last').clone(true);
		item.append(clone);
		return false;
	}
	
	Generator.removeListItem = function() {
		var item = $(this).parents('.list-item');
		if (item.siblings().length > 0) {
			item.remove();
		}
		return false;
	}
	
	Generator.enableInputElements = function() {
		$('input, select, textarea').attr('disabled', false);
	};
	
	Generator.addToggleFunctionality = function() {
		$('input.enable[type="checkbox"], input.enable[type="radio"]').unbind('click').click(function() {
			$(this).parent().next().toggle();
		});
	}
	
	Generator.addCloseFunctionality = function() {
		$('.close').unbind('click').click(function() {
			$(this).parent().hide();
			return false;
		});
	}
	
	Generator.generate = function() {
		if (!$('.type').val()) {
			return;
		}
		
		Generator.observePrimitiveElements();
		Generator.observeCustomElements();
		Generator.objects.push(Generator.current);
		
		Generator.outputCode();
	};
	
	Generator.observePrimitiveElements = function() {
		Generator.current.type = $('.type').val();
		Generator.current.key = $('.key').val() || undefined;
		Generator.current.title = $('.title').val();
		Generator.current.description = $('.description').val();
	}
	
	Generator.observeCustomElements = function() {
		Generator.current.properties = {};
		$('.configuration .list-item[rel^="{"]').filter(':visible').each(function(i, row) {
			var elements = $(row).find('input, select, textarea');
			var values = [];
			elements.each(function(j, element) {
				values.push($(element).val());
			});
			try {
				var extension = $.evalJSON($.vsprintf($(row).attr('rel'), values));
				elements.each(function(j, element) {
					$(element).removeClass('error');
				});
			} catch (exception) {
				elements.each(function(j, element) {
					$(element).addClass('error');
				});
				return false;
			}
			for (var key in extension) {
				if (typeof extension[key] == 'object' && extension[key].length && Generator.current.properties[key]) {
					$.merge(Generator.current.properties[key], extension[key]);
				} else {
					Generator.current.properties = $.extend(true, Generator.current.properties, extension);
				}
			}
		});
	}
	
	Generator.outputCode = function() {
		var type = '$' + Generator.current.type;
		var key = Generator.current.key ? ':' + Generator.current.key : '';
		var description = Generator.current.description ? "\n\n" + Generator.current.description : '';
		var properties = '(' + $.toJSON(Generator.current.properties).substring(1, $.toJSON(Generator.current.properties).length - 1) + ')';
		$('.code').val(type + key + properties + description);
	};
	
	Generator.convert = function() {
		var description = $('.code').val();
		var matches = description.match(/([\s\S]+\s+)?\$(\w+)(:(\w+))?\(([^\v]*)\)(\s+[\s\S]+)?/);
		
		Generator.current.type = matches[2];
		Generator.current.key = matches[4];
		Generator.current.title = $('.title').val();
		Generator.current.description = $.trim(matches[6]);
		Generator.current.properties = $.evalJSON('{' + matches[5] + '}');
		
		Generator.test(false);
	};
	
	Generator.test = function(gen) {
		if (!Generator.current.type) {
			Generator.generate();
		}
		
		Generator.objects.push({
			"end": true
		});
		
		MotivadoPlayer({
			baseServiceUrl: host + '/motivado-ui/',
			basePlayerUrl: host + '/player/',
			baseAssetUrl: host + '/player/assets/',
			baseVideoUrl: 'http://videos.motivado.de/',
			localMode: 'true',
			objectSequence: $.toJSON({
				"objects": Generator.objects
			}),
			debugMode: 'true',
			element: 'preview'
		});
		
		$('.preview').show();
	};
	
	Generator.construct();
}