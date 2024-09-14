<?php 
 $args = [
	'post_type' => 'ct_feedback',
	'posts-per-page' => -1
 ];

 $testimonials = new WP_Query( $args );
?>

<section class="section-testimonials">
	<div class="section__head">
		<?php if( ! empty( $subtitle ) ) :?>
			<p><?php echo $subtitle ?></p>
		<?php endif ?>

		<?php if( ! empty( $title ) ) :?>
			<h2><?php echo $title ?></h2>
		<?php endif ?>
	</div><!-- /.section__head -->

	<div class="section__inner js-testimonials">
		<?php while( $testimonials->have_posts() ) : $testimonials->the_post() ?>
			<div class="testimonial js-testimonial">
				<blockquote class="testimonial__quote">
					<?php the_content(); ?>
				</blockquote><!-- /.testimonial__quote-->

				<div class="testimonial__foot">
					<?php ct_include_fragment('svgs/quote' , []) ?>

					<p><?php the_title(); ?></p>
				</div><!-- /.testimonial__foot -->
			</div><!-- /.testimonial -->
		<?php endwhile; wp_reset_postdata(); ?>
	</div><!-- /.section__inner -->
</section><!-- /.section-testimonials -->