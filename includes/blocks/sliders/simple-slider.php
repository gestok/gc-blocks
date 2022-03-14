<?php
/**
 * Simple Slider Block
 * @package      GC Blocks
 * @author       George Chondromatidis
 * @since        1.0.1
**/


// Create unique ID
$id = 'gcb-simple-slider-' . $block['id'];
if(!empty($block['anchor'])) $id = $block['anchor'];


// // Create class attributes
$className = 'gcb-simple-slider';
if(!empty($block['className'])) $className .= ' ' . $block['className'];
if(!empty($block['align'])) $className .= ' align' . $block['align'];


// Check rows exists.
if(have_rows('simple_slider')):

	// Variable for count
	$i = 0;

	// Open container ?>
	<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

		<button class="previous"><svg height="36px" viewBox="0 0 24 24" width="36px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12l4.58-4.59z"></path></svg></button>
		<button class="next"><svg height="36px" viewBox="0 0 24 24" width="36px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z"></path></svg></button>

		<div class="slides">
		<?php
		// Loop through rows.
		while(have_rows('simple_slider')): the_row();
			$i = $i + 1;

			// Load sub field values.
			$img = get_sub_field('image');
			$url = get_sub_field('link');

			// Check if values exist
			if (!empty($img) && !empty($url) && $i != 1): ?>

			<style>
				#<?php echo esc_attr($id); ?> .slide<?php echo $i; ?> {
					background: url('<?php echo $img; ?>') center center / 100% auto no-repeat;
				}
			</style>
            <a class="slide<?php echo $i; ?>" href="<?php echo $url; ?>"></a>

			<?php
			// Check if values exist and first slide
			elseif (!empty($img) && !empty($url) && $i == 1): ?>

			<style>
				#<?php echo esc_attr($id); ?> .slide<?php echo $i; ?> {
					background: url('<?php echo $img; ?>') center center / 100% auto no-repeat;
				}
			</style>
			<a class="slide<?php echo $i; ?> slideActive" href="<?php echo $url; ?>"></a>

			<?php
			endif;
		endwhile; ?>
		</div><!-- Slides -->

		<div class="progressbar">
			<div class="full">
				<div class="progress"></div>
			</div>
		</div><!-- Progressbar -->

	</section>

<?php
endif;