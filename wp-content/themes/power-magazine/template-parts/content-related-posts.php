<?php 
/**
 * This template for releated posts
 *
 * @package Power_Magazine
 *
 */

?>
<section class="related-post-section">
    <?php global $post; 
    $releated_post_number = power_magazine_get_option( 'releated_post_number' );
    $related_post_title  = power_magazine_get_option( 'related_post_title' );
    $args = array(
        'fields'=>'ids'
    );
    $related_catId = wp_get_post_categories($post->ID, $args);
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => absint( $releated_post_number),
        'post_status' => 'publish',
        'paged' => 1,
        'category__in' => $related_catId,
        'post__not_in'  =>array(get_the_ID())
    );  
    $the_query = new WP_Query( $args ); 
    if ($the_query->have_posts()) : $count= 0; ?>  
        <?php if ( !empty( $related_post_title ) ): ?>
            <div class="heading">
                <header class="entry-header">
                    <h3 class="entry-title"><?php echo esc_html( $related_post_title );?></h3>
                </header>
            </div>
        <?php endif; ?>              
        <div class="related-post-wrap">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post();          ?>
                <article class="featured-post post hentry">
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
                </article>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
        
    <?php endif;?>  
</section>