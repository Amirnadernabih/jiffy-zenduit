<?php
 
class Swordhealth_Org_Assets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
    }
 
    public function enqueue_assets() {}
}
 
new Swordhealth_Org_Assets;
