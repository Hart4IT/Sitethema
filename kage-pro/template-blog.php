<?php 
/**
 * Template Name: Blog
 * 
 * @package Kage 
 */
get_header(); ?>
		<div id="content">
			<div class="pagetitle pagetitle_blog">
				<div class="container">
					<div class="gutter clearfix">
						<h5><?php the_title(); ?></h5>
					</div>
				</div>	
			</div> <!--  END pagetitle  -->
			<div class="container">
				<div class="sidebar_right clearfix">
					<section class="pagesection">
						<div class="gutter">
							<?php 
							$list_posts = kage_get_list_posts();
							while ( $list_posts->have_posts() ) {
								$list_posts->the_post();
								get_template_part( 'content', 'posts'); 								
							} 
							?>
							<p class="simplepag">
									<span class="prev"><?php next_posts_link(__('Previous Posts', 'kage')) ?></span>
									<span class="next"><?php previous_posts_link(__('Next posts', 'kage')) ?></span>
							</p>
						</div>
					</section>
					<?php  get_sidebar(); ?>
				</div>
			</div>
		</div>
<?php get_footer(); ?>