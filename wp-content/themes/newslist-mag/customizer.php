<?php 
class Newslist_Mag_Customizer extends Newslist_Helper{

	public function __construct(){

		add_filter( self::fn_prefix( 'customizer_after_set' ), array( $this, 'add_fields' ) );
		add_filter( self::fn_prefix( 'customizer_get_setting_arg' ), array( $this, 'modify_customizer_setting' ), 10, 2 );

		Newslist_Customizer::set(array(
		    # Theme Options
		    'panel' => 'panel',
		    # Theme Options > Page Options > Settings
		    'section' => array(
		        'id'    => 'hero-news-panel',
		        'title' => esc_html__( 'Hero News', 'newslist-mag' ),
		    ),
		    'fields' => array(
		        array(
		            'id'      => 'hero-news-category',
		            'label'   =>  esc_html__( 'Show Category', 'newslist-mag' ),
		            'default' => 1,
		            'type'    => 'newslist-category-dropdown',
		        ),
		        array(
		        	'id'      => 'hero-news-autoplay',
		        	'label'   => esc_html__( 'Auto Play', 'newslist-mag' ),
		        	'default' => false,
		        	'type'    => 'toggle'
		        ),
		        array(
		        	'id'      => 'hero-news-show-arrows',
		        	'label'   => esc_html__( 'Show Arrows', 'newslist-mag' ),
		        	'default' => true,
		        	'type'    => 'toggle'
		        ),
		        array(
		        	'id'      => 'hero-news-posts-per-page',
		        	'label'   => esc_html__( 'Posts Per Page', 'newslist-mag' ),
		        	'default' => 5,
		        	'type'    => 'number'
		        ),
		    ),
		));
	}

	public function modify_customizer_setting( $args, $field ){

		if( self::with_prefix( 'primary-color' ) == $field[ 'id' ] ){
			$default = '#082964';
			Newslist_Customizer::$defaults[ $field[ 'id' ] ] = $default;
			$args[ 'default' ] = $default;
		}

		if( self::with_prefix( 'top-tag-bg-color' ) == $field[ 'id' ] || self::with_prefix( 'top-tag-bg-color-hover' ) == $field[ 'id' ] ){
			$default = '#0047c4';
			Newslist_Customizer::$defaults[ $field[ 'id' ] ] = $default;
			$args[ 'default' ] = $default;
		}

		return $args;
	}

	public function add_fields( $framework ){

		# adding fields under blog section
		$section = self::with_prefix( 'blog-section' );
		if( isset( $framework::$sections[ $section ] ) ){
			$this->add_field( array(
				'id'      => 'blog-enable-dummy-image',
				'label'   => esc_html__( 'Enable Dummy Image', 'newslist-mag' ),
				'type'    => 'toggle',
				'default' => true
			), $section, $framework );
		}

		# adding fields under banner section
		$section = self::with_prefix( 'banner' );

		if( isset( $framework::$sections[ $section ] ) ){

			$fields = array(
	            array(
	                'id'    => 'banner-image-2',
	                'label' => esc_html__( 'Header Banner Image 2',  'newslist-mag' ),
	                'type' => 'image',
	            ),
	            array(
	                'id'    => 'banner-link-2',
	                'label' => esc_html__( 'Add link to the image 2', 'newslist-mag' ),
	                'type' => 'text', 
	            ),
	            array(
	                'id'    => 'banner-link-open-newtab-2',
	                'label' => esc_html__( 'Open link in new tab 2', 'newslist-mag' ),
	                'type' => 'toggle',
	                'default'   => false
	            ),
	        );

	        foreach( $fields as $field ){
				$this->add_field( $field, $section, $framework );
	        }
		}

		# adding fields under top tags
		$section = self::with_prefix( 'top-tag-status' );
		if( isset( $framework::$sections[ $section ] ) ){
			$fields = array(
				array(
					'id' => 'top-tag-background',
					'label' => esc_html__( 'Section Background', 'newslist-mag' ),
					'type' => 'color-picker',
					'default' => '#e5e5e5',
					'active_callback' => 'abc_top_tag'
				)
			);

	        foreach( $fields as $field ){
				$this->add_field( $field, $section, $framework );
	        }
		}		

		# adding fields under Latest Post
		$section = self::with_prefix( 'latest-post' );
		if( isset( $framework::$sections[ $section ] ) ){
			
			$fields = array(
				array(
					'id' => 'latest-post-background',
					'label' => esc_html__( 'Latest Posts Background', 'newslist-mag' ),
					'type' => 'color-picker',
					'default' => '#d82926',
					'active_callback' => 'acb_top_stories'
				),
				array(
					'id' => 'latest-post-color',
					'label' => esc_html__( 'Latest Posts Color', 'newslist-mag' ),
					'type' => 'color-picker',
					'default' => '#ffffff',
					'active_callback' => 'acb_top_stories'
				),
				array(
					'id' => 'latest-post-hover-color',
					'label' => esc_html__( 'Latest Posts Hover Color', 'newslist-mag' ),
					'type' => 'color-picker',
					'default' => '#4169e1',
					'active_callback' => 'acb_top_stories'
				),
				array(
					'id'      	=> 'latest-post-margin',
					'label'   	=> esc_html__( 'Spacing (px)', 'newslist-mag' ),
					'type'    	=> 'dimensions',
					'description' => esc_html__( 'The value is in px. Defaults to 0px.', 'newslist-mag' ),
					'default' => array(
					    'desktop' => array(
					        'top'    => 0,
					        'right'  => 0,
					        'bottom' => 15,
					        'left'   => 0,
					    ),
					    'tablet' => array(
					        'top'    => 0,
					        'right'  => 0,
					        'bottom' => 15,
					        'left'   => 0,
					    ),
					    'mobile' => array(
					        'top'    => 0,
					        'right'  => 0,
					        'bottom' => 15,
					        'left'   => 0,
					    )
					),
					'dimension' => array(
					    'top',
					    'right',
					    'bottom',
					    'left'
					),
				)
			);

	        foreach( $fields as $field ){
				$this->add_field( $field, $section, $framework );
	        }
		}
	}

	public function add_field( $field, $section, $framework ){

		$field_id = $framework::with_prefix( $field['id'] );
		if( !isset( $framework::$settings[$field_id] ) ){
			# Store it for future
			# This variable might be useful for custom controls
			$framework::$fields[$field['type']][] = $field;

			if ( isset( $field['default'] ) ) {
				$framework::$defaults[$field_id] = $field['default'];
			}

			$field['id'] = $field_id;
			$framework::$settings[$field_id] = $framework::get_setting_arg( $field );
			$framework::$controls[$field_id] = array(
				'type'    => $field[ 'type' ],
				'label'   => $field[ 'label'],
				'section' => $section,
				'description' => isset( $field[ 'description' ] ) ? $field[ 'description' ] : ''
			);

			if( isset( $field[ 'active_callback' ] ) ){
				$framework::$controls[ $field_id ] [ 'active_callback' ] = self::fn_prefix( $field[ 'active_callback' ] );
			}

			if( isset( $field[ 'input_attrs' ] ) ){
				$framework::$controls[ $field_id ] [ 'input_attrs' ] = $field[ 'input_attrs' ];
			}
		}
	}
}

new Newslist_Mag_Customizer();