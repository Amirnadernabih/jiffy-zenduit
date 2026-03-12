<?php
/**
 * Plugin Name:       Swordhealth Gutenberg Blocks (WP.org)
 * Description:       WordPress.org compatible Gutenberg blocks converted from Swordhealth HTML blocks.
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.4
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       swordhealth-org
 *
 * @package SwordhealthOrg
 */
 
if (! defined('ABSPATH')) {
    exit;
}
 
define('SWORDHEALTH_ORG_VERSION', '0.1.0');
define('SWORDHEALTH_ORG_ROOT', untrailingslashit(plugin_dir_path(__FILE__)));
define('SWORDHEALTH_ORG_PLUGIN_URL', plugins_url() . '/' . basename(dirname(__FILE__)));
define('SWORDHEALTH_ORG_ASSETS_URL', SWORDHEALTH_ORG_PLUGIN_URL . '/inc/assets');
 
require_once __DIR__ . '/config/_all-config-files.php';

if (function_exists('swordhealth_org_activate')) {
    register_activation_hook(__FILE__, 'swordhealth_org_activate');
}
