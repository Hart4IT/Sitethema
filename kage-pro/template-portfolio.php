<?php 
/**
 * Template Name: Portfolio
 * 
 * @package Kage
 */
 get_header(); ?>
		<div id="content">
			<div class="pagetitle pagetitle_portfolio">
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
				<div class="portfolio_section columnwrapp clearfix">
					<?php 
					$works_list = kage_get_list_works();
					while ($works_list->have_posts() ) {
					$works_list->the_post();
					$thum = get_post_meta($post->ID, '_thumbnail_id', true);
					?>
							<div class="column3">
								<div class="gutter">
									<div class="portfolio_single">
										<div class="img_box">
											<div class="inner">
													<?php if (strlen($thum)>0) { ?><img class="fullwidth" src="<?php echo get_bloginfo('url') . '/wp-content/uploads/'.get_post_meta($thum, '_wp_attached_file', true); ?>" alt="" /><?php } ?>
												<div class="overlay">
													<a class="icon_url" href="<?php the_permalink(); ?>"></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
				   <?php } ?>
				</div>
			</div>
		</div>
<?php get_footer(); ?>