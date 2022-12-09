<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since Dietitian Lite 1.0
	 *
	 * @return void
	 */
	function dietitian_lite_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'dietitian-lite-columns-overlap',
				'label' => esc_html__( 'Overlap', 'dietitian-lite' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'dietitian-lite-border',
				'label' => esc_html__( 'Borders', 'dietitian-lite' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'dietitian-lite-border',
				'label' => esc_html__( 'Borders', 'dietitian-lite' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'dietitian-lite-border',
				'label' => esc_html__( 'Borders', 'dietitian-lite' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'dietitian-lite-image-frame',
				'label' => esc_html__( 'Frame', 'dietitian-lite' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'dietitian-lite-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'dietitian-lite' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'dietitian-lite-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'dietitian-lite' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'dietitian-lite-border',
				'label' => esc_html__( 'Borders', 'dietitian-lite' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'dietitian-lite-separator-thick',
				'label' => esc_html__( 'Thick', 'dietitian-lite' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'dietitian-lite-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'dietitian-lite' ),
			)
		);
	}
	add_action( 'init', 'dietitian_lite_register_block_styles' );
}
