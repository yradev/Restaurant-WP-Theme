<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
    <img src="<?php echo bloginfo( 'template_directory' ) ?>/assets/images/temp/not-found.jpg" alt="" class="article__bg">

    <a href="<?php echo get_the_permalink() ?>" class="article__link"></a>
    
    <div class="article__bar">
            <p>
                <i class="fa-regular fa-clock"></i>
                <?php echo get_the_date() ?>
            </p>

            <ul>
                <li>
                    <i class="fa-solid fa-user"> </i> <?php echo get_the_author() ?>
                </li>
            </ul>
        </div><!-- /.article__bar -->

    <div class="article__inner">
        
        <div class="article__head">
            <h2><?php the_title() ?></h2>
        </div><!-- /.article__head -->

        <div class="article__content">
            <div class="article__content-inner">
               <?php the_excerpt(); ?>
            </div><!-- /.article__content-inner -->
        </div><!-- /.article__content -->

        <div class="article__actions">
            <a href="#" class="btn btn--small article__btn"><?php ct_e('Read More' , 'ct') ?></a><!-- / -->
        </div><!-- /.article__actions -->
    </div><!-- /.article__inner -->
</article><!-- article ?> -->