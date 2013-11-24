/*******************************
 * jQuery Multi Level CSS Menu
 *******************************/

jQuery(function ($) {
	$.fn.responsivenav = function(args) {
		// Default settings
		var defaults = {
			width: 480,            /* Responsive width */
			button: 'menu-button', /* Menu button id */
			animation: {           /* Menu animation */
				effect: 'slide',     /* Accepts 'slide' or 'fade' */
				show: 100,
				hide: 100
			},
			selected: 'selected',  /* Selected class */
			arrow: 'downarrow'     /* Dropdown arrow class */
		}
		var settings = $.extend(defaults, args);

		// Initialize the menu and the button
		init($(this).attr('id'), settings.button);

		function init(menuid, buttonid) {
			setupMenu(menuid, buttonid);
			// Add a handler function for the resize and orientationchange event
			$(window).bind('resize orientationchange', function(){ resizeMenu(menuid, buttonid); });
			// Trigger initial resize
			resizeMenu(menuid, buttonid);
		}

		function setupMenu(menuid, buttonid) {
			var $mainmenu = $('#'+menuid+'>ul');

			var $headers = $mainmenu.find("ul").parent();
			// Add dropdown arrows
			$headers.each(function(i) {
				var $curobj = $(this);
				$curobj.children('a:eq(0)').append('<span class="'+settings.arrow+'"></span>');
			});

			// Menu button click event
			// Displays top-level menu items
			$('#'+buttonid).click(function(e) {
				e.preventDefault();

				//var $open = $('#'+buttonid).hasClass(settings.selected);
				if ( isSelected($('#'+buttonid)) ) {
					// Close menu
					collapseChildren('#'+menuid);
					animateHide($('#'+menuid), $('#'+buttonid));
				} else {
					// Open menu
					animateShow($('#'+menuid), $('#'+buttonid));
				}
			});
		}

		function resizeMenu(menuid, buttonid) {
			var $ww = document.body.clientWidth;
			var $mainmenu = $('#'+menuid+'>ul');

			if ( $ww > settings.width ) {
				$mainmenu.addClass('full');
				$mainmenu.removeClass('compact');
			} else {
				$mainmenu.removeClass('full');
				$mainmenu.addClass('compact');
			}

			var $headers = $mainmenu.find('ul').parent();

			$headers.each(function(i) {
				var $curobj = $(this);
				var $link = $curobj.children('a:eq(0)');
				var $subul = $curobj.find('ul:eq(0)');

				// Unbind events
				$curobj.unbind('mouseenter mouseleave');
				$link.unbind('click');

				if ( $ww > settings.width ) {
					// Full menu
					$curobj.hover(function(e) {
						var $targetul = $(this).children('ul:eq(0)');

						var $dims = { w: this.offsetWidth,
													h: this.offsetHeight,
													subulw: $subul.outerWidth(),
													subulh: $subul.outerHeight()
												};
						var $istopheader = $curobj.parents('ul').length == 1 ? true : false;
						$subul.css($istopheader ? {} : { top: 0 });
						var $offsets = { left: $(this).offset().left,
														 top: $(this).offset().top
													 };
						var $menuleft = $istopheader ? 0 : $dims.w;
						$menuleft = ( $offsets.left + $menuleft + $dims.subulw > $(window).width() ) ? ( $istopheader ? -$dims.subulw + $dims.w : -$dims.w ) : $menuleft;
						$targetul.css({ left:$menuleft+'px',
														width:$dims.subulw+'px'
													});

						animateShow($targetul);
					},
					function(e) {
						var $targetul = $(this).children('ul:eq(0)');
						animateHide($targetul);
					});
				} else {
					// Compact menu
					$link.click(function(e) {
						e.preventDefault();
						//var $open = $curobj.hasClass(settings.selected);
						var $targetul = $curobj.children('ul:eq(0)');
						if ( isSelected($curobj) ) {
							collapseChildren($targetul);
							animateHide($targetul);
						} else {
							animateShow($targetul);
						}
					});
				}
			});

			collapseChildren('#'+menuid);

			//var $open = $('#'+buttonid).hasClass(settings.selected);
			if ( isSelected($('#'+buttonid)) ) {
				//collapseChildren('#'+menuid);
				$('#'+menuid).hide();
				$('#'+menuid).removeAttr('style');
				$('#'+buttonid).removeClass(settings.selected);
			}
		}

		function collapseChildren(elementid) {
			// Closes all submenus of the specified element
			var $headers = $(elementid).find('ul');
			$headers.each(function(i) {
				//var $open = $(this).parent().hasClass(settings.selected);
				if ( isSelected($(this).parent()) ) {
					animateHide($(this));
				}
			});
		}

		function isSelected(element) {
			return element.hasClass(settings.selected);
		}

		function animateShow(menu, button) {
			if ( !button ) { var button = menu.parent(); }

			button.addClass(settings.selected);

			if ( settings.animation.effect == 'fade' ) {
				menu.fadeIn(settings.animation.show);
			} else if ( settings.animation.effect == 'slide' ) {
				menu.slideDown(settings.animation.show);
			} else {
				menu.show();
			}
		}

		function animateHide(menu, button) {
			if ( !button ) { var button = menu.parent(); }

			if ( settings.animation.effect == 'fade' ) {
				menu.fadeOut(settings.animation.hide, function() {
					menu.removeAttr('style');
					button.removeClass(settings.selected);
				});
			} else if ( settings.animation.effect == 'slide' ) {
				menu.slideUp(settings.animation.hide, function() {
					menu.removeAttr('style');
					button.removeClass(settings.selected);
				});
			} else {
				menu.hide();
				menu.removeAttr('style');
				button.removeClass(settings.selected);
			}
		}
	};
});