<?php
/*
 * Add GC Blocks Category in Gutenberg Editor.
 * 
 * @param   array $block_categories
 * @param   WP_Block_Editor_Context $block_editor_context
 */

function gc_blocks_category( $block_categories, $editor_context ) {
    if ( ! empty( $editor_context->post ) ) {
        array_push(
            $block_categories,
            array(
                'slug'  => 'gc-blocks',
                'title' => __( 'GC Blocks', 'gc-blocks' ),
                'icon'  => null,
            )
        );
    }
    return $block_categories;
}
 
add_filter( 'block_categories_all', 'gc_blocks_category', 10, 2 );