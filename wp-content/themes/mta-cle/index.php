<?php get_header(); ?>
<div id="contenido" class="clearfix">
    <div id="leftSide">
        <div id="cSlider">
            <div id="layerslider">
                <?php echo slideHome(); ?>
            </div>
        </div>
    </div>
    <?php get_sidebar(); ?>
    <div id="wNotas" class="clearfix">
        <div id="wNotasEY" class="boxNotas">
            <div class="tituloNota"><a hreF="/category/estudios-ernst-young/"> Estudios Ernst &amp; Young </a> </div>
            <?php echo notas(array('category_name' => 'estudios-ernst-young', 'order' => 'DESC', 'posts_per_page' => 3)); ?>            
        </div>
        <div id="wNotasUC" class="boxNotas middleBox">
            <div class="tituloNota"><a href="/category/charlas-cdd-uc/">Charlas CDD – UC Noticias</a></div>
            <?php echo notas(array('category_name' => 'charlas-cdd-uc', 'order' => 'DESC', 'posts_per_page' => 3)); ?>
        </div> 
        <div id="wNotasDF" class="boxNotas">
            <div class="tituloNota"><a href="/category/noticias-diario-financiero/">Diario Financiero</a></div>
            <?php echo parseFeed("http://www.df.cl/prontus_df/site/edic/base/rss/economia.xml"); ?>
        </div>
    </div>
    <?php get_footer(); ?>