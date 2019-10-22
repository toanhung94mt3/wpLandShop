<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Power_Magazine
 */

if ( ! function_exists( 'power_magazine_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function power_magazine_posted_on() {
		$enable_posted_on = power_magazine_get_option( 'enable_posted_on' );
		if ( false == $enable_posted_on ){
			return;
		}
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			 '%s',
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<div class="posted-on">' . $posted_on . '</div>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'power_magazine_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function power_magazine_posted_by() {
		$enable_author = power_magazine_get_option( 'enable_author' );
		if ( false == $enable_author ){
			return;
		}		
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'power-magazine' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<div class="post-author"> ' . $byline . '</div>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'power_magazine_entry_tagged' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function power_magazine_entry_tagged() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'power-magazine' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'power-magazine' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}
endif;

if ( ! function_exists( 'power_magazine_category' ) ):
	/**
	 *
	 */
	function power_magazine_category(){
		// Hide category and tag text for pages.
		global $post;
		$post_id         = $post->ID;
		$categories_list = get_the_category( $post_id );
		if ( ! empty( $categories_list ) ) {
			?>
			<div class="post-cat-list">
				<?php
				foreach ( $categories_list as $cat_data ) {
					$cat_name = $cat_data->name;
					$cat_id   = $cat_data->term_id;
					$cat_link = get_category_link( $cat_id );
					?>
					<span class="cat-links power-magazine-cat-<?php echo esc_attr( $cat_id ); ?>"><a
							href="<?php echo esc_url( $cat_link ); ?>"><?php echo esc_html( $cat_name ); ?></a></span>
					<?php
				}
				?>
			</div>
			<?php
		}
	}


endif;




if ( ! function_exists( 'power_magazine_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function power_magazine_entry_footer() {
		$enable_coment_count = power_magazine_get_option( 'enable_coment_count' );
		if ( false == $enable_coment_count ){
			return;
		}			
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<div class="post-comment">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'power-magazine' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</div>';
		}
	}
endif;

if ( ! function_exists( 'power_magazine_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function power_magazine_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<figure class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</figure><!-- .post-thumbnail -->

		<?php else : ?>
		<figure>	
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail( 'post-thumbnail', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) );
				?>
			</a>
		</figure>

		<?php
		endif; // End is_singular().
	}
endif;
