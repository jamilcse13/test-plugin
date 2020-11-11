<?php

/**
 * @package TestPlugin
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class SettingsLinks extends BaseController
{
    public function register()
    {
        var_dump($this->plugin_name);
        add_filter( "plugin_action_links_$this->plugin_name", array( $this, 'settings_link' ) );
    }

    public function settings_link( $links )
    {
        $settings_link = '<a href="admin.php?page=test_plugin">Settings</a>';
        array_push( $links, $settings_link );
        return $links; 
    }
}