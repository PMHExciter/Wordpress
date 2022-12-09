( function( api ) {

	// Extends our custom "cafe-cafeteria" section.
	api.sectionConstructor['cafe-cafeteria'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );