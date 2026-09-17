<?php
/**
 * Block Patterns
 *
 * @package gym_enthusiast
 * @since 1.0
 */

function gym_enthusiast_register_block_patterns() {
	$gym_enthusiast_block_pattern_categories = array(
		'gym-enthusiast' => array( 'label' => esc_html__( 'GYM Enthusiast', 'gym-enthusiast' ) ),
		'pages' => array( 'label' => esc_html__( 'Pages', 'gym-enthusiast' ) ),
	);

	$gym_enthusiast_block_pattern_categories = apply_filters( 'gym_enthusiast_gym_enthusiast_block_pattern_categories', $gym_enthusiast_block_pattern_categories );

	foreach ( $gym_enthusiast_block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'gym_enthusiast_register_block_patterns', 9 );