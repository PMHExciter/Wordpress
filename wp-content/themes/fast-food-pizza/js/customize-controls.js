( function( api ) {

	// Extends our custom "fast-food-pizza" section.
	api.sectionConstructor['fast-food-pizza'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );