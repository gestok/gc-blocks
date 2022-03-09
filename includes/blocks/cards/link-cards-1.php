<?php
/**
 * Link Cards Style 1
 * @package      GC Blocks
 * @author       George Chondromatidis
 * @since        1.0.3
**/

$id = 'gcb-link-cards-1-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'gcb-link-cards-1';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


// Check rows exists.
if(have_rows('link_cards_1')):

	// Variables for count and colors
	$cols = (count(get_field('link_cards_1'))>=2) ? 'wide' : 'narrow';
	$i = 0;
	$text_color = get_field('text_color');
    $btn_bg_color = get_field('btn_bg_color');

	// Open container ?>
	<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" data-columns="<?php echo $cols; ?>">

	<?php
	// Loop through rows.
    while(have_rows('link_cards_1')) : the_row();

		// Count
		$i = $i + 1;

        // Load sub field values.
        $img = get_sub_field('image');
        $url = get_sub_field('link');
        $url_text = get_sub_field('url_text');
        $title = get_sub_field('title');
        $desc = get_sub_field('desc');

		// Parse HTML
		if(!empty($img)): ?>
		<style>
			#<?php echo esc_attr($id); ?> .card<?php echo $i; ?>:before {background-image: url(<?php echo $img; ?>);}
		</style>

		<div class="card card<?php echo $i; ?>" style="color: <?php echo $text_color; ?>; ">
		  <div class="content">
			<?php if(!empty($title)): ?> <h2 class="title"><?php echo $title; ?></h2> <?php endif; ?>
			<?php if(!empty($desc)): ?> <p class="copy"><?php echo $desc; ?></p> <?php endif; ?>
			<?php if(!empty($url_text)): ?> <a href="<?php echo $url; ?>" class="btn" style="color: <?php echo $text_color; ?>;background-color: <?php echo $btn_bg_color; ?>;"><?php echo $url_text; ?></a> <?php endif; ?>
		  </div>
		</div>
		<?php endif;

    endwhile; ?>

	</section>

<?php
endif;
