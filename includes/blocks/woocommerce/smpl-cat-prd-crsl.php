<?php
/**
 * Simple Category Product Carousel
 * @package      GC Blocks
 * @author       George Chondromatidis
 * @since        1.0.5
**/


// Create unique ID
$id = 'gcb-smpl-cat-prd-crsl-' . $block['id'];
if(!empty($block['anchor'])) $id = $block['anchor'];


// Create Class attributes
$className = 'gcb-smpl-cat-prd-crsl';
if(!empty($block['className'])) $className .= ' ' . $block['className'];
if(!empty($block['align'])) $className .= ' align' . $block['align'];


// Get product count and category slug
$count = get_field('prd_count');
$cat = get_field('cat_slug');

if (!empty($count) && !empty($cat)){

    // https://github.com/woocommerce/woocommerce/wiki/wc_get_products-and-WC_Product_Query
    $args = array(
        'limit'     => intval($count),
        'category'  => array( strval($cat) ),
        'orderby'   => 'date',
        'order'     => 'DESC',
        'return'    => 'ids',
    );
    $product_ids = wc_get_products($args);

	// If product IDs are found
	if (!empty($product_ids)){

		// Open wrapper ?>
		<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
			<div class="slide"> <?php
			// Start Product Loop
			foreach ($product_ids as $product_id){
				// Get object of product
				$product = wc_get_product($product_id); ?>
				<a class="product" href="<?php echo get_permalink($product->get_id()); ?>" role="link" title="product">
					<?php echo $product->get_image(); ?>
					<p class="title"><?php echo $product->get_name(); ?></p>
					<p class="price"><?php echo $product->get_price(); ?>€</p>
				</a> <?php
			} ?>
			</div>
			<button class="ctrl-btn pro-prev">Prev</button>
			<button class="ctrl-btn pro-next">Next</button>
		</section> <?php

	}

}