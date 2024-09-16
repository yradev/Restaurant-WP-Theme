<?php  
$args = [
	'post_type' => 'post',
	'posts_per_page' => 6,
	'orderby' => 'date',
	'order' => 'DESC'
];

$posts = new WP_Query($args);

if( ! $posts->have_posts() ) {
	return;
}

?>
<section class="section-news">

	<header class="section__head">
				<?php if( ! empty( $subtitle ) ) :?>
					<p><?php echo $subtitle ?></p>
				<?php endif ?>

				<?php if( ! empty( $title ) ) :?>
					<h2><?php echo $title ?></h2>
				<?php endif ?>
		</header><!-- /.section__head -->

		<div class="section__content">
			<?php 
				while( $posts->have_posts() ) {
					$posts->the_post(); 
					get_template_part('fragments/article'); 
					wp_reset_postdata();
				}
			?>
		</div><!-- /.section__content -->
	
</section><!-- /.section-news -->