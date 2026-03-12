<?php
$template_path = SWORDHEALTH_ORG_ROOT . '/inc/templates/dubai-launch.html';
$template = is_readable($template_path) ? file_get_contents($template_path) : '';

$style_start = strpos($template, '<style>');
$style_end = $style_start !== false ? strpos($template, '</style>', $style_start) : false;
$style = '';
if ($style_start !== false && $style_end !== false) {
    $style = substr($template, $style_start + 7, $style_end - ($style_start + 7));
}

$content_start = strpos($template, '<section class="dubai-launcher-wrapper">');
$script_start = $content_start !== false ? strpos($template, '<script', $content_start) : false;
$content = '';
$script = '';
if ($content_start !== false && $script_start !== false) {
    $content = substr($template, $content_start, $script_start - $content_start);
    $script_end = strpos($template, '</script>', $script_start);
    if ($script_end !== false) {
        $script = substr($template, $script_start, ($script_end + 9) - $script_start);
    }
}

$assets_base = swordhealth_org_asset_url('zenduIT-dubailaunch-wp/images') . '/';
$content = str_replace('./images/', $assets_base, $content);
$script = str_replace('./images/', $assets_base, $script);
?>
<style><?php echo $style; ?></style>
<div <?php echo get_block_wrapper_attributes(); ?>>
	<?php echo $content; ?>
	<?php echo $script; ?>
</div>
