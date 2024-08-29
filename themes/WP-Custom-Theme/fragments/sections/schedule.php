<section class="section-schedule">
	<div class="shell">
		<div class="section__inner">
			<div class="section__content">
				<?php if( ! empty( $title ) ) :?>
					<h2><?php echo $title ?></h2>
				<?php endif ?>	

				<?php if( ! empty( $schedule ) ) :?>
					<ul>
						<?php foreach( $schedule as $day ) :?>
							<li>
								<h3><?php echo $day['ct_day'] ?></h3>

								<?php if( $day['is_open'] ) :?>
									<p>: <?php echo $day['open_time'] ?> - <?php echo $day['close_time'] ?></p>
								<?php else: ?>
									<p><?php ct_e('Closed' , 'Closed') ?></p>
								<?php endif ?>
							</li>
						<?php endforeach ?>
					</ul>
				<?php endif ?>
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
</section><!-- /.section-working-schedule -->