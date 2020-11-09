<?php

/**
 * @package TestPlugin
 */

namespace Inc\Base;

class Enqueue
{
    public function register() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
    }

    function enqueue() {
        // enqueue all our scripts
        wp_enqueue_style( 'mypluginstyle', TP_PLUGIN_URL . 'assets/mystyle.css' );
        wp_enqueue_script( 'mypluginscript', TP_PLUGIN_URL . 'assets/myscript.js' );
    }
}