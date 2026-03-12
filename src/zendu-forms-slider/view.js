function initSlider( slider ) {
	if ( ! slider || slider.dataset.swordhealthOrgInit === '1' ) {
		return;
	}
	slider.dataset.swordhealthOrgInit = '1';

	const range = slider.querySelector( '.block-basic-slider-range' );
	let position = 50;
	const minPercent = 15;
	const maxPercent = 85;

	function setPosition( percent ) {
		let p = percent;
		if ( typeof p !== 'number' ) {
			p = parseFloat( p ) || 0;
		}
		if ( p < minPercent ) {
			p = minPercent;
		}
		if ( p > maxPercent ) {
			p = maxPercent;
		}
		position = p;
		slider.style.setProperty( '--slider-position', `${ p }%` );
		if ( range && range.value !== String( p ) ) {
			range.value = String( p );
		}
	}

	function updateFromClientX( clientX ) {
		const rect = slider.getBoundingClientRect();
		const raw = ( ( clientX - rect.left ) / rect.width ) * 100;
		setPosition( raw );
	}

	if ( range ) {
		range.addEventListener( 'input', ( event ) => {
			setPosition( parseFloat( event.target.value || '0' ) );
		} );
	}

	let dragging = false;

	function onMove( event ) {
		if ( ! dragging ) {
			return;
		}
		let clientX;
		if ( event.touches && event.touches.length ) {
			clientX = event.touches[ 0 ].clientX;
		} else {
			clientX = event.clientX;
		}
		if ( typeof clientX === 'number' ) {
			updateFromClientX( clientX );
		}
		if ( event.cancelable ) {
			event.preventDefault();
		}
	}

	function stopDrag() {
		dragging = false;
		document.removeEventListener( 'mousemove', onMove );
		document.removeEventListener( 'touchmove', onMove );
		document.removeEventListener( 'mouseup', stopDrag );
		document.removeEventListener( 'touchend', stopDrag );
		document.removeEventListener( 'touchcancel', stopDrag );
	}

	function startDrag( event ) {
		dragging = true;
		document.addEventListener( 'mousemove', onMove );
		document.addEventListener( 'touchmove', onMove, { passive: false } );
		document.addEventListener( 'mouseup', stopDrag );
		document.addEventListener( 'touchend', stopDrag );
		document.addEventListener( 'touchcancel', stopDrag );

		let clientX;
		if ( event.touches && event.touches.length ) {
			clientX = event.touches[ 0 ].clientX;
		} else {
			clientX = event.clientX;
		}
		if ( typeof clientX === 'number' ) {
			updateFromClientX( clientX );
		}
		if ( event.cancelable ) {
			event.preventDefault();
		}
	}

	slider.addEventListener( 'mousedown', startDrag );
	slider.addEventListener( 'touchstart', startDrag, { passive: false } );

	setPosition( position );
}

function init() {
	document.querySelectorAll( '.block-basic-slider' ).forEach( initSlider );
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
