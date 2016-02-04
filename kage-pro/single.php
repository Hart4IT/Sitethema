<?php
/**
 * The template for displaying all pages.
 *
 * @package Kage
 */
 get_header(); ?>
 <?php while (have_posts()) : the_post(); ?>
 		<div id="content">
			<div class="pagetitle pagetitle_blog">
				<div class="container">
					<div class="gutter clearfix">
						<h5><?php _e( 'Blog', 'kage' ); ?></h5>
					</div>
				</div>	
			</div>
			<div class="container">
				<div class="sidebar_right clearfix">
					<section class="pagesection">
						<div class="gutter">
							<article class="singlepost clearfix">
								<h2><?php if(get_the_title($post->ID)) { the_title(); } else { the_time( get_option( 'date_format' ) ); } ?></h2>
								<hr />
								<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
							     	<?php the_post_thumbnail($post->ID, 'featured'); ?>
								<?php endif; ?>
								<p class="posted"><?php _e( 'Posted on', 'kage' ); ?> <?php the_time( get_option( 'date_format' ) ); ?></p>
								<?php the_content(); ?>
								<div class="clear"></div>
								<p class="meta_tags"><?php _e( 'Categories:', 'kage' ); ?> <?php the_category(', '); ?></p>
								<p class="meta_tags"><?php the_tags(); ?></p>
								<div class="meta_bar clearfix">
									<div class="comments_count">
										<?php comments_popup_link('<span class="icon comments"></span> No Comments', '<span class="icon comments"></span> 1 Comment', '<span class="icon comments"></span> % Comments', 'comment-link'); ?>
									</div>
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
								<p><?php posts_nav_link(); ?></p>
								<?php comments_template(); ?>
								<?php kage_paginate_page(); ?> 
							</article>
						</div>
					</section>
					<?php  get_sidebar(); ?>
				</div>
			</div>
		</div>
<?php endwhile; ?>		
<?php get_footer(); ?>