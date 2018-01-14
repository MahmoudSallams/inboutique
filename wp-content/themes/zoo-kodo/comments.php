<?php
/**
 * Comments
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}

/* DISPLAY THE COMMENTS
================================================== */
?>

<div id="comments-list" class="comments">
    <?php if ( have_comments() ) : ?>
        <h4 class="title-block">
            <span><?php comments_number( esc_html__( '', 'zoo-kodo' ), esc_html__( '1 Comment(s)', 'zoo-kodo' ), esc_html__( '% Comments', 'zoo-kodo' ) ); ?></span>
        </h4>

        <ol class="comment-list">
            <?php wp_list_comments( 'type=all&callback=zoo_custom_comments' ); ?>
        </ol>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <div id="comments-nav-below" class="comments-navigation">
                <div
                    class="wrap-pagination clearfix"><?php paginate_comments_links( array( 'type' => 'list', 'prev_text' => '<i class="cs-font clever-icon-arrow-left"></i>',
                        'next_text' => '<i class="cs-font clever-icon-arrow-right"></i>' ) ); ?></div>
            </div> <!-- #comments-nav-below -->
        <?php endif; ?>
    <?php endif; ?>
</div> <!-- #comments-list .comments -->

<?php
/* COMMENT ENTRY FORM
================================================== */
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$zoo_comment_args = array(
    'fields' => apply_filters( 'comment_form_default_fields', array(
        'author' => '<p class="comment-form-author"><input id="author"  class="ipt text-field" placeholder="' . esc_attr__( 'Your name*', 'zoo-kodo' ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
        'email' => '<p class="comment-form-email"><input id="email"  class="ipt text-field" name="email" placeholder="' . esc_attr__( 'Email*', 'zoo-kodo' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" ' . $aria_req . ' /></p>',
        'url' => '<p class="comment-form-url"><input id="url"  class="ipt text-field" name="url" placeholder="' . esc_attr__( 'Website', 'zoo-kodo' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"/></p>',
    )),
    'comment_field' => '<p class="comment-form-comment"><textarea id="comment" class="textarea text-field" placeholder="' . esc_attr__( 'Your comment*', 'zoo-kodo' ) . '"  name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
    'class_submit' => 'btn btn-submit',
    'label_submit' => esc_attr__( 'Post Comment', 'zoo-kodo' ),

);

comment_form( $zoo_comment_args );
?>
