function getBaseFromUrl( url ) {
	if ( ! url ) {
		return '';
	}
	const idx = url.lastIndexOf( '/' );
	return idx === -1 ? '' : url.slice( 0, idx + 1 );
}

function initNavbar( wrapper ) {
	const navbar = wrapper.querySelector( '[data-zltb-navbar="1"]' );
	if ( ! navbar ) {
		return;
	}

	const scrolledClasses = [
		'bg-card/90',
		'backdrop-blur-xl',
		'border-b',
		'border-border',
		'shadow-sm',
	];
	const unscrolledClasses = [ 'bg-transparent' ];

	function onScroll() {
		const isScrolled = window.scrollY > 10;
		if ( isScrolled ) {
			navbar.classList.remove( ...unscrolledClasses );
			navbar.classList.add( ...scrolledClasses );
			return;
		}
		navbar.classList.remove( ...scrolledClasses );
		navbar.classList.add( ...unscrolledClasses );
	}

	window.addEventListener( 'scroll', onScroll, { passive: true } );
	onScroll();
}

function initSmoothAnchors( wrapper ) {
	wrapper.querySelectorAll( 'a[href^="#"]' ).forEach( ( link ) => {
		link.addEventListener( 'click', function onClick( e ) {
			const href = this.getAttribute( 'href' );
			if ( ! href || href === '#' ) {
				return;
			}
			const target = wrapper.querySelector( href );
			if ( ! target ) {
				return;
			}
			e.preventDefault();
			target.scrollIntoView( { behavior: 'smooth' } );
		} );
	} );
}

function animateCounter( el ) {
	if ( ! el || el.dataset.zltbCounterInit === '1' ) {
		return;
	}
	el.dataset.zltbCounterInit = '1';

	const end = parseFloat( el.dataset.end || '0' );
	const decimals = parseInt( el.dataset.decimal || '0', 10 );
	const prefix = el.dataset.prefix || '';
	const suffix = el.dataset.suffix || '';
	const durationMs = 1600;
	const startTime = performance.now();

	function format( value ) {
		if ( decimals > 0 ) {
			return value.toFixed( decimals );
		}
		return Math.round( value ).toString();
	}

	function tick( now ) {
		const t = Math.min( 1, ( now - startTime ) / durationMs );
		const eased = 1 - Math.pow( 1 - t, 3 );
		const value = end * eased;
		el.textContent = `${ prefix }${ format( value ) }${ suffix }`;
		if ( t < 1 ) {
			window.requestAnimationFrame( tick );
		}
	}

	window.requestAnimationFrame( tick );
}

function initSocialProofCounters( wrapper ) {
	const section = wrapper.querySelector( '[data-zltb-social-proof="1"]' );
	if ( ! section ) {
		return;
	}

	const counters = Array.from(
		section.querySelectorAll( '[data-zltb-counter="1"]' )
	);
	if ( ! counters.length ) {
		return;
	}

	const IntersectionObserverCtor = window.IntersectionObserver;
	if ( ! IntersectionObserverCtor ) {
		counters.forEach( animateCounter );
		return;
	}

	const observer = new IntersectionObserverCtor(
		( entries ) => {
			entries.forEach( ( entry ) => {
				if ( entry.isIntersecting ) {
					counters.forEach( animateCounter );
					observer.disconnect();
				}
			} );
		},
		{ threshold: 0.25 }
	);

	observer.observe( section );
}

