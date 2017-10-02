<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
	
		<div class="featured-media">	
			
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			
				<?php the_post_thumbnail('post-image'); ?>
			
			</a>
			
			<?php if ( !empty(get_post(get_post_thumbnail_id())->post_excerpt) ) : ?>
														
				<p class="caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
				
			<?php endif; ?>
			
		</div> <!-- /featured-media -->
			
	<?php endif; ?>
	
	<?php 
		if ( is_sticky() ) { 
			echo '<a class="is-sticky" href="' . get_permalink() . '" title="' . __('Sticky post','gates') . '"><span class="genericon genericon-pinned"></span></a>'; 
		} 
	?>
	
	<div class="post-inner section-inner thin">
		
		<div class="post-header">
			
			<div class="post-meta top">
			
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_time(get_option('date_format')); ?></a>
				
				<?php 
					if ( comments_open() ) {
						echo '<span class="sep">/</span> '; 
						comments_popup_link( __( '0 Comments', 'gates' ), __( '1 Comment', 'gates' ), __( '% Comments', 'gates' ) );
					}
				?> 
				
				<?php edit_post_link( __('Edit','gates'), '<span class="sep">/</span> ', ''); ?>
				
			</div>
			
		    <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		    	    
		</div> <!-- /post-header -->
		
		<div class="post-content">
		
			<?php the_content(); ?>
		
		</div>
	
	</div> <!-- /post-inner -->

</div>