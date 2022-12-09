<?php 
    $cat_id = newslist_get( 'hero-news-category' );

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => newslist_get( 'hero-news-posts-per-page' ),
        'ignore_sticky_posts' => 1,
        'orderby' => 'date',
        'order'   => 'DESC'
    );

    if( $cat_id > 0 ){
        $args[ 'cat' ] = $cat_id;
    }
    
    $query = new WP_Query( $args );

    if( $query->have_posts() ):
?>
<div class="newslist-theme-slider-main-wrap ">
    <?php 
        while( $query->have_posts() ):
            $query->the_post();
            $id = get_the_ID();
    ?>
        <div class="newslist-blog-post-slide-item">
            <div class="newslist-blog-post-slide-wrap" style="background-image: url( '<?php echo esc_url( get_the_post_thumbnail_url( $id, 'full' ) ); ?>') , url('<?php echo esc_url( Newslist_Helper::get_theme_uri( 'assets/img/default-image.jpg' ) ); ?>' )"></div>
            <div class="newslist-blog-post-slide-content">
                <div class="newslist-blog-post-slide-content-inner">
                    <?php Newslist_Helper::the_category(); ?>
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="post-meta-items">
                        <div class="author-name">
                            <?php 
                                $author_id = get_the_author_meta('ID');
                                echo get_avatar( $author_id, 21 );
                                echo sprintf(
                                    '<a href="%1$s" title="%2$s" rel="author external">%3$s</a>',
                                    esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                                    /* translators: %s: Author's display name. */
                                    esc_attr( sprintf( esc_html__( 'Visit %s&#8217;s website', 'newslist-mag' ), get_the_author() ) ),
                                    get_the_author()
                                );
                            ?>
                        </div>                   
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php 
    endif;