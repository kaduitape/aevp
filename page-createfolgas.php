<?php get_header(); ?>

<div class="">


<?php 

verifica_mes();

include(locate_template('includes/get_folgas.php')); 

?>

<pre>
<?php print_r($get_folgas); ?>
</pre>


</div>

<?php get_footer(); ?>