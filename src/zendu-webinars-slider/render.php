<?php
$bg = swordhealth_org_asset_url('zendu-blocks/index6-images/background.jpg');
$img3 = swordhealth_org_asset_url('zendu-blocks/index6-images/img3.png');
?>
<div <?php echo get_block_wrapper_attributes(); ?>>
<section
	class="webinar-section"
	style="padding: 80px 20px; display: flex;justify-content: center;align-items: center; font-family: 'Helvetica Neue', Arial, sans-serif; flex-direction: column; align-items: center; min-height: 100vh; box-sizing: border-box; background-image: url('<?php echo esc_url($bg); ?>'); background-size: cover; background-repeat: no-repeat; background-position: center;"
>
	<div
		class="webinar-card"
		style="max-width: 1100px; width: 100%; display: flex; background: #ffffff; border-radius: 40px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.15); position: relative;"
	>
		<div
			class="webinar-left"
			style="width: 42%; background: #4A90E2; display: flex; align-items: center; justify-content: center; box-sizing: border-box; overflow: hidden;"
		>
			<img
				id="main-image"
				src="<?php echo esc_url($img3); ?>"
				alt="Webinar Image"
				style="width: 100%; height: 100%; object-fit: cover; display: block;"
			/>
		</div>

		<div
			class="webinar-right"
			style="width: 58%; background: #EBF5FF; padding: 60px; display: flex; flex-direction: column; justify-content: center; position: relative; box-sizing: border-box;"
		>
			<div class="webinar-nav" style="position: absolute; top: 40px; right: 40px; display: flex; align-items: center; gap: 20px;">
				<button
					type="button"
					data-webinar-nav="prev"
					style="background: #ffffff; border: none; cursor: pointer; width: 44px; height: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(0,0,0,0.05); transition: transform 0.2s ease;"
					onmouseover="this.style.transform='scale(1.05)'"
					onmouseout="this.style.transform='scale(1)'"
				>
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="#2188D9" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</button>
				<span
					id="slide-number"
					style="color: #2188D9; font-size: 20px; font-weight: 600; font-family: 'Helvetica Neue', Arial, sans-serif;"
				>
					3/3
				</span>
				<button
					type="button"
					data-webinar-nav="next"
					style="background: #ffffff; border: none; cursor: pointer; width: 44px; height: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(0,0,0,0.05); transition: transform 0.2s ease;"
					onmouseover="this.style.transform='scale(1.05)'"
					onmouseout="this.style.transform='scale(1)'"
				>
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="#2188D9" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</button>
			</div>

			<h2
				id="right-heading"
				class="webinar-heading"
				style="color: #1a1a1a; font-size: 36px; font-weight: bold; line-height: 1.2; margin: 25px 0 25px 0;"
			>
				Smart Asset Tracking: From Visibility to Profitability
			</h2>

			<p
				id="right-subheading"
				style="color: #444444; font-size: 18px; line-height: 1.6; margin: 0 0 35px 0;"
			>
				Every Missing or Idle Asset Hurts Operations. Misplaced tools, underutilized equipment, and jobsite blind spots don’t just slow projects, they raise…
			</p>

			<div id="button-container">
				<button
					id="cta-button-1"
					style="display: none; background: #2188D9; color: #ffffff; border: none; border-radius: 30px; padding: 14px 35px; font-size: 18px; font-weight: bold; cursor: pointer; width: fit-content; transition: background 0.3s ease;"
					onmouseover="this.style.background='#136AB6'"
					onmouseout="this.style.background='#2188D9'"
				>
					Read More
				</button>
				<button
					id="cta-button-2"
					style="display: none; background: #2188D9; color: #ffffff; border: none; border-radius: 30px; padding: 14px 35px; font-size: 18px; font-weight: bold; cursor: pointer; width: fit-content; transition: background 0.3s ease;"
					onmouseover="this.style.background='#136AB6'"
					onmouseout="this.style.background='#2188D9'"
				>
					Read More
				</button>
				<button
					id="cta-button-3"
					style="display: none; background: #2188D9; color: #ffffff; border: none; border-radius: 30px; padding: 14px 35px; font-size: 18px; font-weight: bold; cursor: pointer; width: fit-content; transition: background 0.3s ease;"
					onmouseover="this.style.background='#136AB6'"
					onmouseout="this.style.background='#2188D9'"
				>
					Read More
				</button>
			</div>
		</div>
	</div>
</section>
</div>
