<?php

add_action( 'after_setup_theme', 'my_theme_setup' );
function my_theme_setup(){
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'list_post size', 400, 400, true );
}


function kt_theme_styles() {
    wp_register_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' );
    wp_register_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css' );
    wp_register_style( 'select2', get_template_directory_uri().'/assets/plugins/global/plugins.bundle.css' );
    wp_enqueue_style('style', get_template_directory_uri().'/assets/css/index.min.css');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('font-awesome');
    wp_enqueue_style('select2');     
}

add_action('wp_enqueue_scripts' , 'kt_theme_styles');

function kt_admin_styles() 
{
    wp_enqueue_style( 'stylesheet', get_template_directory_uri() . '/assets/css/admin.css' );
}

function kt_theme_scripts() 
{
    wp_deregister_script('jquery');

    wp_register_script( 'jquery',   ( 'https://code.jquery.com/jquery-3.6.0.min.js' ), false, null, true );    
    wp_register_script( 'migrate',  ( 'https://code.jquery.com/jquery-migrate-3.3.2.min.js' ), false, null, true );    
    wp_register_script( 'bootstrap',( 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js'), null, null, true );
    wp_register_script( 'popper',   ( 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js'), null, null, true );
    wp_register_script( 'Carousel', ( 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'), null, null, true );   
    wp_register_script( 'Mask',     ( 'https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js'), null, null, true );  
    wp_register_script( 'Select2',     (get_template_directory_uri().'/assets/plugins/global/plugins.bundle.js'), null, null, true );   
    wp_register_script( 'Select2',     (get_template_directory_uri().'/assets/plugins/global/app.js'), null, null, true );   
    wp_register_script( 'script',   (  get_template_directory_uri(). '/assets/js/index.js'),'','', true);    

  
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'migrate' );
    wp_enqueue_script( 'bootstrap' );
    wp_enqueue_script( 'popper' );
    wp_enqueue_script( 'Carousel' );
    wp_enqueue_script( 'Mask' );
    wp_enqueue_script( 'Select2' );
    wp_enqueue_script( 'app' );
    wp_enqueue_script( 'script' );
    // wp_enqueue_script( 'parallax' );

    wp_localize_script(
        'script',
        'script_ajax', array(
            'ajax_url' => esc_url(home_url('/').'wp-admin/admin-ajax.php')
        )
    );
}

add_action('wp_enqueue_scripts', 'kt_theme_scripts');

add_action('wp_ajax_enviar', 'enviar');
add_action('wp_ajax_nopriv_enviar', 'enviar');

function enviar() 
{
   require_once(get_template_directory().'/setup/send/index.php');
}


// PAGINACAO

function post_pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;
    global $paged;

    if(empty($paged)) {
        $paged = 1;
    }

    if($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;

        if(!$pages) {
            $pages = 1;
        }
    }

    if(1 != $pages) {
        echo '<nav class="post-pagination">';
        echo '<div class="row justify-content-center align-items-center">';

        for($i = 1; $i <= $pages; $i++) {
            if((1 != $pages) && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || ($pages <= $showitems))) {
                echo ($paged == $i) ? '<span class="post-current"><span>' . $i . '</span></span>': '<a href="' . get_pagenum_link($i) . '"><span>'.$i.'</span></a>';
            }
        }

        echo '</div>';
        echo '</nav>';
		}
}


