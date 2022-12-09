( function( api ) {

	// Extends our custom "fitness-crossfit" section.
	api.sectionConstructor['fitness-crossfit'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );