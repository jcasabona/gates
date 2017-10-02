<?php 

function is_learndash_type() {
    $types = array( 'sfwd-courses', 'sfwd-lessons', 'sfwd-topic', 'sfwd-quiz', 'sfwd-certificates', 'sfwd-assignment' ); 
    return is_singular( $types );
}