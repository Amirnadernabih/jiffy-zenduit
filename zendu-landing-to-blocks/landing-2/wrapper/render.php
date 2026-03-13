<?php
$css_url = function_exists('swordhealth_org_asset_url')
	? swordhealth_org_asset_url('zenduIT-dubailaunch-updated/css/landing.css')
	: '';
?>
<?php if ($css_url) : ?>
	<link rel="stylesheet" href="<?php echo esc_url($css_url); ?>" />
<?php endif; ?>
<style>
	.dubai-launcher-wrapper {
		width: 100vw;
		max-width: 100vw;
		margin-left: calc(50% - 50vw);
		margin-right: calc(50% - 50vw);
		overflow-x: hidden;
	}
</style>
<div class="dubai-launcher-wrapper min-h-screen bg-background">
	<?php echo $content; ?>
</div>
