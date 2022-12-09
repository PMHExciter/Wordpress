<?php
	if ( ! function_exists( 'fitness_crossfit_setup' ) ) :

	function fitness_crossfit_setup() {
		$GLOBALS['content_width'] = apply_filters( 'fitness_crossfit_content_width', 640 );
		
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );

		add_theme_support( 'custom-background', array(
			'default-color' => 'f1f1f1'
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'css/editor-style.css', vw_fitness_gym_font_url() ) );

		// Theme Activation Notice
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action('admin_notices', 'fitness_crossfit_activation_notice');
		}
	}
	endif;

	add_action( 'after_setup_theme', 'fitness_crossfit_setup' );

	// Notice after Theme Activation
	function fitness_crossfit_activation_notice() {
		echo '<div class="notice notice-success is-dismissible welcome-notice">';
		echo '<p>'. esc_html__( 'Thank you for choosing Fitness Crossfit Theme. Would like to have you on our Welcome page so that you can reap all the benefits of our Fitness Crossfit Theme.', 'fitness-crossfit' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=fitness_crossfit_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'fitness-crossfit' ) .'</a></p>';
		echo '</div>';
	}

	add_action( 'wp_enqueue_scripts', 'fitness_crossfit_enqueue_styles' );
	function fitness_crossfit_enqueue_styles() {
    	$parent_style = 'fitness-crossfit-basic-style'; // Style handle of parent theme.
    	
		wp_enqueue_style( 'bootstrap-style', esc_url(get_template_directory_uri()).'/assets/css/bootstrap.css' );
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'fitness-crossfit-style', get_stylesheet_uri(), array( $parent_style ) );
		require get_parent_theme_file_path( '/inline-style.php' );
		wp_add_inline_style( 'fitness-crossfit-style',$vw_fitness_gym_custom_css );
		require get_theme_file_path( '/inline-style.php' );
		wp_add_inline_style( 'fitness-crossfit-style',$vw_fitness_gym_custom_css );
		wp_enqueue_style( 'fitness-crossfit-block-style', get_theme_file_uri('/assets/css/blocks.css') );
		wp_enqueue_script( 'fitness-crossfit-bmi-js', esc_url(get_theme_file_uri()). '/assets/js/bmi.js', array('jquery') ,'',true);

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
		
	add_action( 'init', 'fitness_crossfit_remove_parent_function');
	function fitness_crossfit_remove_parent_function() {
		remove_action( 'admin_notices', 'vw_fitness_gym_activation_notice' );
		remove_action( 'admin_menu', 'vw_fitness_gym_gettingstarted' );
	}

	add_action( 'customize_register', 'fitness_crossfit_customize_register', 11 );
	function fitness_crossfit_customize_register($wp_customize) {
		global $wp_customize;
		$wp_customize->remove_section( 'vw_fitness_gym_upgrade_pro_link' );
		$wp_customize->remove_section( 'vw_fitness_gym_get_started_link' );

		$wp_customize->add_setting('fitness_crossfit_topbar_location',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('fitness_crossfit_topbar_location',array(
			'label'	=> __('Add Location','fitness-crossfit'),
			'input_attrs' => array(
	            'placeholder' => __( 'Your city, Your location', 'fitness-crossfit' ),
	        ),
			'section'=> 'vw_fitness_gym_topbar',
			'type'=> 'text'
		));		
    
		//BMI section
		$wp_customize->add_section( 'fitness_crossfit_bmi_section' , array(
	    	'title'      => __( 'BMI Section', 'fitness-crossfit' ),
			'priority'   => null,
			'panel' => 'vw_fitness_gym_panel_id'
		) );

		$wp_customize->add_setting( 'fitness_crossfit_bmi_hide_show',array(
			'default' => 0,
			'transport' => 'refresh',
			'sanitize_callback' => 'vw_fitness_gym_switch_sanitization'
	    ));
	    $wp_customize->add_control( new VW_Fitness_Gym_Toggle_Switch_Custom_Control( $wp_customize, 'fitness_crossfit_bmi_hide_show',array(
			'label' => esc_html__( 'Show / Hide BMI Section','fitness-crossfit' ),
			'section' => 'fitness_crossfit_bmi_section'
	    )));

		$wp_customize->add_setting('fitness_crossfit_bmi_small_title',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('fitness_crossfit_bmi_small_title',array(
			'label'	=> __('Add Small Title','fitness-crossfit'),
			'input_attrs' => array(
	            'placeholder' => __( 'WHAT IS BMI', 'fitness-crossfit' ),
	        ),
			'section'=> 'fitness_crossfit_bmi_section',
			'type'=> 'text'
		));	

		$wp_customize->add_setting('fitness_crossfit_bmi_section_title',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('fitness_crossfit_bmi_section_title',array(
			'label'	=> __('Add Section Title','fitness-crossfit'),
			'input_attrs' => array(
	            'placeholder' => __( 'Calculate your BMI', 'fitness-crossfit' ),
	        ),
			'section'=> 'fitness_crossfit_bmi_section',
			'type'=> 'text'
		));	

		for ($i=1; $i <= 4 ; $i++) { 
			$wp_customize->add_setting('fitness_crossfit_bmi_value'.$i,array(
				'default'=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			));
			$wp_customize->add_control('fitness_crossfit_bmi_value'.$i,array(
				'label'	=> __('Value ','fitness-crossfit').$i,
				'input_attrs' => array(
		            'placeholder' => __( 'Below 18.5', 'fitness-crossfit' ),
		        ),
				'section'=> 'fitness_crossfit_bmi_section',
				'type'=> 'text'
			));	

			$wp_customize->add_setting('fitness_crossfit_weight_status'.$i,array(
				'default'=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			));
			$wp_customize->add_control('fitness_crossfit_weight_status'.$i,array(
				'label'	=> __('Weight Status ','fitness-crossfit').$i,
				'input_attrs' => array(
		            'placeholder' => __( 'Weight Status', 'fitness-crossfit' ),
		        ),
				'section'=> 'fitness_crossfit_bmi_section',
				'type'=> 'text'
			));	
		}
	}

	define('FITNESS_CROSSFIT_FREE_THEME_DOC',__('https://www.vwthemesdemo.com/docs/free-fitness-crossfit/','fitness-crossfit'));
	define('FITNESS_CROSSFIT_SUPPORT',__('https://wordpress.org/support/theme/fitness-crossfit/','fitness-crossfit'));
	define('FITNESS_CROSSFIT_REVIEW',__('https://wordpress.org/support/theme/fitness-crossfit/reviews/','fitness-crossfit'));
	define('FITNESS_CROSSFIT_BUY_NOW',__('https://www.vwthemes.com/themes/fitness-crossfit-wordpress-theme/','fitness-crossfit'));
	define('FITNESS_CROSSFIT_LIVE_DEMO',__('https://www.vwthemes.net/fitness-crossfit/','fitness-crossfit'));
	define('FITNESS_CROSSFIT_PRO_DOC',__('https://www.vwthemesdemo.com/docs/fitness-crossfit-pro/','fitness-crossfit'));
	define('FITNESS_CROSSFIT_FAQ',__('https://www.vwthemes.com/faqs/','fitness-crossfit'));
	define('FITNESS_CROSSFIT_CONTACT',__('https://www.vwthemes.com/contact/','fitness-crossfit'));
	define('FITNESS_CROSSFIT_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','fitness-crossfit'));
	define('FITNESS_CROSSFIT_CREDIT',__('https://www.vwthemes.com/themes/free-crossfit-wordpress-theme/','fitness-crossfit'));

	if ( ! function_exists( 'fitness_crossfit_credit' ) ) {
		function fitness_crossfit_credit(){
			echo "<a href=".esc_url(FITNESS_CROSSFIT_CREDIT)." target='_blank'>". esc_html__('Fitness Crossfit WordPress Theme','fitness-crossfit') ."</a>";
		}
	}

	function fitness_crossfit_sanitize_choices( $input, $setting ) {
	    global $wp_customize; 
	    $control = $wp_customize->get_control( $setting->id ); 
	    if ( array_key_exists( $input, $control->choices ) ) {
	        return $input;
	    } else {
	        return $setting->default;
	    }
	}

	function fitness_crossfit_sanitize_dropdown_pages( $page_id, $setting ) {
	  	$page_id = absint( $page_id );
	  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	/* Theme Widgets Setup */

	function fitness_crossfit_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Footer Navigation 1', 'fitness-crossfit' ),
			'description'   => __( 'Appears on footer 1', 'fitness-crossfit' ),
			'id'            => 'footer-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Navigation 2', 'fitness-crossfit' ),
			'description'   => __( 'Appears on footer 2', 'fitness-crossfit' ),
			'id'            => 'footer-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Navigation 3', 'fitness-crossfit' ),
			'description'   => __( 'Appears on footer 3', 'fitness-crossfit' ),
			'id'            => 'footer-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Navigation 4', 'fitness-crossfit' ),
			'description'   => __( 'Appears on footer 4', 'fitness-crossfit' ),
			'id'            => 'footer-4',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'fitness_crossfit_widgets_init' );

