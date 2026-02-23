/* global jQuery */

(function() {

	"use strict";

	var mouse_helper_smooth   = true;

	var $document             = jQuery( document ),
		$mouse_helper         = jQuery('.trx_addons_mouse_helper');

	if ( $mouse_helper.eq(0).hasClass( 'trx_addons_mouse_helper_smooth' ) ) {
		mouse_helper_smooth = true;
	}

	var $mouse_helper_targets,
		$mouse_helper_magnets;

	// Update links and values after the new post added
	$document.on( 'action.got_ajax_response', update_jquery_links );
	$document.on( 'action.init_hidden_elements', update_jquery_links );
	var first_run = true;
	function update_jquery_links(e) {
		if ( first_run && e && e.namespace == 'init_hidden_elements' ) {
			first_run = false;
			return;
		}
		$mouse_helper_targets = jQuery('[data-mouse-helper]');
		$mouse_helper_magnets = jQuery('[data-mouse-helper-magnet]:not([data-mouse-helper-magnet="0"])');
	}
	update_jquery_links();

})();