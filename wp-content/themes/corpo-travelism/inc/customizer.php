<?php

function corpo_travelism_customize_register( $wp_customize ) {

class Corpo_Travelism_Switch_Control extends WP_Customize_Control{

		public $type = 'switch';

		public $on_off_label = array();

		public function __construct( $manager, $id, $args = array() ){
	        $this->on_off_label = $args['on_off_label'];
	        parent::__construct( $manager, $id, $args );
	    }

		public function render_content(){
	    ?>
		    <span class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
			</span>

			<?php if( $this->description ){ ?>
				<span class="description customize-control-description">
				<?php echo wp_kses_post( $this->description ); ?>
				</span>
			<?php } ?>

			<?php
				$switch_class = ( $this->value() == 'true' ) ? 'switch-on' : '';
				$on_off_label = $this->on_off_label;
			?>
			<div class="onoffswitch <?php echo esc_attr( $switch_class ); ?>">
				<div class="onoffswitch-inner">
					<div class="onoffswitch-active">
						<div class="onoffswitch-switch"><?php echo esc_html( $on_off_label['on'] ) ?></div>
					</div>

					<div class="onoffswitch-inactive">
						<div class="onoffswitch-switch"><?php echo esc_html( $on_off_label['off'] ) ?></div>
					</div>
				</div>	
			</div>
			<input <?php $this->link(); ?> type="hidden" value="<?php echo esc_attr( $this->value() ); ?>"/>
			<?php
	    }
	}

	class Corpo_Travelism_Dropdown_Chooser extends WP_Customize_Control{

		public $type = 'dropdown_chooser';

		public function render_content(){
			if ( empty( $this->choices ) )
	                return;
			?>
	            <label>
	                <span class="customize-control-title">
	                	<?php echo esc_html( $this->label ); ?>
	                </span>

	                <?php if($this->description){ ?>
		            <span class="description customize-control-description">
		            	<?php echo wp_kses_post($this->description); ?>
		            </span>
		            <?php } ?>

	                <select class="travelism-chosen-select" <?php $this->link(); ?>>
	                    <?php
	                    foreach ( $this->choices as $value => $label )
	                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
	                    ?>
	                </select>
	            </label>
			<?php
		}
	}

	/**
 * Multi input custom control
 *
 * @package WordPress
 * @subpackage inc/customizer
 * @version 1.1.0
 * @author  Denis Žoljom <http://madebydenis.com/>
 * @license https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link https://github.com/dingo-d/wordpress-theme-customizer-extra-custom-controls
 * @since  1.0.0
 */
class Corpo_Travelism_Multi_Input_Custom_Control extends WP_Customize_Control {
	/**
	 * Control type
	 *
	 * @var string
	 */
	public $type = 'multi-input';

	/**
	 * Control button text.
	 *
	 * @var string
	 */
	public $button_text;

	/**
	 * Control method
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
		?>
		<label class="customize_multi_input">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<p><?php echo esc_html( $this->description ); ?></p>
			<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize_multi_value_field" <?php $this->link(); ?> />
			<div class="customize_multi_fields">
				<div class="set">
					<input type="text" value="" class="customize_multi_single_field"/>
					<span class="customize_multi_remove_field"><span class="dashicons dashicons-no-alt"></span></span>
				</div>
			</div>
			<a href="#" class="button button-primary customize_multi_add_field"><?php echo esc_html( $this->button_text ); ?></a>
		</label>
		<?php
	}
}

	class Corpo_Travelism_Icon_Picker extends WP_Customize_Control{
		public $type = 'icon-picker';


		public function render_content(){
			$id = uniqid();
			?>
			<label>
				<span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>

				<?php if($this->description){ ?>
					<span class="description customize-control-description">
						<?php echo wp_kses_post($this->description); ?>
					</span>
				<?php } ?>
				<input id="travelism-<?php echo esc_attr( $id ); ?>" placeholder="<?php esc_attr_e( 'Click here to select icon', 'corpo-travelism' ); ?>" class="travelism-icon-picker input" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />

			</label>
			<?php
		}
	}



	//Custom control for horizontal line
	Class Corpo_Travelism_Customize_Horizontal_Line extends WP_Customize_Control {

		public $type = 'hr';

		public function render_content() {
			?>
			<div>
				<hr style="border: 1px dotted #72777c;" />
			</div>
			<?php
		}
	}

	//customizer section
	require get_theme_file_path() . '/inc/customizer/blog-slider.php';
	require get_theme_file_path() . '/inc/customizer/business-service.php';
	require get_theme_file_path() . '/inc/customizer/business-about.php';
	require get_theme_file_path() . '/inc/customizer/blog-cta.php';
	require get_theme_file_path() . '/inc/customizer/business-team.php';
	require get_theme_file_path() . '/inc/customizer/business-counter.php';
	require get_theme_file_path() . '/inc/customizer/logos.php';
}
add_action( 'customize_register', 'corpo_travelism_customize_register' );

/*=============Active Callback=====================*/
function corpo_travelism_is_blog_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blog_slider_section_enable' )->value() );
}

function corpo_travelism_is_business_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'business_service_section_enable' )->value() );
}

