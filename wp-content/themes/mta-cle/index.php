<?php get_header(); ?>
<div id="contenido" class="clearfix">
    <div class="slideBloq clearfix">
        <div id="leftSide" class="column8 down">
            <div class="slideContainer column12">
                <?php echo sliderHome() ?>
            </div>
        </div>
        <?php get_sidebar();?>
    </div>
    <div id="wNotas" class="column12 clearfix pad">
        <div id="wNotasEY" class="boxNotas column4 down">
            <div class="tituloNota"><a href="/categoria/ernst-young/"> Departamento de Estudios <br /> Ernst &amp; Young</a> </div>
            <?php echo notas(array('category_name' => 'ernst-young', 'order' => 'DESC', 'posts_per_page' => 3)); ?>            
        </div>
        
        <div id="wNotasDF" class="boxNotas column4 down">
            <div class="tituloNota"><a href="/diario-financiero/">Notas Diario Financiero</a></div>
            <?php echo parseFeedHome("http://www.df.cl/prontus_df/site/tax/port/all/rss_5___1.xml"); ?>
        </div>
        <div id="wNotasUC" class="boxNotas column4 last down">
            <div class="tituloNota"><a href="/categoria/cdd-uc/">CDD-UC</a></div>
            <?php echo notas(array('category_name' => 'cdd-uc', 'order' => 'DESC', 'posts_per_page' => 3)); ?>
        </div> 
    </div>
    <?php get_footer(); ?>