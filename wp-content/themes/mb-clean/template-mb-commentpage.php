<?php /* Template Name: CommentPage MB Clean */ get_header(); ?>
	<main role="main" class="mainpage">
			<div id="maincontent-section" class="section">
				<div class="wrapper">
					
					
					
					
					<?php if (comments_open() ) : ?>

<div class="qodef-comment-holder clearfix" id="comments">

<div class="qodef-comments">
	<?php	$comments = get_comments( array('status' => 'approve','order' => 'DESC', 'post_id' => '6589') );
	foreach($comments as $comment) : ?>
	<div class="komentaras">
		<div class="tekstas"><?php echo $comment->comment_content; ?></div>
		<div class="autorius"><?php echo $comment->comment_author; ?></div>
	</div>
<?php endforeach; ?>
</div></div>

<?php

$args = array(
	'id_form' => 'commentform',
	'id_submit' => 'submit_comment',
	'title_reply'=> '',
	'title_reply_to' => esc_html__( 'Post a Reply to %s','mb-clean' ),
	'cancel_reply_link' => esc_html__( 'Cancel Reply','mb-clean' ),
	'label_submit' => esc_html__( 'Skicka','mb-clean' ),
	'comment_field' => '<textarea id="comment" placeholder="'.esc_html__( 'Kommentar','mb-clean' ).'" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<div class="qodef-three-columns clearfix"><div class="qodef-three-columns-inner"><div class="qodef-column"><div class="qodef-column-inner"><input id="author" name="author" placeholder="'. esc_html__( 'Navn','mb-clean' ) .'" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></div></div>'
		 ) ) );
 ?>
 <div class="qodef-comment-form">
	<?php comment_form($args); ?>
</div>


<?php endif; ?>

					
					
					
					
					
					
				</div>
			</div>

	
		

	</main>

<?php get_footer(); ?>
