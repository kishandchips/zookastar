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
global $parent_id;
$parent_id = 32;
get_header(); ?>

<div id="index">
	<?php get_template_part('inc/page-header'); ?>
	<div class="row">
		<div class="container">
			<ul class="categories clearfix">
				<li <?php if(!is_category()) : ?>class="current-cat"<?php endif;?>><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php _e("All Articles", 'zookastar'); ?></a></li>
				<?php wp_list_categories(array('title_li' => '')); ?>
			</ul>
			<ul class="posts clearfix">
				<?php while ( have_posts() ) : the_post(); ?>
				<li class="post span two-and-half equal-height <?php if(get_the_ID() == get_queried_object_id()) echo 'current';?>">
					<a href="<?php the_permalink(); ?>" class="post-btn shadow <?php if(!is_single()) echo 'ajax-btn'; ?>" >
						<div class="featured-image thumbnail">
							<?php the_post_thumbnail('thumbnail', array('class' => 'scale')); ?>
						</div>
						<div class="post-meta">
							<?php $categories = get_the_category(); ?>
							<?php if(!empty($categories)): ?>
							<!--p class="categories uppercase red bold">
								<?php $i = 0;?>
								<?php foreach($categories as $category) : ?>
									<?php if($i > 0) echo ' / '; ?><span class="category"><?php echo $category->name; ?></span>
								<?php $i++; ?>
								<?php endforeach; ?>
							</p-->
							<?php endif; ?>
							<h5 class="uppercase"><?php the_title(); ?></h5>
						</div>
					</a>
				</li>
				<?php endwhile; // end of the loop. ?>
				<div class="clearfix"></div>
			</ul>
		</div>
	</div>
</div><!-- #index -->
<?php get_footer(); ?>