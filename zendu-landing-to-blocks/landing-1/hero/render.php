<?php
$template_path = defined('SWORDHEALTH_ORG_ROOT') ? SWORDHEALTH_ORG_ROOT . '/inc/templates/amirpress.html' : '';
$template = $template_path && is_readable($template_path) ? file_get_contents($template_path) : '';

$start = strpos($template, '<section class="ap-section ap-hero">');
$end = strpos($template, '<!-- Solutions -->', $start !== false ? $start : 0);
$html = '';
if ($start !== false && $end !== false) {
    $html = substr($template, $start, $end - $start);
}

if (function_exists('swordhealth_org_asset_url')) {
    $assets_base = swordhealth_org_asset_url('landingpage/assets') . '/';
    $html = str_replace('./assets/', $assets_base, $html);
}

echo $html;
