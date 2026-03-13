<?php
$template_path = defined('SWORDHEALTH_ORG_ROOT') ? SWORDHEALTH_ORG_ROOT . '/inc/templates/dubai-launch.html' : '';
$template = $template_path && is_readable($template_path) ? file_get_contents($template_path) : '';

$style_start = strpos($template, '<style>');
$style_end = $style_start !== false ? strpos($template, '</style>', $style_start) : false;
$style = '';
if ($style_start !== false && $style_end !== false) {
    $style = substr($template, $style_start + 7, $style_end - ($style_start + 7));
}
?>
<style><?php echo $style; ?></style>
<section class="dubai-launcher-wrapper">
	<?php echo $content; ?>
</section>
