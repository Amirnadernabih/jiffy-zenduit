function initWrapper( wrapper ) {
	if ( ! wrapper || wrapper.dataset.zltbLanding1Init === '1' ) {
		return;
	}
	wrapper.dataset.zltbLanding1Init = '1';

	const tabsContainer = wrapper.querySelector( '.ap-tabs' );
	const leftButton = wrapper.querySelector( '.ap-tab-nav-left' );
	const rightButton = wrapper.querySelector( '.ap-tab-nav-right' );
	const tabButtons = wrapper.querySelectorAll( '.ap-tab' );

	if ( tabButtons.length ) {
		tabButtons.forEach( ( button ) => {
			button.addEventListener( 'click', function onClick() {
				tabButtons.forEach( ( b ) => {
					b.classList.remove( 'ap-tab--active' );
				} );
				this.classList.add( 'ap-tab--active' );
			} );
		} );
	}

	function scrollTabs( direction ) {
		if ( ! tabsContainer || typeof tabsContainer.scrollBy !== 'function' ) {
			return;
		}

		const amount = 120;
		tabsContainer.scrollBy( {
			left: direction === 'left' ? -amount : amount,
			behavior: 'smooth',
		} );
	}

	if ( leftButton ) {
		leftButton.addEventListener( 'click', () => scrollTabs( 'left' ) );
	}

	if ( rightButton ) {
		rightButton.addEventListener( 'click', () => scrollTabs( 'right' ) );
	}
}

function init() {
	document.querySelectorAll( '.amirpress-wrapper' ).forEach( initWrapper );
}

if ( document.readyState === 'loading' ) {
	document.addEventListener( 'DOMContentLoaded', init );
} else {
	init();
}

if ( window.MutationObserver ) {
	const observer = new window.MutationObserver( () => init() );
	observer.observe( document.documentElement, {
		childList: true,
		subtree: true,
	} );
}
