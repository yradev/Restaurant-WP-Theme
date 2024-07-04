<?php

/**
 * Adding blog template.
 */

function ct_blog_template( $template ) {
    if ( is_home() ) {
        $blog_template = locate_template( [ 'blog.php'  ] );
        if ( ! empty( $blog_template ) ) {
            return $blog_template;
        }
    }

    return $template;
}
add_filter( 'template_include', 'ct_blog_template' );