<?php 
    function custom_comment_callback($comment, $args, $depth) { 
?>
    <div  id="comment-<?php comment_ID(); ?>" <?php comment_class('comment'); ?>>
        <div class="comment__head">
            <?php echo get_avatar($comment, 50); ?>
            <span class="author-name"><?php echo get_comment_author_link(); ?></span>
        </div><!-- /.comment__head -->

        <div class="comment__content">
            <?php comment_text(); ?>
        </div><!-- /.comment__content -->

        <div class="comment__food">
            <a href="<?php echo esc_url(get_comment_link($comment)); ?>">
                <?php printf(ct__('Posted on %s', 'ct'), get_comment_date()); ?>
            </a>
            
            <?php edit_comment_link(ct__('Edit', 'ct'), '<span class="edit-link">', '</span>'); ?>
        </div><!-- /.comment__food -->
    </div><!-- /.comment -->
<?php
    }
?>

<?php if ( have_comments() ) : ?>
    <div class="comments">
        <h3 class="comments__head">
            <?php
                $comments_number = get_comments_number();
                echo $comments_number . ct__( 'Comments' , 'additional' );
             ?>
        </h3><!-- /.comments__head -->

        <ol class="comments__body">
            <?php
                wp_list_comments( array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'callback'    => 'custom_comment_callback', 
                ) );
            ?>
        </ol><!-- /.comments__body -->

        <?php
        the_comments_pagination( array(
            'prev_text' => 'Previous',
            'next_text' => 'Next',
        ) );
        ?>
    </div>
<?php else :?>
    <p class="no-comments">No comments yet.</p>
<?php endif; ?>

<?php
if (comments_open() || get_comments_number()) :
?>
    <div id="respond" class="comment-respond">
        <header class="comment-respond__head">
            <h3 id="reply-title" class="comment-reply-title">
                <?php comment_form_title(ct__('Leave a Reply', 'ct'), ct__('Leave a Reply to %s', 'ct')); ?>
            </h3>
        </header><!-- /.comment-respond__head -->

        <div class="comment-respond__body">
            <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
                <p><?php printf(ct__('You must be <a href="%s">logged in</a> to post a comment.', 'ct'), wp_login_url(get_permalink())); ?></p>
            <?php else : ?>

            <form action="<?php echo esc_url(site_url('/wp-comments-post.php')); ?>" method="post" id="commentform">
                <div class="form__head">
                    <?php if (is_user_logged_in()) : ?>
                        <p><?php printf(ct__('Logged in as <a href="%1$s">%2$s</a>.', 'ct'), get_edit_user_link(), esc_html($user_identity)); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_attr(ct__('Log out of this account', 'ct')); ?>"><?php ct_e('Log out &raquo;', 'ct'); ?></a></p>
                    <?php else : ?>
                        <p><?php ct_e('You are not logged' , 'additional') ?></p> 
                    <?php endif; ?>
                </div><!-- /.form__head -->
                <div class="form__body">
                <?php if (is_user_logged_in()) : ?>
                    <div class="form__author">
                        <label for="author"><?php ct_e('Name', 'ct'); ?> <?php if ($req) echo '<span class="required">*</span>'; ?></label>
                        <input id="author" name="author" type="text" value="<?php echo esc_attr($comment_author); ?>" size="30" <?php if ($req) echo 'required'; ?>>
                    </div><!-- /.form__author -->
                
                    <div class="form__email">
                        <label for="email"><?php ct_e('Email', 'ct'); ?> <?php if ($req) echo '<span class="required">*</span>'; ?></label>
                        <input id="email" name="email" type="email" value="<?php echo esc_attr($comment_author_email); ?>" size="30" <?php if ($req) echo 'required'; ?>>
                    </div><!-- /.form__email -->

                    <div class="form__url">
                        <div class="comment-form-url">
                            <label for="url"><?php ct_e('Website', 'ct'); ?></label>
                            <input id="url" name="url" type="url" value="<?php echo esc_attr($comment_author_url); ?>" size="30">
                        </div>
                    </div><!-- /.form__url -->
                <?php endif ?>

                <div class="form__comment">
                    <label for="comment"><?php ct_e('Comment', 'ct'); ?> <span class="required">*</span></label>
                    <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea>
                </div><!-- /.form__comment -->

                <?php comment_id_fields(); ?>

                </div><!-- /.form__body -->
                <div class="form__actions">
                    <input name="submit" type="submit" id="submit" value="<?php ct_e('Post Comment', 'additional'); ?>">
                </div><!-- /.form__actions -->
            </form>
        </div><!-- /.comment-respond__body -->
        <?php endif; ?>
    </div><!-- #respond -->
<?php endif; ?>

