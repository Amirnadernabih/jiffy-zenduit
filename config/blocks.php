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
