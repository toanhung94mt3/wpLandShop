<?php
/**
 * Register Latest/Popular.
 *
 * @package Power_Magazine
 */

function power_magazine_action_latest_popular() {

  register_widget( 'power_magazine_latest_popular' );
  
}
add_action( 'widgets_init', 'power_magazine_action_latest_popular' );

class power_magazine_latest_popular extends WP_Widget{ 

	function __construct() {
		global $control_ops;
		$widget_ops = array(
		  'classname'   => 'trending-and-latest-tab-section list-style',
		  'description' => esc_html__( 'Add Widget to Display Latest/Popular Post.', 'power-magazine' )
		);
		parent::__construct( 'power_magazine_latest_popular',esc_html__( 'PM Sidebar: Latest/Popular', 'power-magazine' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
		  'number'           	=> 4, 
		  'show_post_meta'	 	=> true,
		  'show_category'	 	=> true,	
		) );

		$show_category 		= isset( $instance['show_category'] ) ? (bool) $instance['show_category'] : true;
		$number    			= isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;    
		$show_post_meta 	= isset( $instance['show_post_meta'] ) ? (bool) $instance['show_post_meta'] : true;
	?>
	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
	    		<?php echo esc_html__( 'Choose Number', 'power-magazine' );?>    		
	    	</label>

	    	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" max="10" />
	    </p>
		<p><input class="checkbox" type="checkbox"<?php checked( $show_category ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_category' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_category' )); ?>" />
	    <label for="<?php echo esc_attr($this->get_field_id( 'show_category' )); ?>"><?php echo esc_html__( 'Enable category', 'power-magazine' ); ?></label></p> 	    
	    <p><input class="checkbox" type="checkbox"<?php checked( $show_post_meta ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_post_meta' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_post_meta' )); ?>" />
	    <label for="<?php echo esc_attr($this->get_field_id( 'show_post_meta' )); ?>"><?php echo esc_html__( 'Enable Post Meta', 'power-magazine' ); ?></label></p>   	    
    <?php
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['number'] 			= (int) $new_instance['number'];
		$instance['show_category'] 		= (bool) $new_instance['show_category'];
		$instance['show_post_meta'] 	= (bool) $new_instance['show_post_meta'];  	   

		return $instance;
	}

    function widget( $args, $instance ) {
    	extract( $args ); 
        $number 			= ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 4; 
        $show_category		= isset( $instance['show_category'] ) ? $instance['show_category'] : true;
        $show_post_meta		= isset( $instance['show_post_meta'] ) ? $instance['show_post_meta'] : true;      

        echo $before_widget; ?>	
            <div class="header-tab-button">
                <h6 class="widget-title current" data-tab="latest"><?php echo esc_html__( 'Latest', 'power-magazine' );?></span>
                <h6 class="widget-title" data-tab="trending"><?php echo esc_html__( 'Trending', 'power-magazine' );?></span>
            </div>         
	        <?php $latest_args = array(
	            'posts_per_page' => absint( $number ),
	            'post_type' => 'post',
	            'post_status' => 'publish',
	            'post__not_in' => get_option( 'sticky_posts' ),      
	        );
	        $the_query = new WP_Query( $latest_args ); 


	        if ($the_query->have_posts()) : $count= 0; ?>
                <div id="latest" class="tab-content current">
                	<?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
	                    <article class="featured-post post hentry category-featured">
	                    	<?php if ( has_post_thumbnail() ): ?>
		                        <figure class="featured-post-image">
		                        	<?php the_post_thumbnail( 'power-magazine-mixed' );?>
		                        </figure>
	                        <?php endif; ?>
	                        <div class="post-content">
	                            <?php if ( true == $show_category ):
	                            	power_magazine_category(); 
	                        	endif; ?>
	                            <header class="entry-header">
	                                <h5 class="entry-title">
	                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
	                                </h5>
	                            </header>
	                            <div class="entry-meta">                                
			                        <?php if ( true == $show_post_meta ):
			                        	power_magazine_posted_on();
			                        endif; ?>
	                            </div>
	                        </div>
	                    </article>
                    <?php endwhile;
                    wp_reset_postdata();?>
                </div>	            
            <?php endif; ?>

	        <?php $args = array(
	            'posts_per_page' => 2,
	            'post_type' => 'post',
	            'post_status' => 'publish',
	            'orderby'	  => 'comment_count',
	            'post__not_in' => get_option( 'sticky_posts' ),      
	        );

	        $the_query = new WP_Query( $args ); 

	        if ($the_query->have_posts()) : $count= 0; ?>
                <div id="trending" class="tab-content">
                	<?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
	                    <article class="featured-post post hentry category-featured">
	                    	<?php if ( has_post_thumbnail() ): ?>
		                        <figure class="featured-post-image">
		                        	<?php the_post_thumbnail( 'power-magazine-mixed' );?>
		                        </figure>
	                        <?php endif; ?>
	                        <div class="post-content">
	                            <?php if ( true == $show_category ):
	                            	power_magazine_category(); 
	                        	endif; ?>
	                            <header class="entry-header">
	                                <h5 class="entry-title">
	                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
	                                </h5>
	                            </header>
	                            <div class="entry-meta">                                
			                        <?php if ( true == $show_post_meta ):
			                        	power_magazine_posted_on();
			                        endif; ?>
	                            </div>
	                        </div>
	                    </article>
                    <?php endwhile;
                    wp_reset_postdata();?>
                </div>	            
            <?php endif; ?>
			    
        <?php echo $after_widget;

    } 

}