function initIndustryBreakdown( wrapper ) {
	const section = wrapper.querySelector(
		'[data-zltb-industry-breakdown="1"]'
	);
	if ( ! section ) {
		return;
	}

	const video = section.querySelector( '[data-zltb-industry-video="1"]' );
	const tabs = Array.from(
		section.querySelectorAll( '[data-zltb-industry-tab]' )
	);
	if ( ! tabs.length || ! video ) {
		return;
	}

	const videoBase = getBaseFromUrl( video.getAttribute( 'src' ) || '' );
	const videoFiles = [
		'industry-trucking.mp4',
		'industry-logistics.mp4',
		'industry-construction.mp4',
		'industry-utilities.mp4',
	];

	const classActive =
		'group relative text-left p-5 rounded-xl transition-all duration-300 overflow-hidden bg-card border border-primary/25 shadow-[0_4px_24px_-4px_hsl(207_80%_50%/0.15)]';
	const classInactive =
		'group relative text-left p-5 rounded-xl transition-all duration-300 overflow-hidden bg-transparent border border-transparent hover:bg-accent/40';

	const iconActive =
		'w-11 h-11 rounded-xl flex items-center justify-center transition-all duration-300 bg-primary text-primary-foreground shadow-[0_0_12px_hsl(207_80%_50%/0.3)]';
	const iconInactive =
		'w-11 h-11 rounded-xl flex items-center justify-center transition-all duration-300 bg-muted text-muted-foreground group-hover:bg-accent';

	const badgeActive =
		'absolute -top-1.5 -right-1.5 w-5 h-5 rounded-full text-[10px] font-bold flex items-center justify-center transition-all duration-300 bg-primary text-primary-foreground scale-100';
	const badgeInactive =
		'absolute -top-1.5 -right-1.5 w-5 h-5 rounded-full text-[10px] font-bold flex items-center justify-center transition-all duration-300 bg-muted text-muted-foreground scale-90 opacity-60';

	const titleActive =
		'font-bold text-[15px] leading-snug transition-colors duration-300 text-foreground';
	const titleInactive =
		'font-bold text-[15px] leading-snug transition-colors duration-300 text-muted-foreground group-hover:text-foreground/80';

	let currentIndex = 0;
	let autoTimer = null;
	let pauseUntil = 0;

	function setVideo( index ) {
		const file = videoFiles[ index ];
		if ( ! file || ! videoBase ) {
			return;
		}
		const nextSrc = `${ videoBase }${ file }`;
		if ( video.getAttribute( 'src' ) !== nextSrc ) {
			video.setAttribute( 'src', nextSrc );
			if ( typeof video.load === 'function' ) {
				video.load();
			}
		}
		if ( typeof video.play === 'function' ) {
			video.play().catch( () => {} );
		}
	}

	function setTabState( tab, active ) {
		tab.className = active ? classActive : classInactive;

		const accent = tab.querySelector( '[data-zltb-industry-accent="1"]' );
		if ( accent ) {
			accent.style.opacity = active ? '1' : '0';
			accent.style.transform = active ? 'scaleY(1)' : 'scaleY(0.3)';
		}

		const iconBox = tab.querySelector(
			'[data-zltb-industry-icon-box="1"]'
		);
		if ( iconBox ) {
			iconBox.className = active ? iconActive : iconInactive;
		}

		const badge = tab.querySelector( '[data-zltb-industry-badge="1"]' );
		if ( badge ) {
			badge.className = active ? badgeActive : badgeInactive;
		}

		const title = tab.querySelector( '[data-zltb-industry-title="1"]' );
		if ( title ) {
			title.className = active ? titleActive : titleInactive;
		}

		const desc = tab.querySelector( '[data-zltb-industry-desc="1"]' );
		if ( desc ) {
			desc.classList.toggle( 'hidden', ! active );
			if ( active ) {
				desc.style.marginTop = '8px';
			} else {
				desc.style.marginTop = '';
			}
		}

		const chevron = tab.querySelector( '[data-zltb-industry-chevron="1"]' );
		if ( chevron ) {
			chevron.style.transform = active
				? 'rotate(180deg)'
				: 'rotate(0deg)';
			chevron.style.opacity = active ? '1' : '0.4';
		}
	}

	function setActive( index, userInitiated ) {
		const next = ( index + tabs.length ) % tabs.length;
		currentIndex = next;
		tabs.forEach( ( tab, i ) => setTabState( tab, i === next ) );
		setVideo( next );
		if ( userInitiated ) {
			pauseUntil = Date.now() + 7000;
		}
	}

	tabs.forEach( ( tab ) => {
		tab.addEventListener( 'click', () => {
			const idx = parseInt( tab.dataset.zltbIndustryTab, 10 );
			if ( Number.isNaN( idx ) ) {
				return;
			}
			setActive( idx, true );
		} );
	} );

	function startAuto() {
		if ( autoTimer ) {
			window.clearInterval( autoTimer );
		}
		autoTimer = window.setInterval( () => {
			if ( Date.now() < pauseUntil ) {
				return;
			}
			setActive( currentIndex + 1, false );
		}, 5000 );
	}

	setActive( 0, false );
	startAuto();
}

