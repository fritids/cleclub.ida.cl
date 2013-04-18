<?php get_header(); ?>
<div id="contenido">
    <?php while (have_posts()) : the_post(); ?> 
        <div id="leftSide">
            <div id="cSlider">
                <div id="fixedPic">
                    <?php echo get_the_post_thumbnail($post->ID, "slideHome", array('class' => "")); ?>
                </div>
            </div><!--/cSlider-->
        </div><!--/leftSide -->
        <?php get_sidebar(); ?>
        <div id="pageContent">
            <h1><?php the_title(); ?></h1>

            <div id="postContent">
                <?php
                if (is_user_logged_in()) {
                    
                    if (get_field('fecha') && has_term( "agenda", "taxeventos")) :
                        $fechaEvento = get_field('fecha');
                        $dia = date('d', strtotime($fechaEvento));
                        $mes = traduceMes(date('m', strtotime($fechaEvento)));
                        $ano = date('Y', strtotime($fechaEvento));
                        $fechaEvento = $dia . ' ' . $mes . ' ' . $ano;
                        ?>
                
                        <div class="eventInfo">
                            <h3>Datos del Evento</h3>
                            <ul class="eventoInfo">
                                <li><strong>Fecha:</strong><span><?php echo $fechaEvento; ?></span></li>
                                <li><strong>Hora:</strong><span><?php the_field('hora'); ?> hrs.</span></li>
                                <li><strong>Lugar:</strong><span><?php the_field('lugar'); ?></span></li>
                                <li><strong>Contacto:</strong><span><a href="mailto:contacto@cleclub.cl">contacto@cleclub.cl</a></span></li>
                            </ul>
                            
                        </div>
                <?php
                endif;
                } else {
                    echo '<strong>Acceso restringido para miembros del CLE Club</strong>';
                };
                ?>
                <?php
                the_content();
            endwhile;
            ?>
           <?php if(get_field('archivo_adjunto')){
               echo '<a class="btnDown" href="' . wp_get_attachment_url(get_field('archivo_adjunto')) .' " rel="nofollow" title="Descargar Estudio">Descargar Estudio</a>';
            }?>
                
             <div class="gallery">
            <ul>
                <li>
                    <a href="#"><img src="<?php bloginfo('template_directory'); ?>/_img/pruebagallery.jpg"/></a>   
                </li>
                <li>
                    <a href="#"><img src="<?php bloginfo('template_directory'); ?>/_img/pruebagallery.jpg"/></a>   
                </li>
                <li class="last_gal">
                    <a href="#"><img src="<?php bloginfo('template_directory'); ?>/_img/pruebagallery.jpg"/></a>   
                </li>
                <li>
                    <a href="#"><img src="<?php bloginfo('template_directory'); ?>/_img/pruebagallery.jpg"/></a>   
                </li>
                <li>
                    <a href="#"><img src="<?php bloginfo('template_directory'); ?>/_img/pruebagallery.jpg"/></a>   
                </li>
            </ul>
        </div>   
        </div>
    </div>    
</div><!--pageContent-->
<?php get_footer(); ?>