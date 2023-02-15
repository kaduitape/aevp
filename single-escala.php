<?php get_header(); ?>

<?php 

    $title = get_the_title(); 
    $id = get_the_ID();
    $vescala = get_field('field_63e778fcdf844',$id);

?>

<div class="">

<?php echo $title ?>

<table>

    <tr>

    <?php 
    $n = 0;

    foreach($vescala as $escala) {
        
    if ($n <= 3) {
        echo '<td>'.$escala['horario'].'-'.$escala['nome'].' | </td>';
    } else {
        echo '</tr>';
        echo '<tr>';
        echo '<td>'.$escala['horario'].'-'.$escala['nome'].'</td>';
    } 

    $n++;
    
    
        
    ?>

    

    <?php } ?>

</table>


</div>

<?php get_footer(); ?>