<?php
$img_platform = function_exists('swordhealth_org_asset_url')
	? swordhealth_org_asset_url('zenduIT-dubailaunch-wp/images/carousel-platform.png')
	: '';
$img_oversight = function_exists('swordhealth_org_asset_url')
	? swordhealth_org_asset_url('zenduIT-dubailaunch-wp/images/carousel-oversight.png')
	: '';
$img_driver = function_exists('swordhealth_org_asset_url')
	? swordhealth_org_asset_url('zenduIT-dubailaunch-wp/images/carousel-driver.png')
	: '';
$img_records = function_exists('swordhealth_org_asset_url')
	? swordhealth_org_asset_url('zenduIT-dubailaunch-wp/images/carousel-records.png')
	: '';
$img_growth = function_exists('swordhealth_org_asset_url')
	? swordhealth_org_asset_url('zenduIT-dubailaunch-wp/images/carousel-growth.png')
	: '';
?>
<section class="relative overflow-hidden bg-[hsl(var(--surface-dark))]" data-zltb-why-switch="1">
	<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
		<div
			class="absolute inset-0"
			style="background: radial-gradient(ellipse 80% 60% at 20% 30%, hsl(207 80% 18% / 0.7) 0%, transparent 70%), radial-gradient(ellipse 60% 80% at 80% 70%, hsl(207 90% 22% / 0.6) 0%, transparent 70%), radial-gradient(ellipse 50% 50% at 60% 20%, hsl(200 70% 15% / 0.5) 0%, transparent 60%), radial-gradient(ellipse 70% 40% at 10% 80%, hsl(215 60% 12% / 0.5) 0%, transparent 60%);"
		></div>
		<div
			class="absolute -top-[20%] -right-[10%] w-[60%] h-[60%] rounded-full blur-[120px]"
			style="background: hsl(207 90% 45% / 0.12);"
		></div>
		<div
			class="absolute -bottom-[15%] -left-[10%] w-[50%] h-[50%] rounded-full blur-[100px]"
			style="background: hsl(195 80% 35% / 0.1);"
		></div>
		<div
			class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[70%] h-[50%] rounded-full blur-[140px]"
			style="background: hsl(210 70% 25% / 0.08);"
		></div>
		<div
			class="absolute inset-0 opacity-[0.03]"
			style='background-image: url("data:image/svg+xml,%3Csvg viewBox=%270 0 256 256%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cfilter id=%27n%27%3E%3CfeTurbulence type=%27fractalNoise%27 baseFrequency=%270.9%27 numOctaves=%274%27 stitchTiles=%27stitch%27/%3E%3C/filter%3E%3Crect width=%27100%2525%27 height=%27100%2525%27 filter=%27url(%2523n)%27/%3E%3C/svg%3E");'
		></div>
	</div>

	<div class="section-container section-padding relative z-10">
		<div class="text-center mb-10 max-w-3xl mx-auto">
			<h2 class="text-3xl lg:text-5xl font-bold text-primary-foreground text-balance">
				Why Fleets Switch to <span class="gradient-text">ZenduELD</span>
			</h2>
			<p class="mt-4 text-lg text-muted-foreground">
				Most ELDs focus on the device. ZenduELD focuses on what happens every day after install.
			</p>
		</div>

		<div class="relative mb-8" style="perspective: 1200px;">
			<div class="relative w-full max-w-4xl mx-auto aspect-[16/9] rounded-2xl overflow-hidden">
				<div class="absolute inset-0 rounded-2xl bg-[hsl(210,24%,8%)] border border-primary/10"></div>

				<div class="absolute inset-0 pointer-events-none">
					<img
						data-zltb-why-ghost-next="1"
						src="<?php echo esc_url($img_oversight); ?>"
						alt=""
						class="absolute right-[-8%] top-1/2 -translate-y-1/2 w-[30%] opacity-10 blur-[2px] zltb-why-ghost-float"
					/>
					<img
						data-zltb-why-ghost-prev="1"
						src="<?php echo esc_url($img_growth); ?>"
						alt=""
						class="absolute left-[-8%] top-1/2 -translate-y-1/2 w-[30%] opacity-10 blur-[2px] zltb-why-ghost-float-reverse"
					/>
				</div>

				<div class="absolute inset-0 flex items-center justify-center p-8 lg:p-14" style="transform-style: preserve-3d;">
					<img
						data-zltb-why-main-image="1"
						src="<?php echo esc_url($img_platform); ?>"
						alt="One platform, not a bolt-on ELD"
						class="w-full h-full object-contain drop-shadow-2xl zltb-why-main-float"
					/>
				</div>

				<div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-3/4 h-1/4 blur-[60px] opacity-25 pointer-events-none bg-primary"></div>

				<button
					type="button"
					data-zltb-why-nav="prev"
					class="absolute left-3 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full flex items-center justify-center bg-[hsl(var(--surface-dark))]/80 border border-primary/30 text-primary-foreground transition-colors hover:bg-primary/20"
					aria-label="Previous slide"
				>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
						<path d="m15 18-6-6 6-6"></path>
					</svg>
				</button>
				<button
					type="button"
					data-zltb-why-nav="next"
					class="absolute right-3 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full flex items-center justify-center bg-[hsl(var(--surface-dark))]/80 border border-primary/30 text-primary-foreground transition-colors hover:bg-primary/20"
					aria-label="Next slide"
				>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
						<path d="m9 18 6-6-6-6"></path>
					</svg>
				</button>
			</div>
		</div>

		<div class="max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-5 gap-3" data-zltb-why-tabs="1">
			<button
				type="button"
				data-zltb-why-tab="0"
				class="relative text-left p-4 rounded-xl transition-all duration-300 group border bg-primary/10 border-primary/40"
			>
				<div class="mb-3 w-9 h-9 rounded-lg flex items-center justify-center transition-colors bg-primary/20">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4.5 h-4.5 transition-colors text-primary">
						<path d="M12 2H2v10h10V2z"></path>
						<path d="M22 12h-10v10h10V12z"></path>
						<path d="M12 12H2v10h10V12z"></path>
						<path d="M22 2h-10v10h10V2z"></path>
					</svg>
				</div>
				<h3 class="font-bold text-sm leading-tight mb-1 transition-colors text-primary-foreground">
					One platform, not a bolt-on ELD
				</h3>
				<p class="text-xs leading-relaxed transition-colors hidden md:block text-[hsl(215,14%,75%)]">
					Compliance, safety, diagnostics, and assets in one system, less tool sprawl.
				</p>
				<div class="mt-3 h-[3px] w-full rounded-full bg-[hsl(210,24%,22%)] overflow-hidden">
					<div data-zltb-why-progress="1" class="h-full rounded-full bg-primary" style="width: 0%;"></div>
				</div>
			</button>

			<button
				type="button"
				data-zltb-why-tab="1"
				class="relative text-left p-4 rounded-xl transition-all duration-300 group border bg-[hsl(210,24%,14%)] border-[hsl(210,24%,20%)] hover:border-primary/20"
			>
				<div class="mb-3 w-9 h-9 rounded-lg flex items-center justify-center transition-colors bg-[hsl(210,24%,20%)]">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4.5 h-4.5 transition-colors text-muted-foreground">
						<path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
						<circle cx="12" cy="12" r="3"></circle>
					</svg>
				</div>
				<h3 class="font-bold text-sm leading-tight mb-1 transition-colors text-muted-foreground">
					Better day-to-day oversight
				</h3>
				<p class="text-xs leading-relaxed transition-colors hidden md:block text-[hsl(215,14%,40%)]">
					Dedicated views for HOS, unverified logs, and violations so issues don't pile up.
				</p>
				<div class="mt-3 h-[3px] w-full rounded-full bg-[hsl(210,24%,22%)] overflow-hidden">
					<div data-zltb-why-progress="1" class="h-full rounded-full bg-primary" style="width: 0%;"></div>
				</div>
			</button>

			<button
				type="button"
				data-zltb-why-tab="2"
				class="relative text-left p-4 rounded-xl transition-all duration-300 group border bg-[hsl(210,24%,14%)] border-[hsl(210,24%,20%)] hover:border-primary/20"
			>
				<div class="mb-3 w-9 h-9 rounded-lg flex items-center justify-center transition-colors bg-[hsl(210,24%,20%)]">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4.5 h-4.5 transition-colors text-muted-foreground">
						<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
						<circle cx="9" cy="7" r="4"></circle>
						<path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
						<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
					</svg>
				</div>
				<h3 class="font-bold text-sm leading-tight mb-1 transition-colors text-muted-foreground">
					Driver-friendly workflows
				</h3>
				<p class="text-xs leading-relaxed transition-colors hidden md:block text-[hsl(215,14%,40%)]">
					Clear ELD logging and DVIR flows that reduce missed steps and rework.
				</p>
				<div class="mt-3 h-[3px] w-full rounded-full bg-[hsl(210,24%,22%)] overflow-hidden">
					<div data-zltb-why-progress="1" class="h-full rounded-full bg-primary" style="width: 0%;"></div>
				</div>
			</button>

			<button
				type="button"
				data-zltb-why-tab="3"
				class="relative text-left p-4 rounded-xl transition-all duration-300 group border bg-[hsl(210,24%,14%)] border-[hsl(210,24%,20%)] hover:border-primary/20"
			>
				<div class="mb-3 w-9 h-9 rounded-lg flex items-center justify-center transition-colors bg-[hsl(210,24%,20%)]">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4.5 h-4.5 transition-colors text-muted-foreground">
						<path d="M4 6h16"></path>
						<path d="M4 10h16"></path>
						<path d="M4 14h16"></path>
						<path d="M4 18h16"></path>
					</svg>
				</div>
				<h3 class="font-bold text-sm leading-tight mb-1 transition-colors text-muted-foreground">
					One set of fleet records
				</h3>
				<p class="text-xs leading-relaxed transition-colors hidden md:block text-[hsl(215,14%,40%)]">
					Drivers, vehicles, trailers, logs, and diagnostics stay in sync across the platform.
				</p>
				<div class="mt-3 h-[3px] w-full rounded-full bg-[hsl(210,24%,22%)] overflow-hidden">
					<div data-zltb-why-progress="1" class="h-full rounded-full bg-primary" style="width: 0%;"></div>
				</div>
			</button>

			<button
				type="button"
				data-zltb-why-tab="4"
				class="relative text-left p-4 rounded-xl transition-all duration-300 group border bg-[hsl(210,24%,14%)] border-[hsl(210,24%,20%)] hover:border-primary/20"
			>
				<div class="mb-3 w-9 h-9 rounded-lg flex items-center justify-center transition-colors bg-[hsl(210,24%,20%)]">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4.5 h-4.5 transition-colors text-muted-foreground">
						<path d="M3 17l6-6 4 4 8-8"></path>
						<path d="M14 7h7v7"></path>
					</svg>
				</div>
				<h3 class="font-bold text-sm leading-tight mb-1 transition-colors text-muted-foreground">
					Grows with your fleet
				</h3>
				<p class="text-xs leading-relaxed transition-colors hidden md:block text-[hsl(215,14%,40%)]">
					Start with ELD, then add visibility, safety, and analytics without switching tools.
				</p>
				<div class="mt-3 h-[3px] w-full rounded-full bg-[hsl(210,24%,22%)] overflow-hidden">
					<div data-zltb-why-progress="1" class="h-full rounded-full bg-primary" style="width: 0%;"></div>
				</div>
			</button>
		</div>
	</div>

	<style>
		.zltb-why-main-float {
			animation: zltbWhyMainFloat 3s ease-in-out infinite;
		}
		.zltb-why-ghost-float {
			animation: zltbWhyGhostFloat 4s ease-in-out infinite;
		}
		.zltb-why-ghost-float-reverse {
			animation: zltbWhyGhostFloatReverse 4s ease-in-out infinite;
		}
		@keyframes zltbWhyMainFloat {
			0% {
				transform: translateY(0);
			}
			50% {
				transform: translateY(-8px);
			}
			100% {
				transform: translateY(0);
			}
		}
		@keyframes zltbWhyGhostFloat {
			0% {
				transform: translateY(-52%);
			}
			50% {
				transform: translateY(-48%);
			}
			100% {
				transform: translateY(-52%);
			}
		}
		@keyframes zltbWhyGhostFloatReverse {
			0% {
				transform: translateY(-48%);
			}
			50% {
				transform: translateY(-52%);
			}
			100% {
				transform: translateY(-48%);
			}
		}
	</style>
</section>
