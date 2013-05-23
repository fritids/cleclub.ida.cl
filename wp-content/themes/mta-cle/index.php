<?php get_header(); ?>
<div id="contenido" class="clearfix">
    <div class="slideBloq clearfix">
        <div id="leftSide" class="column8 down">
            <div class="slideContainer column12">
                <ul id="slider" class="sliderHome">
                    <li>
                        <figure>
                            <img src="<?php bloginfo('template_directory'); ?>/_img/slide1.jpg"/>
                                 <figcaption>
                                     <div class="cap">
                                     <h2>Encuesta de Fraude Capítulo Chile</h2>
                                     <p class="hide-on-phones">Resultados para Chile del Capital Confidence Barometer...</p>
                                     </div>
                                </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="<?php bloginfo('template_directory'); ?>/_img/slide2.jpg"/>
                                 <figcaption>
                                    Esto es un titulo de dos o mas lineas
                                 </figcaption>

                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="<?php bloginfo('template_directory'); ?>/_img/slide3.jpg"/>
                                 <figcaption></figcaption>
                                    
                        </figure>
                    </li>
                </ul>
                <!--<div id="layerslider">
                    <?php //echo slideHome(); ?>
                </div>-->
                <ul class="slideNav">
                    <li><a class="active" href="#">1</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                </ul>
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