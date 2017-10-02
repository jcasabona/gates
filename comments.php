<?php if ( post_password_required() ) return; ?>

<?php if ( have_comments() ) : ?>

	<a name="comments"></a>

	<div class="comments">
				
		<div class="comments-title-container">
		
			<h2 class="comments-title fleft">
			
				<?php echo count($wp_query->comments_by_type[comment]) . ' ';
				echo _n( 'Comment' , 'Comments' , count($wp_query->comments_by_type[comment]), 'gates' ); ?>
				
			</h2>
			
			<?php if ( comments_open() ) : ?>
			
				<h4 class="comments-subtitle fright"><a href="#respond"><?php _e('Add yours','gates'); ?> &rarr;</a></h4>
			
			<?php endif; ?>
			
			<div class="clear"></div>
		
		</div> <!-- /comments-title-container -->
		
		<div class="clear"></div>

		<ol class="commentlist">
		    <?php wp_list_comments( array( 'type' => 'comment', 'callback' => 'gates_comment' ) ); ?>
		</ol>
		
		<?php if (!empty($comments_by_type['pings'])) : ?>
		
			<div class="pingbacks">
			
				<div class="pingbacks-inner">
			
					<h3 class="pingbacks-title">
					
						<?php echo count($wp_query->comments_by_type[pings]) . ' ';
						echo _n( 'Pingback', 'Pingbacks', count($wp_query->comments_by_type[pings]), 'gates' ); ?>
					
					</h3>
				
					<ol class="pingbacklist">
					    <?php wp_list_comments( array( 'type' => 'pings', 'callback' => 'gates_comment' ) ); ?>
					</ol>
					
				</div>
				
			</div>
		
		<?php endif; ?>
				
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			
			<div class="comments-nav" role="navigation">
			
				<div class="fleft">
									
					<?php previous_comments_link( '&laquo; ' . __( 'Older Comments', 'gates' ) ); ?>
				
				</div>
				
				<div class="fright">
				
					<?php next_comments_link( __( 'Newer Comments', 'gates' ) . ' &raquo;' ); ?>
				
				</div>
				
				<div class="clear"></div>
				
			</div> <!-- /comment-nav-below -->
			
		<?php endif; ?>
		
	</div> <!-- /comments -->
	
<?php endif; ?>

<?php if ( ! comments_open() && ! is_page() ) : ?>

	<p class="no-comments"><?php _e( 'Comments are closed.', 'gates' ); ?></p>
	
<?php endif; ?>

<?php $comments_args = array(

	'comment_notes_before' => 
		'',
		
	'comment_notes_after' =>
		'',

	'comment_field' => 
		'<p class="comment-form-comment">
			<label for="comment">' . __('Comment','gates') . '</label>
			<textarea id="comment" name="comment" cols="45" rows="6" required></textarea>
		</p>',
	
	'fields' => apply_filters( 'comment_form_default_fields', array(
	
		'author' =>
			'<p class="comment-form-author">
				<label for="author">' . __('Name','gates') . ( $req ? '<span class="required">*</span>' : '' ) . '</label> 
				<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" />
			</p>',
		
		'email' =>
			'<p class="comment-form-email">
				<label for="email">' . __('Email','gates') . ( $req ? '<span class="required">*</span>' : '' ) . '</label> 
				<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" />
			</p>',
		
		'url' =>
			'<p class="comment-form-url">
				<label for="url">' . __('Website','gates') . '</label>
				<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />
			</p>')
	),
);

comment_form($comments_args);

?>