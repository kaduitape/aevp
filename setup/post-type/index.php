<?php




function tp_post_types() {

    
}


// -----------------MODELO DE POST TYPE--------------------//

    register_post_type('aevp',
        array(
            'labels' => array(
                'name' => 'AEVP',
                'all_items' => 'Todos'
            ),
            'public' => true,
            'has_archive' => true,
            'hierarchical' => true,
            'menu_icon' => 'dashicons-admin-page',
            'menu_position' => 4,
            'rewrite'       => false,
            'publicly_queryable' => false,
            'supports' => array('title')
        )
    );

    register_post_type('turnos',
        array(
            'labels' => array(
                'name' => 'TURNOS',
                'all_items' => 'Todos'
            ),
            'public' => true,
            'has_archive' => true,
            'hierarchical' => true,
            'menu_icon' => 'dashicons-admin-page',
            'menu_position' => 5,
            'rewrite'       => false,
            'publicly_queryable' => false,
            'supports' => array('title')
        )
    );

    register_post_type('escala',
        array(
            'labels' => array(
                'name' => 'ESCALA',
                'all_items' => 'Todos',
            ),
            'public' => true,
            'has_archive' => true,
            'hierarchical' => true,
            'menu_icon' => 'dashicons-admin-page',
            'menu_position' => 6,
            'supports' => array('title')
        )
    );

    register_post_type('folgas',
        array(
            'labels' => array(
                'name' => 'FOLGAS',
                'all_items' => 'Todos'
            ),
            'public' => true,
            'has_archive' => true,
            'hierarchical' => true,
            'menu_icon' => 'dashicons-admin-page',
            'menu_position' => 7    ,
            'supports' => array('title')
        )
    );

    register_post_type('tempo',
    array(
        'labels' => array(
            'name' => 'TEMPO',
            'all_items' => 'Todos'
        ),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'menu_icon' => 'dashicons-admin-page',
        'menu_position' => 8 ,
        'supports' => array('title')
    )
);
        
    

    
// -----------------MODELO DE TAXINOMIA-------------------//

        // register_taxonomy('nome_taxinomia', 'nome-post-pertencente',
        // array(
        //     'labels' => array(
        //         'name' => __('Nome Legenda'),
        //         'add_new_item' => __('adicionar categorias')
        //     ),
        //     'public' => true,
        //     'hierarchical' => true,
        //     'show_admin_column' => true,
        //     'admin_column_sortable' => true,
        //     'admin_column_filter' => true,
        //     'slug' => 'categorias'
        //     )
        // );

        if( function_exists('acf_add_options_page') ) {
	
            acf_add_options_page(array(
                'page_title' 	=> 'Configurações',
                'menu_title'	=> 'CONFIGURAÇÕES',
                'menu_slug' 	=> 'config-data',
                'capability'	=> 'edit_posts',
                'position'      => 9,
                'redirect'		=> false
            ));
        
        }
          