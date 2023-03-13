<?php get_header(); ?>

<?php include(locate_template('includes/get_aevps.php'));  ?>

<?php
    $id = get_the_ID();
    $title = get_the_title();
    $valores = get_field('field_63e3e26aa87db', $id);
    $tempo = get_field('field_63e859e7ce06b', $id);
    $turno = get_field('field_63e859f7f72ef', $id);

    if($valores) {
        $qtd = count($valores);
        $total = round(($qtd - 4) / 2);
    } else {
        wp_die();
    }
 ?>

<h2>Criar escala de <?php echo $tempo. 'Minutos por torre'?></h2>

<div class="row m-3">

    <form id="formulario" action="javascript:;" method="post">
        <input type="hidden" name="tipo" value="escala">
        <input type="hidden" name="action" value="enviar">
        <input type="hidden" name="action" value="enviar">
        <input type="date" name="data" value="">
        <input type="text" name="tempo" value="<?php echo $tempo ?>">
        <input type="text" name="turno" value="<?php echo $turno ?>">
        <input id="qtd_campos" name="qtd_campos" value="<?php echo $qtd?>" type="number">

        <?php include(locate_template('includes/get_folgas.php'));   ?>
        <?php $n = 0; ?>

        <div class="row">

            <?php  foreach($valores as $valor) { ?>


                <?php $grupo = $valor['grupo'];  ?>

                <?php 
                    if($grupo === "1") {
                        echo '<div class="col-md-3 row">';
                    }
                    if($grupo > "1" && $grupo === $n) {
                        echo '<div class="col-md-3 row">';
                    } 
                ?>    


                <div class="row mb-2">

                    <div class="col-auto" id="<?php echo 'horario' ?>">
                        <input name="<?php echo 'time_'.$n ?>" type="time" step="1" value="<?php echo $valor['horario'] ?>">
                    </div>

                    <div class="col-auto">
                        <select id="aevp_<?php echo $n?>" class="js-example-basic-single" data-control="select2"
                            name="<?php echo 'aevp_'.$n ?>" id="<?php echo 'aevp' ?>">
                            <option value="">Selecione</option>
                            <?php foreach($aevps as $aevp) { ?>
                            <option value="<?php echo $aevp ?>"><?php echo $aevp ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>

                <?php 
                    if($grupo === "1") {
                        echo '</div>';
                    }
                    if($grupo > "1" && $grupo === $n) {
                        echo '</div>';
                    } 
                ?> 


            <?php  $n++;  } ?>

            <button type="submit">Enviar</button>
        <div>

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