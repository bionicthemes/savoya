<?php


add_action('add_meta_boxes', 'add_metaboxes_for_slide');


function add_metaboxes_for_slide() {

	add_meta_box('title_for_slide', 'Add Slide Title', 'add_title_for_slide_callback', 'slides');
}



function add_title_for_slide_callback() {

	global $post;

	$title_value = get_post_meta($post->ID, '_title', true);

    echo '<input type="text" placeholder="Slide Title" name="_title" value="' . $title_value  . '" class="slide_title" />';

}



// Save the Metabox Data

function save_title_slide($post_id, $post) {
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.
	
	$tile_meta['_title'] = $_POST['_title'];
	
	// Add values of $events_meta as custom fields
	
	foreach ($tile_meta as $key => $value) { // Cycle through the $events_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}

}

add_action('save_post', 'save_title_slide', 1, 2); // save the custom fields