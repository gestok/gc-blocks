<?php
/**
 * Simple Category Product Carousel
 * @package      GC Blocks
 * @author       George Chondromatidis
 * @since        1.0.5
**/


// Create unique ID
$id = 'smpl-cat-prd-crsl-' . $block['id'];
if(!empty($block['anchor'])) $id = $block['anchor'];


// Create Class attributes
$className = 'smpl-cat-prd-crsl';
if(!empty($block['className'])) $className .= ' ' . $block['className'];
if(!empty($block['align'])) $className .= ' align' . $block['align'];


// Get product count and category slug
$count = get_field('prd_count');
$cat = get_field('cat_slug');

if (!empty($count) && !empty($cat)):

    // https://github.com/woocommerce/woocommerce/wiki/wc_get_products-and-WC_Product_Query
    $args = array(
        'limit'     => intval($count),
        'category'  => array( strval($cat) ),
        'orderby'   => 'date',
        'order'     => 'DESC',
        'return'    => 'ids',
    );
    $products = wc_get_products($args);
    echo $products[1]; // ID of product

endif;