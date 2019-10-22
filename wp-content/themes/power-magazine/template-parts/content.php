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
                <a href="<?php the_permalink();?>"><?php the_title();?></a>
            </h4>
        </header>
        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div>
        <div class="entry-meta">
			<?php
            $enable_author = power_magazine_get_option( 'enable_archive_author' );
            $enable_posted_on = power_magazine_get_option( 'enable_archive_posted_on' );
            if ( true == $enable_author ):
			    power_magazine_posted_on();
            endif;

            if ( true == $enable_posted_on ): 
			    power_magazine_posted_by();
            endif;
            ?>
            <?php $archive_layout = power_magazine_get_option( 'archive_layout' );
            $enable_coment_count = power_magazine_get_option( 'enable_archive_coment_count' );
            if ( 'full-layout' == $archive_layout ):
                if (  true == $enable_coment_count ):
                    power_magazine_entry_footer();
                endif; 
            endif; ?>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
