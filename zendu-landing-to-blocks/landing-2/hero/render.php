<?php
$hero_truck = function_exists('swordhealth_org_asset_url')
	? swordhealth_org_asset_url('zenduIT-dubailaunch-wp/images/hero-truck.jpg')
	: '';
$video_tracking = function_exists('swordhealth_org_asset_url')
	? swordhealth_org_asset_url('zenduIT-dubailaunch-updated/videos/hero-truck-tracking.mp4')
	: '';
$video_pulse = function_exists('swordhealth_org_asset_url')
	? swordhealth_org_asset_url('zenduIT-dubailaunch-updated/videos/hero-pulse-circles.mp4')
	: '';
?>
<section class="relative min-h-screen flex items-center overflow-hidden">
	<div class="absolute inset-0">
		<img
			src="<?php echo esc_url($hero_truck); ?>"
			alt="Fleet truck on highway"
			class="w-full h-full object-cover"
			loading="eager"
			fetchpriority="high"
			decoding="async"
		/>
		<div
			class="absolute inset-0 bg-gradient-to-r from-[hsl(210,24%,8%)] via-[hsl(210,24%,8%,0.88)] to-[hsl(210,24%,8%,0.5)]"
		></div>
		<div
			class="absolute inset-0 bg-gradient-to-t from-[hsl(210,24%,8%,0.6)] via-transparent to-[hsl(210,24%,8%,0.3)]"
		></div>
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
	</div>

	<div class="relative z-10 section-container w-full pt-28 pb-20">
		<div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
			<div class="text-center lg:text-left max-w-2xl mx-auto lg:mx-0">
				<h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-[1.1] tracking-tight mb-6 text-surface-dark-foreground">
					ELD Compliance Software <span class="gradient-text">​</span>
				</h1>
				<p class="text-lg md:text-xl leading-relaxed mb-10 text-surface-dark-foreground/70 max-w-xl mx-auto lg:mx-0">
					ZenTRACK ELD is FMCSA and Transport Canada-compliant ELD software that reduces violations, improves audit readiness, and keeps driver workflows simple.
				</p>
				<div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
					<a href="#cta" class="btn-primary-lg text-base">Book a Demo</a>
					<button
						type="button"
						class="inline-flex items-center justify-center rounded-full border-2 border-surface-dark-foreground/20 bg-transparent px-8 py-4 text-base font-medium text-surface-dark-foreground transition-all duration-200 hover:border-primary hover:bg-primary/10 hover:text-primary-foreground gap-2"
					>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
							<polygon points="6 3 20 12 6 21 6 3"></polygon>
						</svg>
						Watch How It Works
					</button>
				</div>
				<div class="mt-10 flex items-center gap-6 justify-center lg:justify-start text-surface-dark-foreground/40 text-sm">
					<span class="flex items-center gap-2">
						<span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
						FMCSA Compliant
					</span>
				</div>
			</div>

			<div class="hidden lg:flex justify-center relative">
				<div class="relative w-full max-w-lg">
					<div class="relative z-10 rounded-2xl overflow-hidden shadow-[0_20px_60px_-15px_hsl(207,80%,50%,0.3)] ring-1 ring-white/10">
						<video
							src="<?php echo esc_url($video_tracking); ?>"
							autoplay
							loop
							muted
							playsinline
							preload="auto"
							class="w-full aspect-video object-cover"
						></video>
					</div>
					<div class="absolute -bottom-10 -left-16 z-20 w-[55%] rounded-xl overflow-hidden shadow-[0_12px_40px_-8px_hsl(210,24%,8%,0.6)] ring-1 ring-white/15">
						<video
							src="<?php echo esc_url($video_pulse); ?>"
							autoplay
							loop
							muted
							playsinline
							preload="metadata"
							class="w-full aspect-video object-cover"
						></video>
					</div>
					<div
						class="absolute -inset-4 -z-10 rounded-3xl blur-2xl opacity-20"
						style="background: radial-gradient(ellipse at center, hsl(207 69% 49% / 0.6), transparent 70%);"
					></div>
				</div>
			</div>
		</div>
	</div>

	<div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10">
		<div class="zltb-hero-chevron">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-surface-dark-foreground/30">
				<path d="m6 9 6 6 6-6"></path>
			</svg>
		</div>
	</div>

	<style>
		.zltb-hero-chevron {
			animation: zltbHeroChevronFloat 1.8s ease-in-out infinite;
		}
		@keyframes zltbHeroChevronFloat {
			0% {
				transform: translateY(0);
			}
			50% {
				transform: translateY(8px);
			}
			100% {
				transform: translateY(0);
			}
		}
	</style>
</section>
