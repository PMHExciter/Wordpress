/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation doesn't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];

	// Return early if the button doesn't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'toggled' );

		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			button.setAttribute( 'aria-expanded', 'false' );
			jQuery( '.main-navigation' ).find( 'button' ).removeClass( 'toggled-on' );
			jQuery( '.main-navigation' ).find( '.sub-menu, .children' ).removeClass( 'toggled-on' );
		} else {
			button.setAttribute( 'aria-expanded', 'true' );
		}
	} );

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener( 'click', function( event ) {
		const isClickInside = siteNavigation.contains( event.target );

		if ( ! isClickInside ) {
			siteNavigation.classList.remove( 'toggled' );

			button.setAttribute( 'aria-expanded', 'false' );

		}
	} );

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName( 'a' );

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	// Toggle focus each time a menu link is focused or blurred.

	for ( const link of links ) {
		//console.log(link);
		link.addEventListener( 'focus', toggleFocus, true );
		link.addEventListener( 'blur', toggleFocus, true );
		//const activeEl = links.activeElement;

		link.targetelement = button;
		link.lastlink= links[links.length - 1];
		link.addEventListener( 'keydown', toggleFocus, true );
		
		
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for ( const link of linksWithChildren ) {
		//link.addEventListener( 'touchstart', toggleFocus, false );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( ! self.classList.contains( 'nav-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}
		if ( event.type === 'keydown') {
			
			
			if(this==this.lastlink){
				//console.log(this.lastlink);
				//const activeEl = document.activeElement.links;
				console.log(this.targetelement);
				this.targetelement.focus();
				event.preventDefault();
			}

			//activeEl = event.activeElement;

			/*const activeEl = document.activeElement.links;
			console.log(activeEl);
			if ( links.length === activeEl ) {

			}*/
			/*const menuItem = this.parentNode;
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem == link ) {
					//link.classList.remove( 'focus' );
					console.log("ddd");
				}
			}*/
			/*console.log(this.parentNode);
			console.log(self);
			console.log("ddd");
			console.log(links.length);*/
		}

		/*if ( event.type === 'touchstart' ) {
			console.log("fff");
			const menuItem = this.parentNode;
			event.preventDefault();
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem !== link ) {
					link.classList.remove( 'focus' );
				}
			}
			menuItem.classList.toggle( 'focus' );
		}*/
	}
}() );


function initMainNavigation( siteNavigation ) {

	// Add dropdown toggle that displays child menu items.
	var dropdownToggle = jQuery( '<button />', {
		'class': 'dropdown-toggle',
		'aria-expanded': false
	} ).append( jQuery( '<span />', {
		'class': 'screen-reader-text',
		text: 'expand child menu'
	} ) );
	siteNavigation.find( '.menu-item-has-children > a,.page_item_has_children > a' ).after( dropdownToggle );

	// Toggle buttons and submenu items with active children menu items.
	siteNavigation.find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
	siteNavigation.find( '.current-menu-ancestor > .sub-menu, .current-menu-ancestor > .children' ).addClass( 'toggled-on' );

	// Add menu items with submenus to aria-haspopup="true".
	siteNavigation.find( '.menu-item-has-children,.page_item_has_children' ).attr( 'aria-haspopup', 'true' );

	siteNavigation.find( '.dropdown-toggle' ).click( function( e ) {
		var _this            = jQuery( this ),
			screenReaderSpan = _this.find( '.screen-reader-text' );

		e.preventDefault();
		_this.toggleClass( 'toggled-on' );
		_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

		// jscs:disable
		_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
		// jscs:enable
		screenReaderSpan.text( screenReaderSpan.text() === 'expand child menu' ? 'collapse child menu' : 'expand child menu' );
	} );
	
}
initMainNavigation( jQuery( '.main-navigation' ) );