<?php

/**
 * @package TestPlugin
 */

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
    public function checkboxSanitize( $input )
    {
        $output = array();
        // return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
        // return ( isset($input) ? true : false );
        foreach ( $this->managers as $key => $value ) {
            $output[$key] = isset($input[$key]) ? true : false;
        }
        return $output;
    }

    public function adminSectionManager()
    {
        echo "Manage Sections and Features";
    }

    public function checkboxField( $args )
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $checkbox = get_option( $option_name );
        echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ($checkbox[$name] ? 'checked' : '') . ' ><label for="' . $name . '"><div></div></label></div>';
    }
}