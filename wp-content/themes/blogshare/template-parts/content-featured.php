<?php		
	if (!get_query_var('paged')) {	
?>

<?php		
	$args = array( 
	    'posts_per_page' => 3,
		'ignore_sticky_posts' => 1,
		'post__not_in' => get_option( 'sticky_posts' ),	
		'meta_query' => array(
	        array(
	        	'key' => 'blogshare-featured',
	            'value' => 'yes'
	        )
	    )
	);  

	$featured_posts = new WP_Query($args);
	if ( $featured_posts->have_posts() ) {	
?>

	<div id="featured-content">
		<ul class="owl-carousel owl-theme">

		<?php
			// The Loop
			while ( $featured_posts->have_posts() ) : $featured_posts->the_post();
		?>	

		<li class="featured-slide hentry">

			<a class="thumbnail-link" href="<?php the_permalink(); ?>">
				
				<div class="thumbnail-wrap">
					<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('blogshare_featured_thumb');  
					} else {
						echo '<img src="' . esc_url( get_template_directory_uri() ). '/assets/img/no-featured.png" alt="" />';
					}
					?>
				</div><!-- .thumbnail-wrap -->
				<div class="gradient">
				</div>
			</a>

			<div class="entry-category">
				<?php blogshare_first_category(); ?>
			</div>		
				
			<div class="entry-header clear">	
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			</div><!-- .entry-header -->

		</li><!-- .featured-slide .hentry -->

		<?php
			endwhile;
		?>

		</ul><!-- .owl-carousel -->

	</div><!-- #featured-content -->

<?php
	}
	wp_reset_postdata();
}	

?>

<?php		
	if (!get_query_var('paged')) {	
?>

<?php		
	$args = array( 
	    'posts_per_page' => 3,
	    'offset' => 3,
		'ignore_sticky_posts' => 1,
		'post__not_in' => get_option( 'sticky_posts' ),	
		'meta_query' => array(
	        array(
	        	'key' => 'blogshare-featured',
	            'value' => 'yes'
	        )
	    )
	);  

	$featured_posts = new WP_Query($args);
	if ( $featured_posts->have_posts() ) {	
?>

	<div id="featured-grid" class="clear">

		<?php
			// The Loop
			while ( $featured_posts->have_posts() ) : $featured_posts->the_post();
		?>	

		<div class="ht_grid_1_3">
			<div class="hentry">

				<a class="thumbnail-link" href="<?php the_permalink(); ?>">
					
					<div class="thumbnail-wrap">
						<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('blogshare_featured_grid_thumb');  
						} else {
							echo '<img src="' . esc_url( get_template_directory_uri() ). '/assets/img/no-featured.png" alt="" />';
						}
						?>
					</div><!-- .thumbnail-wrap -->
				</a>

				<div class="entry-category">
					<?php blogshare_first_category(); ?>
				</div>		
					
				<div class="entry-header clear">	
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</div><!-- .entry-header -->

			</div><!-- .hentry -->
		</div>

		<?php
			endwhile;
		?>


	</div><!-- #featured-grid -->

<?php
	}
	wp_reset_postdata();
}	

?>