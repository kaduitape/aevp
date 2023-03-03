<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <section class="topo">
        <div class="container">
             <div class="row justify-content-center align-items-center col">
                <img class="logo" width="150" src="<?php echo get_template_directory_uri().'/assets/images/logo.png' ?>" alt="">
            </div>
        </div>
    </section>


