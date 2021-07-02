<?php
/**
 * Plugin Name:       SEO settings
 * Plugin URI:        https://github.com/benjamin-gosset/mu-plugin-seo
 * Description:       Add SEO related settings to WordPress
 * Version:           1.0
 * Author:            Benjamin Gosset
 * Author URI:        https://www.benjamin-gosset.fr/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

 /**
  * No internal ping @seomix.fr
  */
function seomix_no_internal_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link ) {
        if ( 0 === strpos( $link, $home ) ) {
            unset($links[$l]);
        }
    }
}
add_action( 'pre_ping' , 'seomix_no_internal_ping' );
