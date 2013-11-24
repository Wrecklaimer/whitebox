/**
 * Whitebox Upload
 */

jQuery(function ($) {
	$.fn.whiteboxupload = function(args) {
		var defaults = {
			'preview' : '.preview-upload',
			'text'    : '.text-upload',
			'button'  : '.button-upload'
		};
		var settings = $.extend(defaults, args);

		$(settings.button).click(function() {
			var text = $(this).siblings(settings.text);

			tb_show('Upload Image', 'media-upload.php?referer=whitebox_settings&type=image&TB_iframe=1', false);

			window.send_to_editor = function(html) {
				var src = $('img', html).attr('src');
				text.attr('value', src).trigger('change');
				tb_remove();
			}
			return false;
		});

		$(settings.text).bind('change', function() {
			var url = this.value;
			var preview = $(this).siblings(settings.preview);
			$(preview).attr('src', url);
		});
	}

	$('.upload').whiteboxupload();
});
