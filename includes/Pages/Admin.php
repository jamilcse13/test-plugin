<?php

/**
 * @package TestPlugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;
    public $callbacks;

    public $pages = array();
    public $subpages = array();

    public function register() {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();

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
                'option_group' => 'test_options_group',
                'option_name' => 'text_example',
                'callback' => array( $this->callbacks, 'testOptionsGroup' )
            ),
            array(
                'option_group' => 'first_name',
                'option_name' => 'text_example',
            )
        );

        $this->settings->setSettings( $args );
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'test_admin_index',
                'title' => 'Settings',
                'callback' => array( $this->callbacks, 'testAdminSection' ),
                'page' => 'test_plugin'
            )
        );

        $this->settings->setSections( $args );
    }

    public function setFields()
    {
        $args = array(
            array(
                'id' => 'text_example',
                'title' => 'Text Example',
                'callback' => array( $this->callbacks, 'testTextExample' ),
                'page' => 'test_plugin',
                'section' => 'test_admin_index',
                'args' => array(
                    'label_for' => 'text_example',
                    'class' => 'example-class'
                )
                ),
                array(
                    'id' => 'first_name',
                    'title' => 'First Name',
                    'callback' => array( $this->callbacks, 'testFirstName' ),
                    'page' => 'test_plugin',
                    'section' => 'test_admin_index',
                    'args' => array(
                        'label_for' => 'first_name',
                        'class' => 'example-class'
                    )
                )
        );

        $this->settings->setFields( $args );
    }
}