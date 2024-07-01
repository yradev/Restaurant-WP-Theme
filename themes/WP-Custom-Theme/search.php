<?php

get_header();
?>

<div class="section-search-default">
    <div class="shell">
        <div class="section__inner">
            <header class="section__head">
                <h1>
                    <?php
                        printf(esc_html__('Search Results for: %s', 'twentytwenty'), '<span>' . get_search_query() . '</span>');
                    ?>
                </h1>
            </header><!-- /.section__head -->

            <div class="section__body">
                <?php if (have_posts()) : ?>
                
                <?php 
                    while (have_posts()) {
                        the_post();
                        get_template_part('fragments/article');
                    } 
                ?>

                <div class="section-content__pagination">
                    <?php the_posts_navigation(); ?>
                </div>

                <?php else: ?>
                    <p><?php esc_html_e('No results found. Please try again with a different keyword.', 'twentytwenty'); ?></p>
                <?php endif; ?>
            </div><!-- /.section__body -->

            <div class="section__foot">
                <?php get_search_form(); ?>
            </div><!-- /.section__foot -->
        </div><!-- /.section__inner -->
    </div><!-- /.shell -->
</div><!-- /.section-search-default -->

<?php
get_footer();
