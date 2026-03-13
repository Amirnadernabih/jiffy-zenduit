<?php
$template_path = defined('SWORDHEALTH_ORG_ROOT') ? SWORDHEALTH_ORG_ROOT . '/inc/templates/amirpress.html' : '';
$template = $template_path && is_readable($template_path) ? file_get_contents($template_path) : '';

$start = strpos($template, '<section class="ap-section ap-case">');
$end = strpos($template, '<!-- Bottom CTA -->', $start !== false ? $start : 0);
$html = '';
if ($start !== false && $end !== false) {
    $html = substr($template, $start, $end - $start);
}

echo $html;
