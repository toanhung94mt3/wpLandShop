<?php
/**
 * Power Magazine Meta Box
 *
 * @package Power_Magazine
 */

/**
 * Adds a meta box to the post editing screen
 */
function power_magazine_register_meta() {
    add_meta_box( 'power_magazine_meta', esc_html__( 'Sidebar Layout', 'power-magazine' ), 'power_magazine_meta_callback', array( 'post', 'page' ) );
}
add_action( 'add_meta_boxes', 'power_magazine_register_meta' );

/**
 * Callback for layout option.
 * Shows radio button to choose layout
 *
 * @param array $post current post information.
 */
function power_magazine_meta_callback( $post ) {
	
    $power_magazine_meta = array(
        'left-sidebar' => array(
        'value'     => 'left-sidebar',
            'label'     => esc_html__( 'Left sidebar', 'power-magazine' ),
            'thumbnail' => get_template_directory_uri() . '/assets/img/sidebar-left.png'
        ), 

        'right-sidebar' => array(
            'value' => 'right-sidebar',
            'label' => esc_html__( 'Right sidebar', 'power-magazine' ),
            'thumbnail' => get_template_directory_uri() . '/assets/img/sidebar-right.png'
        ),
       
        'no-sidebar' => array(
            'value'     => 'no-sidebar',
            'label'     => esc_html__( 'No sidebar', 'power-magazine' ),
            'thumbnail' => get_template_directory_uri() . '/assets/img/sidebar-no.png'
    	)
    ); 
	
	
    // Use nonce for form verification.
    wp_nonce_field( basename( __FILE__ ), 'power_magazine_meta_nonce' );

    $layout = get_post_meta( $post->ID, 'power_magazine_meta', true );
	
    // Set default value if metabox returns empty.
    if ( empty( $layout ) ) {
                $layout = 'right-sidebar';
        }
    ?>
    <table class="form-table">
        <tr>
            <td>
                <?php foreach($power_magazine_meta as $field){  ?>                   
                    <div class="radio-image-wrapper" style="float:left; margin-right:10px;">
                    <label class="description">
                         <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
                         <input type="radio" name="power_magazine_meta" value="<?php echo esc_attr($field['value']); ?>" <?php checked( $field['value'], $layout ) ?>/>&nbsp;<?php echo esc_html($field['label']); ?>
                        </label>
                    </div>
                <?php } ?>
        	</td>
        </tr>
	</table>
	               
    <?php
}
/**
 * Saves metaboxes value to database
 *
 * @param int $post_id current post id.
 */
function power_magazine_save_metaboxes( $post_id ) {
    global $post;

    // Verify the nonce before proceeding.
    $power_magazine_meta_nonce = '';
    if ( isset( $_POST['power_magazine_meta_nonce'] ) && ! wp_verify_nonce( 'power_magazine_meta_nonce', basename( __FILE__ ) ) ) {
        $power_magazine_meta_nonce = sanitize_text_field( wp_unslash( $_POST['power_magazine_meta_nonce'] ) );
    }
    if ( ! $power_magazine_meta_nonce ) {
        return;
    }

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  {
        return;
    }

    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] )  { 
        if (!current_user_can( 'edit_page', $post_id ) ) 
            return $post_id; 
    } elseif (!current_user_can( 'edit_post', $post_id ) ) { 
    return $post_id; 
	} 

	//Execute this saving function
	$old = get_post_meta( $post_id, 'power_magazine_meta', true); 
	$new = sanitize_text_field( wp_unslash( $_POST['power_magazine_meta'] ));
	    if ($new && $new != $old) { 
	        update_post_meta($post_id, 'power_magazine_meta', $new); 
    }
	
}	
add_action( 'save_post', 'power_magazine_save_metaboxes' );