// Customizer Pro
load_template( ABSPATH . WPINC . '/class-wp-customize-section.php' );

class Fitness_Crossfit_Customize_Section_Pro extends WP_Customize_Section {
	public $type = 'fitness-crossfit';
	public $pro_text = '';
	public $pro_url = '';
	public function json() {
		$json = parent::json();
		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );
		return $json;
	}
	protected function render_template() { ?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}
				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}

final class Fitness_Crossfit_Customize {
	public static function get_instance() {
		static $instance = null;
		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}
		return $instance;
	}
	private function __construct() {}
	private function setup_actions() {
		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );
		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}
	public function sections( $manager ) {
		// Register custom section types.
		$manager->register_section_type( 'Fitness_Crossfit_Customize_Section_Pro' );
		// Register sections.
		$manager->add_section( new Fitness_Crossfit_Customize_Section_Pro( $manager, 'fitness_crossfit_upgrade_pro_link',
		array(
			'priority'   => 1,
			'title'    => esc_html__( 'FITNESS CROSSFIT PRO', 'fitness-crossfit' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'fitness-crossfit' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/fitness-crossfit-wordpress-theme/'),
		)));

		// Register sections.
		$manager->add_section(new Fitness_Crossfit_Customize_Section_Pro($manager,'fitness_crossfit_store2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'fitness-crossfit' ),
			'pro_text' => esc_html__( 'DOCS', 'fitness-crossfit' ),
			'pro_url'  => admin_url('themes.php?page=fitness_crossfit_guide'),
		)));
	}
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'fitness-crossfit-customize-controls', get_stylesheet_directory_uri() . '/assets/js/customize-controls-child.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'fitness-crossfit-customize-controls', get_stylesheet_directory_uri() . '/assets/css/customize-controls-child.css' );
	}
}
Fitness_Crossfit_Customize::get_instance();

/* getstart */
require get_theme_file_path('/inc/getstart/getstart.php');

/* Plugin Activation */
require get_theme_file_path() . '/inc/getstart/plugin-activation.php';