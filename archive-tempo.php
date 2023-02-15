<?php get_header(); ?>

<?php include(locate_template('includes/get_aevps.php'));  ?>

<div class="">

<?php
$args = array(
    'post_type' => 'tempo',
);
// Custom query. 
$query = new WP_Query( $args );
// Check that we have query results. 
if ( $query->have_posts() ) {
    // Start looping over the query results. 
    while ( $query->have_posts() ) {
        $query->the_post();
        $id = get_the_ID();
        $title = get_the_title();
    ?>
    
    <a href="<?php the_permalink();?>"><?php echo $title?></a>

    <?php
    }
}
// Restore original post data. 
wp_reset_postdata();
?>




</div>


<?php get_footer(); ?>