<?php
/**
 * The template for displaying the search.
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

<div id="search">
	<?php get_template_part('inc/breadcrumbs'); ?>
	<div class="inner container">
		<div id="sidebar" class="widget-area span three alpha" role="complementary">
			<?php dynamic_sidebar( 'default' );  ?>
		</div><!-- #sidebar -->
		<div class="span six omega search-results">
			<div class="inner">
				<header class="clearfix search-header">
					<div class="span four alpha">
						<h3 class="title din-light"><?php _e("Search Results for:", 'zookastar'); ?></h3>
					</div>
					<div class="span six omega">	
						<?php get_search_form(); ?>
					</div>
				</header>
				<div class="posts">
					<?php if(have_posts()): ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('border-bottom post'); ?>>
							<div class="inner">
								<header class="post-header header clearfix">
									<div class="span eight alpha">
										<h2 class="title uppercase"><a href="<?php the_permalink(); ?>" class="red"><?php the_title(); ?></a></h2>
									</div>
									<div class="span two omega right">
										<p class="text-right"><?php the_date(); ?></p>
									</div>
								</header>
								<div class="post-content">
									<?php the_excerpt(); ?>
									<p class="text-right">
										<a href="<?php the_permalink(); ?>" class="grey-btn"><?php _e("read More", 'zookastar'); ?></a>
									</p>
								</div>
							</div>
						</article>
					<?php endwhile; ?>
					<?php else: ?>

					<h2 class=""><?php _e("Nothing Found", 'zookastar'); ?></h2>
					<p><?php _e("Sorry, but nothing matched your search terms. Please try again with some different keywords.", 'zookastar'); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div><!-- #search -->
<?php get_footer(); ?>