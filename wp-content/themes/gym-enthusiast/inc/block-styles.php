<?php
/**
 * Block Styles
 *
 * @package gym_enthusiast
 * @since 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	function gym_enthusiast_register_block_styles() {

		//Wp Block Padding Zero
		register_block_style(
			'core/group',
			array(
				'name'  => 'gym-enthusiast-padding-0',
				'label' => esc_html__( 'No Padding', 'gym-enthusiast' ),
			)
		);

		//Wp Block Post Author Style
		register_block_style(
			'core/post-author',
			array(
				'name'  => 'gym-enthusiast-post-author-card',
				'label' => esc_html__( 'Theme Style', 'gym-enthusiast' ),
			)
		);

		//Wp Block Button Style
		register_block_style(
			'core/button',
			array(
				'name'         => 'gym-enthusiast-button',
				'label'        => esc_html__( 'Plain', 'gym-enthusiast' ),
			)
		);

		//Post Comments Style
		register_block_style(
			'core/post-comments',
			array(
				'name'         => 'gym-enthusiast-post-comments',
				'label'        => esc_html__( 'Theme Style', 'gym-enthusiast' ),
			)
		);

		//Latest Comments Style
		register_block_style(
			'core/latest-comments',
			array(
				'name'         => 'gym-enthusiast-latest-comments',
				'label'        => esc_html__( 'Theme Style', 'gym-enthusiast' ),
			)
		);


		//Wp Block Table Style
		register_block_style(
			'core/table',
			array(
				'name'         => 'gym-enthusiast-wp-table',
				'label'        => esc_html__( 'Theme Style', 'gym-enthusiast' ),
			)
		);


		//Wp Block Pre Style
		register_block_style(
			'core/preformatted',
			array(
				'name'         => 'gym-enthusiast-wp-preformatted',
				'label'        => esc_html__( 'Theme Style', 'gym-enthusiast' ),
			)
		);

		//Wp Block Verse Style
		register_block_style(
			'core/verse',
			array(
				'name'         => 'gym-enthusiast-wp-verse',
				'label'        => esc_html__( 'Theme Style', 'gym-enthusiast' ),
			)
		);
	}
	add_action( 'init', 'gym_enthusiast_register_block_styles' );
}
