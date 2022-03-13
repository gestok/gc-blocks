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


// Get fields
$count = get_field('prd_count');
$show_criteria = get_field('show_criteria');
$cat = get_field('cat_slug');
$sku = get_field('partial_sku');
$tag = get_field('tag');
$weight = get_field('weight');
$price = get_field('price');
$t_sales = get_field('total_sales');
$offset = get_field('offset');
$order_by = get_field('order_by');
$order = get_field('order');
$stock_status = get_field('stock_status');

/*
 * Function to determine if all the values are set
 * @params string
 * @return boolean
*/
function valuesExist($criteria){
	switch ($criteria) {
		case 'sku':
			if (!empty($sku)) return TRUE;
			break;
		case 'tag':
			if (!empty($tag)) return TRUE;
			break;
		case 'category':
			if (!empty($cat)) return TRUE;
			break;
		case 'weight':
			if (!empty($weight)) return TRUE;
			break;
		case 'price':
			if (!empty($price)) return TRUE;
			break;
		case 'total_sales':
			if (!empty($t_sales)) return TRUE;
			break;
	}
	// Invalid or empty info provided
	return FALSE;
}


if (valuesExist($show_criteria)){

    // https://github.com/woocommerce/woocommerce/wiki/wc_get_products-and-WC_Product_Query
    $args = array(
        'limit'			=> intval($count),
	'visibility'		=> 'visible',
        'return'		=> 'ids',
    );

	switch ($show_criteria) {
		case 'sku':
			$args['sku'] = strval($sku);
			break;
		case 'tag':
			$tag = explode(",", strval($tag));
			$args['tag'] = $tag;
			break;
		case 'category':
			$cat = explode(",", strval($cat));
			$args['category'] = $cat;
			break;
		case 'weight':
			$args['weight'] = floatval($weight);
			break;
		case 'price':
			$args['price'] = floatval($price);
			break;
		case 'total_sales':
			$args['total_sales'] = intval($t_sales);
			break;
	}

	// Extras
	if (!empty($offset))
		$args['offset']	= intval($offset);
	if (!empty($order_by))
		$args['orderby'] = strval($order_by);
	if (!empty($order))
		$args['order'] = strval($order);

	// Stock Status
	if ($stock_status)
		$args['stock_status'] = 'instock';

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
