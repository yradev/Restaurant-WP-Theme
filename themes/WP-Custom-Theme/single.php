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

<?php ct_include_fragment( 'sections/hero' , [] ) ?>

<section class="article-single">
    <div class="shell">
        <div class="section__content">
            <?php the_content(); ?>
        </div><!-- /.section__content -->
    </div><!-- /.shell -->
</section><!-- /.article-single -->

<?php
endwhile;
get_footer();
