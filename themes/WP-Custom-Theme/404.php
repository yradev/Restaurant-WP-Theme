<?php get_header(); ?>

<section class="section-404">
    <div class="shell">
        <div class="section__inner">
            <h1><?php ct_e('Page not found', 'Page not found!') ?></h1>
            <p><?php ct_e( 'Back to homepage', 'You might find what you need by going back to the') ?> <?php ct_render_link( ct__( 'homepage' , 'homepage' ) , home_url() ) ?>.</p>       
         </div><!-- /.section__inner -->
    </div><!-- /.shell -->
</section><!-- /.section-404 -->

<?php get_footer(); ?>