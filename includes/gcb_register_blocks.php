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

	// Expanding Cards
	acf_register_block_type( array(
		'name'				=> 'exp-cards',
		'title'				=> __( 'Expanding Cards', 'exp-cards' ),
		'description'		=> __('Expanding flex info cards with title, description and icon.'),
		'render_template'	=> plugin_dir_path(__FILE__) . 'blocks/cards/expanding-cards.php',
		'enqueue_assets'	=> function(){
			wp_enqueue_style( 'exp-cards-css', plugin_dir_url(__FILE__) . 'blocks/cards/expanding-cards.css');
			wp_enqueue_script('exp-cards-js', plugin_dir_url(__FILE__) . 'blocks/cards/expanding-cards.js');
		},
		'category'			=> 'gc-blocks',
		'icon'				=> 'admin-users',
		'mode'				=> 'edit',
		'keywords'			=> array( 'cards', 'expanding', 'info' ),
		'styles'			=> [
			[
				'name' => 'default',
				'label' => __('Default', 'default'),
				'isDefault' => true,
			],
			[
				'name' => 'square',
				'label' => __('Square', 'square'),
			],
		],
	));
	
	// (WooCommerce) Product Carousel
	acf_register_block_type( array(
		'name'				=> 'gcb-product-carousel',
		'title'				=> __( 'Product Carousel', 'gcb-product-carousel' ),
		'description'		=> __('Simple product carousel that displays products through a customized query.'),
		'render_template'	=> plugin_dir_path(__FILE__) . 'blocks/woocommerce/product-carousel.php',
		'enqueue_assets'	=> function(){
			wp_enqueue_style( 'gcb-product-carousel-css', plugin_dir_url(__FILE__) . 'blocks/woocommerce/product-carousel.css');
			wp_enqueue_script('gcb-product-carousel-js', plugin_dir_url(__FILE__) . 'blocks/woocommerce/product-carousel.js');
		},
		'category'			=> 'gc-blocks',
		'icon'				=> 'admin-users',
		'mode'				=> 'edit',
		'keywords'			=> array( 'products', 'carousel', 'woocommerce' ),
		'styles'			=> [
			[
				'name' => 'default',
				'label' => __('Default', 'default'),
				'isDefault' => true,
			],
		],
	));

	// (Basic/Link) Image Title Card
	acf_register_block_type( array(
		'name'				=> 'gcb-img-title-card',
		'title'				=> __( 'Image Title Card', 'gcb-img-title-card' ),
		'description'		=> __('Basic block of an animated card with an image and title.'),
		'render_template'	=> plugin_dir_path(__FILE__) . 'blocks/basic/link/image-title-card.php',
		'enqueue_assets'	=> function(){
			wp_enqueue_style( 'gcb-img-title-card-css', plugin_dir_url(__FILE__) . 'blocks/basic/link/image-title-card.css');
		},
		'category'			=> 'gc-blocks',
		'icon'				=> 'admin-users',
		'mode'				=> 'edit',
		'keywords'			=> array( 'card', 'link', 'image' ),
		'example'			=> array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image_help' => plugin_dir_url(__FILE__) . 'blocks/basic/link/preview.jpg',
					)
				)
		),
		'styles'			=> [
			[
				'name' => 'default',
				'label' => __('Default', 'default'),
				'isDefault' => true,
			],
			[
				'name' => 'square',
				'label' => __('Square', 'square'),
			],
		],
	));

}
add_action('acf/init', 'gcb_register_blocks' );
