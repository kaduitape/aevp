<?php get_header(); ?>
<?php include(locate_template('includes/get_aevps.php'));  ?>


<?php 
    $id = get_the_ID();
    echo $id;
    $valores = get_field('field_63e3e26aa87db', $id);

    $n = 0;

    
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


?>





<?php get_footer(); ?>