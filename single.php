<?php
/**
 * The template for displaying the single.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package zookastar
 * @since zookastar 1.0
 */
$ajax = (isset($_GET['ajax']) && $_GET['ajax'] == true) ? true : false;
$parent_id = 26;
if(!$ajax) get_header(); ?>

<div id="single">
	<?php get_template_part('inc/breadcrumbs'); ?>
	<div class="inner container">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('span seven alpha'); ?>>
				<div class="inner">
					<div class="content">
						<div class="post-meta clearfix">
							<div class="span five alpha">
								<?php $categories = get_the_category(); ?>
								<?php if(!empty($categories)): ?>
								<p class="categories uppercase">
									<?php $i = 0;?>
									<?php foreach($categories as $category) : ?>
										<?php if($i > 0) echo ' / '; ?><span class="category"><?php echo $category->name; ?></span>
									<?php $i++; ?>
									<?php endforeach; ?>
								</p>
								<?php endif; ?>
							</div>
							<div class="span five omega">
								<p class="text-right"><?php the_date(); ?></p>
							</div>
						</div>
						<header class="post-header header">
							<h1 class="title uppercase red"><?php the_title(); ?></h1>
						</header>
						<?php the_content(); ?>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
		<?php get_sidebar(); ?>
	</div>
</div><!-- #single -->
<?php if(!$ajax) get_template_part('index'); ?>
<?php if(!$ajax) get_footer(); ?>