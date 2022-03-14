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


// Check if values are set
$values_exist = false;
switch ($show_criteria) {
	case 'sku':
		if (!empty($sku)) $values_exist = true;
		break;
	case 'tag':
		if (!empty($tag)) $values_exist = true;
		break;
	case 'category':
		if (!empty($cat)) $values_exist = true;
		break;
	case 'weight':
		if (!empty($weight)) $values_exist = true;
		break;
	case 'price':
		if (!empty($price)) $values_exist = true;
		break;
	case 'total_sales':
		if (!empty($t_sales)) $values_exist = true;
		break;
}


if ($values_exist && class_exists('WooCommerce')){

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
				<div class="product-box">
					<a class="product" href="<?php echo get_permalink($product->get_id()); ?>" role="link" title="product">
						<?php echo $product->get_image(); ?>
						<p class="title"><?php echo $product->get_name(); ?></p>
						<p class="price"><?php echo round($product->get_price(), 2); ?>€</p>
					</a>
					<a href="/?add-to-cart=<?php echo $product_id; ?>" class="cart-btn" role="link" title="Add to Cart">
						<svg xmlns="http://www.w3.org/2000/svg">
							<path d="M18 6h-2a4 4 0 1 0-8 0H6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-6-2c1.1 0 2 .9 2 2h-4c0-1.1.9-2 2-2zm6 16H6V8h2v2c0 .55.45 1 1 1s1-.45 1-1V8h4v2c0 .55.45 1 1 1s1-.45 1-1V8h2v12z"/>
						</svg>
					</a>
				</div> <?php
			} ?>
			</div>
			<button class="ctrl-btn pro-prev">
				<svg height="36px" viewBox="0 0 24 24" width="36px" fill="#000000">
					<path d="M0 0h24v24H0V0z" fill="none"></path><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12l4.58-4.59z"></path>
				</svg>
			</button>
			<button class="ctrl-btn pro-next">
				<svg height="36px" viewBox="0 0 24 24" width="36px" fill="#000000">
					<path d="M0 0h24v24H0V0z" fill="none"></path><path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z"></path>
				</svg>
			</button>
		</section> <?php

	}

}
