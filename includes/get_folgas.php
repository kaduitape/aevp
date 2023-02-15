<?php

$data_hoje = the_date('d m Y');
$mes_atual = get_the_date('F');
$id_mes_atual = get_field('field_63ec15b7b6fc1','option');

$args = array(
    'p' => $id_mes_atual,
    'post_type' => 'folgas',
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
    
    while ( $query->have_posts() ) {
        $query->the_post();
        $id = get_the_ID();
        $get_folgas = get_field('field_63e3ddc1fa561', $id);
        
    }
}

wp_reset_postdata();

?>

