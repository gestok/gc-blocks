<?php
/**
 * Image Title Link Card
 * @package      GC Blocks
 * @author       George Chondromatidis
 * @since        1.0.5
**/


// Create unique ID
$id = 'gcb-b-l-img-title-card-' . $block['id'];
if(!empty($block['anchor'])) $id = $block['anchor'];


// Create Class attributes
$className = 'gcb-b-l-img-title-card';
if(!empty($block['className'])) $className .= ' ' . $block['className'];
if(!empty($block['align'])) $className .= ' align' . $block['align'];


// Render Preview
if (isset($block['data']['preview_image_help'])) echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';


// Get fields
$url = get_field('url');
$img = get_field('img');
$title = get_field('title');
$card_clr = get_field('card_clr');
$text_clr = get_field('text_clr');


// Check that required values are set
if (empty($img) || empty($url) || empty($card_clr)) return;


// Parse HTML ?>
<a href="<?php echo $url; ?>" class="<?php echo esc_attr($id); ?> <?php echo esc_attr($className); ?>" role="link" style="--gcb-bsc-img-t-link: <?php echo $card_clr; ?>">
	<?php echo wp_get_attachment_image( $img, 'thumbnail' ); ?>
	<?php if (!empty($title) && !empty($text_clr)): ?>
	<p class="title" style="--gcb-bsc-img-t-link: <?php echo $text_clr; ?>">
		<?php echo $title; ?>
	</p>
	<?php endif; ?>
</a>