<section class="section-features js-features">
	<div class="shape section__shape">
		<?php ct_include_fragment( 'svgs/shape', [] ) ?>
	</div><!-- /.shape -->
	
	<div class="shell">
		<div class="section__inner">
		<header class="section__head js-features-head" data-aos="fade-in">
			<?php if( ! empty( $subtitle ) ) :?>
				<p><?php echo $subtitle ?></p>
			<?php endif ?>

			<?php if( ! empty( $title ) ) :?>
				<h2><?php echo $title ?></h2>
			<?php endif ?>
		</header><!-- /.section__head -->
			<?php if( ! empty( $features ) ) :?>
				<div class="section__content">
					<?php foreach( $features as $feature ) :?>
						<div class="feature js-feature">
							<div class="feature__inner">
								<?php 
									if( ! empty( $feature['icon'] ) ) {
										echo $feature['icon'];
									}
								?>

								<div class="feature__content">
									<?php if( ! empty( $feature['title'] ) ) :?>
										<h4><?php echo $feature['title'] ?></h4>
									<?php endif ?>

									<?php if( ! empty( $feature['content'] ) ) :?>
										<p><?php echo $feature['content'] ?></p>
									<?php endif ?>
								</div><!-- /.feature__content -->
							</div><!-- /.feature__inner -->
						</div><!-- /.feature -->
					<?php endforeach ?>
				</div><!-- /.section__content -->				
			<?php endif ?>
		</div><!-- /.section__inner -->

	</div><!-- /.shell -->
</section><!-- /.section-features -->