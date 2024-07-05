<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
    <header class="article__head">
        <?php 
            if( ! empty( get_the_post_thumbnail() ) ): 
                the_post_thumbnail(); 
            else: 
        ?>
          <img src="<?php echo bloginfo( 'template_directory' ) ?>/assets/images/temp/not-found.jpg" alt="">
        <?php endif ?>

        <p><?php echo get_the_date(); ?></p>
    </header><!-- /.article__head -->

    <div class="article__content">
        <h2><?php the_title() ?></h2>
        <?php the_excerpt(); ?>
    </div><!-- /.article__content -->
</article><!-- article ?> -->