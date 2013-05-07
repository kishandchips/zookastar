<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package zookastar
 * @since zookastar 1.0
 */

get_header(); ?>
<section id="front-page" class="clearfix">

	<?php if ( get_field('slides')) :?>
	<div id="homepage-scroller" class="scroller" data-scroll-all="true" >
		<div class="scroller-mask">
			<div class="scroll-items-container">
				<?php $i = 0; ?>
				<?php while (the_flexible_field('slides')) : ?>
				<?php 
					if(get_row_layout() == 'slide'):
					$image_id = get_sub_field('image_id');
					$image = wp_get_attachment_image_src($image_id, 'slide');    			
				?>
				<div class="scroll-item <?php if($i == 0) echo 'current'; ?>" data-id="<?php echo $i;?>" style="background-image: url(<?php echo $image[0];?>)">
		        	<div class="content description">
			        	<?php the_sub_field('content'); ?>
		            </div>
		            <div class="overlay"></div>
				</div>
				<?php $i++; ?>
				<?php endif; ?>
				<?php endwhile; ?>
			</div>
		</div>
		<div class="scroller-navigation">
			<a class="prev-btn"></a>
			<a class="next-btn"></a>
		</div>
	</div><!-- #homepage-scroller -->
	<?php endif; ?>

	<div id="content">
		<div class="inner container">
			<div class="column-one equal-height span four omega alpha">
				<?php dynamic_sidebar( 'homepage_column_one' ); ?>
			</div>
			<div class="column-two equal-height span three omega alpha">
				<?php dynamic_sidebar( 'homepage_column_two' ); ?>
			</div>
			<div class="column-three equal-height span three omega alpha">
				<?php dynamic_sidebar( 'homepage_column_three' ); ?>
			</div>
		</div>
	</div><!-- #content -->
</section><!-- #front-page -->

<?php get_footer(); ?>