<?php get_header(); ?>

	<div class="content">

		<?php if ( have_posts() ) : ?>
		
			<div class="page-title section small-padding">
			
				<h4 class="section-inner">
			
					<?php _e( 'Search results:', 'gates'); echo ' "' . get_search_query() . '"'; ?>
				
					<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					
					if ( "1" < $wp_query->max_num_pages ) : ?>
					
						<span><?php printf( __('(page %s of %s)', 'gates'), $paged, $wp_query->max_num_pages ); ?></span>
					
					<?php endif; ?>
				
				</h4>
				
			</div>
					
			<div class="posts" id="posts">
				
				<?php while (have_posts()) : the_post(); ?>
		    	
		    		<?php get_template_part( 'content', get_post_format() ); ?>
		    			        		            
		        <?php endwhile; ?>
							
			</div> <!-- /posts -->
			
			<?php if ( $wp_query->max_num_pages > 1 ) : ?>
			
				<div class="archive-nav">
				
					<?php echo get_next_posts_link( '&laquo; ' . __('Older posts', 'gates')); ?>
						
					<?php echo get_previous_posts_link( __('Newer posts', 'gates') . ' &raquo;'); ?>
					
					<div class="clear"></div>
					
				</div> <!-- /post-nav archive-nav -->
								
			<?php endif; ?>
	
		<?php else : ?>
						
			<div class="page-title section small-padding">
		
				<h4>
			
					<?php echo _e( 'Search results:', 'gates') . ' "' . get_search_query() . '"'; ?>
				
					<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					
					if ( "1" < $wp_query->max_num_pages ) : ?>
					
						<span><?php printf( __('(page %s of %s)', 'gates'), $paged, $wp_query->max_num_pages ); ?></span>
					
					<?php endif; ?>
					
				</h4>
				
			</div>
						
			<div class="post section medium-padding">
			
				<div class="post-content section-inner thin">
				
					<p><?php _e('No results. Try again, would you kindly?', 'gates'); ?></p>
					
					<?php get_search_form(); ?>
				
				</div> <!-- /post-content -->
				
				<div class="clear"></div>
			
			</div> <!-- /post -->
		
		<?php endif; ?>
		
	</div> <!-- /content section-inner -->
		
<?php get_footer(); ?>