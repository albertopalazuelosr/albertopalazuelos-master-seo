<?php
include_once 'header.php';
?>

<div class="generico">

    <h1><?php single_cat_title();?></h1>

    <section id="contenido">
        <?php
        echo category_description();
        ?>
    </section>
    <section id="articulos">
    <?php
        $args = array(
            'cat' => get_query_var('cat'),
            'posts_per_page' => '-1',
            'post_type' => 'post',
            'orderby' => 'date', //poniendolo como rand se ordenan de manera aleatoria//
            'order' => 'DESC',
         ); //quedan todos los posts ordenados por fecha en forma descendente//
         $the_query = new WP_Query( $args);
         if ( $the_query->have_posts()){
             while ( $the_query->have_posts() ) {
                $the_query->the_post();
                include get_template_directory() .'/plantillas/display-posts/card-posts.php';
             }
         }
        else{
            echo "No hay posts";
         }
         wp_reset_postdata();
    ?>
    </section>
</div>
<?php
include_once 'footer.php';?>