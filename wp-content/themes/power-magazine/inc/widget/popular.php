<?php
/**
 * Popular Style Widget.
 *
 * @package Power_Magazine
 */

function power_magazine_action_popular() {

  register_widget( 'Power_magazine_Popular' );
  
}
add_action( 'widgets_init', 'power_magazine_action_popular' );
class Power_magazine_Popular extends WP_Widget{ 

	function __construct() {
		global $control_ops;
		$widget_ops = array(
		  'classname'   => 'popular-posts',
		  'description' => esc_html__( 'Add Widget to Display Popular Style Widget.', 'power-magazine' )
		);
		parent::__construct( 'power_magazine_popular',esc_html__( 'PM Sidebar: Popular', 'power-magazine' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, 
			array( 
			  'title'			=> esc_html__( 'Popular', 'power-magazine' ),		
			  'category'       	=> '', 
			  'number'          => 4, 
			  'show_post_meta'	=> true,
			  'show_category'	=> true,	
			) 
		);
		$title     = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : esc_html__( 'Feature Slider', 'power-magazine' );	
		$category 			= isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;
		$number    			= isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;   
		$show_category 		= isset( $instance['show_category'] ) ? (bool) $instance['show_category'] : true; 
		$show_post_meta 	= isset( $instance['show_post_meta'] ) ? (bool) $instance['show_post_meta'] : true;		
	?>
	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Title:', 'power-magazine' ); ?></label>
	    	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>	
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>">
				<?php esc_html_e( 'Slider Category:', 'power-magazine' ); ?>			
			</label>

			<?php
				wp_dropdown_categories(array(
					'show_option_none' => '',
					'class' 		  => 'widefat',
					'show_option_all'  => esc_html__('From Recent Post','power-magazine'),
					'name'             => esc_attr($this->get_field_name( 'category' )),
					'selected'         => absint( $category ),          
				) );
			?>
		</p>

	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
	    		<?php echo esc_html__( 'Choose Number', 'power-magazine' );?>    		
	    	</label>

	    	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" max="10" />
	    </p>
	    <p><input class="checkbox" type="checkbox"<?php checked( $show_category ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_category' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_category' )); ?>" />
	    <label for="<?php echo esc_attr($this->get_field_id( 'show_category' )); ?>"><?php echo esc_html__( 'Enable Post Meta', 'power-magazine' ); ?></label></p>   
	    <p><input class="checkbox" type="checkbox"<?php checked( $show_post_meta ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_post_meta' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_post_meta' )); ?>" />
	    <label for="<?php echo esc_attr($this->get_field_id( 'show_post_meta' )); ?>"><?php echo esc_html__( 'Enable Post Meta', 'power-magazine' ); ?></label></p>  	    	    	    
    <?php
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 				= sanitize_text_field( $new_instance['title'] );
		$instance['category'] 			= absint( $new_instance['category'] );		
		$instance['number'] 			= (int) $new_instance['number'];
		$instance['show_category'] 		= (bool) $new_instance['show_category'];  	   
		$instance['show_post_meta'] 	= (bool) $new_instance['show_post_meta']; 
		return $instance;
	}

    function widget( $args, $instance ) {

    	extract( $args );   
    	$title 				= ( ! empty( $instance['title'] ) ) ? esc_html($instance['title']) : '';
    	$title 				= apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $category  			= isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : 0;
        $number 			= ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 4; 
        $show_post_meta		= isset( $instance['show_post_meta'] ) ? $instance['show_post_meta'] : true;      
        $show_category		= isset( $instance['show_category'] ) ? $instance['show_category'] : true;
        echo $before_widget;
        ?>
    	<?php if ( !empty( $title ) ): ?>            
            <?php echo $args['before_title'] . esc_html($title) . $args['after_title']; ?>
        <?php endif; ?>	        		    
	        
        <?php $args = array(
            'posts_per_page' => absint( $number ),
            'post_type' => 'post',
            'post_status' => 'publish',
	        'orderby'	  => 'comment_count',	         
            'post__not_in' => get_option( 'sticky_posts' ),      
        );

        if ( absint( $category ) > 0 ) {
          $args['cat'] = absint( $category );
        }
        $the_query = new WP_Query( $args ); 

        if ($the_query->have_posts()) : $count= 0; 
        	while ( $the_query->have_posts() ) : $the_query->the_post(); $count++; ?>
                    <article class="featured-post post hentry category-featured">
                    	<?php if ( has_post_thumbnail() ){ ?>
	                        <figure class="featured-post-image">
	                            <?php the_post_thumbnail( 'power-magazine-mixed' );?>
	                        </figure>
                        <?php } ?>
                        <div class="post-content">
                            <?php if ( true == $show_category ): 
                            	power_magazine_category(); 
                            endif; ?>
                            <header class="entry-header">
                                <h5 class="entry-title">
                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                </h5>
                            </header>
                            <?php if ( true == $show_post_meta): ?>
		                        <div class="entry-meta">
			                        <?php power_magazine_posted_on(); ?>	
		                        </div>
	                        <?php endif; ?>
                    	</div>
                    </article>
                <?php endwhile;
                wp_reset_postdata(); 
            endif;?>
	        		    
        <?php echo $after_widget;

    } 

}