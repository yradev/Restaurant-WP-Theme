<?php 
	$contacts = get_field( 'ct_contacts' , pll_current_language() );
?>

<section class="section-contacts" id="<?php echo $anchor ?>" >
	<?php if( ! empty( $background_image ) ) {
			echo wp_get_attachment_image( $background_image , 'full', false, ['class' => 'section__bg'] );
		}
	?>		
	<div class="shell">
		<div class="section__inner">
			<div class="section__content">
				<div class="section__content-inner">
					<?php if( ! empty( $subtitle ) ) :?>
						<div class="section__subtitle">
							<p><?php echo $subtitle ?></p>
						</div><!-- /.section__subtitle -->
					<?php endif ?>

					<?php if( ! empty( $title ) ) :?>
						<h2><?php echo $title ?></h2>
					<?php endif ?>

					<?php if( ! empty( $description ) ) :?>
						<div class="section__entry">
							<?php echo $description ?>
						</div><!-- /.section__entry -->
					<?php endif ?>

					<?php if( ! empty( $contacts ) ) :?>
						<ul class="section__contacts">
							<?php foreach( $contacts as $contact ) :?>
								<li class="section__contact">
									<?php if( ! empty( $contact['icon'] ) ) {
											echo $contact['icon'];
										}
									?>			
									
									<?php ct_render_link( $contact['contact'] , ct_get_contact_link($contact['contact']) ) ?>
								</li>
							<?php endforeach ?>
						</ul>
					<?php endif ?>
				</div><!-- /.section__content-inner -->
			</div><!-- /.section__content -->

			<div class="section__form">
				<?php if( ! empty( $form_title ) ) :?>
					<h3><?php echo $form_title ?></h3>
				<?php endif ?>
				
				<?php  
					if( ! empty( $shortcode ) ) {
						echo do_shortcode( $shortcode );
					}
				?>
			</div><!-- /.section__form -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-contacts -->