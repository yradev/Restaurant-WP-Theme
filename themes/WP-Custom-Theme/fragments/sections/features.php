<section class="section-features" id="<?php echo $anchor ?>" data-aos="fade-up">
	<div class="shape section__shape">
		<?php ct_include_fragment( 'svgs/shape', [] ) ?>
	</div><!-- /.shape -->
	
	<div class="shell">
		<header class="section__head">
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
						<div class="feature">
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
						</div><!-- /.feature -->
					<?php endforeach ?>
				</div><!-- /.section__content -->				
			<?php endif ?>
	</div><!-- /.shell -->
</section><!-- /.section-features -->