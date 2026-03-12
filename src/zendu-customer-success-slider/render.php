<?php
$bg = swordhealth_org_asset_url('zendu-blocks/index5-images/background.jpg');
$img0 = swordhealth_org_asset_url('zendu-blocks/index5-images/baricade-image.jpg');
$logo0 = swordhealth_org_asset_url('zendu-blocks/index5-images/barricade.svg');
$logo1 = swordhealth_org_asset_url('zendu-blocks/index5-images/sharpsmart.svg');
$logo2 = swordhealth_org_asset_url('zendu-blocks/index5-images/trulite.svg');
$logo3 = swordhealth_org_asset_url('zendu-blocks/index5-images/velocity.svg');
?>
<div <?php echo get_block_wrapper_attributes(); ?>>
<section
	id="slider-section"
	class="slider-section"
	style="padding: 100px 20px; display: flex; flex-direction: column; align-items: center; background: url('<?php echo esc_url($bg); ?>') center/cover no-repeat; font-family: 'Helvetica Neue', Arial, sans-serif;"
>
	<div
		class="main-card"
		id="main-card"
		style="max-width: 1200px; width: 100%; display: flex; background: #1a1a1a; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.2); margin-bottom: 60px; position: relative; border: 1px solid rgba(255, 255, 255, 0.05);"
	>
		<div class="image-side" id="slide-media" style="flex: 1.1; position: relative; overflow: hidden; min-height: 500px;">
			<img
				id="active-image"
				src="<?php echo esc_url($img0); ?>"
				alt="Slide Image"
				style="width:100%; height:100%; object-fit:cover; display:block; transition: opacity 0.4s ease-in-out;"
			/>
		</div>

		<div
			id="active-content"
			class="content-side"
			style="flex: 0.9; padding: 60px 80px; background:linear-gradient(94deg,#114873 1.94%,#2188D9 54.62%); display: flex; flex-direction: column; justify-content: space-between; transition: opacity 0.4s ease-in-out;"
		>
			<div>
				<h2
					class="content-heading"
					id="active-heading"
					style="font-size:36px; line-height:1.1; font-weight:500; margin:0 0 32px 0; color:#ffffff; letter-spacing:-0.02em;"
				>
					Southwind cut accidents and saved $2M+ with Motive.
				</h2>
				<a
					href="#"
					class="learn-more-link"
					style="color:#ffffff; text-decoration:none; font-size:18px; font-weight:500; margin-bottom:80px; display:inline-flex; align-items:center; transition: opacity 0.2s ease;"
				>
					Learn more
					<svg
						width="20"
						height="12"
						viewBox="0 0 20 12"
						fill="none"
						xmlns="http://www.w3.org/2000/svg"
						style="margin-left:8px; transition: transform 0.2s ease;"
					>
						<path
							d="M14 1L19 6M19 6L14 11M19 6L1 6"
							stroke="white"
							stroke-width="2"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
					</svg>
				</a>
			</div>

			<div class="stats-grid" style="display: flex; gap: 48px; ">
				<div class="stat-block" style="border-left: 1px solid rgba(255, 255, 255); padding-left: 24px; flex: 1;">
					<div
						id="stat-primary-value"
						class="stat-value"
						style="font-size: 44px; font-weight: 600; margin: 0 0 12px 0; color: #ffffff; letter-spacing: -0.01em;"
					>
						$500K
					</div>
					<p
						id="stat-primary-label"
						class="stat-label"
						style="font-size: 15px; line-height: 1.5; color: rgba(255, 255, 255, 0.6); margin: 0;"
					>
						Saved on fuel by reducing idle time
					</p>
				</div>
				<div
					id="stat-divider"
					class="stat-block"
					style="border-left: 1px solid rgba(255, 255, 255); padding-left: 24px; flex: 1;"
				>
					<div
						id="stat-secondary-value"
						class="stat-value"
						style="font-size: 44px; font-weight: 600; margin: 0 0 12px 0; color: #ffffff; letter-spacing: -0.01em;"
					>
						$20K
					</div>
					<p
						id="stat-secondary-label"
						class="stat-label"
						style="font-size: 15px; line-height: 1.5; color: rgba(255, 255, 255, 0.6); margin: 0;"
					>
						Saved per quarter with Motive Card
					</p>
				</div>
			</div>
		</div>
	</div>

	<div
		class="nav-bar"
		id="nav-bar"
		style="width:100%; max-width:1200px; display:flex; justify-content:space-between; align-items:center; position:relative; padding:0; gap: 24px;"
	>
		<div
			class="nav-logo"
			data-index="0"
			style="cursor:pointer; padding:74px 0; flex:1; display:flex; justify-content:center; align-items:center; opacity:0.4; transition: all 0.3s ease; position:relative; box-sizing:border-box;"
		>
			<div
				class="progress-container"
				style="position:absolute; top:0; left:0; width:100%; height:2px; background:rgba(255,255,255,0.25);"
			>
				<div class="progress-bar" style="height:100%; width:0%; background:#ffffff; transition: width 0.1s linear;"></div>
			</div>
			<img
				src="<?php echo esc_url($logo0); ?>"
				alt="Baricade"
				style="max-height:80px; max-width:200px; object-fit:contain; filter: grayscale(1) brightness(1.5); display:block;"
			/>
		</div>
		<div
			class="nav-logo"
			data-index="1"
			style="cursor:pointer; padding:48px 0; flex:1; display:flex; justify-content:center; align-items:center; opacity:0.4; transition: all 0.3s ease; position:relative; box-sizing:border-box;"
		>
			<div
				class="progress-container"
				style="position:absolute; top:0; left:0; width:100%; height:2px; background:rgba(255,255,255,0.25);"
			>
				<div class="progress-bar" style="height:100%; width:0%; background:#ffffff; transition: width 0.1s linear;"></div>
			</div>
			<img
				src="<?php echo esc_url($logo1); ?>"
				alt="Sharpsmart"
				style="max-height:80px; max-width:120px; object-fit:contain; filter: grayscale(1) brightness(1.5); display:block;"
			/>
		</div>
		<div
			class="nav-logo"
			data-index="2"
			style="cursor:pointer; padding:68px 0; flex:1; display:flex; justify-content:center; align-items:center; opacity:0.4; transition: all 0.3s ease; position:relative; box-sizing:border-box;"
		>
			<div
				class="progress-container"
				style="position:absolute; top:0; left:0; width:100%; height:2px; background:rgba(255,255,255,0.25);"
			>
				<div class="progress-bar" style="height:100%; width:0%; background:#ffffff; transition: width 0.1s linear;"></div>
			</div>
			<img
				src="<?php echo esc_url($logo2); ?>"
				alt="Trulite"
				style="max-height:80px; max-width:120px; object-fit:contain; filter: grayscale(1) brightness(1.5); display:block;"
			/>
		</div>
		<div
			class="nav-logo"
			data-index="3"
			style="cursor:pointer; padding:55px 0; flex:1; display:flex; justify-content:center; align-items:center; opacity:0.4; transition: all 0.3s ease; position:relative; box-sizing:border-box;"
		>
			<div
				class="progress-container"
				style="position:absolute; top:0; left:0; width:100%; height:2px; background:rgba(255,255,255,0.25);"
			>
				<div class="progress-bar" style="height:100%; width:0%; background:#ffffff; transition: width 0.1s linear;"></div>
			</div>
			<img
				src="<?php echo esc_url($logo3); ?>"
				alt="Velocity"
				style="max-height:80px; max-width:120px; object-fit:contain; filter: grayscale(1) brightness(1.5); display:block;"
			/>
		</div>
	</div>
</section>
</div>
