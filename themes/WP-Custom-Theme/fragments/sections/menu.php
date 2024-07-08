<?php  
 $args = [
	'post_type' => 'ct_item',
	'posts_per_page' => -1
];


$images = get_field( 'images' , 'ct_item_category_' . $category );
$term = get_term( $category );
$terms = get_terms([
	'taxonomy' => $term->taxonomy,
	'parent' => $term->term_id,
	'hide_empty' => false
]);

$type_modificator = [
	'type-1' => '',
	'type-2' => 'section-menu--type-2',
	'type-3' => 'section-menu--type-3',
	'type-4' => 'section-menu--type-4',
];

$cols = [
	'four' => '',
	'three' => 'section-menu--three-cols',
	'two' => 'section-menu--two-cols'
];


if( count($terms) == 0 ) {
	$terms[] = $term;
}

?>
<section class="section-menu <?php echo $type_modificator[$type] ?> <?php echo $type == 'type-4' ? $cols[$columns] : '' ?>" data-aos="fade-in">
	<div class="shell">
		<div class="section__inner">
			<div class="section__content" data-aos="fade-right">
				<?php if( count($terms) == 1) :?>
					<h3><?php echo $term->name ?></h3>
				<?php endif; ?>
					<ul class="section__menus">
						<?php foreach( $terms as $current_term ) :?>
							<li class="section__menu">
								<?php if( count($terms) > 1 ) :?>
									<h4> <?php echo $current_term->name ?> </h4>
								<?php endif ?>
								<ul>
									<?php 
										$args['tax_query'] = 
											[
												[
													'taxonomy' => 'ct_item_category',
													'field' => 'id',
													'terms' => [$current_term->term_id]
												]
											];
										$items = new WP_Query( $args );
										while( $items->have_posts() ) : 
										$items->the_post() 
									?>
										<li>
											<h5><?php the_title(); ?></h5>
											
											<strong><?php echo get_field('price') . ' ' . get_field( 'ct_default_currency' , 'option' ) ?></strong>

											<div class="section__entry">
												<p><?php the_content() ?></p>
											</div><!-- /.section__entry -->
										</li>
									<?php endwhile; wp_reset_postdata(); ?>
								</ul>
							</li>
						<?php endforeach ?>
					</ul>
			</div><!-- /.section__content -->

			<div class="section__images">
				<div class="shape section__shape">
					<?php ct_include_fragment( 'svgs/shape' , []) ?>
				</div><!-- /.shape -->

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