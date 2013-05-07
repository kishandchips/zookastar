<?php 

class Case_Study_Key_Information extends WP_Widget {
	
	function Case_Study_Key_Information() {
		$widget_opts = array( 'description' => __('Use this widget is to show the case study key information') );
		parent::WP_Widget(false, 'Case Study - Key Information', $widget_opts);
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
		if ( get_field('key_information', $post->ID)) :
		echo $args['before_widget'].$args['before_title'].$args['title'].$args['after_title']; ?>
			<div class="content">
				<ul class="key-information-list">
					<?php while (the_flexible_field('key_information', $post->ID)) : ?>
					<?php $layout = get_row_layout(); ?>
					<?php if($layout == 'companies'): ?>
					<li class="companies">
						<?php $companies =  get_sub_field('companies'); ?>
						<?php if ($companies) :?>
							<h5 class="uppercase no-margin"><?php _e("Magma Group Division", 'zookastar'); ?></h5>
							<?php foreach( $companies as $post): ?>
							<?php setup_postdata($post); ?>
							<a href="<?php the_permalink(); ?>" class="white-btn shadow company-btn"><?php the_title(); ?> &#x2192;</a><br />
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</li>
					<?php endif; ?>
					<?php if($layout == 'people'): ?>
					<li class="people">
						<?php $people =  get_sub_field('people'); ?>
						<?php if ($people) :?>
							<h5 class="uppercase no-margin"><?php _e("Business Lead", 'zookastar'); ?></h5>
							<?php foreach( $people as $post): ?>
							<?php setup_postdata($post); ?>
							<a href="<?php the_permalink(); ?>" class="white-btn shadow person-btn"><?php the_post_thumbnail(); ?><?php the_title(); ?> &#x2192;</a><br />
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</li>
					<?php endif; ?>
					<?php if($layout == 'client_company'): ?>
					<li class="client-company">
						<?php $company_name =  get_sub_field('company_name'); ?>
						<?php if ($company_name) :?>
							<h5 class="uppercase no-margin"><?php _e("Client Company", 'zookastar'); ?></h5>
							<p class="company-name"><?php echo $company_name; ?></p>
						<?php endif; ?>
					</li>
					<?php endif; ?>
					
					<?php endwhile; ?>
				</ul>
			</div>
		<?php endif;
		echo $args['after_widget'];
	}
}

register_widget('Case_Study_Key_Information');



?>
