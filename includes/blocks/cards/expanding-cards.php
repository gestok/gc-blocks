<?php
/**
 * Expanding Cards
 * @package      GC Blocks
 * @author       George Chondromatidis
 * @since        1.0.4
**/


// Create unique ID
$id = 'gcb-exp-cards-' . $block['id'];
if(!empty($block['anchor'])) $id = $block['anchor'];


// Create Class attributes
$className = 'gcb-exp-cards';
if(!empty($block['className'])) $className .= ' ' . $block['className'];
if(!empty($block['align'])) $className .= ' align' . $block['align'];


// Check rows exists.
if(have_rows('expanding_cards')):

	// Variable for count
	$i = 0;

	// Open container ?>
	<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

	<?php
	// Loop through rows.
    while(have_rows('expanding_cards')) : the_row();

		// Count
		$i = $i + 1;

        // Load sub field values.
        $img = get_sub_field('img');
        $icon = get_sub_field('icon');
        $title = get_sub_field('title');
        $desc = get_sub_field('desc');

		// Parse HTML
		if(!empty($img)): ?>

		<div class="card" style="--cardBackground:url(<?php echo esc_url($img['url']); ?>);">
			<div class="shadow"></div>
			<div class="label">
				<img src="<?php echo $icon; ?>" alt="icon">
				<div class="info">
					<div class="text">
						<h2 class="title"><?php echo $title; ?></h2>
						<p class="desc"><?php echo $desc; ?></p>
					</div>
				</div>
			</div>
		</div>

		<?php
		endif;
    endwhile; ?>

	</section>

<?php
endif;
