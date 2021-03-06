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
 * Template Name: Competition
 *
 */

get_header(); ?>

<div id="template-competition" class="container">
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
	<?php endwhile;?>

</div><!-- #page -->
<?php get_footer(); ?>