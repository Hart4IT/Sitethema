<?php 
/**
 * Template Name: Contact
 * 
 * @package Kasa
 */
 get_header(); ?>
 		<div id="content">
			<div class="pagetitle pagetitle_contact">
				<div class="container">
					<div class="gutter clearfix">
						<h5><?php the_title(); ?></h5>
					</div>
				</div>	
			</div>
			<div class="container">
				<div class="sidebar_right contact_section clearfix">
					<div class="contact_form">
						<div class="gutter">
							<?php the_content(); ?>
						</div>
					</div>
					<div class="pagesidebar">
						<div class="gutter">
						    <?php dynamic_sidebar('sidebar-contect'); ?>
						</div>
					</div>
				</div>
				<div class="gutter">
					<hr class="separe" />
				</div>
				<div class="map_section clearfix">
				    <?php if ( of_get_option('information_box_title') ) { ?>
					<div class="leftside">
						<div class="gutter">
							<h3><?php echo esc_html(of_get_option('information_box_title')); ?></h3>
							<hr />
							<p><?php echo of_get_option('information_box_content'); ?></p>
						</div>
					</div>
					<?php } ?>
					<div class="<?php if (of_get_option('information_box_title')) { echo 'rightside'; }  ?>">
						<div class="gutter">
							<?php if ( of_get_option('shortcode_map') ) { ?>
								<div class="gmapcontact">
									<?php echo do_shortcode(of_get_option('shortcode_map')); ?>
								</div> 
							<?php } ?>
						</div>
					</div>
				</div> 
			</div>
		</div>
<?php get_footer(); ?>