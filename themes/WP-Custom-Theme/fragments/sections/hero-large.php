<section class="hero-large">
	<?php if( ! empty( $slides ) ) :?>
		<div class="hero-slider js-hero-slider">
			<div class="slider__clip swiper">
				<div class="slider__slides swiper-wrapper">
					<?php foreach( $slides as $slide ) :?>
						<div class="slider__slide swiper-slide">
							<div class="shape slider__slide-shape-1">
								<?php ct_include_fragment( 'svgs/shape', [] ) ?>
							</div><!-- /.shape -->

							<div class="shape slider__slide-shape-2">
								<?php ct_include_fragment( 'svgs/shape', [] ) ?>
							</div><!-- /.shape -->
							
							<?php 
								echo wp_get_attachment_image( $slide['background_image'] , 'full', false, ['class' => 'slider__slide-bg'] );
							?>

							<div class="shell">
								<div class="slider__slide-inner">
									<div class="slider__slide-content">
										<?php if( ! empty( $slide['subtitle'] ) ) :?>
											<strong><?php echo $slide['subtitle'] ?></strong>
										<?php endif ?>

										<?php if( ! empty( $slide['title'] ) ) :?>
											<h1><?php echo $slide['title'] ?></h1>
										<?php endif ?>

										<?php if( ! empty( $slide['description'] ) ) :?>
											<p><?php echo $slide['description'] ?></p>
										<?php endif ?>

										<?php 
											if( ! empty( $slide['button'] ) ) {
												ct_render_button( $slide['button'] );
											}
										?>
									</div><!-- /.slider__slide-content -->

									<div class="slider__slide-images">
										<?php if( ! empty( $slide['image_1'] ) && ! empty( $slide[ 'image_2' ] ) ) :?>
										
											<div class="shape slider__slide-images-shape">
												<?php ct_include_fragment( 'svgs/shape', [] ) ?>
											</div><!-- /.shape -->
										<?php endif ?>

										<?php if( ! empty( $slide['image_1'] ) ) :?>
											<div class="slider__slide-large-image">
												<?php 
													echo wp_get_attachment_image( $slide['image_1'] , 'full' );
												 ?>
											</div><!-- /.slider__slide-large-image -->
										<?php endif ?>

										<?php if( ! empty( $slide['image_2'] ) ) :?>
											<div class="slider__slide-small-image">
												<?php 
													echo wp_get_attachment_image( $slide['image_2'] , 'full' );
												 ?>
											</div><!-- /.slider__slide-small-image -->
										<?php endif ?>
									</div><!-- /.slider__slide-images -->
								</div><!-- /.slider__slide-inner -->

							</div><!-- /.shell -->

							<div class="slider__slide-bar" style="--bar-color: <?php echo $slide['bar_color'] ?>"></div><!-- /.slider__bar -->
							
						</div><!-- /.slider__slide -->
					<?php endforeach ?>
				</div><!-- /.slider__slides -->

				<div class="slider__nav">
					<div class="slider__arrow slider__nav-next js-slider-next"><i class="fa-solid fa-angle-left"></i></div>
					<div class="slider__arrow slider__nav-prev js-slider-prev"><i class="fa-solid fa-angle-right"></i></div>
				</div><!-- /.slider__nav -->

			</div><!-- /.slider__clip -->
		</div><!-- /.slider js-slider -->
	<?php endif ?>

	<?php if( ! empty( $next_section ) ) :?>
		<a href="<?php echo $next_section ?>" class="hero__btn">
			<i class="fa-solid fa-angles-down"></i>
		</a>
	<?php endif ?>

</section><!-- /.hero-large -->