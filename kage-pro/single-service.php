<?php
/**
 * The template for displaying all pages.
 *
 * @package Kage
 */
 get_header(); ?>
 <?php 
 while (have_posts()) : the_post(); 
 $sidebar = get_post_meta($post->ID, 'sidebar', true);
 if($sidebar==1) { $sidebarpart = 'sidebar_right'; }
 else if($sidebar==2) { $sidebarpart = 'sidebar_left'; }
 else { $sidebarpart = ''; }
 ?>
  		<div id="content">
			<div class="pagetitle pagetitle_blog">
				<div class="container">
					<div class="gutter clearfix">
						<h5><?php the_title(); ?></h5>
					</div>
				</div>	
			</div>
			<div class="container">
				<div class="<?php echo $sidebarpart; ?> clearfix">
					<section class="pagesection <?php if($sidebar==0) { echo 'fullwidthpage'; } ?>">
						<div class="gutter">
							<article class="singlepost clearfix">
								<?php the_content(); ?>
								<div class="clear"></div>
								<div class="meta_bar clearfix">
									<div class="share_block">
										<span class="label_share"><?php _e( 'Share:', 'kage' ); ?></span>
										<ul class="share_social">
											<li><a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" target="_blank"><img alt="" src="<?php echo get_template_directory_uri(); ?>/images/share/1.png"></a></li>
											<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><img alt="" src="<?php echo get_template_directory_uri(); ?>/images/share/2.png"></a></li>
											<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank"><img alt="" src="<?php echo get_template_directory_uri(); ?>/images/share/4.png"></a></li>
											<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><img alt="" src="<?php echo get_template_directory_uri(); ?>/images/share/6.png"></a></li>
										</ul>
									</div>	
								</div>
								<hr class="space25">
							</article>
						</div>

					</section>
					<?php if($sidebar!=0) { ?>
					<div class="pagesidebar">
						<div class="gutter">
							<?php dynamic_sidebar('sidebar-services'); ?>
						</div>
					</div> 
					<?php } ?>
				</div>
			</div>
		</div>
<?php endwhile; ?>		
<?php get_footer(); ?>