<?php 
/**
 * Template Name: Services
 * 
 * @package Kage 
 */
 get_header(); ?>
 		<div id="content">
		  <?php while (have_posts()) : the_post(); ?>
			<div class="pagetitle pagetitle_services">
				<div class="container">
					<div class="gutter clearfix">
						<h5><?php the_title(); ?></h5>
					</div>
				</div>	
			</div>
			<div class="container">
				<div class="gutter">
					<div class="page_text">
						<?php the_content(); ?>
					</div>
					<hr class="space35" />
				</div>
				<?php endwhile; ?>
				<div class="services_section columnwrapp clearfix">
					<?php 
					$services_testimonials = kage_get_list_services(-1);
					while ( $services_testimonials->have_posts() ) {
					$services_testimonials->the_post();
					$thum = get_post_meta($post->ID, 'image_service_page', true);
					$shot_description = get_post_meta($post->ID, 'shot_description', true);
					?>
						<div class="column3">
							<div class="gutter">
								<div class="service_single">
								    <?php if (strlen($thum)>0) { ?>
									<div class="img_box">
										<div class="inner">
											<a href="<?php the_permalink(); ?>"><img class="fullwidth" src="<?php echo get_bloginfo('url') . '/wp-content/uploads/'.get_post_meta($thum, '_wp_attached_file', true); ?>" alt="" /></a>
										</div>
									</div>
									<?php } ?>
									<div class="service_details">
										<p class="bold_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
										<p><?php echo $shot_description; ?></p>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
<?php get_footer(); ?>