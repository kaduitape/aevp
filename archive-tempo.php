<?php get_header(); ?>

<?php include(locate_template('includes/get_aevps.php'));  ?>

<section class="tempo pt-5">
    <div class="container">
    <h1>Escalas Diurna das 06:00 as 18:00</h1>
        <div class="row">

<?php
$args = array(
    'post_type' => 'tempo',
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
    // Start looping over the query results. 
    while ( $query->have_posts() ) {
        $query->the_post();
        $id = get_the_ID();
        $title = get_the_title();
        $tempo = get_field('field_6401f6e760794',$id);
        $minutos = get_field('field_63e859e7ce06b',$id);

        if($tempo === 'diurna') {    ?>      
            <div class="col-md-auto rounded-3 bg-gray p-3 m-2 text-center"> 
                <figure>
                    <img width="60" src="<?php echo get_template_directory_uri().'/assets/images/time.png' ?>" alt="">
                </figure>
                <a href="<?php the_permalink();?>">
                    <h2><?php echo $minutos.'min' ?></h2>
                    <p>criar escala <?php echo $tempo.'<br><b>'.$minutos.'min</b> por Torre'?></p>
                </a>
            </div>

        <?php
        }
    }
}
?>


<div class="mb-5"></div>
<h1>Escalas Noturna das 18:00 as 06:00</h1>


<?php

if ( $query->have_posts() ) {
    // Start looping over the query results. 
    while ( $query->have_posts() ) {
        $query->the_post();
        $id = get_the_ID();
        $title = get_the_title();
        $tempo = get_field('field_6401f6e760794',$id);
        $minutos = get_field('field_63e859e7ce06b',$id);


        if($tempo === 'noturna') {    ?>  

    
            <div class="col-md-auto rounded-3 bg-gray p-3 m-2 text-center">
                <a href="<?php the_permalink();?>">
                    <figure>
                        <img width="60" src="<?php echo get_template_directory_uri().'/assets/images/time.png' ?>" alt="">
                    </figure>
                    <h2><?php echo $minutos.'min' ?></h2>
                    <p>criar escala <?php echo $tempo.'<br><b>'.$minutos.'min</b> por Torre'?></p>
                </a>
            </div>


        <?php
        }
    }
}
?>




<?php
wp_reset_postdata();
?>


        </div>
    </div>
</section>


<?php get_footer(); ?>