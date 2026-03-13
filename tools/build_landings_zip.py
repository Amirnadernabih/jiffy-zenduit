import fnmatch
import os
import pathlib
import zipfile


def main() -> None:
	root = pathlib.Path(__file__).resolve().parents[1]
	zip_path = root / "landings.zip"

	cdn_base = (
		"https://cdn.jsdelivr.net/gh/Amirnadernabih/jiffy-zenduit@feature/"
		"zendu-landing-to-blocks/inc/assets"
	)

	main_php = f"""<?php
/**
 * Plugin Name:       Zendu Landings Blocks
 * Description:       Landing Page 1 and Landing Page 2 Gutenberg blocks.
 * Version:           0.1.2
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       landings
 */

if (! defined('ABSPATH')) {{
	exit;
}}

define('LANDINGS_VERSION', '0.1.2');
define('LANDINGS_ROOT', untrailingslashit(plugin_dir_path(__FILE__)));
define('LANDINGS_URL', untrailingslashit(plugin_dir_url(__FILE__)));
define('LANDINGS_ASSETS_URL', LANDINGS_URL . '/inc/assets');

define('LANDINGS_CDN_ASSETS_URL', '{cdn_base}');

if (! defined('SWORDHEALTH_ORG_VERSION')) {{
	define('SWORDHEALTH_ORG_VERSION', LANDINGS_VERSION);
}}
if (! defined('SWORDHEALTH_ORG_ROOT')) {{
	define('SWORDHEALTH_ORG_ROOT', LANDINGS_ROOT);
}}
if (! defined('SWORDHEALTH_ORG_PLUGIN_URL')) {{
	define('SWORDHEALTH_ORG_PLUGIN_URL', LANDINGS_URL);
}}
if (! defined('SWORDHEALTH_ORG_ASSETS_URL')) {{
	define('SWORDHEALTH_ORG_ASSETS_URL', LANDINGS_ASSETS_URL);
}}

if (! function_exists('swordhealth_org_asset_url')) {{
	function swordhealth_org_asset_url($path) {{
		$path = ltrim($path, '/');
		if (substr($path, -4) === '.mp4') {{
			return trailingslashit(LANDINGS_CDN_ASSETS_URL) . $path;
		}}
		return trailingslashit(LANDINGS_ASSETS_URL) . $path;
	}}
}}

require_once __DIR__ . '/includes/blocks.php';

function landings_create_landingaaa_page() {{
	if (! function_exists('wp_insert_post')) {{
		return;
	}}

	$existing = get_page_by_path('landingaaa');
	if ($existing instanceof WP_Post) {{
		return;
	}}

	$content = <<<HTML
<!-- wp:zltb/landing-1-wrapper -->
<!-- wp:zltb/landing-1-hero /-->
<!-- wp:zltb/landing-1-solutions /-->
<!-- wp:zltb/landing-1-case /-->
<!-- wp:zltb/landing-1-cta /-->
<!-- /wp:zltb/landing-1-wrapper -->

<!-- wp:zltb/landing-2-wrapper -->
<!-- wp:zltb/landing-2-navbar /-->
<!-- wp:zltb/landing-2-hero /-->
<!-- wp:zltb/landing-2-social-proof /-->
<!-- wp:zltb/landing-2-icp-breakdown /-->
<!-- wp:zltb/landing-2-challenge /-->
<!-- wp:zltb/landing-2-value-props /-->
<!-- wp:zltb/landing-2-industry-breakdown /-->
<!-- wp:zltb/landing-2-why-switch /-->
<!-- wp:zltb/landing-2-build-setup /-->
<!-- wp:zltb/landing-2-final-cta /-->
<!-- /wp:zltb/landing-2-wrapper -->
HTML;

	wp_insert_post(
		array(
			'post_title'   => 'landingaaa',
			'post_name'    => 'landingaaa',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => $content,
		)
	);
}}

register_activation_hook(__FILE__, 'landings_create_landingaaa_page');
"""

	blocks_php = """<?php

function landings_block_category($categories, $post) {
	return array_merge(
		array(
			array(
				'slug'  => 'landings-blocks',
				'title' => __('Landings Blocks', 'landings'),
			),
		),
		$categories
	);
}
add_filter('block_categories_all', 'landings_block_category', 10, 2);

function landings_register_assets() {
	wp_register_script(
		'landings-editor',
		LANDINGS_URL . '/zendu-landing-to-blocks/editor.js',
		array('wp-blocks', 'wp-element', 'wp-block-editor', 'wp-server-side-render'),
		LANDINGS_VERSION,
		true
	);

	wp_register_script(
		'landings-landing-1-case-view',
		LANDINGS_URL . '/zendu-landing-to-blocks/landing-1/case/view.js',
		array(),
		LANDINGS_VERSION,
		true
	);

	wp_register_script(
		'landings-landing-2-wrapper-view',
		LANDINGS_URL . '/zendu-landing-to-blocks/landing-2/wrapper/view.js',
		array(),
		LANDINGS_VERSION,
		true
	);
}
add_action('enqueue_block_editor_assets', 'landings_register_assets');
add_action('wp_enqueue_scripts', 'landings_register_assets');

function landings_render_template($path, $content = '') {
	$full_path = LANDINGS_ROOT . '/' . ltrim($path, '/');
	if (! is_readable($full_path)) {
		return '';
	}
	ob_start();
	include $full_path;
	return ob_get_clean();
}

function landings_register_blocks() {
	$editor = 'landings-editor';

	register_block_type('zltb/landing-1-wrapper', array(
		'editor_script' => $editor,
		'render_callback' => function ($attributes, $content) {
			return landings_render_template('zendu-landing-to-blocks/landing-1/wrapper/render.php', $content);
		},
	));
	register_block_type('zltb/landing-1-hero', array(
		'editor_script' => $editor,
		'render_callback' => function () {
			return landings_render_template('zendu-landing-to-blocks/landing-1/hero/render.php');
		},
	));
	register_block_type('zltb/landing-1-solutions', array(
		'editor_script' => $editor,
		'render_callback' => function () {
			return landings_render_template('zendu-landing-to-blocks/landing-1/solutions/render.php');
		},
	));
	register_block_type('zltb/landing-1-case', array(
		'editor_script' => $editor,
		'view_script' => 'landings-landing-1-case-view',
		'render_callback' => function () {
			return landings_render_template('zendu-landing-to-blocks/landing-1/case/render.php');
		},
	));
	register_block_type('zltb/landing-1-cta', array(
		'editor_script' => $editor,
		'render_callback' => function () {
			return landings_render_template('zendu-landing-to-blocks/landing-1/cta/render.php');
		},
	));

	register_block_type('zltb/landing-2-wrapper', array(
		'editor_script' => $editor,
		'view_script' => 'landings-landing-2-wrapper-view',
		'render_callback' => function ($attributes, $content) {
			return landings_render_template('zendu-landing-to-blocks/landing-2/wrapper/render.php', $content);
		},
	));
	register_block_type('zltb/landing-2-navbar', array(
		'editor_script' => $editor,
		'render_callback' => function () {
			return landings_render_template('zendu-landing-to-blocks/landing-2/navbar/render.php');
		},
	));
	register_block_type('zltb/landing-2-page-shell', array(
		'editor_script' => $editor,
		'render_callback' => function ($attributes, $content) {
			return landings_render_template('zendu-landing-to-blocks/landing-2/page-shell/render.php', $content);
		},
	));
	register_block_type('zltb/landing-2-hero', array(
		'editor_script' => $editor,
		'render_callback' => function () {
			return landings_render_template('zendu-landing-to-blocks/landing-2/hero/render.php');
		},
	));
	register_block_type('zltb/landing-2-social-proof', array(
		'editor_script' => $editor,
		'render_callback' => function () {
			return landings_render_template('zendu-landing-to-blocks/landing-2/social-proof/render.php');
		},
	));
	register_block_type('zltb/landing-2-icp-breakdown', array(
		'editor_script' => $editor,
		'render_callback' => function () {
			return landings_render_template('zendu-landing-to-blocks/landing-2/icp-breakdown/render.php');
		},
	));
	register_block_type('zltb/landing-2-challenge', array(
		'editor_script' => $editor,
		'render_callback' => function () {
			return landings_render_template('zendu-landing-to-blocks/landing-2/challenge/render.php');
		},
	));
	register_block_type('zltb/landing-2-value-props', array(
		'editor_script' => $editor,
		'render_callback' => function () {
			return landings_render_template('zendu-landing-to-blocks/landing-2/value-props/render.php');
		},
	));
	register_block_type('zltb/landing-2-industry-breakdown', array(
		'editor_script' => $editor,
		'render_callback' => function () {
			return landings_render_template('zendu-landing-to-blocks/landing-2/industry-breakdown/render.php');
		},
	));
	register_block_type('zltb/landing-2-why-switch', array(
		'editor_script' => $editor,
		'render_callback' => function () {
			return landings_render_template('zendu-landing-to-blocks/landing-2/why-switch/render.php');
		},
	));
	register_block_type('zltb/landing-2-build-setup', array(
		'editor_script' => $editor,
		'render_callback' => function () {
			return landings_render_template('zendu-landing-to-blocks/landing-2/build-setup/render.php');
		},
	));
	register_block_type('zltb/landing-2-final-cta', array(
		'editor_script' => $editor,
		'render_callback' => function () {
			return landings_render_template('zendu-landing-to-blocks/landing-2/final-cta/render.php');
		},
	));
}
add_action('init', 'landings_register_blocks');
"""

	include_globs = [
		("zendu-landing-to-blocks", "**/*"),
		("inc/templates", "*.html"),
		("inc/assets/landingpage", "**/*"),
		("inc/assets/zenduIT-dubailaunch-updated/css", "*.css"),
		("inc/assets/zenduIT-dubailaunch-wp/images", "*"),
	]

	exclude_patterns = ["*.mp4"]

	def should_exclude(rel: str) -> bool:
		for pat in exclude_patterns:
			if fnmatch.fnmatch(os.path.basename(rel), pat):
				return True
		return False

	with zipfile.ZipFile(
		zip_path, "w", compression=zipfile.ZIP_DEFLATED, compresslevel=9
	) as z:
		z.writestr("zendu-landings-blocks.php", main_php)
		z.writestr("includes/blocks.php", blocks_php)

		for base, pattern in include_globs:
			base_path = root / base
			if not base_path.exists():
				continue

			if pattern.startswith("**"):
				paths = base_path.rglob("*")
			else:
				paths = base_path.glob(pattern)

			for p in paths:
				if p.is_dir():
					continue
				rel = p.relative_to(root).as_posix()
				if should_exclude(rel):
					continue
				z.write(p, rel)

	print(f"WROTE {zip_path}")
	print(f"SIZE_MB {zip_path.stat().st_size / 1024 / 1024:.2f}")


if __name__ == "__main__":
	main()
