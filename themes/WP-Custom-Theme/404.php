<?php get_header(); ?>

<section class="section-404">
    <div class="shell">
        <div class="section__inner">
            <h1><?php ct_e('Page not found!' , 'crb') ?></h1>
            <p><?php ct_e('You might find what you need by going back to the' , 'crb') ?> <a href="<?php echo bloginfo('url') ?>"> <?php ct_e('homepage', 'crb') ?></a>.</p>        </div><!-- /.section__inner -->
    </div><!-- /.shell -->
</section><!-- /.section-404 -->

<?php get_footer(); ?>