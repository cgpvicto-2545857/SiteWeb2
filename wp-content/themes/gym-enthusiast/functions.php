<?php
/**
 * GYM Enthusiast functions and definitions
 *
 * @package gym_enthusiast
 * @since 1.0
 */

if ( ! defined( 'GYM_ENTHUSIAST_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'GYM_ENTHUSIAST_VERSION', wp_get_theme()->get( 'Version' ) );
}

if ( ! function_exists( 'gym_enthusiast_support' ) ) :
	function gym_enthusiast_support() {

		load_theme_textdomain( 'gym-enthusiast', get_template_directory() . '/languages' );

		add_theme_support( 'custom-background', apply_filters( 'gym_enthusiast_custom_background', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support('woocommerce');

		// Enqueue editor styles.
		add_editor_style(get_stylesheet_directory_uri() . '/assets/css/editor-style.css');

		define('GYM_ENTHUSIAST_FREE_BUY_NOW',__('https://www.themepixels.net/products/gym-enthusiast/','gym-enthusiast'));
		define('GYM_ENTHUSIAST_BUY_NOW',__('https://www.themepixels.net/products/gym-wordpress-theme/','gym-enthusiast'));
		define('GYM_ENTHUSIAST_LIVE_DEMO',__('https://themepixels.net/demo-site/gym-enthusiast-pro/','gym-enthusiast'));
		define('GYM_ENTHUSIAST_FREE_DOC',__('https://www.themepixels.net/docs/gym-enthusiast-free-doc/','gym-enthusiast'));
		define('GYM_ENTHUSIAST_BUNDLE',__('https://www.themepixels.net/products/wp-theme-bundle','gym-enthusiast'));
		define('GYM_ENTHUSIAST_THEME_SUPPORT',__('https://wordpress.org/support/theme/gym-enthusiast','gym-enthusiast'));
    	require_once get_theme_file_path( '/inc/customizer.php' );
	}
endif;

add_action( 'after_setup_theme', 'gym_enthusiast_support' );

if ( ! function_exists( 'gym_enthusiast_styles' ) ) :
	function gym_enthusiast_styles() {
		// Register theme stylesheet.
		$gym_enthusiast_theme_version = wp_get_theme()->get( 'Version' );

		$GYM_ENTHUSIAST_VERSION_STRING = is_string( $gym_enthusiast_theme_version ) ? $gym_enthusiast_theme_version : false;
		wp_enqueue_style(
			'gym-enthusiast-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$GYM_ENTHUSIAST_VERSION_STRING
		);

		wp_style_add_data('gym-enthusiast-style', 'style-rtl', 'replace');

		wp_enqueue_style( 'dashicons' );

		wp_enqueue_style( 'animate-css', esc_url(get_template_directory_uri()).'/assets/css/animate.css' );

		wp_enqueue_script( 'jquery-wow', esc_url(get_template_directory_uri()) . '/assets/js/wow.js', array('jquery') );
	    
		 //font-awesome
		 wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/inc/fontawesome/css/all.css'
		 	, array(), '7.0.0' );

		wp_enqueue_style( 'owl.carousel-style', get_template_directory_uri().'/assets/css/owl.carousel.css', array(), GYM_ENTHUSIAST_VERSION );
		wp_enqueue_script( 'owl.carousel-js', get_template_directory_uri(). '/assets/js/owl.carousel.js', array('jquery') ,GYM_ENTHUSIAST_VERSION,true);

		 wp_enqueue_script('gym-enthusiast-custom-scripts', get_template_directory_uri() . '/assets/js/custom-script.js',  array('jquery'),'' ,true );
	}
endif;

add_action( 'wp_enqueue_scripts', 'gym_enthusiast_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

// Add block styles
require get_template_directory() . '/inc/block-styles.php';

// Block Filters
require get_template_directory() . '/inc/block-filters.php';

// Svg icons
require get_template_directory() . '/inc/icon-function.php';

// TGM
require get_template_directory() . '/inc/TGM/tgm.php';

/**
* GET START.
*/
require get_template_directory() . '/themeinfo/gym_enthusiast_themeinfo_page.php';

// NOTICE FUNCTION
function gym_enthusiast_activation_notice() {

    if ( get_option( 'gym_enthusiast_notice_dismissed' ) ) {
        return;
    }

    if ( isset( $_GET['page'] ) && $_GET['page'] === 'gym-enthusiast-themeinfo-page' ) {
        return;
    }
    gym_enthusiast_theme_notice_content( true, false, true );
}

function gym_enthusiast_theme_notice_content(
    $gym_enthusiast_show_theme_info = true,
    $gym_enthusiast_show_box_1 = false,
    $gym_enthusiast_show_dismiss = true
) {
?>
	<div class="updated notice notice-theme-info-class <?php echo $gym_enthusiast_show_dismiss ? 'is-dismissible' : ''; ?>" data-notice="theme_info">
        <div class="gym-enthusiast-theme-info-notice clearfix">
            <div class="gym-enthusiast-theme-notice-content">
				<div class="notice-content">
					<div class="inner-notice-contetn">
						<h4 class="best-value"><?php esc_html_e( 'Best Value', 'gym-enthusiast' ); ?></h4>
						<h2 class="gym-enthusiast-notice-h2">
							<?php
							printf(
								/* translators: 1: Theme name */
								esc_html__('Get 30+ Premium WordPress Themes in One Bundle', 'gym-enthusiast'), '<strong>' . esc_html(wp_get_theme()->get('Name')) . '</strong>'
							);
							?>
						</h2>

						<p class="gym-enthusiast-notice-p">
							<?php
							printf(
								/* translators: 1: Theme name */
								esc_html__('Premium WordPress Themes for Business, Ecommerce, Blogs, Portfolio and more. Our themes are light & easy to customize ', 'gym-enthusiast'), '<strong>' . esc_html(wp_get_theme()->get('Name')) . '</strong>'
							);
							?>
						</p>
					</div>
					<div class="inner-notice-buttons">
						<?php if ( $gym_enthusiast_show_theme_info ) : ?>
							<a class="gym-enthusiast-btn-theme-info button button-primary bundlee"
								href="<?php echo esc_url( admin_url( 'themes.php?page=gym-enthusiast-themeinfo-page' ) ); ?>">
								<?php esc_html_e( 'Theme Info', 'gym-enthusiast' ); ?>
							</a>
						<?php endif; ?>
						<a class="gym-enthusiast-btn-theme-info button button-primary live-demoo" target="_blank" href="<?php echo esc_url(GYM_ENTHUSIAST_BUY_NOW); ?>" id="gym-enthusiast-bundle-button"> <?php esc_html_e('Buy Now', 'gym-enthusiast') ?></a>
						<a class="gym-enthusiast-btn-theme-info button button-primary bundlee" target="_blank" href="<?php echo esc_url(GYM_ENTHUSIAST_LIVE_DEMO); ?>" id="gym-enthusiast-collection-button"> <?php esc_html_e('Live Demo', 'gym-enthusiast') ?></a>
						<a class="gym-enthusiast-btn-theme-info button button-primary bundlee" target="_blank" href="<?php echo esc_url(GYM_ENTHUSIAST_BUNDLE); ?>" 
						id="gym-enthusiast-collection-button"> <?php esc_html_e('Get Bundle', 'gym-enthusiast') ?></a>
					</div>
				</div>
				<div class="middle-box">
					<?php if ( $gym_enthusiast_show_box_1 ) : ?>
						<div class="box-1">
							<div class="box-info">
								<span class="dashicons dashicons-yes-alt"></span>
								<div>
									<p><?php esc_html_e( '30+ Premium', 'gym-enthusiast' ); ?></p>
									<p><?php esc_html_e( 'WordPress Themes', 'gym-enthusiast' ); ?></p>
								</div>
							</div>
							<div class="box-info">
								<span class="dashicons dashicons-yes-alt"></span>
								<div>
									<p><?php esc_html_e( 'Single Theme', 'gym-enthusiast' ); ?></p>
									<p><?php esc_html_e( 'Starting at $40', 'gym-enthusiast' ); ?></p>
								</div>
							</div>
							<div class="box-info">
								<span class="dashicons dashicons-yes-alt"></span>
								<div>
									<p><?php esc_html_e( 'One Time Payment -', 'gym-enthusiast' ); ?></p>
									<p><?php esc_html_e( 'no hidden charges', 'gym-enthusiast' ); ?></p>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<div class="box-2">
						<p class="box-2-para"><?php esc_html_e( 'Total Value', 'gym-enthusiast' ); ?></p>
						<h4><?php esc_html_e( '$2499', 'gym-enthusiast' ); ?></h4>
						<p><?php esc_html_e( 'Bundle Price', 'gym-enthusiast' ); ?></p>
						<span><sup><?php esc_html_e( '$', 'gym-enthusiast' ); ?></sup><h2><?php esc_html_e( '69', 'gym-enthusiast' ); ?></h2></span>
						<p class="box-para"><?php esc_html_e( 'One Time Payement', 'gym-enthusiast' ); ?></p>
						<p class="box-btn"><?php esc_html_e( 'You Save $2430', 'gym-enthusiast' ); ?></p>
					</div>
				</div>
				<div class="notice-image">
					<a href="<?php echo esc_url( GYM_ENTHUSIAST_BUNDLE ); ?>" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/bundle-img.png' ); ?>" alt="<?php esc_attr_e( 'Theme Screenshot', 'gym-enthusiast' ); ?>">
					</a>
				</div>
            </div>
        </div>
    </div>
<?php
}

add_action('admin_notices', 'gym_enthusiast_activation_notice');

add_action('wp_ajax_gym_enthusiast_dismiss_notice', 'gym_enthusiast_dismiss_notice');

function gym_enthusiast_notice_status() {
    delete_option('gym_enthusiast_notice_dismissed');
}
add_action('after_switch_theme', 'gym_enthusiast_notice_status');

function gym_enthusiast_dismiss_notice() {
    update_option('gym_enthusiast_notice_dismissed', true);
    wp_send_json_success();
}

function gym_enthusiast_admin_enqueue_scripts(){
	wp_enqueue_style('gym-enthusiast-admin-style', esc_url( get_template_directory_uri() ) . '/assets/css/gym-enthusiast-notice.css');
	wp_enqueue_script('gym-enthusiast-dismiss-notice-script', get_stylesheet_directory_uri() . '/assets/js/gym-enthusiast-notice.js', array('jquery'), null, true);
}
add_action( 'admin_enqueue_scripts', 'gym_enthusiast_admin_enqueue_scripts' );