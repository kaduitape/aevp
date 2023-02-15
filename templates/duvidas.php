<?php
$args = array(
        'post_type' => 'duvidas',
        'post_per_page' => '-1',
        'order' => 'ASC',
    ); 
?>

<section class="sessao-duvidas">
    <div class="container">
        <h2 class="f1 f_36 azul center">Principais dúvidas</h2>
        <div class="h-80"><br></div>
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <?php
                            query_posts( $args );
                                while(have_posts()):
                                    the_post();
                           
                            ?>

                <div class="faq_item">
                    <div class="faq_open f_36 upper spr-bf "><?php the_title()?></div>
                    <div class="faq_box">
                        <?php the_content()?>
                    </div>
                </div>


                <?php
                     endwhile;
                ?>





            </div>
        </div>
    </div>
    <div class="h-80"><br></div>
</section>