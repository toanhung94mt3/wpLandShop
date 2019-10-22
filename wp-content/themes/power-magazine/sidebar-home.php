<?php
/**
 * The sidebar containing the main home page area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Power_Magazine
 */
global $post;
$sidebar_layout = 'right-sidebar';
if ( is_page() || is_single() ){
        $sidebar_layout = get_post_meta( $post->ID, 'power_magazine_meta', true ); 
} else{
        $sidebar_layout = power_magazine_get_option( 'sidebar_layout' );
}   
if ( ! is_active_sidebar( 'sidebar-home' ) || 'no-sidebar'== $sidebar_layout ) {
        return;
}
?>

<aside id="secondary" class="widget-area">
        <?php dynamic_sidebar( 'sidebar-home' ); ?>
</aside><!-- #secondary --> 