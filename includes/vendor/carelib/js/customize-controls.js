(function( $, api ) {
	'use strict';

	/**
	 * Radio Image Control
	 */
	api.controlConstructor['radio-image'] = api.Control.extend({
		ready: function() {
			var control = this;

			$( 'input:radio', control.container ).change(
				function() {
					control.setting.set( $( this ).val() );
				}
			);
		}
	});
})( jQuery, wp.customize );
