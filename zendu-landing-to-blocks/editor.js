( function () {
	const { registerBlockType } = wp.blocks;
	const { InnerBlocks, useBlockProps } = wp.blockEditor;
	const ServerSideRender = wp.serverSideRender;
	const el = wp.element.createElement;

	function ssrEdit( blockName ) {
		return function Edit( props ) {
			return el(
				'div',
				useBlockProps(),
				el( ServerSideRender, {
					block: blockName,
					attributes: props.attributes,
				} )
			);
		};
	}

	function wrapperEdit() {
		return function Edit() {
			return el( 'div', useBlockProps(), el( InnerBlocks ) );
		};
	}

	const blocks = [
		{
			name: 'zltb/landing-1-wrapper',
			title: 'Landing 1 Wrapper (Amirpress)',
			edit: wrapperEdit(),
		},
		{
			name: 'zltb/landing-1-hero',
			title: 'Landing 1 Hero',
			edit: ssrEdit( 'zltb/landing-1-hero' ),
		},
		{
			name: 'zltb/landing-1-solutions',
			title: 'Landing 1 Solutions',
			edit: ssrEdit( 'zltb/landing-1-solutions' ),
		},
		{
			name: 'zltb/landing-1-case',
			title: 'Landing 1 Case Study',
			edit: ssrEdit( 'zltb/landing-1-case' ),
		},
		{
			name: 'zltb/landing-1-cta',
			title: 'Landing 1 Bottom CTA',
			edit: ssrEdit( 'zltb/landing-1-cta' ),
		},

		{
			name: 'zltb/landing-2-wrapper',
			title: 'Landing 2 Wrapper (Dubai Launch)',
			edit: wrapperEdit(),
		},
		{
			name: 'zltb/landing-2-navbar',
			title: 'Landing 2 Navbar',
			edit: ssrEdit( 'zltb/landing-2-navbar' ),
		},
		{
			name: 'zltb/landing-2-page-shell',
			title: 'Landing 2 Page Shell',
			edit: wrapperEdit(),
		},
		{
			name: 'zltb/landing-2-hero',
			title: 'Landing 2 Hero',
			edit: ssrEdit( 'zltb/landing-2-hero' ),
		},
		{
			name: 'zltb/landing-2-social-proof',
			title: 'Landing 2 Social Proof',
			edit: ssrEdit( 'zltb/landing-2-social-proof' ),
		},
		{
			name: 'zltb/landing-2-icp-breakdown',
			title: 'Landing 2 ICP Breakdown',
			edit: ssrEdit( 'zltb/landing-2-icp-breakdown' ),
		},
		{
			name: 'zltb/landing-2-challenge',
			title: 'Landing 2 Challenge',
			edit: ssrEdit( 'zltb/landing-2-challenge' ),
		},
		{
			name: 'zltb/landing-2-value-props',
			title: 'Landing 2 Value Props',
			edit: ssrEdit( 'zltb/landing-2-value-props' ),
		},
		{
			name: 'zltb/landing-2-industry-breakdown',
			title: 'Landing 2 Industry Breakdown',
			edit: ssrEdit( 'zltb/landing-2-industry-breakdown' ),
		},
		{
			name: 'zltb/landing-2-why-switch',
			title: 'Landing 2 Why Switch',
			edit: ssrEdit( 'zltb/landing-2-why-switch' ),
		},
		{
			name: 'zltb/landing-2-build-setup',
			title: 'Landing 2 Build Setup',
			edit: ssrEdit( 'zltb/landing-2-build-setup' ),
		},
		{
			name: 'zltb/landing-2-final-cta',
			title: 'Landing 2 Final CTA',
			edit: ssrEdit( 'zltb/landing-2-final-cta' ),
		},
	];

	blocks.forEach( ( b ) => {
		registerBlockType( b.name, {
			title: b.title,
			category: 'swordhealth-org-blocks',
			icon: 'layout',
			edit: b.edit,
			save: () => null,
		} );
	} );
} )();
