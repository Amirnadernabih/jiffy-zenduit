const sectionState = new WeakMap();

function getSlides( base ) {
	return [
		{
			image: `${ base }img1.png`,
			rightHeading:
				'The Asset Intelligence Roadmap: New Hardware, Portal Power-Ups & Profit Scaling',
			rightSubheading:
				'Stop selling “dots on a map” and start delivering Asset Intelligence. Join us for an exclusive briefing where we reveal our 2026 hardware …',
		},
		{
			image: `${ base }img2.png`,
			rightHeading:
				"ZenCAM Year in Review & What's Ahead: 2025 Highlights and What to Expect",
			rightSubheading:
				'Join us for this strategic session as we break down the latest advancements in the ZenCAM ecosystem and how to leverage AI, BLE, and real-time connect…',
		},
		{
			image: `${ base }img3.png`,
			rightHeading:
				'Smart Asset Tracking: From Visibility to Profitability',
			rightSubheading:
				'Every Missing or Idle Asset Hurts Operations. Misplaced tools, underutilized equipment, and jobsite blind spots don’t just slow projects, they raise…',
		},
	];
}

function updateSlide( section ) {
	const state = sectionState.get( section );
	if ( ! state ) {
		return;
	}

	const { slides, currentIndex } = state;
	const slide = slides[ currentIndex ];
	const content = section.querySelector( '.webinar-card' );
	const mainImage = section.querySelector( '#main-image' );
	const rightHeading = section.querySelector( '#right-heading' );
	const rightSubheading = section.querySelector( '#right-subheading' );
	const slideNumber = section.querySelector( '#slide-number' );

	if (
		! content ||
		! mainImage ||
		! rightHeading ||
		! rightSubheading ||
		! slideNumber
	) {
		return;
	}

	content.style.opacity = '0';
	content.style.transition = 'opacity 0.3s ease';

	setTimeout( () => {
		mainImage.src = slide.image;
		rightHeading.textContent = slide.rightHeading;
		rightSubheading.textContent = slide.rightSubheading;
		slideNumber.textContent = `${ currentIndex + 1 }/${ slides.length }`;

		const b1 = section.querySelector( '#cta-button-1' );
		const b2 = section.querySelector( '#cta-button-2' );
		const b3 = section.querySelector( '#cta-button-3' );
		if ( b1 ) {
			b1.style.display = currentIndex === 0 ? 'block' : 'none';
		}
		if ( b2 ) {
			b2.style.display = currentIndex === 1 ? 'block' : 'none';
		}
		if ( b3 ) {
			b3.style.display = currentIndex === 2 ? 'block' : 'none';
		}

		content.style.opacity = '1';
	}, 300 );
}

function prevSlide( section ) {
	ensureInitialized( section );
	const state = sectionState.get( section );
	if ( ! state ) {
		return;
	}
	state.currentIndex =
		( state.currentIndex - 1 + state.slides.length ) % state.slides.length;
	updateSlide( section );
}

function nextSlide( section ) {
	ensureInitialized( section );
	const state = sectionState.get( section );
	if ( ! state ) {
		return;
	}
	state.currentIndex = ( state.currentIndex + 1 ) % state.slides.length;
	updateSlide( section );
}

function ensureInitialized( section ) {
	if ( ! section || section.dataset.swordhealthOrgInit === '1' ) {
		return;
	}
	section.dataset.swordhealthOrgInit = '1';

	const mainImage = section.querySelector( '#main-image' );
	if ( ! mainImage ) {
		return;
	}
	const src = mainImage.getAttribute( 'src' ) || '';
	const base = src.slice( 0, src.lastIndexOf( '/' ) + 1 );

	sectionState.set( section, { slides: getSlides( base ), currentIndex: 2 } );
	updateSlide( section );

	const prevButton = section.querySelector( '[data-webinar-nav="prev"]' );
	const nextButton = section.querySelector( '[data-webinar-nav="next"]' );

	if ( prevButton ) {
		prevButton.addEventListener( 'click', () => prevSlide( section ) );
	}
	if ( nextButton ) {
		nextButton.addEventListener( 'click', () => nextSlide( section ) );
	}
}

function init() {
	document
		.querySelectorAll( '.webinar-section' )
		.forEach( ensureInitialized );
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
