<?php 
	if( empty( $title ) && ! is_home() && ! is_search() && ! is_single() ) {
		return;
	}

	$hero_background = get_field( 'hero_bg' , 'option');


	if ( is_home() ) {
		$title = ct__('News' , 'News');
	}

	if ( is_search() ) {
		$title = ct__('Search Results' , 'Search Results for: ') . '<span>' . get_search_query() . '</span>';
	}

	if ( is_single() ) {
		$title = get_the_title();
	}
?>

<section class="hero">
	<?php 
		if( ! empty( $background_image ) )  {
			echo wp_get_attachment_image( $background_image , 'full', false, ['class' => 'hero__bg'] );
		} else if( ! empty ( $hero_background ) ) {
			echo wp_get_attachment_image( $hero_background , 'full', false, ['class' => 'hero__bg'] );
		}
	?>

	<div class="shell">
		<div class="hero__inner">
			<h1><?php echo $title; ?></h1>
		</div><!-- /.hero__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-hero -->