function initWhySwitchCarousel( wrapper ) {
	const section = wrapper.querySelector( '[data-zltb-why-switch="1"]' );
	if ( ! section ) {
		return;
	}

	const mainImage = section.querySelector( '[data-zltb-why-main-image="1"]' );
	const tabs = Array.from(
		section.querySelectorAll( '[data-zltb-why-tab]' )
	);

	if ( ! mainImage || tabs.length !== 5 ) {
		return;
	}

	const ghostPrev = section.querySelector( '[data-zltb-why-ghost-prev="1"]' );
	const ghostNext = section.querySelector( '[data-zltb-why-ghost-next="1"]' );
	const prevBtn = section.querySelector( '[data-zltb-why-nav="prev"]' );
	const nextBtn = section.querySelector( '[data-zltb-why-nav="next"]' );

	const base = getBaseFromUrl( mainImage.getAttribute( 'src' ) || '' );
	const slides = [
		{
			file: 'carousel-platform.png',
			alt: 'One platform, not a bolt-on ELD',
		},
		{
			file: 'carousel-oversight.png',
			alt: 'Better day-to-day oversight',
		},
		{
			file: 'carousel-driver.png',
			alt: 'Driver-friendly workflows',
		},
		{
			file: 'carousel-records.png',
			alt: 'One set of fleet records',
		},
		{
			file: 'carousel-growth.png',
			alt: 'Grows with your fleet',
		},
	];

	const activeButtonClass =
		'relative text-left p-4 rounded-xl transition-all duration-300 group border bg-primary/10 border-primary/40';
	const inactiveButtonClass =
		'relative text-left p-4 rounded-xl transition-all duration-300 group border bg-[hsl(210,24%,14%)] border-[hsl(210,24%,20%)] hover:border-primary/20';

	let index = 0;
	let rafId = null;
	let cycleStart = performance.now();
	const cycleMs = 6000;

	function setTabState( tab, isActive ) {
		tab.className = isActive ? activeButtonClass : inactiveButtonClass;

		const iconWrap = tab.querySelector( 'div.mb-3' );
		if ( iconWrap ) {
			iconWrap.className = isActive
				? 'mb-3 w-9 h-9 rounded-lg flex items-center justify-center transition-colors bg-primary/20'
				: 'mb-3 w-9 h-9 rounded-lg flex items-center justify-center transition-colors bg-[hsl(210,24%,20%)]';
		}

		const icon = tab.querySelector( 'svg' );
		if ( icon ) {
			icon.classList.remove( 'text-primary', 'text-muted-foreground' );
			icon.classList.add(
				isActive ? 'text-primary' : 'text-muted-foreground'
			);
		}

		const title = tab.querySelector( 'h3' );
		if ( title ) {
			title.classList.remove(
				'text-primary-foreground',
				'text-muted-foreground'
			);
			title.classList.add(
				isActive ? 'text-primary-foreground' : 'text-muted-foreground'
			);
		}

		const desc = tab.querySelector( 'p' );
		if ( desc ) {
			desc.classList.remove(
				'text-[hsl(215,14%,75%)]',
				'text-[hsl(215,14%,40%)]'
			);
			desc.classList.add(
				isActive ? 'text-[hsl(215,14%,75%)]' : 'text-[hsl(215,14%,40%)]'
			);
		}
	}

	function updateImages( nextIndex ) {
		const slide = slides[ nextIndex ];
		if ( ! slide || ! base ) {
			return;
		}
		mainImage.setAttribute( 'src', `${ base }${ slide.file }` );
		mainImage.setAttribute( 'alt', slide.alt );

		const prev =
			slides[ ( nextIndex - 1 + slides.length ) % slides.length ];
		const next = slides[ ( nextIndex + 1 ) % slides.length ];

		if ( ghostPrev && prev ) {
			ghostPrev.setAttribute( 'src', `${ base }${ prev.file }` );
		}
		if ( ghostNext && next ) {
			ghostNext.setAttribute( 'src', `${ base }${ next.file }` );
		}
	}

	function setActive( nextIndex ) {
		index = ( nextIndex + slides.length ) % slides.length;
		updateImages( index );
		tabs.forEach( ( tab, i ) => setTabState( tab, i === index ) );
		tabs.forEach( ( tab ) => {
			const progress = tab.querySelector(
				'[data-zltb-why-progress="1"]'
			);
			if ( progress ) {
				progress.style.width = '0%';
			}
		} );
		cycleStart = performance.now();
	}

	function tick( now ) {
		const elapsed = now - cycleStart;
		const pct = Math.min( 100, ( elapsed / cycleMs ) * 100 );
		const activeTab = tabs[ index ];
		const progress = activeTab
			? activeTab.querySelector( '[data-zltb-why-progress="1"]' )
			: null;
		if ( progress ) {
			progress.style.width = `${ pct }%`;
		}
		if ( elapsed >= cycleMs ) {
			setActive( index + 1 );
		}
		rafId = window.requestAnimationFrame( tick );
	}

	function start() {
		if ( rafId ) {
			window.cancelAnimationFrame( rafId );
		}
		cycleStart = performance.now();
		rafId = window.requestAnimationFrame( tick );
	}

	tabs.forEach( ( tab ) => {
		tab.addEventListener( 'click', () => {
			const idx = parseInt( tab.dataset.zltbWhyTab, 10 );
			if ( Number.isNaN( idx ) ) {
				return;
			}
			setActive( idx );
		} );
	} );

	if ( prevBtn ) {
		prevBtn.addEventListener( 'click', () => setActive( index - 1 ) );
	}
	if ( nextBtn ) {
		nextBtn.addEventListener( 'click', () => setActive( index + 1 ) );
	}

	setActive( 0 );
	start();
}

function initWrapper( wrapper ) {
	if ( ! wrapper || wrapper.dataset.zltbLanding2Init === '1' ) {
		return;
	}
	wrapper.dataset.zltbLanding2Init = '1';

	initNavbar( wrapper );
	initSmoothAnchors( wrapper );
	initSocialProofCounters( wrapper );
	initIndustryBreakdown( wrapper );
	initWhySwitchCarousel( wrapper );
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
