<?php  
 $args = [
	'post_type' => 'ct_item',
	'posts_per_page' => -1,
	'tax_query' => [
		[
			'taxonomy' => 'ct_item_category',
			'field' => 'id',
			'terms' => [$category]
		]
	]
];

$items = new WP_Query( $args );
$images = get_field( 'images' , 'ct_item_category_' . $category );
$term = get_term( $category );

?>

<section class="section-menu">
	<div class="shell">
		<div class="section__inner">
			<div class="section__content">
				<h3><?php echo $term->name ?></h3>

					<ul>
						<?php while( $items->have_posts() ) : $items->the_post() ?>
							<li>
								<h4><?php the_title(); ?></h4>
								
								<strong><?php echo get_field('price') . get_field( 'ct_default_currency' , 'option' ) ?></strong>

								<div class="section__entry">
									<p><?php the_content() ?></p>
								</div><!-- /.section__entry -->
							</li>
						<?php endwhile; wp_reset_postdata(); ?>
					</ul>
			</div><!-- /.section__content -->

			<div class="section__images">
				<div class="section__two-images">
					<?php 
						if( ! empty( $images ) ) {
							echo wp_get_attachment_image( $images[0]['image'] , 'full' );
						}

						if ( ! empty( $images[1] ) ) {
							echo wp_get_attachment_image( $images[1]['image'] , 'full' );
						}
					?>				

				</div><!-- /.section__two-images -->

				<div class="section__image">
					<?php 
						if ( ! empty( $images[2] ) ) {
							echo wp_get_attachment_image( $images[2]['image'] , 'full' );
						}
					?>		
				</div><!-- /.section__image -->
			</div><!-- /.section__images -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-menu -->