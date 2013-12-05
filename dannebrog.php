<?php
/*
Plugin Name: Danske flagdage.
Plugin URI: http://multimusen.dk/wordpress-plugin-danske-flagdage/

Description: Viser et Dannebrog på din webside på officielle flagdage. En tekst forklarer, hvorfor man flager på denne dag. Du kan evt. tilføje dine egne mærkedage i slutningen af filen flag.php. Tak til Erik Dam for oplysninger om militære flagdage i Danmark. Efter aktivering kan Dannebrog tilføjes som Widget. Mere om Dannebrog - se <a href='http://danmarkssamfundet.dk/'>Danmarkssamfundet</a>.

Copyright: GPLv2 or later

Author: Per Thykjaer Jensen

Version: 1.0

Author URI: http://multimusen.dk
*/

class WP_Danske_Flagdage extends WP_Widget {

	// The widget construct. Mumbo-jumbo that loads our code.
	function WP_Danske_Flagdage() {
		$widget_ops = array( 'classname' => 'Danske_Flagdage', 'description' => __( "Danske flagdage" ) );
		$this->WP_Widget('danskeFlagdage', __('danskeFlagdage'), $widget_ops);
	} // End function WP_Danske_Flagdage

	// This code displays the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		echo $before_widget;
		if(!empty($instance['title'])) {
			echo $before_title . $instance['title'] . $after_title; 
		}

/**
* Kode herfra
*/

require('flag.php');

/**
* Kode slut
*/


		echo $after_widget;
	} // End function widget.

	// Updates the settings.
	function update($new_instance, $old_instance) {
		return $new_instance;
	} // End function update

	// The admin form.
	function form($instance) {		
		echo '<div id="danskeFlagdage-admin-panel">';
		echo '<label for="' . $this->get_field_id("title") .'">danskeFlagdage Title:</label>';
		echo '<input type="text" class="widefat" ';
		echo 'name="' . $this->get_field_name("title") . '" '; 
		echo 'id="' . $this->get_field_id("title") . '" ';
		echo 'value="' . $instance["title"] . '" />';
		echo '</div>';
	} // end function form

} // end class WP_Danske_Flagdage

// Register the widget.
add_action('widgets_init', create_function('', 'return register_widget("WP_Danske_Flagdage");'));
?>