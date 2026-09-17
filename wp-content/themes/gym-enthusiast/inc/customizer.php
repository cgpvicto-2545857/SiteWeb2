<?php
/**
 * Customizer
 * 
 * @package WordPress
 * @subpackage GYM Enthusiast
 * @since GYM Enthusiast 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gym_enthusiast_customize_register( $wp_customize ) {
    // Check for existence of WP_Customize_Manager before proceeding
	if ( ! class_exists( 'WP_Customize_Manager' ) ) {
        return;
    }
    
	$wp_customize->add_section( new gym_enthusiast_Customizer_Pro_Button( $wp_customize, 'gym_enthusiast_upsell_premium_section', array(
		'title'       => __( 'Buy GYM Enthusiast Pro', 'gym-enthusiast' ),
		'button_text' => __( 'Buy Pro Theme', 'gym-enthusiast' ),
		'url'         => esc_url( GYM_ENTHUSIAST_BUY_NOW ),
		'priority'    => 0,
	)));

	$wp_customize->add_section( new gym_enthusiast_Customizer_Pro_Button( $wp_customize, 'gym_enthusiast_upsell_live_preview_section', array(
		'title'       => __( 'Preview Pro Theme', 'gym-enthusiast' ),
		'button_text' => __( 'View Live Demo', 'gym-enthusiast' ),
		'url'         => esc_url( GYM_ENTHUSIAST_LIVE_DEMO ),
		'priority'    => 0,
	)));

}
add_action( 'customize_register', 'gym_enthusiast_customize_register' );

if ( class_exists( 'WP_Customize_Section' ) ) {
	class gym_enthusiast_Customizer_Pro_Button extends WP_Customize_Section {
		public $type = 'gym-enthusiast-buynow';
		public $button_text = '';
		public $url = '';

		protected function render() {
			?>
			<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="gym_enthusiast_customizer_pro_button accordion-section control-section control-section-<?php echo esc_attr( $this->id ); ?> cannot-expand">
				<h3 class="accordion-section-title premium-details">
					<?php echo esc_html( $this->title ); ?>
					<a href="<?php echo esc_url( $this->url ); ?>" class="button button-secondary alignright" target="_blank" style="margin-top: -4px;"><?php echo esc_html( $this->button_text ); ?></a>
				</h3>
			</li>
			<?php
		}
	}
}

/**
 * Enqueue script for custom customize control.
 */
function gym_enthusiast_custom_control_scripts() {
	wp_enqueue_script( 'gym-enthusiast-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );

    wp_enqueue_style( 'gym-enthusiast-customizer-css', get_template_directory_uri() . '/assets/css/customizer.css', array(), '1.0' );
}
add_action( 'customize_controls_enqueue_scripts', 'gym_enthusiast_custom_control_scripts' );