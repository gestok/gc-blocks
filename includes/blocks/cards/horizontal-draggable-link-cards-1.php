<?php
/**
 * Repeatable Horizontal Draggable Link Cards
 * @package      GC Blocks
 * @author       George Chondromatidis
 * @since        1.0.1
**/


// Create unique ID
$id = 'gcb-horizontal-draggable-link-cards-1-' . $block['id'];
if(!empty($block['anchor'])) $id = $block['anchor'];


// Create class attributes
$className = 'gcb-horizontal-draggable-link-cards-1';
if(!empty($block['className'])) $className .= ' ' . $block['className'];
if(!empty($block['align'])) $className .= ' align' . $block['align'];


// Check rows exists.
if(have_rows('link_boxes_1')):

	// Variable for count
	$i = 0;

	// Open container ?>
	<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

	<?php
	// Loop through rows.
    while(have_rows('link_boxes_1')) : the_row();
		$i = $i + 1;

        // Load sub field values.
        $img = get_sub_field('link_boxes_1_image');
        $url = get_sub_field('link_boxes_1_link');
        $title = get_sub_field('link_boxes_1_title');

		// If values exist
		if( !empty($img) && !empty($url) && !empty($title)): ?>

		<style>
			#<?php echo esc_attr($id); ?>.gcb-horizontal-draggable-link-cards-1 a.card<?php echo $i; ?> {
				background: url('<?php echo $img; ?>') no-repeat center / auto 100%;
				transition: all .4s ease;
			}
			#<?php echo esc_attr($id); ?>.gcb-horizontal-draggable-link-cards-1 a.card<?php echo $i; ?>:hover {
				background: url('<?php echo $img; ?>') no-repeat center / auto 110%;
				transition: all .4s ease;
			}
		</style>
		<a href="<?php echo $url; ?>" class="box card<?php echo $i; ?>">
			<p class="title"><?php echo $title; ?></p>
		</a>

		<?php
		endif;
	endwhile; ?>

	</section>

<?php
endif;
