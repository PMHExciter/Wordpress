<div class="entry-meta">

	<span class="entry-category"><?php blogshare_first_category(); ?></span>
	<span class="entry-author"><?php esc_html_e('By', 'blogshare'); ?> <?php esc_url( the_author_posts_link() ); ?></span>
	<span class="sep">&middot;</span>	
	<span class="entry-date"><?php echo get_the_date(); ?></span>
	<span class="sep">&middot;</span>
	<span class='entry-comment'><?php comments_popup_link( __('0 Comment','blogshare'), __('1 Comment','blogshare'), __('% Comments','blogshare'), 'comments-link', __('Comments off','blogshare')); ?></span>
	
</div><!-- .entry-meta -->