function corpo_travelism_is_business_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'business_about_section_enable' )->value() );
}

function corpo_travelism_is_blog_cta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blog_cta_section_enable' )->value() );
}

function corpo_travelism_is_business_team_section_enable( $control ) {
	return ( $control->manager->get_setting( 'business_team_section_enable' )->value() );
}

function corpo_travelism_is_business_counter_section_enable( $control ) {
	return ( $control->manager->get_setting( 'business_counter_section_enable' )->value() );
}

function corpo_travelism_is_logos_section_enable( $control ) {
	return ( $control->manager->get_setting( 'logos_section_enable' )->value() );
}


/*=============Partial Refresh=====================*/

if ( ! function_exists( 'corpo_travelism_blog_slider_title_partial' ) ) :
    // blog_slider_title
    function corpo_travelism_blog_slider_title_partial() {
        return esc_html( get_theme_mod( 'blog_slider_title' ) );
    }
endif;

if ( ! function_exists( 'corpo_travelism_blog_slider_btn_title_partial' ) ) :
    // blog_slider_btn_title
    function corpo_travelism_blog_slider_btn_title_partial() {
        return esc_html( get_theme_mod( 'blog_slider_btn_title' ) );
    }
endif;

if ( ! function_exists( 'corpo_travelism_business_service_title_partial' ) ) :
    // business_service_title
    function corpo_travelism_business_service_title_partial() {
        return esc_html( get_theme_mod( 'business_service_title' ) );
    }
endif;

if ( ! function_exists( 'corpo_travelism_business_service_subtitle_partial' ) ) :
    // business_service_subtitle
    function corpo_travelism_business_service_subtitle_partial() {
        return esc_html( get_theme_mod( 'business_service_subtitle' ) );
    }
endif;

if ( ! function_exists( 'corpo_travelism_business_service_btn_title_partial' ) ) :
    // business_service_btn_title
    function corpo_travelism_business_service_btn_title_partial() {
        return esc_html( get_theme_mod( 'business_service_btn_title' ) );
    }
endif;

if ( ! function_exists( 'corpo_travelism_business_about_subtitle_partial' ) ) :
    // business_about_subtitle
    function corpo_travelism_business_about_subtitle_partial() {
        return esc_html( get_theme_mod( 'business_about_subtitle' ) );
    }
endif;

if ( ! function_exists( 'corpo_travelism_business_about_btn_title_partial' ) ) :
    // business_about_btn_title
    function corpo_travelism_business_about_btn_title_partial() {
        return esc_html( get_theme_mod( 'business_about_btn_title' ) );
    }
endif;

if ( ! function_exists( 'corpo_travelism_business_team_title_partial' ) ) :
    // business_team_title
    function corpo_travelism_business_team_title_partial() {
        return esc_html( get_theme_mod( 'business_team_title' ) );
    }
endif;

if ( ! function_exists( 'corpo_travelism_business_team_subtitle_partial' ) ) :
    // business_team_subtitle
    function corpo_travelism_business_team_subtitle_partial() {
        return esc_html( get_theme_mod( 'business_team_subtitle' ) );
    }
endif;

if ( ! function_exists( 'corpo_travelism_happy_clients_subtitle_partial' ) ) :
    // happy_clients_subtitle
    function corpo_travelism_happy_clients_subtitle_partial() {
        return esc_html( get_theme_mod( 'happy_clients_subtitle' ) );
    }
endif;