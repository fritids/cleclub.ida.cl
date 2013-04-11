<?php get_header(); ?>
<div id="contenido">
    <div id="leftSide">
        <div id="cSlider">
            <div id="layerslider">
                <?php
                $args = array('category_name' => 'banner', 'order' => 'ASC', 'posts_per_page' => 5);
                query_posts($args);
                $i = 1;

                while (have_posts()) : the_post();
                    $pic = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                    $postID = $post->ID;
                    ?>
                    <div class="ls-layer" style="slidedelay: 3000">
                        <img class="ls-bg" src="<?php echo get_template_directory_uri(); ?>/tt.php?src=<?php echo $pic; ?>&w=645&h=300" alt="layer">
                    </div>
                <?php endwhile; ?>
            </div><!--/layerslider-->
        </div><!--/cSlider-->
    </div><!--/leftSide -->
    <?php get_sidebar(); ?>
    <!--3 bloques de notas-->
    <div id="wNotas">
        <div id="wNotasEY" class="boxNotas">
            <div class="tituloNota"><span class="naranjo">|</span> <a hreF="/category/estudios-ernst-young/"> Estudios Ernst &amp; Young </a> </div>
            <?php echo notas(array('category_name' => 'estudios-ernst-young', 'order' => 'DESC', 'posts_per_page' => 3));?>            
        </div>
        <div id="wNotasDF" class="boxNotas middleBox">
            <div class="tituloNota"> <span class="naranjo">|</span> <a href="/category/noticias-diario-financiero/">Diario Financiero</a></div>
           <?php echo notas(array('category_name' => 'noticias-diario-financiero', 'order' => 'DESC', 'posts_per_page' => 3));?>
        </div>
        
        <div id="wNotasEY" class="boxNotas">
            <div class="tituloNota"> <span class="naranjo">|</span> <a href="/category/charlas-cdd-uc/">Charlas CDD – UC Noticias</a></div>
             <?php echo notas(array('category_name' => 'charlas-cdd-uc', 'order' => 'DESC', 'posts_per_page' => 3));?>
        </div>    
    </div><!--/wNotas-->
    <!--end of 3 bloques -->
    <?php get_footer(); ?>