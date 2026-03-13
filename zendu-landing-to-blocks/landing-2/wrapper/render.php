<?php
$css_url = function_exists('swordhealth_org_asset_url')
	? swordhealth_org_asset_url('zenduIT-dubailaunch-updated/css/landing.css')
	: '';
?>
<?php if ($css_url) : ?>
	<link rel="stylesheet" href="<?php echo esc_url($css_url); ?>" />
<?php endif; ?>
<style>
	.dubai-launcher-wrapper.alignfull {
		width: 100%;
		max-width: none !important;
		margin-left: 0 !important;
		margin-right: 0 !important;
	}
</style>
<div class="dubai-launcher-wrapper alignfull min-h-screen bg-background">
	<?php echo $content; ?>
</div>
