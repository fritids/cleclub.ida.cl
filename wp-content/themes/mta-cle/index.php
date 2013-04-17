<?php get_header(); ?>
<div id="contenido" class="clearfix">
    <div class="clearfix">
        <div id="leftSide">
            <div id="cSlider">
                <div id="layerslider">
                    <?php echo slideHome(); ?>
                </div>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
    <div id="wNotas" class="clearfix">
        <div id="wNotasEY" class="boxNotas">
            <div class="tituloNota"><a href="/categoria/ernst-young/"> Estudios Ernst &amp; Young </a> </div>
            <?php echo notas(array('category_name' => 'ernst-young', 'order' => 'DESC', 'posts_per_page' => 3)); ?>            
        </div>
        <div id="wNotasUC" class="boxNotas middleBox">
            <div class="tituloNota"><a href="/categoria/cdd-uc/">CDD UC</a></div>
            <?php echo notas(array('category_name' => 'cdd-uc', 'order' => 'DESC', 'posts_per_page' => 3)); ?>
        </div> 
        <div id="wNotasDF" class="boxNotas">
            <div class="tituloNota"><a href="/diario-financiero/">Diario Financiero</a></div>
            <?php echo parseFeedHome("http://www.df.cl/prontus_df/site/tax/port/all/rss_5___1.xml"); ?>
        </div>
    </div>
    <?php get_footer(); ?>