<?php

use  ERROPiX\AdvancedScripts\ScriptsManager ;
use  ERROPiX\AdvancedScripts\ConditionManager ;
/**
 * @return ScriptsManager 
 */
function cpas_scripts_manager()
{
    static  $instance = null ;
    if ( $instance == null ) {
        $instance = new ScriptsManager();
    }
    return $instance;
}

/**
 * @return ConditionManager 
 */
function cpas_condition_manager()
{
    static  $instance = null ;
    if ( $instance == null ) {
        $instance = new ConditionManager();
    }
    return $instance;
}

function erropix_advanced_scripts_fs()
{
    static  $fs = null ;
    if ( is_null( $fs ) ) {
        $fs = fs_dynamic_init( array(
            'id'              => '6334',
            'slug'            => 'erropix-advanced-scripts',
            'premium_slug'    => 'erropix-advanced-scripts',
            'type'            => 'plugin',
            'public_key'      => 'pk_7fa5d0ea8a6b33dc5813ac896c002',
            'has_addons'      => false,
            'is_premium'      => true,
            'is_premium_only' => true,
            'has_paid_plans'  => true,
            'trial'           => array(
            'days'               => 7,
            'is_require_payment' => true,
        ),
            'menu'            => array(
            'slug'    => 'advanced-scripts',
            'account' => false,
            'contact' => false,
            'support' => false,
            'parent'  => array(
            'slug' => 'tools.php',
        ),
        ),
            'is_live'         => true,
        ) );
    }
    return $fs;
}
