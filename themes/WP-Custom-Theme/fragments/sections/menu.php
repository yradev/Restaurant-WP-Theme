<?php 
	$query_args = [
		'post_type' => 'ct_item',
		'posts_per_page' => 7,
		'tax_query' => [
			[
				'taxonomy' => 'ct_item_category',
				'field' => 'id',
			]
		]
	];

	$categories = get_terms([
		'taxonomy' => 'ct_item_category',
		'hide_empty' => false
	]);

	$pages = [];

	foreach( $categories as $category ) {
		$args = $query_args;

		$args['tax_query'][0]['terms'][] = $category->term_id;
		$query = new WP_Query( $args ); 
		$max_pages = $query->max_num_pages;

		for( $i = 1; $i<=$max_pages; $i++ ) {
			if( $i == 1 ) {
				$pages[] = 
					[	'category' => $category->name,
						'query' => $query
					];
			} else {
				$args['paged'] = $i;
				$pages[] =
					[	'category' => $category->name,
						'query' => new WP_Query( $args )
					];
			}
		}
	}

	array_walk( $pages, function( &$item, $index ) use ( $pages )  {
		if( $index % 2 == 0 ) {
			$item = [ $item ];

			if( ! empty( $pages[ $index + 1 ] ) ) {
				$item[] = $pages [ $index + 1 ];
			}
		} else {
			$item = null;
		}
	});

	$pages = array_filter( $pages, function($value, $index) {
		return ! empty( $value );
	},ARRAY_FILTER_USE_BOTH );

	$pages = array_reverse( $pages );
?>
<section class="section-menu js-menus">
	<img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/counter-1.jpg" alt="" class="section__bg">

	<div class="shell">
		<div class="menus">
			<div class="menus__inner">
				<img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/book.png" alt="" class="menus__back">

				<?php foreach( $pages as $two_pages ) :?>
					<div class="menu-page js-menu">
						<img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/book-page.png" alt="" class="menu-page__bg">
						
						<div class="menu-page__inner js-page-inner">
							<?php 
								foreach( $two_pages as $index => $page ) :
							?>

								<div class="<?php echo $index == 0 ? 'menu-page__front js-page-front' : 'menu-page__back js-page-back' ?>">
									<header class="menu-page__head">
										<h2><?php echo $page['category'] ?></h2>
									</header><!-- /.menu-page__head -->

									<div class="menu-page__content">
										<ul>
											<?php  
												$items = $page['query'];

												while( $items->have_posts() ) : $items->the_post() ?>
													<li>
														<h3><?php the_title(); ?></h3>
														
														<strong><?php echo get_field('price') . ' ' . get_field( 'ct_default_currency' , pll_current_language() ) ?></strong>

														<div class="menu-page__description js-menu-description">
															<div class="menu-page__description-inner">
																<div class="menu-page__entry js-menu-entry">
																	<?php the_content() ?>
																</div><!-- /.menu-page__entry -->

																<i class="fa-solid fa-angles-down js-content-extend-icon"></i>
															</div><!-- /.menu-page__description-inner -->
															
														</div><!-- /.menu-page_description -->
													</li>
												<?php endwhile; wp_reset_postdata(); ?>
										</ul>
									</div><!-- /.menu-page__content -->

									<div class="menu-page__pagination js-menu-pagination">
										<?php if( $index==0 ) :?>
											<a href="#" class="menu-page__pagination-next js-menu-next"><?php ct_e('Next', 'Next') ?> <i class="fa-solid fa-angles-right"></i></a>
										<?php else :?>
											<a href="#" class="menu-page__pagination-prev js-menu-prev"><i class="fa-solid fa-angles-left"></i> <?php ct_e('Prev', 'Prev') ?></a>
										<?php endif ?>
									</div><!-- /.menu-page__pagination -->
								</div><!-- /.menu-page__front -->

								<?php if( count( $two_pages) == 1 ) :?>
									<div class="menu-page__back js-page-back">
										<div class="menu-page__pagination">
											<a href="#" class="menu-page__pagination-prev js-menu-prev"><i class="fa-solid fa-angles-left"></i> <?php ct_e('Prev', 'Prev') ?></a>
										</div><!-- /.menu-page__pagination -->
									</div><!-- /.menu-page__back -->
								<?php endif ?>
							<?php endforeach ?>
						</div><!-- /.menu-page__inner -->
					</div><!-- /.menu-page -->
				<?php endforeach ?>

				<div class="menu-page menu-page--front js-menu">
						<img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/book.png" alt="" class="menu-page__bg">
						
						<div class="menu-page__inner js-page-inner">
							<div class="menu-page__front js-page-front">
								<header class="menu-page__head">
									<?php if( ! empty( $subtitle ) ) :?>
										<p><?php echo $subtitle ?></p>
									<?php endif ?>

									<?php if( ! empty( $title ) ) :?>
										<h2><?php echo $title ?></h2>
									<?php endif ?>
								</header><!-- /.menu-page__head -->

								
								<div class="menu-page__pagination">
									<a href="#" class="menu-page__pagination-next js-menu-next"><?php ct_e('Open', 'Open') ?> <i class="fa-solid fa-angles-right"></i></a>
								</div><!-- /.menu-page__pagination -->
							</div><!-- /.menu-page__front -->
						</div>
				</div><!-- /.menu-page -->
			</div><!-- /.menus__inner -->
		</div><!-- /.menus -->
	</div><!-- /.shell -->
</section><!-- /.menu-new -->