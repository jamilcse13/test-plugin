<?php

/**
 * @package TestPlugin
 */

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once( "$this->plugin_path/templates/admin.php" );
    }

    public function posts()
    {
        return require_once( "$this->plugin_path/templates/post.php" );
    }

    public function pages()
    {
        return require_once( "$this->plugin_path/templates/page.php" );
    }

    public function medias()
    {
        return require_once( "$this->plugin_path/templates/media.php" );
    }

    public function testOptionsGroup( $input )
    {
        return $input;
    }

    public function testAdminSection()
    {
        echo "Hello from Admin Section";
    }

    public function testTextExample()
    {
        $value = esc_attr( get_option( 'text_example' ) );
        echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here">';
    }

    public function testFirstName()
    {
        $value = esc_attr( get_option( 'first_name' ) );
        echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write Your First Name">';
    }
}