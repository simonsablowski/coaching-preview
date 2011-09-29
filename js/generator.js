function Generator(id) {
	var self = this;
	self.id = null;
	self.object = {};
	
	self.construct = function(id) {
		self.id = id;
		$('#' + self.id + ' :input.type').unbind('change').change(self.configure);
		$('#' + self.id + ' :input.generate').unbind('click').click(self.generate);
		$('#' + self.id + ' :input.convert').unbind('click').click(self.convert);
		
		return true;
	};
	
	self.configure = function() {
		if (!$('#' + self.id + ' :input.type').val() || !$('#' + $('#' + self.id + ' :input.type').val()).html()) {
			return false;
		}
		
		self.clearCode();
		self.loadConfigurationOptions();
		self.addListFunctionality();
		self.enableInputElements();
		self.addToggleFunctionality();
		self.addCloneFunctionality();
		
		return true;
	};
	
	self.clearCode = function() {
		$('#' + self.id + ' :input.code').val('');
		
		return true;
	};
	
	self.loadConfigurationOptions = function() {
		$('#' + self.id + ' .prototype').html($('#' + $('#' + self.id + ' :input.type').val()).html());
		
		return true;
	};
	
	self.resetConfigurationOptions = function() {
		$('#' + self.id + ' .prototype').html($('#convert').html());
		
		return true;
	};
	
	self.addListFunctionality = function() {
		$('#' + self.id + ' .configuration .add').unbind('click').click(self.addListItem);
		$('#' + self.id + ' .configuration .remove').unbind('click').click(self.removeListItem);
		
		return true;
	};
	
	self.addListItem = function() {
		var list = $(this).parents('.options').find('.list');
		var clone = list.find('.list-item:last').clone(true);
		list.append(clone);
		
		return false;
	};
	
	self.removeListItem = function() {
		var item = $(this).parents('.list-item');
		if (item.siblings().length > 0) {
			item.remove();
		}
		
		return false;
	};
	
	self.enableInputElements = function() {
		$('#' + self.id + ' :input').attr('disabled', false).removeClass('disabled');
		if ($('#' + $(':input.type').val()).hasClass('invisible')) {
			$('#' + self.id + ' :input.for-visible').attr('disabled', true).addClass('disabled');
		}
		
		return true;
	};
	
	self.disableInputElements = function() {
		$('#' + self.id + ' :checkbox.enable, #' + self.id + ' :radio.enable').filter(':checked').prop('checked', false).parent().next().hide();
		$('#' + self.id + ' :input.enable').attr('disabled', true).addClass('disabled');
		
		return true;
	};
	
	self.addToggleFunctionality = function() {
		$('#' + self.id + ' :checkbox.enable, #' + self.id + ' :radio.enable').unbind('click').click(function() {
			$(this).parent().next().toggle();
		});
		
		return true;
	};
	
	self.addCloneFunctionality = function() {
		$('.add-column').unbind('click').click(function() {
			var column = $(this).parents('.column');
			var clone = column.clone(true);
			column.parent().append(clone);
			var id = 'column' + $('.column').length;
			clone.attr('id', id);
			new Generator(id);
			
			return false;
		});
		
		return true;
	};
	
	self.generate = function() {
		if (!$('#' + self.id + ' :input.type').val()) {
			return false;
		}
		
		try {
			self.observePrimitiveElements();
			self.observeCustomElements();
			objects.push(self.object);
			
			self.outputCode();
			self.enablePreviewButton();
		} catch (exception) {
			return false;
		}
		
		return true;
	};
	
	self.observePrimitiveElements = function() {
		self.object.type = $('#' + self.id + ' :input.type').val();
		self.object.key = $('#' + self.id + ' :input.key').val() || undefined;
		self.object.title = $('#' + self.id + ' :input.title').val();
		self.object.description = $('#' + self.id + ' :input.description').val();
		
		return true;
	};
	
	self.observeCustomElements = function() {
		self.object.properties = {};
		$('#' + self.id + ' .configuration .list-item[rel^="{"]').filter(':visible').each(function(i, row) {
			var elements = $(row).find(':input');
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
				throw 'Validation error in observeCustomElements';
			}
			for (var key in extension) {
				if (typeof extension[key] == 'object' && extension[key].length && self.object.properties[key]) {
					$.merge(self.object.properties[key], extension[key]);
				} else {
					self.object.properties = $.extend(true, self.object.properties, extension);
				}
			}
		});
		
		return true;
	};
	
	self.outputCode = function() {
		var type = '$' + self.object.type;
		var key = self.object.key ? ':' + self.object.key : '';
		var description = self.object.description ? "\n\n" + self.object.description : '';
		var properties = '(' + $.toJSON(self.object.properties).substring(1, $.toJSON(self.object.properties).length - 1) + ')';
		$('#' + self.id + ' :input.code').val(type + key + properties + description);
		
		return true;
	};
	
	self.enablePreviewButton = function() {
		$(':input.test').attr('disabled', false).removeClass('disabled').unbind('click').click(self.test);
		
		return true;
	};
	
	self.convert = function() {
		var description = $('#' + self.id + ' :input.code').val();
		var matches = description.match(/([\s\S]+\s+)?\$(\w+)(:(\w+))?\(([^\v]*)\)(\s+[\s\S]+)?/);
		
		self.object.type = matches[2];
		self.object.key = matches[4];
		self.object.title = $('#' + self.id + ' :input.title').val();
		self.object.description = $.trim(matches[6]);
		self.object.properties = $.evalJSON('{' + matches[5] + '}');
		
		self.disableInputElements();
		self.resetConfigurationOptions();
		
		return true;
	};
	
	self.test = function() {
		if (typeof self.object.type == undefined || typeof self.object.properties == undefined) {
			self.generate();
		}
		
		objects.push({
			"end": true
		});
		
		MotivadoPlayer({
			baseServiceUrl: host + '/motivado-ui/',
			basePlayerUrl: host + '/player/',
			baseAssetUrl: host + '/player/assets/',
			baseVideoUrl: 'http://videos.motivado.de/',
			localMode: 'true',
			objectSequence: $.toJSON({
				"objects": objects
			}),
			debugMode: 'true',
			element: 'preview'
		});
		
		$('.close').unbind('click').click(function() {
			$(this).parent().hide();
			return false;
		});
		
		$('.preview').show();
		
		return true;
	};
	
	self.construct(id);
}