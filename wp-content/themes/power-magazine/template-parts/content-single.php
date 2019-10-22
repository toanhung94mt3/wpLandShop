<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Power_Magazine
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'featured-post' ); ?>>
    <?php power_magazine_post_thumbnail(); ?>
    <div class="post-content">
        <header class="entry-header">
            <h4 class="entry-title">
                <?php the_title();?>
            </h4>
        </header>
        <div class="entry-meta">
            <?php            
                power_magazine_posted_on();            
                power_magazine_posted_by();           
            ?>           
        </div>        
        <div class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'power-magazine' ),
                'after'  => '</div>',
            ) );?>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->

