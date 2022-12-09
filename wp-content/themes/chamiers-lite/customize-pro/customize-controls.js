( function( api ) {
	// Extends our custom "chamiers-lite" section.
	api.sectionConstructor['chamiers-lite'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},
		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
} )( wp.customize );