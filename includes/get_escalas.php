<?php

$data_hoje = the_date('d m Y');
$mes_atual = get_the_date('F');

$args = array(
    'post_type' => 'escala',
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
    
    while ( $query->have_posts() ) {
        $query->the_post();
        $id = get_the_ID();
        $title = get_the_title();
        $data = get_field('field_63e8512aa06b9',$id);
    ?>

    <a class="bc_escalas d-block mb-3" href="<?php the_permalink()?>">
        <?php echo "Escala do dia".$data. " - ".$title ?>
    </a>

    <?php 
        
    }
}
wp_reset_postdata();
?>