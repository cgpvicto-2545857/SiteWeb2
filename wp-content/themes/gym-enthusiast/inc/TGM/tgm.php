<?php

require get_template_directory() . '/inc/TGM/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function gym_enthusiast_register_recommended_plugins() {
	$plugins = array(
        array(
            'name'             => __( 'Video Popup Block by WPZOOM', 'gym-enthusiast' ),
            'slug'             => 'wpzoom-video-popup-block',
            'required'         => false,
            'force_activation' => false,
        ),
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'gym_enthusiast_register_recommended_plugins' );
