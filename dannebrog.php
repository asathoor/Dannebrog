<?php
/*
Plugin Name: Dannebrog
Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
Description: Display the Danish flag on your web page on national. You may add personal days of celebration.
Version:     2.0
Author:      Per Thykjaer Jensen, MA
Author URI:  https://multimusen.dk
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: petjDannebrog
Domain Path: /languages

Dannebrog is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Dannebrog is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Dannebrog. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

/**
 * Construct the widget
 */

// -----> NEW CONSTRUCTOR
class petj_Dannebrog extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'petj_dannebrog',
			'description' => 'See Dannebrog on national and personal days of celebration.',
		);
		parent::__construct( 'petj_dannebrog', 'Dannebrog', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		require('flag.php'); // ----> good idea?
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		echo '<div id="danskeFlagdage-admin-panel">';
		echo '<label for="' . $this->get_field_id("title") .'">Dannebrog </label>';
		echo '<input type="text" class="widefat" ';
		echo 'name="' . $this->get_field_name("title") . '" '; 
		echo 'id="' . $this->get_field_id("title") . '" ';
		echo 'value="' . $instance["title"] . '" />';
		echo '</div>';
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	/*
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
	*/
}

/*
 * Register the widget
 */
add_action( 'widgets_init', function(){
	register_widget( 'petj_Dannebrog' );
});

?>
