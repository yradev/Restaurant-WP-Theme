<?php 
	if( empty( $title ) ) {
		return;
	}
?>
<section class="hero" data-aos="fade-in">
	<?php if( ! empty( $background_image ) )  
		{
			echo wp_get_attachment_image( $background_image , 'full', false, ['class' => 'hero__bg'] );
		}
	?>

	<div class="shell">
		<div class="hero__inner">
			<h1><?php echo $title; ?></h1>
		</div><!-- /.hero__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-hero -->