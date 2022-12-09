<?php
//about theme info
add_action( 'admin_menu', 'fitness_crossfit_gettingstarted' );
function fitness_crossfit_gettingstarted() {    	
	add_theme_page( esc_html__('About Fitness Crossfit', 'fitness-crossfit'), esc_html__('About Fitness Crossfit', 'fitness-crossfit'), 'edit_theme_options', 'fitness_crossfit_guide', 'fitness_crossfit_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function fitness_crossfit_admin_theme_style() {
   wp_enqueue_style('fitness-crossfit-custom-admin-style', esc_url(get_theme_file_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('fitness-crossfit-tabs', esc_url(get_theme_file_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'fitness_crossfit_admin_theme_style');

//guidline for about theme
function fitness_crossfit_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'fitness-crossfit' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Fitness Crossfit Theme', 'fitness-crossfit' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','fitness-crossfit'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Fitness Crossfitat 20% Discount','fitness-crossfit'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','fitness-crossfit'); ?> ( <span><?php esc_html_e('vwpro20','fitness-crossfit'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( FITNESS_CROSSFIT_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'fitness-crossfit' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
		  	<button class="tablinks" onclick="fitness_crossfit_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'fitness-crossfit' ); ?></button>
		  	<button class="tablinks" onclick="fitness_crossfit_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'fitness-crossfit' ); ?></button>
		  	<button class="tablinks" onclick="fitness_crossfit_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'fitness-crossfit' ); ?></button>
		  	<button class="tablinks" onclick="fitness_crossfit_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'fitness-crossfit' ); ?></button>
		</div>
		
		<?php
			$fitness_crossfit_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$fitness_crossfit_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Fitness_Crossfit_Plugin_Activation_Settings::get_instance();
				$fitness_crossfit_actions = $plugin_ins->recommended_actions;
				?>
				<div class="fitness-crossfit-recommended-plugins">
				    <div class="fitness-crossfit-action-list">
				        <?php if ($fitness_crossfit_actions): foreach ($fitness_crossfit_actions as $key => $fitness_crossfit_actionValue): ?>
				                <div class="fitness-crossfit-action" id="<?php echo esc_attr($fitness_crossfit_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($fitness_crossfit_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($fitness_crossfit_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($fitness_crossfit_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','fitness-crossfit'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($fitness_crossfit_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'fitness-crossfit' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('Fitness Crossfit is theme for sports, Gym Training, multi martial arts MMA, bodybuilding, fitness trainers, cardio trainers,  gym,Fitness centers, indoor and outdoor exercise class, workout, yoga etc. The theme is built on bootstrap framework. If you opt to use Gutnberg the theme can be setup very easily using Gutenberg.','fitness-crossfit'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'fitness-crossfit' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'fitness-crossfit' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( FITNESS_CROSSFIT_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'fitness-crossfit' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'fitness-crossfit'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'fitness-crossfit'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'fitness-crossfit'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'fitness-crossfit'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'fitness-crossfit'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( FITNESS_CROSSFIT_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'fitness-crossfit'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'fitness-crossfit'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'fitness-crossfit'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( FITNESS_CROSSFIT_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'fitness-crossfit'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'fitness-crossfit' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','fitness-crossfit'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_gym_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','fitness-crossfit'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_gym_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Settings','fitness-crossfit'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_gym_about_section') ); ?>" target="_blank"><?php esc_html_e('About Us','fitness-crossfit'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','fitness-crossfit'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','fitness-crossfit'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_gym_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','fitness-crossfit'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_gym_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','fitness-crossfit'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_gym_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','fitness-crossfit'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_gym_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','fitness-crossfit'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','fitness-crossfit'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','fitness-crossfit'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','fitness-crossfit'); ?></span><?php esc_html_e(' Go to ','fitness-crossfit'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','fitness-crossfit'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','fitness-crossfit'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','fitness-crossfit'); ?></span><?php esc_html_e(' Go to ','fitness-crossfit'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','fitness-crossfit'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','fitness-crossfit'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','fitness-crossfit'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-fitness-crossfit/" target="_blank"><?php esc_html_e('Documentation','fitness-crossfit'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>	

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Fitness_Crossfit_Plugin_Activation_Settings::get_instance();
			$fitness_crossfit_actions = $plugin_ins->recommended_actions;
			?>
				<div class="fitness-crossfit-recommended-plugins">
				    <div class="fitness-crossfit-action-list">
				        <?php if ($fitness_crossfit_actions): foreach ($fitness_crossfit_actions as $key => $fitness_crossfit_actionValue): ?>
				                <div class="fitness-crossfit-action" id="<?php echo esc_attr($fitness_crossfit_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($fitness_crossfit_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($fitness_crossfit_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($fitness_crossfit_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'fitness-crossfit' ); ?></h3>
				<hr class="h3hr">
				<div class="fitness-crossfit-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','fitness-crossfit'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
						<h3><?php esc_html_e( 'Link to customizer', 'fitness-crossfit' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','fitness-crossfit'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=fitness_crossfit_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','fitness-crossfit'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','fitness-crossfit'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_gym_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','fitness-crossfit'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_gym_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','fitness-crossfit'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_gym_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','fitness-crossfit'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_gym_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','fitness-crossfit'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','fitness-crossfit'); ?></a>
								</div> 
							</div>
						</div>
				</div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'fitness-crossfit' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Gym WordPress theme is a theme of premium level and is in great demand since its inception in the market with acclaimed reviews from the global clients. It is a preferred choice for fitness, yoga, personal trainers, health experts, boot camps, weight loss, clubs, physiotherapy, wellness, workout, lifestyle, aerobics, boxing, sports, cross fit, spa, massage center, cardio, meditation, advisors. Being Gutenberg ready as well as SEO friendly, it has an upper edge in the market than its competitors. Gym WordPress theme is responsive as well as multifunctional making it a special choice for the gyms, fitness centers, yoga classes, weight loss centers, personal trainers, aerobics and workout centers. Use it for spa, health and wellness center, physiotherapy, health consultancy, and other fitness related sites. It is user-friendly with the personalization options as well as CTA [call to action] making it a special choice for the aerobics as well as workout centers.','fitness-crossfit'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( FITNESS_CROSSFIT_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'fitness-crossfit'); ?></a>
					<a href="<?php echo esc_url( FITNESS_CROSSFIT_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'fitness-crossfit'); ?></a>
					<a href="<?php echo esc_url( FITNESS_CROSSFIT_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'fitness-crossfit'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'fitness-crossfit' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'fitness-crossfit'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'fitness-crossfit'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'fitness-crossfit'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'fitness-crossfit'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'fitness-crossfit'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'fitness-crossfit'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'fitness-crossfit'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'fitness-crossfit'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'fitness-crossfit'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'fitness-crossfit'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'fitness-crossfit'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'fitness-crossfit'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'fitness-crossfit'); ?></td>
								<td class="table-img"><?php esc_html_e('13', 'fitness-crossfit'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'fitness-crossfit'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'fitness-crossfit'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'fitness-crossfit'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'fitness-crossfit'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'fitness-crossfit'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'fitness-crossfit'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'fitness-crossfit'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( FITNESS_CROSSFIT_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'fitness-crossfit'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'fitness-crossfit'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'fitness-crossfit'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( FITNESS_CROSSFIT_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'fitness-crossfit'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'fitness-crossfit'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'fitness-crossfit'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( FITNESS_CROSSFIT_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'fitness-crossfit'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'fitness-crossfit'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'fitness-crossfit'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( FITNESS_CROSSFIT_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'fitness-crossfit'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'fitness-crossfit'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'fitness-crossfit'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( FITNESS_CROSSFIT_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','fitness-crossfit'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'fitness-crossfit'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'fitness-crossfit'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( FITNESS_CROSSFIT_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'fitness-crossfit'); ?></a>
				</div>
		  	</div>
		</div>

	</div>
</div>
<?php } ?>