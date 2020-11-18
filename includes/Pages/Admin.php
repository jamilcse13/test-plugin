<?php

/**
 * @package TestPlugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{
    public $settings;

    public $pages = array();
    public $subpages = array();

    function __construct() 
    {
        $this->settings = new SettingsApi();

        $this->pages = array(
            array(
                'page_title' => 'Test Plugin',
                'menu_title' => 'Test Plugin',
                'capability' => 'manage_options',
                'menu_slug' => 'test_plugin',
                'callback' => function () { echo '<h1>Hello Guys</h1>'; },
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );

        $this->subpages = array(
            array(
                'parent_slug' => 'test_plugin',
                'page_title' => 'Custom Posts',
                'menu_title' => 'Post',
                'capability' => 'manage_options',
                'menu_slug' => 'test_post',
                'callback' => function () { echo '<h1>Custom post type manager</h1>'; }
            ),
            array(
                'parent_slug' => 'test_plugin',
                'page_title' => 'Custom Pages',
                'menu_title' => 'Pages',
                'capability' => 'manage_options',
                'menu_slug' => 'test_page',
                'callback' => function () { echo '<h1>Custom pages manager</h1>'; }
            ),
            array(
                'parent_slug' => 'test_plugin',
                'page_title' => 'Custom Media',
                'menu_title' => 'Media',
                'capability' => 'manage_options',
                'menu_slug' => 'test_media',
                'callback' => function () { echo '<h1>Custom media manager</h1>'; }
            ),
        );
    }

    public function register()
    {
        $this->settings->addPages($this->pages)->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();
    }
}