function initWrapper( wrapper ) {
	if ( ! wrapper || wrapper.dataset.zltbLanding2Init === '1' ) {
		return;
	}
	wrapper.dataset.zltbLanding2Init = '1';

	const navbar = wrapper.querySelector( '#navbar' );
	const navInner = wrapper.querySelector( '#nav-inner' );
	const tabButtons = wrapper.querySelectorAll( '.industry-tab' );
	const industryImage = wrapper.querySelector( '#industry-image' );
	const carouselMainImage = wrapper.querySelector( '#carousel-main-image' );
	const carouselTitle = wrapper.querySelector( '#carousel-title' );
	const carouselDescription = wrapper.querySelector(
		'#carousel-description'
	);
	const carouselGhosts = wrapper.querySelectorAll( '.carousel-ghost-img' );

	function onScroll() {
		if ( ! navbar || ! navInner ) {
			return;
		}

		const isScrolled = window.scrollY > 10;
		navbar.classList.toggle( 'scrolled', isScrolled );
		navInner.classList.toggle( 'scrolled', isScrolled );
	}

	window.addEventListener( 'scroll', onScroll, { passive: true } );
	onScroll();

	const IntersectionObserverCtor = window.IntersectionObserver;
	if ( IntersectionObserverCtor ) {
		const observer = new IntersectionObserverCtor(
			( entries ) => {
				entries.forEach( ( entry ) => {
					if ( entry.isIntersecting ) {
						entry.target.classList.add( 'visible' );
						observer.unobserve( entry.target );
					}
				} );
			},
			{ threshold: 0.2 }
		);

		wrapper
			.querySelectorAll( '.reveal' )
			.forEach( ( el ) => observer.observe( el ) );
	}

	const industryBase =
		industryImage && industryImage.src
			? industryImage.src.slice(
					0,
					industryImage.src.lastIndexOf( '/' ) + 1
			  )
			: '';

	const industries = [
		{
			title: 'Construction',
			description:
				'Manage heavy equipment, track utilization, and reduce downtime across every job site.',
			imageFile: 'industry-breakdown-1st.png',
		},
		{
			title: 'Logistics',
			description:
				'Keep trailers, containers, and cargo moving efficiently with full visibility at every checkpoint.',
			imageFile: 'industry-logistics.png',
		},
		{
			title: 'Utilities',
			description:
				'Track tools, vehicles, and field assets while ensuring compliance across distributed teams.',
			imageFile: 'industry-utilities.png',
		},
	];

	tabButtons.forEach( ( btn ) => {
		btn.addEventListener( 'click', () => {
			tabButtons.forEach( ( b ) => b.classList.remove( 'active' ) );
			btn.classList.add( 'active' );

			const index = parseInt( btn.dataset.industryIndex, 10 );
			const selected = industries[ index ];
			if ( ! selected ) {
				return;
			}

			const titleEl = wrapper.querySelector( '#industry-title' );
			const descEl = wrapper.querySelector( '#industry-description' );

			if ( titleEl ) {
				titleEl.textContent = selected.title;
			}
			if ( descEl ) {
				descEl.textContent = selected.description;
			}
			if ( industryImage && industryBase ) {
				industryImage.src = `${ industryBase }${ selected.imageFile }`;
			}
		} );
	} );

	const carouselBase =
		carouselMainImage && carouselMainImage.src
			? carouselMainImage.src.slice(
					0,
					carouselMainImage.src.lastIndexOf( '/' ) + 1
			  )
			: '';

	const slides = [
		{
			title: 'Platform',
			desc: 'Everything in one place. One login, one dashboard, one set of reports.',
			mainFile: 'carousel-platform.png',
			ghostFiles: [
				'carousel-platform.png',
				'carousel-oversight.png',
				'carousel-growth.png',
			],
		},
		{
			title: 'Oversight',
			desc: 'Track compliance, safety, and performance with real-time visibility.',
			mainFile: 'carousel-oversight.png',
			ghostFiles: [
				'carousel-oversight.png',
				'carousel-growth.png',
				'carousel-records.png',
			],
		},
		{
			title: 'Growth',
			desc: 'Scale operations with smarter tools and a modern driver experience.',
			mainFile: 'carousel-growth.png',
			ghostFiles: [
				'carousel-growth.png',
				'carousel-records.png',
				'carousel-driver.png',
			],
		},
		{
			title: 'Records',
			desc: 'Keep clean logs and audit-ready records without extra work.',
			mainFile: 'carousel-records.png',
			ghostFiles: [
				'carousel-records.png',
				'carousel-driver.png',
				'carousel-platform.png',
			],
		},
		{
			title: 'Driver',
			desc: 'Drivers get a simple, fast workflow that reduces friction daily.',
			mainFile: 'carousel-driver.png',
			ghostFiles: [
				'carousel-driver.png',
				'carousel-platform.png',
				'carousel-oversight.png',
			],
		},
	];

	let currentSlide = 0;

	function updateCarousel( index ) {
		const slide = slides[ index ];
		if ( ! slide ) {
			return;
		}

		if ( carouselTitle ) {
			carouselTitle.textContent = slide.title;
		}
		if ( carouselDescription ) {
			carouselDescription.textContent = slide.desc;
		}
		if ( carouselMainImage && carouselBase ) {
			carouselMainImage.src = `${ carouselBase }${ slide.mainFile }`;
		}
		if ( carouselGhosts.length && carouselBase ) {
			carouselGhosts.forEach( ( img, i ) => {
				if ( img && slide.ghostFiles[ i ] ) {
					img.src = `${ carouselBase }${ slide.ghostFiles[ i ] }`;
				}
			} );
		}

		wrapper.querySelectorAll( '.carousel-btn' ).forEach( ( b ) => {
			b.classList.remove( 'active' );
			b.setAttribute( 'aria-selected', 'false' );
		} );
		const activeBtn = wrapper.querySelector(
			`.carousel-btn[data-slide="${ index }"]`
		);
		if ( activeBtn ) {
			activeBtn.classList.add( 'active' );
			activeBtn.setAttribute( 'aria-selected', 'true' );
		}
	}

	wrapper.querySelectorAll( '.carousel-btn' ).forEach( ( button ) => {
		button.addEventListener( 'click', () => {
			const index = parseInt( button.dataset.slide, 10 );
			if ( Number.isNaN( index ) ) {
				return;
			}
			currentSlide = index;
			updateCarousel( currentSlide );
		} );
	} );

	updateCarousel( currentSlide );

	wrapper.querySelectorAll( 'a[href^="#"]' ).forEach( ( link ) => {
		link.addEventListener( 'click', function onClick( e ) {
			const targetId = this.getAttribute( 'href' );
			if ( ! targetId || targetId === '#' ) {
				return;
			}
			const target = wrapper.querySelector( targetId );
			if ( ! target ) {
				return;
			}
			e.preventDefault();
			target.scrollIntoView( { behavior: 'smooth' } );
		} );
	} );
}

function init() {
	document
		.querySelectorAll( '.dubai-launcher-wrapper' )
		.forEach( initWrapper );
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
