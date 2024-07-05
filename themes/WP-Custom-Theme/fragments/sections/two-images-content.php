<section class="section-two-images-content" id="<?php echo $anchor ?>" data-aos="fade-up">
	<div class="shell">
		<div class="section__inner">
			<div class="section__images">
				<?php 
					if( ! empty( $image_1 ) ) {
						echo wp_get_attachment_image( $image_1 , 'full' );
					}

					if( ! empty( $image_2 ) ) {
						echo wp_get_attachment_image( $image_2 , 'full' );
					}
				?>					
			</div><!-- /.section__images -->

			<div class="section__content" data-aos="fade-left">
				<?php if( ! empty( $subtitle ) ) :?>
					<div class="section__subtitle">
						<p><?php echo $subtitle ?></p>
					</div><!-- /.section__subtitle -->
				<?php endif ?>

				<?php if( ! empty( $title ) ) :?>
					<h2> <?php echo $title ?></h2>
				<?php endif ?>
				
				<?php if( ! empty( $content ) ) :?>
					<div class="section__entry">
						<?php echo $content ?>
					</div><!-- /.section__entry -->
				<?php endif ?>
			</div><!-- /.section__content -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-two-images-content -->