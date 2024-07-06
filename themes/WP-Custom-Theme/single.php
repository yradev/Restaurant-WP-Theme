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
<article class="article-single">
    <div class="shell">
        <header class="article__head">
            <h1><?php echo the_title() ?></h1>

            <p><?php echo get_the_date() . __(' by ') . get_the_author() ?></p>
        </header><!-- /.article__head -->

        <div class="article__content">
            <?php the_content(); ?>
        </div><!-- /.article__content -->
        
        <?php if (comments_open() || get_comments_number()) : ?>
            <div class="article__comments">
                <?php comments_template(); ?>
            </div><!-- .article__comments -->
        <?php endif; ?>
    </div><!-- /.shell -->
</article><!-- /.article-single -->
<? endwhile ?>

<?php
get_footer();