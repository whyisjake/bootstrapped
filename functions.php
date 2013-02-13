<?php
/**
 * Main Bootstrap Functions
 * All functions will be prefaced with the bs_ namespacing convention to avoid conflicts. Also will do best to maintain the WordPress coding standards. http://codex.wordpress.org/WordPress_Coding_Standards
 *
 * @package    bootstrapped
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * 
 */

/**
 * Add theme support for thumbnails, background images, and custom menus.
 *
 * When redoing the category structure, we wanted have a list of categories that we would feature all over the site.
 * If we did wp_list_categories, we would get all of them, so I created these functions to spit everything out based on the categories that we wanted.
 */
 function bs_action_after_setup_theme() {
	add_theme_support('post-thumbnails' );
	add_image_size( 'comment-thumb', 70, 70, true );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'automatic-feed-links' );
	if ( ! isset( $content_width ) ) {
		$content_width = 620;
	}
}
add_action( 'after_setup_theme', 'bs_action_after_setup_theme' );

/**
 * Enqueue all scripts and stylesheets.
 */
function bs_enqueue_scripts_styles() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bs-bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap-ck.js', array( 'jquery' ) );
	wp_enqueue_style( 'bs-css', get_stylesheet_directory_uri() . '/css/style.css' );
}

add_action( 'wp_enqueue_scripts', 'bs_enqueue_scripts_styles' );

/**
 * Comments Callback
 */
function bs_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'bs_comments' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'bs_comments' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'bs_comments' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'bs_comments' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'bs_comments' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'bs_comments' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'bs_comments' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
