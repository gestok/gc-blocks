<?php
/**
 * Register ACF Custom Blocks along with their PHP templates,
 * JavaScript Libraries and CSS Stylesheets.
 */

function gcb_register_blocks() {

	// Pre Check
	if( ! function_exists( 'acf_register_block_type' ) ) return;

	// Simple Slider
	acf_register_block_type( array(
		'name'				=> 'simple-slider',
		'title'				=> __( 'Simple Slider', 'simple-slider' ),
		'description'		=> __('A simple slider with next/prev buttons and a slide progress timer.'),
        'render_template'	=> plugin_dir_path(__FILE__) . 'blocks/sliders/simple-slider.php',
		'enqueue_assets'	=> function(){
			wp_enqueue_style( 'simple-slider-css', plugin_dir_url(__FILE__) . 'blocks/sliders/simple-slider.css');
			wp_enqueue_script('simple-slider-js', plugin_dir_url(__FILE__) . 'blocks/sliders/simple-slider.js');
		},
		'category'			=> 'gc-blocks',
		'icon'				=> 'admin-users',
		'mode'				=> 'edit',
		'keywords'			=> array( 'slider', 'slides', 'hero' )
	));

	// Horizontal Draggable Link Cards
	acf_register_block_type( array(
		'name'				=> 'horizontal-draggable-link-cards-1',
		'title'				=> __( 'Horizontal Draggable Link Cards', 'horizontal-draggable-link-cards-1' ),
		'description'		=> __('An expanding set of draggable mobile-friendly link cards.'),
		'render_template'	=> plugin_dir_path(__FILE__) . 'blocks/cards/horizontal-draggable-link-cards-1.php',
		'enqueue_assets'	=> function(){
			wp_enqueue_style( 'horizontal-dragable-link-cards-1-css', plugin_dir_url(__FILE__) . 'blocks/cards/horizontal-draggable-link-cards-1.css');
			wp_enqueue_script('horizontal-dragable-link-cards-1-js', plugin_dir_url(__FILE__) . 'blocks/cards/horizontal-draggable-link-cards-1.js');
		},
		'category'			=> 'gc-blocks',
		'icon'				=> 'admin-users',
		'mode'				=> 'edit',
		'keywords'			=> array( 'cards', 'carousel', 'links' )
	));
	
	// Link Cards Style 1
	acf_register_block_type( array(
		'name'				=> 'link-cards-1',
		'title'				=> __( 'Link Cards Style 1', 'link-cards-1' ),
		'description'		=> __('A simple beautiful layout of a link card that can also be used as a CTA.'),
		'render_template'	=> plugin_dir_path(__FILE__) . 'blocks/cards/link-cards-1.php',
		'enqueue_assets'	=> function(){
			wp_enqueue_style( 'link-cards-1-css', plugin_dir_url(__FILE__) . 'blocks/cards/link-cards-1.css');
			wp_enqueue_script('link-cards-1-js', plugin_dir_url(__FILE__) . 'blocks/cards/link-cards-1.js');
		},
		'category'			=> 'gc-blocks',
		'icon'				=> 'admin-users',
		'mode'				=> 'edit',
		'keywords'			=> array( 'cards', 'links', 'cta' ),
		'styles'			=> [
			[
				'name' => 'default',
				'label' => __('Default', 'default'),
				'isDefault' => true,
			],
			[
				'name' => 'rounded',
				'label' => __('Rounded', 'rounded'),
			],
		],
	));

}
add_action('acf/init', 'gcb_register_blocks' );
