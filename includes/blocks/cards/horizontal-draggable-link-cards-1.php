<?php
/**
 * Repeatable Horizontal Draggable Link Cards
 * @package      GC Blocks
 * @author       George Chondromatidis
 * @since        1.0.1
**/

$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Check rows exists.
if(have_rows('link_boxes_1')):

	// Variable for count
	$i = 0;

	// Open container
	echo '<div id="horizontal-draggable-link-cards-1" class="'. $align_class .'">';

    // Loop through rows.
    while(have_rows('link_boxes_1')) : the_row();
		$i = $i + 1;

        // Load sub field values.
        $img = get_sub_field('link_boxes_1_image');
        $url = get_sub_field('link_boxes_1_link');
        $title = get_sub_field('link_boxes_1_title');

		// If values exist
		if( !empty($img) && !empty($url) && !empty($title)):
			echo '<style>#horizontal-draggable-link-cards-1 .card'.$i.'{background:url(\''.$img.'\');}</style>';
			echo '<a href="'. $url .'" class="box card'.$i.'">';
				echo '<p class="title">'. $title .'</p>';
			echo '</a>';
		endif;

    endwhile;
	echo '</div>';

endif;
