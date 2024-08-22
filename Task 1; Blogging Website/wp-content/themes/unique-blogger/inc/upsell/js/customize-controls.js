( function( api ) {

	// Extends our custom "unique-blogger" section.
	api.sectionConstructor['unique-blogger'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );