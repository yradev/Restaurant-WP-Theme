<?php get_header(); ?>

<section class="section-404">
    <div class="shell">
        <div class="section__inner">
            <h1><?php ct_e('Page not found!' , 'ct') ?></h1>
            <p><?php ct_e('You might find what you need by going back to the' , 'ct') ?> <?php ct_render_link( ct__( 'homepage' , 'ct' ) , home_url() ) ?>.</p>       
         </div><!-- /.section__inner -->
    </div><!-- /.shell -->
</section><!-- /.section-404 -->

<?php get_footer(); ?>