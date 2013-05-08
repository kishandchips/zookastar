<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package zookastar
 * @since zookastar 1.0
 */

get_header(); ?>

<div id="page" class="clearfix">
	<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if($post->content == ''): ?>
		<div class="page-content container">
			<div class="inner">
				<?php the_content(); ?>
			</div>
		</div>
		<?php endif; ?>
		<?php if ( get_field('content')) :?>
			<?php $i = 0; ?>
			<?php while (the_flexible_field('content')) : ?>
			<?php 
				$layout = get_row_layout();
				$background_image_id = get_sub_field('background_image_id');
				$background_image = wp_get_attachment_image_src($background_image_id, 'full');
			?>
				<div class="row" style="<?php if($background_image) :?>background-image: url(<?php echo $background_image[0]; ?>);<?php endif; ?> background-color: <?php the_sub_field('background_color') ?>; color: <?php the_sub_field('text_color') ?>;">
					<div class="container">
					<?php if($layout == 'one_column'): ?>
						<div class="span ten">
							<?php the_sub_field('content'); ?>
						</div>
					<?php endif; ?>
					<?php if($layout == 'two_columns'): ?>
						<div class="span five column-one" >
							<div class="inner"><?php the_sub_field('content_first_column'); ?></div>
						</div>
						<div class="span five column-two" >
							<div class="inner"><?php the_sub_field('content_second_column'); ?></div>
						</div>
					<?php endif; ?>
					<?php if($layout == 'three_columns'): ?>
						<div class="span one-third column-one" >
							<div class="inner"><?php the_sub_field('content_first_column'); ?></div>
						</div>
						<div class="span one-third column-two" >
							<div class="inner"><?php the_sub_field('content_second_column'); ?></div>
						</div>
						<div class="span one-third column-three" >
							<div class="inner"><?php the_sub_field('content_third_column'); ?></div>
						</div>
					<?php endif; ?>
					</div>
				</div>
			<?php $i++; ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</article><!-- #post-<?php the_ID(); ?> -->

	<?php endwhile; // end of the loop. ?>

</div><!-- #page -->
<?php get_footer(); ?>