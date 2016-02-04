<?php 
/**
 * Template Name: Home Page
 * 
 * @package Kage 
 */
get_header(); ?>
	   <div id="content">
	        <?php if ( of_get_option('slider_shotcode') ) { ?>
			<div class="mainslider">
				<?php echo do_shortcode(of_get_option('slider_shotcode')); ?>
			</div> 
			<?php } ?>
			<div class="services_block">
				<div class="container">
					<div class="gutter">
						<h1><span><?php echo of_get_option('top_title'); ?></span></h1>
						<div class="services_slider flexslider">
							<ul class="slides">
								<?php 
								$services_testimonials = kage_get_list_services(-1);
								while ( $services_testimonials->have_posts() ) {
								$services_testimonials->the_post();
								$thum = get_post_meta($post->ID, 'image_home_page', true);
								$shot_description = get_post_meta($post->ID, 'shot_description_home_page', true);
								?>
									<li>
										<a class="service_item" href="<?php the_permalink(); ?>">
										    <?php if(strlen($thum)>0) { ?>
											<span class="service_icon">
												<img class="default fullwidth" src="<?php echo get_bloginfo('url') . '/wp-content/uploads/'.get_post_meta($thum, '_wp_attached_file', true); ?>" alt="" />
												<img class="hover fullwidth" src="<?php echo get_bloginfo('url') . '/wp-content/uploads/'.get_post_meta($thum, '_wp_attached_file', true); ?>" alt="" />
											</span>
											<?php } ?>
											<span class="service_title"><?php the_title(); ?></span>
											<?php echo $shot_description; ?>
										</a>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div> <!--  END services_block  -->
			<div class="welcome_block">
			    <?php if ( of_get_option('blue_title') ) { ?>
				<div class="advertisement_block">
					<div class="container">
						<div class="gutter">
							<div class="advertisement">
								<table>
									<tbody>
										<tr>
											<td class="tdw1">
												<p class="adv_title"><?php echo esc_html(of_get_option('blue_title')); ?></p>
											</td>
											<td class="tdw2">
												<p><?php echo esc_html(of_get_option('blue_content')); ?></p>
											</td>
											<td class="tdw3">
												<a class="adv_button" href="<?php echo esc_url(of_get_option('blue_button_link')); ?>"><?php echo esc_html(of_get_option('blue_button_text')); ?></a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if ( of_get_option('welcome_title') ) { ?>
				<div class="container">
					<div class="columnwrapp clearfix">
					    <?php if ( of_get_option('welcome_image') ) { ?>
						<div class="column2">						
							<div class="gutter">
								<img class="fullwidth" src="<?php echo esc_url(of_get_option('welcome_image')); ?>" alt="" />
							</div>
						</div>
						<?php } ?>
						<div class="column2">						
							<div class="gutter">
								<div class="welcome_text">
									<h4><span><?php echo esc_html(of_get_option('welcome_title')); ?></span> <?php echo esc_html(of_get_option('welcome_title2')); ?></h4>
									<p><?php echo esc_html(of_get_option('welcome_content')); ?></p>
									<a class="button" href="<?php echo esc_url(of_get_option('welcome_button_link')); ?>"><?php echo esc_html(of_get_option('welcome_button_text')); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="portfolio_block">
				<div class="container">
					<div class="gutter">
						<h1><span><?php echo esc_html(of_get_option('title_area_2')); ?></span></h1>
					</div>
					<div class="portfolio_slider flexslider">
						<ul class="slides">
							<?php 
							$works_list = kage_get_list_works();
							while ($works_list->have_posts() ) {
							$works_list->the_post();
							$thum = get_post_meta($post->ID, '_thumbnail_id', true);
							?>
								<li>
									<div class="gutter">
									    <?php if (strlen($thum)>0) { ?>
										<div class="img_box">
											<div class="inner">
												<img class="fullwidth" src="<?php echo get_bloginfo('url') . '/wp-content/uploads/'.get_post_meta($thum, '_wp_attached_file', true); ?>" alt="" />
												<div class="overlay">
													<a class="icon_url" href="<?php the_permalink(); ?>"></a>
												</div>
											</div>
										</div>
										<?php } ?>
										<a class="btn" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</div>
								</li>
						   <?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="testimonial_block">
				<div class="container">
					<div class="testimonial_slider flexslider">
						<ul class="slides">
							<?php 
								$list_testimonials = kage_get_list_testimonials();
								while ( $list_testimonials->have_posts() ) {
								$list_testimonials->the_post();
							?>
							<li>
								<p class="quote"><?php echo get_the_content(); ?></p>
								<p class="testimonial_auth"><?php the_title(); ?></p>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
<?php get_footer(); ?>