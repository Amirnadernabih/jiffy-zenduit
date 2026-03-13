<?php
$template_path = defined('SWORDHEALTH_ORG_ROOT') ? SWORDHEALTH_ORG_ROOT . '/inc/templates/dubai-launch.html' : '';
$template = $template_path && is_readable($template_path) ? file_get_contents($template_path) : '';

$start_marker = '<!-- FINAL CTA -->';
$start = strpos($template, $start_marker);
$start = $start !== false ? strpos($template, '<section', $start) : false;
$end_marker = $start !== false ? strpos($template, '</section>', $start) : false;
$end = $end_marker !== false ? $end_marker + 10 : false;
$html = '';
if ($start !== false && $end !== false) {
    $html = substr($template, $start, $end - $start);
}

if (function_exists('swordhealth_org_asset_url')) {
    $assets_base = swordhealth_org_asset_url('zenduIT-dubailaunch-wp/images') . '/';
    $html = str_replace('./images/', $assets_base, $html);
}

echo $html;
