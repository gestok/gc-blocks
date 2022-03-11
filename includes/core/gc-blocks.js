// Update 'GC-blocks' Block category icon with custom SVG
// SVG: Hashtag

function updateCatSVG(){
    var el = wp.element.createElement;
    var SVG = wp.primitives.SVG;
    var path = el( 'path', {
		d: "M20 10V8h-4V4h-2v4h-4V4H8v4H4v2h4v4H4v2h4v4h2v-4h4v4h2v-4h4v-2h-4v-4h4zm-6 4h-4v-4h4v4z"
    } );
    var svgIcon = el(
        SVG,
        { width: 12, height: 12, viewBox: '0 0 24 24' },
        path
    );
    wp.blocks.updateCategory( 'gc-blocks', { icon: svgIcon } );
}

updateCatSVG();