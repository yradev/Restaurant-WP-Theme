<?php 
    get_header(); 
    global $wp_query;

    $paged = get_query_var('paged') + 1;
    $total_pages = $wp_query->max_num_pages;

?>

<?php ct_include_fragment( 'sections/hero' , [] ) ?>

<section class="section-blog have-top-article js-posts"  data-aos="fade-up">
    <div class="shell">
        <div class="section__inner js-posts-list">
            <?php if (have_posts()) : ?>
           
            <?php 
                while (have_posts()) {
                    the_post();
                    get_template_part('fragments/article');
                } 
            ?>
                
            <?php else: ?>
                <p><?php ct_e('No Posts', 'No posts, yet.'); ?></p>
            <?php endif; ?>
        </div><!-- /.section__inner -->
    </div><!-- /.shell -->
</section><!-- /.section-blog -->

<?php get_footer();
