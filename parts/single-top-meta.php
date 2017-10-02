<p class="post-meta top">

    <a href="<?php the_permalink(); ?>" title="<?php the_time('h:i'); ?>"><?php the_time(get_option('date_format')); ?></a>
    
    <?php 
        if ( comments_open() ) {
            echo '<span class="sep">/</span> '; 
            comments_popup_link( __( '0 Comments', 'gates' ), __( '1 Comment', 'gates' ), __( '% Comments', 'gates' ) );
        }
    ?> 
    
    <?php edit_post_link( __('Edit','gates'), '<span class="sep">/</span> ', ''); ?>
    
</p>