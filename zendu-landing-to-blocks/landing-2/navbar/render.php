<?php
$logo_url = function_exists('swordhealth_org_asset_url')
	? swordhealth_org_asset_url('zenduIT-dubailaunch-wp/images/zenduit-logo-blue.png')
	: '';
?>
<nav
	data-zltb-navbar="1"
	class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent"
>
	<div class="section-container flex items-center justify-between h-16 lg:h-20">
		<a href="#" class="flex items-center">
			<img src="<?php echo esc_url($logo_url); ?>" alt="ZenduIT" class="h-7 lg:h-8" />
		</a>
		<div class="hidden md:flex items-center gap-8 text-sm font-medium">
			<a href="#features" class="text-muted-foreground hover:text-foreground transition-colors">
				Features
			</a>
			<a
				href="#industries"
				class="text-muted-foreground hover:text-foreground transition-colors"
			>
				Industries
			</a>
			<a href="#pricing" class="text-muted-foreground hover:text-foreground transition-colors">
				Pricing
			</a>
		</div>
		<a href="#cta" class="btn-primary-lg !px-6 !py-2.5 text-sm">
			Book a Demo
		</a>
	</div>
</nav>
