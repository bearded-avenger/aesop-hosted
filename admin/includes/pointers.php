<?php

class aiHostedPointers {

	public function __construct(){

		add_action( 'admin_enqueue_scripts', array($this,'custom_admin_pointers_header') );
	}


	function custom_admin_pointers_header() {

	      add_action( 'admin_print_footer_scripts', array($this,'custom_admin_pointers_footer') );

	      wp_enqueue_script( 'wp-pointer' );
	      wp_enqueue_style( 'wp-pointer' );

	}

	function custom_admin_pointers_check() {
	   $admin_pointers = custom_admin_pointers();
	   foreach ( $admin_pointers as $pointer => $array ) {
	      if ( $array['active'] )
	         return true;
	   }
	}

	function custom_admin_pointers_footer() {
	   $admin_pointers = $this->custom_admin_pointers();
	   ?>
	<script type="text/javascript">
	/* <![CDATA[ */
	( function($) {
	   <?php
	   foreach ( $admin_pointers as $pointer => $array ) {
	      if ( $array['active'] ) {
	         ?>
	         $( '<?php echo $array['anchor_id']; ?>' ).pointer( {
	            content: '<?php echo $array['content']; ?>',
	            position: {
	            edge: '<?php echo $array['edge']; ?>',
	            align: '<?php echo $array['align']; ?>'
	         },
	            close: function() {
	               $.post( ajaxurl, {
	                  pointer: '<?php echo $pointer; ?>',
	                  action: 'dismiss-wp-pointer'
	               } );
	            }
	         } ).pointer( 'open' );
	         <?php
	      }
	   }
	   ?>
	} )(jQuery);
	/* ]]> */
	</script>
	   <?php
	}

	function custom_admin_pointers() {

	   	$dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
	   	$version = '0_9'; // replace all periods in 1.0 with an underscore
	   	$prefix = 'custom_admin_pointers' . $version . '_';

	   	$story_pointer_content = '<h3>' . __( 'Story Cover Image' ) . '</h3>';
	   	$story_pointer_content .= '<p>' . __( 'Add a beautiful image to serve as the cover of your story.' ) . '</p>';

	   	$engine_pointer_content = '<h3>' . __( 'Story Components' ) . '</h3>';
	   	$engine_pointer_content .= '<p>' . __( 'Build your story with interactive storytelling components.' ) . '</p>';

	   	return array(
	      $prefix . 'new_items' => array(
	         	'content' => $engine_pointer_content,
	         	'anchor_id' => '.aesop-add-story-component',
	         	'edge' => 'top',
	         	'align' => 'left',
	         	'active' => ( ! in_array( $prefix . 'new_items', $dismissed ) )
	      	),
	      	$prefix.'map_help' => array(
	      		'content' => $story_pointer_content,
	         	'anchor_id' => '#postimagediv',
	         	'edge' => 'top',
	         	'align' => 'right',
	         	'active' => ( ! in_array( $prefix . 'new_items', $dismissed ) )
	      	)
	   );
	}
}
new aiHostedPointers;

