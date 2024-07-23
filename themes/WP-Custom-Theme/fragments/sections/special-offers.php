<?php 
	$specials = get_field( 'ct_specials' , 'option' );
	$args = [
		'posts_per_page' => -1,
		'post_type' => 'ct_item',
		'orderby' => 'posts__in'
	];

	if ( empty( $items ) ) {
		$args['post__in'] = $specials;	
	} else {
		$args['post__in'] = $items;	
	}

	$items = new WP_Query( $args );
 ?>

<section class="section-cards" data-aos="fade-in">
	<div class="shell">
		<div class="section__head">
			<?php if( ! empty( $subtitle ) ) :?>
				<p><?php echo $subtitle ?></p>
			<?php endif ?>

			<?php if( ! empty( $title ) ) :?>
				<h2><?php echo $title ?></h2>
			<?php endif ?>
		</div><!-- /.section__head -->

		<?php if( ! empty( $specials ) ) :?>
			<div class="section__cards">
				<?php while( $items->have_posts() ) : $items->the_post() ?>	
					<div class="section__card">
						<?php the_post_thumbnail(); ?>

						<h3><?php the_title(); ?></h3>

						<?php if( ! empty( get_field( 'special_price' ) ) ) :?>
							<p><?php echo get_field( 'special_price' ) . ' ' . get_field( 'ct_default_currency' , pll_current_language() ) ?></p>
						<?php endif ?>
					</div><!-- /.section__card -->
				<?php endwhile; wp_reset_postdata(); ?>
			</div><!-- /.section__cards -->
		<?php endif ?>
	</div><!-- /.shell -->
</section><!-- /.section-cards -->