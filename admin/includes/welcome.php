<?php

/**
 * Hide default welcome dashboard message and and create a custom one
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
function aesop_hosted_welcome_panel() {

	?>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('div.welcome-panel-content').hide();
	});
	</script>

	<div class="custom-welcome-panel-content">
	<h3><?php _e( 'Welcome to Aesop Beta!','aesop-core' ); ?></h3>
	<p class="about-description"><?php _e( 'You must be pretty special because you are amongst the first to kick the tires on this thing! The Aesop Pro stuff doesnt work so dont try. Most of the post stuff works, as does collaborator stuff, so have fun! Please provide feedback using the feedback link up top.','aesop-core' ); ?></p>
	<div class="welcome-panel-column-container">
	<div class="welcome-panel-column">
		<h4><?php _e( "Let's Get Started",'aesop-core' ); ?></h4>
		<a class="button button-primary button-hero load-customize hide-if-no-customize" href="http://your-website.com"><?php _e( 'Create a Story','aesop-core' ); ?></a>
			<p class="hide-if-no-customize"><?php printf( __( 'or, <a href="%s">edit your site settings</a>','aesop-core' ), admin_url( 'options-general.php' ) ); ?></p>
	</div>
	<div class="welcome-panel-column">
		<h4><?php _e( 'Next Steps','aesop-core' ); ?></h4>
		<ul>
		<?php if ( 'page' == get_option( 'show_on_front' ) && ! get_option( 'page_for_posts' ) ) : ?>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page','aesop-core' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages','aesop-core' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
		<?php elseif ( 'page' == get_option( 'show_on_front' ) ) : ?>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page','aesop-core' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages','aesop-core' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Add a blog post','aesop-core' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
		<?php else : ?>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Write your first story','aesop-core' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
		<?php endif; ?>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-view-site">' . __( 'View your site','aesop-core' ) . '</a>', home_url( '/' ) ); ?></li>
		</ul>
	</div>
	<div class="welcome-panel-column welcome-panel-last">
		<h4><?php _e( 'More Actions','aesop-core' ); ?></h4>
		<ul>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-learn-more">' . __( 'Join the Aesop community','aesop-core' ) . '</a>', __( '#','aesop-core' ) ); ?></li>
			<li><?php printf( '<a href="%s" class="welcome-icon welcome-appearence"><i class="dashicons dashicons-appearence"></i>' . __( 'Customize your site','aesop-core' ) . '</a>', home_url( '/' ) ); ?></li>
		</ul>
	</div>
	</div>
	</div>

<?php
}

add_action( 'welcome_panel', 'aesop_hosted_welcome_panel' );