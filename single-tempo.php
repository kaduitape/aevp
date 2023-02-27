<?php get_header(); ?>


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
        $valores = get_field('field_63e3e26aa87db', $id);
        $tempo = get_field('field_63e859e7ce06b', $id);
        $turno = get_field('field_63e859f7f72ef', $id);
    }
}
// Restore original post data. 
wp_reset_postdata();
?>

<div class="row">

<div class="col-md-6">

<form id="formulario" action="javascript:;" method="post">
    <input type="hidden" name="tipo" value="escala">
	<input type="hidden" name="action" value="enviar">
    <input type="hidden" name="action" value="enviar">
    <input type="date" name="data" value="">
    <input type="text" name="tempo" value="<?php echo $tempo ?>">
    <input type="text" name="turno" value="<?php echo $turno ?>">

    <div class="">
    <table>

<?php

$n = 0;

include(locate_template('includes/get_folgas.php'));    

foreach($valores as $valor) { ?>

        <tr>
            <td id="<?php echo 'horario' ?>">
                <input name="<?php echo 'time_'.$n ?>" type="time" step="1" value="<?php echo $valor['horario'] ?>">
            </td>

            <td>
                <select id="aevp_<?php echo $n?>" class="js-example-basic-single" data-control="select2" name="<?php echo 'aevp_'.$n ?>" id="<?php echo 'aevp' ?>">
                    <?php foreach($aevps as $aevp) { ?>
                    <option value="<?php echo $aevp ?>"><?php echo $aevp ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>


        <?php 
        $n++; 
    } 

?>


    </table>

    <input id="qtd_campos" name="qtd_campos" value="<?php echo $n?>" type="number">

</div>



<button type="submit">Enviar</button>

</form>

</div>

<div class="col-md-6">

<?php 



include(locate_template('includes/get_folgas.php')); 


$data_hoje = date('d/m/Y');
$hora = time();

date_default_timezone_get();


echo $data_hoje;


foreach($get_folgas as $folga) {

    if ($data_hoje === $folga['data']) {
        echo $folga['aevp']->post_title.' - '. $folga['data'].' - '.$folga['tipo'].'<br>';
    }
    
}

?>


</div>

</div>


<?php get_footer(); ?>