<?php 

class Contact extends WP_Widget {
	
	function Contact() {
		$widget_opts = array( 'description' => __('Use this widget is to show the contact info') );
		parent::WP_Widget(false, 'Contact', $widget_opts);
	}
	function form($instance) {
		
		$title = (isset($instance['title'])) ? esc_attr($instance['title']) : '';  
        echo '<p><label>';
		echo _e('Title:').'<input type="text" class="widefat" name="'. $this->get_field_name('title').'" value="'. $title.'" >';
        echo '</label></p>';

		$content = (isset($instance['content'])) ? esc_attr($instance['content']) : '';  
        echo '<p><label>';
		echo _e('Content:').'<textarea class="widefat" rows="16" cols="20" name="'. $this->get_field_name('content').'" >'. $content.'</textarea>';
        echo '</label></p>';

	}
	function update($new_instance, $old_instance){
		return $new_instance;
	}
	
	function widget($args, $instance) {
		$args['title'] = $instance['title'];
		$args['content'] = $instance['content'];
		echo $args['before_widget'].$args['before_title'].$args['title'].$args['after_title']. '<div class="content">';
		echo $args['content'];
		echo '</div>'.$args['after_widget'];
	}
}

register_widget('Contact');



?>
