<?php get_header(); ?>
<div id="contenido">
    <div id="leftSide">
        <div id="cSlider">
            <div id="layerslider">
                <?php echo slideHome(); ?>
            </div>
        </div>
    </div>
    <?php get_sidebar(); ?>
    <div id="wNotas">
        <div id="wNotasEY" class="boxNotas">
            <div class="tituloNota"><span class="naranjo">|</span> <a hreF="/category/estudios-ernst-young/"> Estudios Ernst &amp; Young </a> </div>
            <?php echo notas(array('category_name' => 'estudios-ernst-young', 'order' => 'DESC', 'posts_per_page' => 3)); ?>            
        </div>
        <div id="wNotasDF" class="boxNotas middleBox">
            <div class="tituloNota"> <span class="naranjo">|</span> <a href="/category/noticias-diario-financiero/">Diario Financiero</a></div>
            <?php echo notas(array('category_name' => 'noticias-diario-financiero', 'order' => 'DESC', 'posts_per_page' => 3)); ?>
        </div>

        <div id="wNotasEY" class="boxNotas">
            <div class="tituloNota"> <span class="naranjo">|</span> <a href="/category/charlas-cdd-uc/">Charlas CDD – UC Noticias</a></div>
            <?php echo notas(array('category_name' => 'charlas-cdd-uc', 'order' => 'DESC', 'posts_per_page' => 3)); ?>
        </div>    
    </div>
    <?php get_footer(); ?>