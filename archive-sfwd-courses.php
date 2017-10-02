<?php get_header(); ?>

<div class="content">

	<div class="page-title">
			
		<div class="section-inner">

			<h4><?php echo __( 'Courses', 'gates' ); ?></h4>
			
		</div> <!-- /section-inner -->
		
	</div> <!-- /page-title -->
	
	<?php if ( have_posts() ) : ?>
        <?php if( function_exists( 'learndash_course_grid_css' ) ) : ?>
            <?php  
                $content  =  apply_filters( 'the_content', '[ld_course_list]' ); // This is a terrible hack to get LD Course Grid Styles to load.
                $content = do_shortcode( '[ld_course_list]' ); 
                echo $content;
            ?>
        <?php else : ?>
            <?php rewind_posts(); ?>
                
            <div class="posts" id="posts">
                
                <?php while ( have_posts() ) : the_post(); ?>
                            
                    <?php get_template_part( 'content', get_post_format() ); ?>
                    
                <?php endwhile; ?>
                                
            </div> <!-- /posts -->
            
            <?php if ( $wp_query->max_num_pages > 1 ) : ?>
                
                <div class="archive-nav">
                
                    <div class="section-inner">
                
                        <?php echo get_next_posts_link( '&laquo; ' . __('Older posts', 'gates')); ?>
                                
                        <?php echo get_previous_posts_link( __('Newer posts', 'gates') . ' &raquo;'); ?>
                        
                        <div class="clear"></div>
                    
                    </div>
                    
                </div> <!-- /post-nav archive-nav -->
                                
            <?php endif; ?>
        <?php endif; ?>
	<?php endif; ?>

</div> <!-- /content -->

<?php get_footer(); ?>