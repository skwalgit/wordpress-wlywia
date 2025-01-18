(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$(document).ready(function() {
		$('[data-sc-toggle]').click(function() {
			var modal = $(this).data('sc-toggle');
			$(modal).attr('aria-hidden', 'false').css('display', 'block');
			$('body').append('<div class="schedule-demo-modal-backdrop fade"></div>');
			setTimeout(function() {
				$(modal).addClass('show');
				$('.schedule-demo-modal-backdrop').addClass('show');
			}, 100);
		});

		$('.schedule-demo-modal').click(function (ev) {
			if ($(ev.target).hasClass('schedule-demo-modal')) {
				var modal = $(this);
				modal.removeClass('show');
				$('.schedule-demo-modal-backdrop').removeClass('show');
				setTimeout(function() {
					modal.attr('aria-hidden', 'true').css('display', 'none');
					$('.schedule-demo-modal-backdrop').remove();
				}, 100);
			}
		});

		$('.schedule-demo-modal-close').click(function () {
			var modal = $(this).parents('.schedule-demo-modal');
			modal.removeClass('show');
			$('.schedule-demo-modal-backdrop').removeClass('show');
			setTimeout(function() {
				modal.attr('aria-hidden', 'true').css('display', 'none');
				$('.schedule-demo-modal-backdrop').remove();
			}, 100);
		});
	});
})( jQuery );
