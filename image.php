<?php get_header(); ?>

<div class="content">
											        
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
				<?php $imageArray = wp_get_attachment_image_src($post->ID, 'full', false); $url = $imageArray['0']; ?>
				
				<div class="featured-media">
	
					<?php echo wp_get_attachment_image( $post->ID, 'post-image' ); ?>
					
				</div>
				
				<div class="post-inner section-inner thin">
				
					<div class="post-header">
					
						<div class="post-meta top">
						
							<?php the_time(get_option('date_format')); echo ' <span class="sep">/</span> ' . $imageArray['1'] . '<span style="text-transform: lowercase;">x</span>' . $imageArray['2'] . ' px'; ?>
						
						</div>
					
						<h2 class="post-title"><?php echo basename(get_attached_file( $post->ID )); ?></h2>
					
					</div> <!-- /post-header -->
					
					<?php if ( !empty(get_post(get_post_thumbnail_id())->post_excerpt) ) : ?>
														
						<div class="post-content section-inner thin">
						
							<p class="p"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
							
						</div>
						
					<?php endif; ?>
					
				</div> <!-- /post-inner -->
														                        
	   	<?php endwhile; else: ?>
	
			<p><?php _e("We couldn't find any posts that matched your query. Please try again.", "gates"); ?></p>
		
		<?php endif; ?>    
			
	</div> <!-- /post -->
	
	<div class="comments-container">
	
		<div class="comments-inner section-inner thin">
	
			<?php comments_template( '', true ); ?>
		
		</div>
	
	</div>

</div> <!-- /content -->
		
<?php get_footer(); ?>