function Generator() {
	var g = this;
	g.objects = [];
	g.current = {};
		
	g.construct = function() {
		$('.type').change(g.configure);
		$('.generate').click(g.generate);
		$('.convert').click(g.convert);
		$('.test').click(g.test);
	};
	
	g.configure = function() {
		if (!$('.type').val() || !$('#' + $('.type').val()).html()) {
			return;
		}
		
		g.clearCode();
		g.loadConfigurationOptions();
		g.addListFunctionality();
		g.enableInputElements();
		g.addToggleFunctionality();
		g.addCloseFunctionality();
	};
	
	g.clearCode = function() {
		$('.code').val('');
	};
	
	g.loadConfigurationOptions = function() {
		$('.prototype').html($('#' + $('.type').val()).html());
	};
	
	g.addListFunctionality = function() {
		$('.configuration .add').click(g.addListItem);
		$('.configuration .remove').click(g.removeListItem);
	};
	
	g.addListItem = function() {
		var item = $(this).parents('.options').find('.list');
		var clone = item.find('.list-item:last').clone(true);
		item.append(clone);
		return false;
	}
	
	g.removeListItem = function() {
		var item = $(this).parents('.list-item');
		if (item.siblings().length > 0) {
			item.remove();
		}
		return false;
	}
	
	g.enableInputElements = function() {
		$('input, select, textarea').attr('disabled', false);
	};
	
	g.addToggleFunctionality = function() {
		var elements = $('input.enable[type="checkbox"], input.enable[type="radio"]');
		elements.unbind('click');
		elements.click(function() {
			$(this).parent().next().toggle();
		});
	}
	
	g.addCloseFunctionality = function() {
		$('.close').click(function() {
			$(this).parent().hide();
			return false;
		});
	}
	
	g.generate = function() {
		if (!$('.type').val()) {
			return;
		}
		
		g.observePrimitiveElements();
		g.observeCustomElements();
		g.objects.push(g.current);
		
		g.outputCode();
	};
	
	g.observePrimitiveElements = function() {
		g.current.type = $('.type').val();
		g.current.key = $('.key').val() || undefined;
		g.current.title = $('.title').val();
		g.current.description = $('.description').val();
	}
	
	g.observeCustomElements = function() {
		g.current.properties = {};
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
				if (typeof extension[key] == 'object' && extension[key].length && g.current.properties[key]) {
					$.merge(g.current.properties[key], extension[key]);
				} else {
					g.current.properties = $.extend(true, g.current.properties, extension);
				}
			}
		});
	}
	
	g.outputCode = function() {
		var type = '$' + g.current.type;
		var key = g.current.key ? ':' + g.current.key : '';
		var description = g.current.description ? "\n\n" + g.current.description : '';
		var properties = '(' + $.toJSON(g.current.properties).substring(1, $.toJSON(g.current.properties).length - 1) + ')';
		$('.code').val(type + key + properties + description);
	};
	
	g.convert = function() {
		var description = $('.code').val();
		var matches = description.match(/([\s\S]+\s+)?\$(\w+)(:(\w+))?\(([^\v]*)\)(\s+[\s\S]+)?/);
		
		g.current.type = matches[2];
		g.current.key = matches[4];
		g.current.title = $('.title').val();
		g.current.description = $.trim(matches[6]);
		g.current.properties = $.evalJSON('{' + matches[5] + '}');
		
		g.test(false);
	};
	
	g.test = function(gen) {
		if (!g.current.type) {
			g.generate();
		}
		
		g.objects.push({
			"end": true
		});
		
		MotivadoPlayer({
			baseServiceUrl: host + '/motivado-ui/',
			basePlayerUrl: host + '/player/',
			baseAssetUrl: host + '/player/assets/',
			baseVideoUrl: 'http://videos.motivado.de/',
			localMode: 'true',
			objectSequence: $.toJSON({
				"objects": g.objects
			}),
			debugMode: 'true',
			element: 'preview'
		});
		
		$('.preview').show();
	};
	
	g.construct();
}