(function ($) {

	Drupal.behaviors.brightsidept = function (context) {

		// Call mmenu plugin and as ID to the mmenu for the open/close trigger
		$('.nav-main').clone().attr('id', 'menu').mmenu({
			classes: 'mm-light',
			header: true,
			position: 'right'
		});
		
	}

}(jq172));