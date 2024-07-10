<?php 
	if( empty( $images ) ) {
		return;
	}
?>
<section class="section-gallery">
	<div class="slider-gallery js-slider-gallery" data-aos="fade-in">
		<div class="slider__clip swiper">
			<div class="slider__slides swiper-wrapper">
				<?php foreach( $images as $key => $image ) :?>					
					<div class="slider__slide swiper-slide">
						<?php 
							echo wp_get_attachment_image( $image['image'] , 'full' );
							?>
					</div><!-- /.slider__slide -->
				<?php endforeach ?>
			</div><!-- /.slider__slides -->
			
			<div class="slider__nav">
					<div class="slider__arrow slider__nav-next js-slider-next"><i class="fa-solid fa-angle-left"></i></div>
					<div class="slider__arrow slider__nav-prev js-slider-prev"><i class="fa-solid fa-angle-right"></i></div>
				</div><!-- /.slider__nav -->

			<div class="swiper-pagination"></div>
		</div><!-- /.slider__clip -->
	</div><!-- /.slider js-slider -->
	
	<ul data-aos="fade-up">
		<?php foreach( $images as $key => $image ) :?>
			<li>
				<a href="#" class="js-slider-gallery-image" data-id="<?php echo $key ?>">
					<?php 
						echo wp_get_attachment_image( $image['image'] , 'full' );
					?>
				</a>
			</li>
		<?php endforeach ?>
	</ul>
</section><!-- /.section-gallery -->