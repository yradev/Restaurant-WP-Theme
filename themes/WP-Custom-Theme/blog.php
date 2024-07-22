<?php get_header(); ?>

<section class="section-blog">
    <div class="shell">
        <header class="section__head">
            <h1><?php ct_e('Blog Page' , 'ct') ?></h1>
        </header><!-- /.section__head -->

        <div class="section__body">
            <?php if (have_posts()) : ?>
           
            <?php 
                while (have_posts()) {
                    the_post();
                    get_template_part('fragments/article');
                } 
            ?>
                
            <?php else: ?>
                <p><?php ct_e('No posts, yet.'); ?></p>
            <?php endif; ?>
        </div><!-- /.section__body -->
    </div><!-- /.shell -->
</section><!-- /.section-blog -->

<?php get_footer();
