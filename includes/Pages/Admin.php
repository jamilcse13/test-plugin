<?php

/**
 * @package TestPlugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\Callbacks\ManagerCallbacks;

class Admin extends BaseController
{
    public $settings;
    public $callbacks;
    public $callbacks_mngr;

    public $pages = array();
    public $subpages = array();

    public function register() {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();
        
        $this->setSubpages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages($this->pages)->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();
    }

    public function setPages() {
        $this->pages = array(
            array(
                'page_title' => 'Test Plugin',
                'menu_title' => 'Test Plugin',
                'capability' => 'manage_options',
                'menu_slug' => 'test_plugin',
                'callback' => array( $this->callbacks, 'adminDashboard' ),
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );
    }

    public function setSubpages() {
        $this->subpages = array(
            array(
                'parent_slug' => 'test_plugin',
                'page_title' => 'Custom Posts',
                'menu_title' => 'Post',
                'capability' => 'manage_options',
                'menu_slug' => 'test_post',
                'callback' => array( $this->callbacks, 'posts' )
            ),
            array(
                'parent_slug' => 'test_plugin',
                'page_title' => 'Custom Pages',
                'menu_title' => 'Pages',
                'capability' => 'manage_options',
                'menu_slug' => 'test_page',
                'callback' => array( $this->callbacks, 'pages' )
            ),
            array(
                'parent_slug' => 'test_plugin',
                'page_title' => 'Custom Media',
                'menu_title' => 'Media',
                'capability' => 'manage_options',
                'menu_slug' => 'test_media',
                'callback' => array( $this->callbacks, 'medias' )
            ),
        );
    }

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'test_plugin_settings',
                'option_name' => 'test_plugin',
                'callback' => array( $this->callbacks_mngr, 'checkboxSanitize' )
            )
        );

        // foreach ( $this->managers as $key => $value ) {
        //     $args[] = array(
        //         'option_group' => 'test_plugin_settings',
        //         'option_name' => $key,
        //         'callback' => array( $this->callbacks_mngr, 'checkboxSanitize' )
        //     );
        // }

        $this->settings->setSettings( $args );
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'test_admin_index',
                'title' => 'Settings',
                'callback' => array( $this->callbacks_mngr, 'adminSectionManager' ),
                'page' => 'test_plugin'
            )
        );

        $this->settings->setSections( $args );
    }

    public function setFields()
    {
        $args = array();

        foreach ( $this->managers as $key => $value ) {
            $args[] = array(
                'id' => $key,
                'title' => $value,
                'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
                'page' => 'test_plugin',
                'section' => 'test_admin_index',
                'args' => array(
                    'option_name' => 'test_plugin',
                    'label_for' => $key,
                    'class' => 'ui-toggle'
                )
            );
        }

        $this->settings->setFields( $args );
    }
}