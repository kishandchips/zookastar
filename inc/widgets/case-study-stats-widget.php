<?php 

class Case_Study_Stats extends WP_Widget {
	
	function Case_Study_Stats() {
		$widget_opts = array( 'description' => __('Use this widget is to show the case study stats') );
		parent::WP_Widget(false, 'Case Study - Stats', $widget_opts);
	}
	function form($instance) {
		
		$title = (isset($instance['title'])) ? esc_attr($instance['title']) : '';  
        echo '<p><label>';
		echo _e('Title:').'<input type="text" class="widefat" name="'. $this->get_field_name('title').'" value="'. $title.'" >';
        echo '</label></p>';

	}
	function update($new_instance, $old_instance){
		return $new_instance;
	}
	
	function widget($args, $instance) {
		global $post;
		$args['title'] = $instance['title'];
		if ( get_field('stats', $post->ID)) :
		echo $args['before_widget'].$args['before_title'].$args['title'].$args['after_title']; ?>
			<div class="content">
				<ul class="stats-list">
					<?php while (the_flexible_field('stats', $post->ID)) : ?>
					<li>
						<header class="header stat-header clearfix">
							<div class="span seven alpha value">
								<h2 class="uppercase no-margin"><?php the_sub_field('value') ?></h2>
							</div>
							<div class="span seven alpha image">
								<?php the_sub_field('image_id') ?>
							</div>
						</header>
						<div class="content">
							<p class="no-margin"><?php the_sub_field('content'); ?></p>
						</div>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
		<?php endif;
		echo $args['after_widget'];
	}
}

register_widget('Case_Study_Stats');



?>
