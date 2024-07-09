<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<?php
    while (have_posts()) :
    the_post();
?>
<section class="article-single">
    <div class="shell">
        <header class="section__head">
            <h1><?php echo the_title() ?></h1>

            <p><?php echo get_the_date() . __(' by ') . get_the_author() ?></p>
        </header><!-- /.section__head -->

        <div class="section__content">
            <?php the_content(); ?>
        </div><!-- /.section__content -->
    </div><!-- /.shell -->
</section><!-- /.article-single -->

<?php
endwhile;
get_footer();
