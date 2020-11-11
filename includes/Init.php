<?php

namespace Inc;

final class Init
{
    /**
     * store all the classes inside an array
     * 
     * @return array full list of classes
     */
    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
        ];
    }

    /**
     * loop through the classes, initialize them,
     * and call the register() method if it exists
     */
    public static function register_services() {
        foreach ( self::get_services() as $class ) {
            $service = self::instantiate( $class );
            if ( method_exists( $service, 'register' ) ) {
                $service->register();
            }
        }
    }

    /**
     * initialize the class
     */
    private static function instantiate( $class ) {
        $service = new $class;
        return $service;
    }
}
