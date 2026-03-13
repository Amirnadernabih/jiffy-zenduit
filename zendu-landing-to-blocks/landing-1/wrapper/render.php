<?php
$template_path = defined('SWORDHEALTH_ORG_ROOT') ? SWORDHEALTH_ORG_ROOT . '/inc/templates/amirpress.html' : '';
$template = $template_path && is_readable($template_path) ? file_get_contents($template_path) : '';

$style_start = strpos($template, '<style>');
$style_end = $style_start !== false ? strpos($template, '</style>', $style_start) : false;
$style = '';
if ($style_start !== false && $style_end !== false) {
    $style = substr($template, $style_start + 7, $style_end - ($style_start + 7));
}
?>
<style><?php echo $style; ?></style>
<style>
	.amirpress-wrapper {
		width: 100vw;
		max-width: 100vw;
		margin-left: calc(50% - 50vw);
		margin-right: calc(50% - 50vw);
		overflow-x: hidden;
	}
</style>
<div class="amirpress-wrapper">
	<?php echo $content; ?>
</div>
