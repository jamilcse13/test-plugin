<?php 

/**
 * Trigger this file on Plugin ininstall
 * 
 * @package TestPlugin
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

//clear Database stored every single data data
// $books = get_posts( array( 'post_type' => 'book', 'numberposts' => -1 ) );

// foreach ( $books as $book ) {
//     wp_delete_post( $book->ID, true );
// }

// when we want to delete everything
// Access the database via SQL
global $wpdb;

$wpdb->query( "DELETE FROM mh_posts WHERE post_type = 'book'" );
$wpdb->query( "DELETE FROM mh_postmeta WHERE post_id NOT IN (SELECT id FROM mh_posts)" );
$wpdb->query( "DELETE FROM mh_term_relationships WHERE post_id NOT IN (SELECT id FROM mh_posts)" );