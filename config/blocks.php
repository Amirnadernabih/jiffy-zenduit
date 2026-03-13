<?php
 
function swordhealth_org_block_category($categories, $post)
{
    return array_merge(
        array(
            array(
                'slug'  => 'swordhealth-org-blocks',
                'title' => __('Swordhealth Blocks', 'swordhealth-org'),
            ),
        ),
        $categories
    );
}
 
add_filter('block_categories_all', 'swordhealth_org_block_category', 10, 2);
add_filter('block_categories', 'swordhealth_org_block_category', 10, 2);
 
function swordhealth_org_zltb_register_landing_blocks_assets()
{
    wp_register_script(
        'zltb-landing-blocks-editor',
        SWORDHEALTH_ORG_PLUGIN_URL . '/zendu-landing-to-blocks/editor.js',
        array('wp-blocks', 'wp-element', 'wp-block-editor', 'wp-server-side-render'),
        SWORDHEALTH_ORG_VERSION,
        true
    );

    wp_register_script(
        'zltb-landing-1-case-view',
        SWORDHEALTH_ORG_PLUGIN_URL . '/zendu-landing-to-blocks/landing-1/case/view.js',
        array(),
        SWORDHEALTH_ORG_VERSION,
        true
    );

    wp_register_script(
        'zltb-landing-2-wrapper-view',
        SWORDHEALTH_ORG_PLUGIN_URL . '/zendu-landing-to-blocks/landing-2/wrapper/view.js',
        array(),
        SWORDHEALTH_ORG_VERSION,
        true
    );
}

add_action('enqueue_block_editor_assets', 'swordhealth_org_zltb_register_landing_blocks_assets');
add_action('wp_enqueue_scripts', 'swordhealth_org_zltb_register_landing_blocks_assets');

function swordhealth_org_zltb_render_template($path, $content = '')
{
    $full_path = SWORDHEALTH_ORG_ROOT . '/' . ltrim($path, '/');
    if (! is_readable($full_path)) {
        return '';
    }

    ob_start();
    include $full_path;
    return ob_get_clean();
}

function swordhealth_org_zltb_register_landing_blocks()
{
    $editor = 'zltb-landing-blocks-editor';

    register_block_type(
        'zltb/landing-1-wrapper',
        array(
            'editor_script'   => $editor,
            'render_callback' => function ($attributes, $content) {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-1/wrapper/render.php', $content);
            },
        )
    );
    register_block_type(
        'zltb/landing-1-hero',
        array(
            'editor_script'   => $editor,
            'render_callback' => function () {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-1/hero/render.php');
            },
        )
    );
    register_block_type(
        'zltb/landing-1-solutions',
        array(
            'editor_script'   => $editor,
            'render_callback' => function () {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-1/solutions/render.php');
            },
        )
    );
    register_block_type(
        'zltb/landing-1-case',
        array(
            'editor_script'   => $editor,
            'view_script'     => 'zltb-landing-1-case-view',
            'render_callback' => function () {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-1/case/render.php');
            },
        )
    );
    register_block_type(
        'zltb/landing-1-cta',
        array(
            'editor_script'   => $editor,
            'render_callback' => function () {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-1/cta/render.php');
            },
        )
    );

    register_block_type(
        'zltb/landing-2-wrapper',
        array(
            'editor_script'   => $editor,
            'view_script'     => 'zltb-landing-2-wrapper-view',
            'render_callback' => function ($attributes, $content) {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-2/wrapper/render.php', $content);
            },
        )
    );
    register_block_type(
        'zltb/landing-2-navbar',
        array(
            'editor_script'   => $editor,
            'render_callback' => function () {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-2/navbar/render.php');
            },
        )
    );
    register_block_type(
        'zltb/landing-2-page-shell',
        array(
            'editor_script'   => $editor,
            'render_callback' => function ($attributes, $content) {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-2/page-shell/render.php', $content);
            },
        )
    );
    register_block_type(
        'zltb/landing-2-hero',
        array(
            'editor_script'   => $editor,
            'render_callback' => function () {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-2/hero/render.php');
            },
        )
    );
    register_block_type(
        'zltb/landing-2-social-proof',
        array(
            'editor_script'   => $editor,
            'render_callback' => function () {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-2/social-proof/render.php');
            },
        )
    );
    register_block_type(
        'zltb/landing-2-icp-breakdown',
        array(
            'editor_script'   => $editor,
            'render_callback' => function () {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-2/icp-breakdown/render.php');
            },
        )
    );
    register_block_type(
        'zltb/landing-2-challenge',
        array(
            'editor_script'   => $editor,
            'render_callback' => function () {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-2/challenge/render.php');
            },
        )
    );
    register_block_type(
        'zltb/landing-2-value-props',
        array(
            'editor_script'   => $editor,
            'render_callback' => function () {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-2/value-props/render.php');
            },
        )
    );
    register_block_type(
        'zltb/landing-2-industry-breakdown',
        array(
            'editor_script'   => $editor,
            'render_callback' => function () {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-2/industry-breakdown/render.php');
            },
        )
    );
    register_block_type(
        'zltb/landing-2-why-switch',
        array(
            'editor_script'   => $editor,
            'render_callback' => function () {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-2/why-switch/render.php');
            },
        )
    );
    register_block_type(
        'zltb/landing-2-build-setup',
        array(
            'editor_script'   => $editor,
            'render_callback' => function () {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-2/build-setup/render.php');
            },
        )
    );
    register_block_type(
        'zltb/landing-2-final-cta',
        array(
            'editor_script'   => $editor,
            'render_callback' => function () {
                return swordhealth_org_zltb_render_template('zendu-landing-to-blocks/landing-2/final-cta/render.php');
            },
        )
    );
}

add_action('init', 'swordhealth_org_zltb_register_landing_blocks');

function swordhealth_org_custom_block_init()
{
    register_block_type(SWORDHEALTH_ORG_ROOT . '/build/zendu-alert-gradient');
    register_block_type(SWORDHEALTH_ORG_ROOT . '/build/zendu-alert-basic');
    register_block_type(SWORDHEALTH_ORG_ROOT . '/build/zendu-forms-slider');
    register_block_type(SWORDHEALTH_ORG_ROOT . '/build/zendu-login-control');
    register_block_type(SWORDHEALTH_ORG_ROOT . '/build/zendu-customer-success-slider');
    register_block_type(SWORDHEALTH_ORG_ROOT . '/build/zendu-webinars-slider');
    register_block_type(SWORDHEALTH_ORG_ROOT . '/build/zendu-case-studies-grid');
    register_block_type(SWORDHEALTH_ORG_ROOT . '/build/zendu-signin-options-mockup');
    register_block_type(SWORDHEALTH_ORG_ROOT . '/build/amirpress-landing');
    register_block_type(SWORDHEALTH_ORG_ROOT . '/build/dubai-launch-landing');
}
 
add_action('init', 'swordhealth_org_custom_block_init');
