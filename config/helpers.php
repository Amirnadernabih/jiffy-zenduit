<?php
 
function swordhealth_org_asset_url($relative_path)
{
    return SWORDHEALTH_ORG_ASSETS_URL . '/' . ltrim($relative_path, '/');
}
