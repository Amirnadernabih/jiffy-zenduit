<?php

function swordhealth_org_demo_blocks_content()
{
    return implode(
        "\n",
        array(
            '<!-- wp:heading --><h2>zendu-alert-gradient</h2><!-- /wp:heading -->',
            '<!-- wp:swordhealthorg/zendu-alert-gradient /-->',
            '<!-- wp:spacer {"height":"40px"} /-->',
            '<!-- wp:heading --><h2>zendu-alert-basic</h2><!-- /wp:heading -->',
            '<!-- wp:swordhealthorg/zendu-alert-basic /-->',
            '<!-- wp:spacer {"height":"40px"} /-->',
            '<!-- wp:heading --><h2>zendu-forms-slider</h2><!-- /wp:heading -->',
            '<!-- wp:swordhealthorg/zendu-forms-slider /-->',
            '<!-- wp:spacer {"height":"40px"} /-->',
            '<!-- wp:heading --><h2>zendu-login-control</h2><!-- /wp:heading -->',
            '<!-- wp:swordhealthorg/zendu-login-control /-->',
            '<!-- wp:spacer {"height":"40px"} /-->',
            '<!-- wp:heading --><h2>zendu-customer-success-slider</h2><!-- /wp:heading -->',
            '<!-- wp:swordhealthorg/zendu-customer-success-slider /-->',
            '<!-- wp:spacer {"height":"40px"} /-->',
            '<!-- wp:heading --><h2>zendu-webinars-slider</h2><!-- /wp:heading -->',
            '<!-- wp:swordhealthorg/zendu-webinars-slider /-->',
            '<!-- wp:spacer {"height":"40px"} /-->',
            '<!-- wp:heading --><h2>zendu-case-studies-grid</h2><!-- /wp:heading -->',
            '<!-- wp:swordhealthorg/zendu-case-studies-grid /-->',
            '<!-- wp:spacer {"height":"40px"} /-->',
            '<!-- wp:heading --><h2>zendu-signin-options-mockup</h2><!-- /wp:heading -->',
            '<!-- wp:swordhealthorg/zendu-signin-options-mockup /-->',
            '<!-- wp:spacer {"height":"60px"} /-->',
            '<!-- wp:heading --><h2>amirpress-landing</h2><!-- /wp:heading -->',
            '<!-- wp:swordhealthorg/amirpress-landing /-->',
            '<!-- wp:spacer {"height":"60px"} /-->',
            '<!-- wp:heading --><h2>dubai-launch-landing</h2><!-- /wp:heading -->',
            '<!-- wp:swordhealthorg/dubai-launch-landing /-->',
        )
    );
}

function swordhealth_org_register_demo_pattern()
{
    if (! function_exists('register_block_pattern')) {
        return;
    }

    if (function_exists('register_block_pattern_category')) {
        register_block_pattern_category(
            'swordhealth-org',
            array(
                'label' => __('Swordhealth Org', 'swordhealth-org'),
            )
        );
    }

    register_block_pattern(
        'swordhealth-org/all-blocks-demo',
        array(
            'title'       => __('All Blocks Demo', 'swordhealth-org'),
            'description' => __('Renders all Swordhealth blocks on one page.', 'swordhealth-org'),
            'categories'  => array('swordhealth-org'),
            'content'     => swordhealth_org_demo_blocks_content(),
        )
    );
}

add_action('init', 'swordhealth_org_register_demo_pattern');

function swordhealth_org_all_blocks_shortcode()
{
    return do_blocks(swordhealth_org_demo_blocks_content());
}

add_shortcode('swordhealth_org_all_blocks', 'swordhealth_org_all_blocks_shortcode');

function swordhealth_org_activate()
{
    $slug = 'swordhealth-blocks-demo';
    $existing = get_page_by_path($slug);
    $content = swordhealth_org_demo_blocks_content();

    if ($existing instanceof WP_Post) {
        wp_update_post(
            array(
                'ID'           => $existing->ID,
                'post_content' => $content,
            )
        );
        return;
    }

    wp_insert_post(
        array(
            'post_title'   => 'Swordhealth Blocks Demo',
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => $content,
        )
    );
}

