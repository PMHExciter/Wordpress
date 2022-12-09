<?php
/**
 * The template for displaying home pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Adore Business
 */

get_header(); ?>
     <div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( get_header_image() ) ; ?>');">
        <div class="overlay"></div>
        <div class="wrapper">           
            <header class="page-header ">
                <?php
                    the_archive_title( '<h2 class="page-title">', '</h2>' );
                    the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </header><!-- .page-header -->
            <?php  
            $breadcrumb_enable = get_theme_mod( 'adore_business_breadcrumb_enable', true );
            if ( $breadcrumb_enable ) : 
                ?>
                <div id="breadcrumb-list">
                    <?php echo adore_business_breadcrumb( array( 'show_on_front'   => false, 'show_browse' => false ) ); ?>  
                </div><!-- #breadcrumb-list -->
            <?php endif; ?>
        </div><!-- #page-header -->
    </div><!-- #page-header -->

    <div id="content-wrapper" class="pt paddingt-b">
        <div class="wrapper">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <?php 
                    $column_layout  = get_theme_mod( 'adore_business_archive_column_layout', 'col-2' ); 
                    ?>
                    <div id="infinite-post-wrap" class="blog-post-wrapper grid-layout <?php echo esc_attr( $column_layout ); ?> clear">

                        <?php
                        if ( have_posts() ) :

                            /* Start the Loop */
                            while ( have_posts() ) : the_post();

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content', get_post_format() );

                            endwhile;

                            wp_reset_postdata();

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif; ?>
                    </div><!-- .posts-wrapper -->
                    <?php adore_business_posts_pagination(); ?>
                </main><!-- #main -->
            </div><!-- #primary -->
            
            <?php get_sidebar(); ?>

        </div>
    </div>

<?php
get_footer();