function initSection( section ) {
	if ( ! section || section.dataset.swordhealthOrgInit === '1' ) {
		return;
	}
	section.dataset.swordhealthOrgInit = '1';

	const activeImage = section.querySelector( '#active-image' );
	const mediaBox = section.querySelector( '#slide-media' );
	const contentBox = section.querySelector( '#active-content' );
	const navLogos = Array.from( section.querySelectorAll( '.nav-logo' ) );

	if ( ! activeImage || ! mediaBox || ! contentBox || ! navLogos.length ) {
		return;
	}

	const headingEl = section.querySelector( '#active-heading' );
	const stat1ValEl = section.querySelector( '#stat-primary-value' );
	const stat1LabEl = section.querySelector( '#stat-primary-label' );
	const stat2ValEl = section.querySelector( '#stat-secondary-value' );
	const stat2LabEl = section.querySelector( '#stat-secondary-label' );

	const src = activeImage.getAttribute( 'src' ) || '';
	const base = src.slice( 0, src.lastIndexOf( '/' ) + 1 );

	const slideData = [
		{
			image: `${ base }baricade-image.jpg`,
			heading: 'Southwind cut accidents and saved $2M+ with Motive.',
			stat1Val: '$500K',
			stat1Lab: 'Saved on fuel by reducing idle time',
			stat2Val: '$20K',
			stat2Lab: 'Saved per quarter with Motive Card',
		},
		{
			image: `${ base }sharpsmart-image.jpg`,
			heading:
				'Sharpsmart improves safety and efficiency with Motive AI.',
			stat1Val: '35%',
			stat1Lab: 'Reduction in safety-critical events',
			stat2Val: '15%',
			stat2Lab: 'Increase in fleet productivity',
		},
		{
			image: `${ base }trulite-image.jpg`,
			heading: 'Trulite streamlines maintenance and reduces downtime.',
			stat1Val: '$100K',
			stat1Lab: 'Annual savings in maintenance costs',
			stat2Val: '25%',
			stat2Lab: 'Improvement in vehicle uptime',
		},
		{
			image: `${ base }velocity-image.jpg`,
			heading: 'Velocity scales faster with automated compliance.',
			stat1Val: '90%',
			stat1Lab: 'Automated compliance score',
			stat2Val: '50%',
			stat2Lab: 'Reduction in administrative tasks',
		},
	];

	let activeIndex = 0;
	let progress = 0;
	let isPaused = false;
	let animationFrame;
	const DURATION = 5000;
	let lastTimestamp = 0;

	function updateNavState() {
		navLogos.forEach( ( logo, idx ) => {
			const img = logo.querySelector( 'img' );
			if ( idx === activeIndex ) {
				logo.style.opacity = '1';
				if ( img ) {
					img.style.filter = 'grayscale(0) brightness(1.5)';
				}
			} else {
				logo.style.opacity = '0.4';
				if ( img ) {
					img.style.filter = 'grayscale(1) brightness(1.5)';
				}
			}
		} );
	}

	function resetProgressBars() {
		section.querySelectorAll( '.progress-bar' ).forEach( ( bar ) => {
			bar.style.width = '0%';
		} );
	}

	function goToSlide( index, manual = false ) {
		if ( index === activeIndex && ! manual ) {
			return;
		}

		activeIndex = ( index + slideData.length ) % slideData.length;
		progress = 0;
		const data = slideData[ activeIndex ];

		resetProgressBars();

		mediaBox.style.opacity = '0';
		contentBox.style.opacity = '0';

		setTimeout( () => {
			activeImage.src = data.image;
			if ( headingEl ) {
				headingEl.textContent = data.heading;
			}
			if ( stat1ValEl ) {
				stat1ValEl.textContent = data.stat1Val;
			}
			if ( stat1LabEl ) {
				stat1LabEl.textContent = data.stat1Lab;
			}
			if ( stat2ValEl ) {
				stat2ValEl.textContent = data.stat2Val;
			}
			if ( stat2LabEl ) {
				stat2LabEl.textContent = data.stat2Lab;
			}

			mediaBox.style.opacity = '1';
			contentBox.style.opacity = '1';
			updateNavState();
		}, 400 );
	}

	function animate( timestamp ) {
		if ( ! lastTimestamp ) {
			lastTimestamp = timestamp;
		}
		const delta = timestamp - lastTimestamp;
		lastTimestamp = timestamp;

		if ( ! isPaused ) {
			progress += ( delta / DURATION ) * 100;
			if ( progress >= 100 ) {
				progress = 0;
				goToSlide( activeIndex + 1 );
			}
			const activeBar =
				navLogos[ activeIndex ]?.querySelector( '.progress-bar' );
			if ( activeBar ) {
				activeBar.style.width = `${ progress }%`;
			}
		}

		animationFrame = window.requestAnimationFrame( animate );
	}

	const mainCard = section.querySelector( '#main-card' );
	const navBar = section.querySelector( '#nav-bar' );

	[ mainCard, navBar ].forEach( ( el ) => {
		if ( ! el ) {
			return;
		}
		el.addEventListener( 'mouseenter', () => {
			isPaused = true;
		} );
		el.addEventListener( 'mouseleave', () => {
			isPaused = false;
		} );
	} );

	navLogos.forEach( ( el ) => {
		el.addEventListener( 'click', () => {
			const index = parseInt(
				el.getAttribute( 'data-index' ) || '0',
				10
			);
			goToSlide( index, true );
		} );
	} );

	const learn = section.querySelector( '.learn-more-link' );
	if ( learn ) {
		const svg = learn.querySelector( 'svg' );
		learn.addEventListener( 'mouseenter', () => {
			learn.style.opacity = '0.8';
			if ( svg ) {
				svg.style.transform = 'translateX(4px)';
			}
		} );
		learn.addEventListener( 'mouseleave', () => {
			learn.style.opacity = '';
			if ( svg ) {
				svg.style.transform = '';
			}
		} );
	}

	animationFrame = window.requestAnimationFrame( animate );
	updateNavState();

	section.addEventListener( 'remove', () => {
		if ( animationFrame ) {
			window.cancelAnimationFrame( animationFrame );
		}
	} );
}

function init() {
	document.querySelectorAll( '.slider-section' ).forEach( initSection );
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
