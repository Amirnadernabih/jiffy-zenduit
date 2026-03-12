<?php
$background = swordhealth_org_asset_url('zendu-blocks/images/section-wp-block-section-basic (1).png');
$image_left = swordhealth_org_asset_url('zendu-blocks/images/Wireframe 1.png');
$image_right = swordhealth_org_asset_url('zendu-blocks/images/Frame 1410121514 1.png');
?>
<section
	class="block-basic-section"
	style="max-width:1200px;width:100%;margin:60px auto;position:relative;font-family:'Helvetica Neue', Arial, sans-serif;"
>
	<div
		class="block-basic-container"
		style="position:relative;border-radius:24px;padding:75px 45px;display:flex;align-items:center;overflow:visible;background:url('<?php echo esc_url($background); ?>') center/cover no-repeat;box-shadow:0 20px 50px rgba(0,0,0,0.1);"
	>
		<div
			class="block-basic-wrapper"
			style="position:relative;z-index:2;display:flex;width:100%;align-items:center;justify-content:space-between;gap:20px;"
		>
			<div class="block-basic-left" style="flex:1.2;max-width:600px;color:#ffffff;height: 22rem;">
				<div
					class="block-basic-badge-row"
					style="display:flex;align-items:center;gap:12px;margin-bottom:24px;"
				>
					<span
						class="block-basic-badge-new"
						style="background:#ffffff;color:#2188D9;padding:5px 14px;border-radius:20px;font-size:13px;font-weight:800;letter-spacing:0.5px;"
					>
						NEW
					</span>
					<span
						class="block-basic-badge-text"
						style="font-size:14px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;"
					>
						FORMS UPDATES
					</span>
				</div>
				<h1
					class="block-basic-heading"
					style="color:#ffffff;font-family:'Helvetica Neue',sans-serif;font-size:36px;font-style:normal;font-weight:500;line-height:50.4px;margin-bottom:24px;"
				>
					From Forms to Action—Automate Fleet &amp; Safety and Maintenance.
				</h1>
				<p
					class="block-basic-subtext"
					style="font-size:22px;font-weight:400;opacity:0.9;margin:0 0 44px 0;line-height:1.4;font-family:'Helvetica Neue',sans-serif;"
				>
					Forms now automatically trigger safety exceptions, maintenance service requests, approvals, and notifications.
				</p>
				<a
					href="#"
					class="block-basic-cta"
					style="display:inline-block;background:#ffffff;color:#2188D9;padding:16px 36px;border-radius:50px;text-decoration:none;font-weight:600;font-size:18px;transition:all 0.3s ease;box-shadow:0 4px 15px rgba(0,0,0,0.1);"
					onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 25px rgba(0,0,0,0.2)';this.style.background='#fcfcfc';"
					onmouseout="this.style.transform='';this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)';this.style.background='#ffffff';"
				>
					Explore the Feature
				</a>
			</div>

			<div class="block-basic-right" style="flex:1;display:flex;justify-content:flex-end;align-items:center;">
				<div
					class="block-basic-slider"
					style="position:relative;width:360px;max-width:100%;aspect-ratio:5/5;border-radius:24px;overflow:hidden;"
				>
					<img
						src="<?php echo esc_url($image_left); ?>"
						alt="Left state"
						class="block-basic-slider-img"
						style="width:100%;height:100%;object-fit:cover;display:block;"
					/>
					<div class="block-basic-slider-after">
						<img
							src="<?php echo esc_url($image_right); ?>"
							alt="Right state"
							class="block-basic-slider-img"
							style="width:100%;height:100%;object-fit:cover;display:block;"
						/>
					</div>
					<div class="block-basic-slider-handle">
						<span>&lt;</span>
						<span>&gt;</span>
					</div>
					<input
						type="range"
						min="0"
						max="100"
						value="50"
						class="block-basic-slider-range"
						aria-label="Image comparison slider"
					/>
				</div>
			</div>
		</div>
	</div>
</section>
