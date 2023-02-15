<?php
// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// CSS Admin
add_action('admin_head', 'kt_admin_styles');

//post-types 
require get_template_directory().'/setup/post-type/index.php';

add_action('init', 'tp_post_types');

//Hooks 
require get_template_directory().'/setup/setup.php';
require get_template_directory().'/setup/metabox/index.php';


// enviar formulario
add_action('wp_ajax_enviar', 'enviar');
add_action('wp_ajax_nopriv_enviar', 'enviar');

function add_custom_query_var( $vars ) { 
    $vars[] = "idk";
    return $vars; } 
    add_filter( 'query_vars', 'add_custom_query_var' );


function verifica_mes() {
    $id_mes_atual = get_field('field_63ec15b7b6fc1','option');
    $mes_atual = get_field('field_63ec15ded737b', 'option');
    $mes = get_the_date('F');
    $ano = get_the_date('Y');

   if ($mes !== $mes_atual ) {

       $args = array(
           'post_type'   => 'folgas',
           'post_title'  =>  $mes. '-' .$ano,
           'post_status' => 'publish',
       );
   
       $id = wp_insert_post($args);

       $update = update_field('field_63ec15b7b6fc1', $id, 'option');
       $update = update_field('field_63ec15ded737b', $mes, 'option');
       $update = update_field('field_63ec1fabd5ef4', $ano, 'option');

   }
}

