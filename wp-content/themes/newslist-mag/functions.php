<?php 
class Newslist_Mag{

	public function __construct(){
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
		add_action( 'init', array( $this, 'init' ) );
		require_once get_theme_file_path( 'css.php' );
	}

	public function init(){
		require_once get_theme_file_path( 'customizer.php' );
		add_filter( Newslist_Helper::fn_prefix( 'disable_inner_banner_content' ), array( $this, 'disable_inner_banner' ) );
		add_action( Newslist_Helper::fn_prefix( 'before-content' ), array( $this, 'hero_news' ) );
	}

	public function scripts(){

		wp_enqueue_style( 'newslist-mag', get_template_directory_uri() . '/style.css', array(), '1.0' );

		$scripts = array(
		  	array(
		  	    'handler' => 'resizer',
		  	    'script'  => 'assets/js/sticky/ResizeSensor.js',
		  	),
		  	array(
		  	    'handler' => 'sticky',
		  	    'script'  => 'assets/js/sticky/theia-sticky-sidebar.js',
		  	    'version' => '1.7.0'
		  	),
		  	array(
		  	    'handler' => 'newslist-mag',
		  	    'script'  => 'assets/js/newslist-mag-script.js',
		  	    'version' => '1.0',
		  	    'minified' => false,
		  	    'localize' => array(
		  	    	'key'  => 'NEWSLISTMAG',
		  	    	'data' => array(
						'heroNewsAutoPlay'   => newslist_get( 'hero-news-autoplay' ) == true ? 1 : 0,
						'heroNewsShowArrows' => newslist_get( 'hero-news-show-arrows' ) == true ? 1 : 0
					)
		  	    )
		  	)
		);

		Newslist_Helper::enqueue( $scripts );
	}

	public function disable_inner_banner( $disable ){

		if( is_home() ){
			$disable = true;
		}
		return $disable;
	}
	public function hero_news(){
		if( is_home() || is_front_page() ){
			get_template_part( 'hero', 'news' );
		}
	}

	public static function header_advertisement( $args ){
		$banner_image = $args[ 'image' ]; 
		$banner_new_tab = $args[ 'new-tab' ];
		if( $banner_new_tab) :
			$style = 'target="_blank" ';
		else :
			$style = '';
		endif;
		if( '' != $banner_image) : ?>
			<div class ="newslist-header-banner-image">		
				<?php $alt = get_post_meta( $banner_image, '_wp_attachment_image_alt', true );  ?>		
				<a href ="<?php echo esc_url( $args[ 'link' ] ); ?>" <?php echo  $style?>>
					<span class="screen-reader-text"><?php esc_html__('Banner Image', 'newslist-mag' ); ?></span>
					<img src="<?php echo esc_url( $banner_image ); ?>" alt="<?php echo esc_attr( $alt ); ?>">	
				</a> 		
			</div> 
		<?php endif;
	}
}

new Newslist_Mag();