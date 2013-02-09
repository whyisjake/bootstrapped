<?php
/**
 * Bootstraped Comment Functions
 *
 * @package		bootstrapped
 * @license		http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @todo		Rewrite all of this so that it is BS friendly.
 * 
 */

/** 
 *	Don't display comments on protected posts
 */
?>
<!-- don't display comments on protected posts -->
<div id="comments" class="">
<?php if ( post_password_required() ): ?>
	 <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view and post comments.' , 'makezine' ); ?></p>
</div>
<?php
	return;
	endif;
?>


<?php if ( have_comments() ) { ?>
	
	<h3 id="comments-title"><?php printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'bootstrapped' ), number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' ); ?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {  ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'bootstrapped' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'bootstrapped' ) ); ?></div>
			</div> <!-- .navigation -->
<?php } ?>

			<ol class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'bs_comments' ) ); ?>
			</ol>

<?php  if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'bootstrapped' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'bootstrapped' ) ); ?></div>
			</div><!-- .navigation -->
<?php } elseif ( ! comments_open() )  { ?>
	<p class="nocomments"><?php _e( 'Comments are closed.', 'bootstrapped' ); ?></p>
<?php } 

}

?>

<?php comment_form(); ?>

</div><!-- #comments -->