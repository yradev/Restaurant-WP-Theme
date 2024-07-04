<?php
/**
 * Template Name: Page Builder
 */
?>

<?php get_header(); 

$sections = get_field( 'page_sections' );

if ( ! empty( $sections ) ) {
	foreach ( (array) $sections as $index => $section ) {
		$slug = str_replace( '_', '-', $section['acf_fc_layout'] );
		ct_include_fragment( 'sections/' . $slug, $section );
	}
}

get_footer(); ?>