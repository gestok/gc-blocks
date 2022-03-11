<?php
/**
 * Category Banner with Images and Links
 * @package      GC Blocks
 * @author       George Chondromatidis
 * @since        1.0.3
**/

$align_class = $block['align'] ? 'align' . $block['align'] : '';
$block_style = $block['className'] ? $block['className'] : '';

// Check rows exists.
if(have_rows('category_banner_with_links_1')):

	// Variable for count
	$i = 0;

	// Open container
	echo '<div id="gcb-cat-banner-1" class="'. $block_style .' '. $align_class .'">';

    // Loop through rows.
    while(have_rows('category_banner_with_links_1')) : the_row();
		$i = $i + 1;

        // Load sub field values.
        $img = get_sub_field('image');
        $url = get_sub_field('link');
        $title = get_sub_field('text');

		// If values exist
		if( !empty($img) && !empty($url) && !empty($title)):
			echo '<a href="'. $url .'" class="box card'.$i.'">';
				echo '<p class="title">'. $title .'</p>';
			echo '</a>';
		endif;

    endwhile;
	echo '</div>';

	// Load CSS, JS
	echo '<link rel="stylesheet" href="'. plugin_dir_url(__FILE__) .'/horizontal-draggable-link-cards-1.css">';
	echo '<script src="'. plugin_dir_url(__FILE__) .'/horizontal-draggable-link-cards-1.js"></script>';

endif;
