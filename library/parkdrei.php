<?
/*
* parkdrei specific functions
* loaded in functions.php
*
* V1.0 09.08.16
*/


/* reset of the tagcloud sizes */
add_filter('widget_tag_cloud_args','set_tag_cloud_sizes');
function set_tag_cloud_sizes($args) {
$args['smallest'] = 8;
$args['largest'] = 11;
return $args; }



if ( ! function_exists( 'parkdrei_comment' ) ) :
function parkdrei_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<article>
			<header class="comment-header">
  			<time><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( __( '%1$s - %2$s', 'blaskan' ), get_comment_date(),  get_comment_time() ); ?></a></time>

  			<?php if ( $comment->user_id && !$comment->comment_author_url ): ?>
  			  <cite><a href="<?php echo get_author_posts_url( $comment->user_id ); ?>"><?php echo $comment->comment_author; ?></a></cite>
  			<?php else: ?>
  			  <?php printf( '<cite>%s</cite>', get_comment_author_link() ); ?>
  			<?php endif; ?>
  		</header>

  		<?php if ( $comment->comment_approved == '0' ) : ?>
  			<p class="moderation"><em><?php _e( 'Your comment is awaiting moderation.', 'blaskan' ); ?></em></p>
  		<?php endif; ?>

  		<?php comment_text(); ?>

  		<div class="reply">
  			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

  			<?php edit_comment_link( __( 'Edit', 'blaskan' ), ' ' ); ?>
  		</div><!-- .reply -->
		  </article>
	<?php
			break;
		case 'pingback'  :
	?>
	<li class="pingback">
		<time><?php printf( __( '%1$s - %2$s', 'blaskan' ), get_comment_date(),  get_comment_time() ); ?></time>
		<?php _e( 'Pingback:', 'blaskan' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('Edit', 'blaskan'), ' ' ); ?>
	<?php
			break;
		case 'trackback' :
	?>
	<li class="trackback">
		<time><?php printf( __( '%1$s - %2$s', 'blaskan' ), get_comment_date(),  get_comment_time() ); ?></time>
		<?php _e( 'Trackback:', 'blaskan' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('Edit', 'blaskan'), ' ' ); ?>
	<?php
			break;
	endswitch;
}
endif;


?>
