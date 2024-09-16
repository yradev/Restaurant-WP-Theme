<?php 
	if( empty( $counters ) ) {
		return;
	}
?>
<section class="section-counter js-counter-section">
	<?php 
		if( ! empty( $background_image ) ) {
			echo wp_get_attachment_image( $background_image , 'full', false, ['class' => 'section__bg'] );
		}
	?>	
	<div class="shell">
		<div class="section__inner">
			<?php foreach( $counters as $counter ) :?>
				<div class="counter">
					<?php if( ! empty( $counter['counter'] ) ) :?>
						<h3>
							<?php
								echo $counter['prefix']; 
							?>
							
							<span class="js-counter">
								<?php echo $counter['counter'] ?>
							</span>

							<?php
								echo $counter['suffix']; 
							?>
						</h3>
					<?php endif ?>
					

					<?php if( ! empty(  $counter['title'] ) ) :?>
						<p><?php echo  $counter['title']  ?></p>
					<?php endif ?>
				</div><!-- /.counter -->
			<?php endforeach ?>
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-counter -->