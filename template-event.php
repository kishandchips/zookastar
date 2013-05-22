<?php
/**
 * The template for displaying the event page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package zookastar
 * @since zookastar 1.0
 *
 *
 * Template Name: The Event
 *
 */

get_header(); ?>

<div id="template-event" class="container">
	<?php while ( have_posts() ) : the_post(); ?>
	<div id="content" <?php post_class('content-area'); ?>>
		<?php if(!$post->post_content == ''): ?>
		<div class="page-content">
			<?php the_content(); ?>
		</div>
		<?php endif; ?>
		<?php if ( get_field('content')) :?>
			<?php $i = 0; ?>
			<?php while (the_flexible_field('content')) : ?>
			<?php 
				$layout = get_row_layout();
			?>
				<div class="row <?php if($i > 0) echo 'border-top';  ?>">
					<div class="inner clearfix">
					<?php if($layout == 'one_column'): ?>
						<div class="break-on-mobile span ten omega" style="<?php the_sub_field('css_column_one'); ?>">
							<?php the_sub_field('content_column_one'); ?>
						</div>
					<?php endif; ?>
					<?php if($layout == 'two_columns'): ?>
						<div class="break-on-mobile span five column-one equal-height" style="<?php the_sub_field('css_column_one'); ?>">
							<?php the_sub_field('content_column_one'); ?>
						</div>
						<div class="break-on-mobile span five column-two equal-height" style="<?php the_sub_field('css_column_two'); ?>">
							<?php the_sub_field('content_column_two'); ?>
						</div>
					<?php endif; ?>
					<?php if($layout == 'three_columns'): ?>
						<div class="break-on-mobile span one-third column-one" style="<?php the_sub_field('css_column_one'); ?>">
							<?php the_sub_field('content_column_one'); ?>
						</div>
						<div class="break-on-mobile span one-third column-two " style="<?php the_sub_field('css_column_two'); ?>">
							<?php the_sub_field('content_column_two'); ?>
						</div>
						<div class="break-on-mobile span one-third column-three" style="<?php the_sub_field('css_column_three'); ?>">
							<?php the_sub_field('content_column_three'); ?>
						</div>
					<?php endif; ?>
					</div>
				</div>
			<?php $i++; ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<?php if ( get_field('zones')) :?>	
	<div id="zones" class="content-area">
		<header class="zones-header">
			<div class="inner clearfix">
				<h3 class="span title uppercase no-margin"><?php _e("The Zones!", 'zookastar'); ?></h3>
			</div>
		</header>
		<?php $i = 0; ?>
		<?php while (the_repeater_field('zones')) : ?>
			<div class="row <?php if($i > 0) echo 'border-top';  ?>">
				<div class="inner clearfix">
					<div class="break-on-mobile span three column-one image">
						<?php 
							$image_id = get_sub_field('image_id');
							$image = wp_get_attachment_image_src($image_id, 'custom_thumbnail_square');   
						?>
						<div class="thumbnail">
							<img src="<?php echo $image[0]; ?>" class="scale" />
						</div>
					</div>
					<div class="break-on-mobile span five column-two">
						<h4 class="title uppercase no-margin"><?php the_sub_field('title') ?></h4>
						<div class="content">
							<?php the_sub_field('content'); ?>
						</div>
					</div>
				</div>
			</div>
		<?php $i++; ?>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
	<?php endwhile;?>

</div><!-- #page -->
<?php get_footer(); ?>