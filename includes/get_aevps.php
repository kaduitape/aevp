<?php 
$aevps = array();

$args = array(
    'post_type' => 'aevp',
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {

    while ( $query->have_posts() ) {
        $query->the_post();
        $id = get_the_ID();
        $name = get_the_title();

        $aevps[] = $name;
    }
}

?>