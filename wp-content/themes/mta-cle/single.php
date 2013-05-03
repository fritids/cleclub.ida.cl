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

                    if (get_field('fecha') && has_term("agenda", "taxeventos")) :
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
                
                        <?php endif;?>
                        
                <?php the_content();?>
                
                 <?php if (get_field('archivo_adjunto')) {
                    echo '<h3>Descarga</h3>';                     
                    echo '<a class="btnDown" href="' . wp_get_attachment_url(get_field('archivo_adjunto')) . ' " rel="nofollow" title="Descargar Estudio">'. ( in_category('cdd-uc') ? 'Descargar Revista' : 'Descargar Estudio') .'</a>';
                }
                ?>
                
                        <?php
                    
                } else {
                	the_content();
                    echo '<h3>Descarga ...</h3>';                        
                    echo '<strong>Acceso restringido para miembros del CLE Club</strong>';
                };
                ?>
                <?php
                
            endwhile;
            ?>
            <?php
           
            ?>
            <?php if (has_term("evento", "taxeventos") && get_field('imagenes')): ?>
                <div class="gallery">
                    <ul>
                            <?php
                            $r = get_field('imagenes');
                            if ($r):
                                $i=0;
                                foreach ($r as $img):
                                    $imgID = $img['imagen_galeria'];
                                    $ruta =  wp_get_attachment_image_src($imgID, "full");
                                    echo '<li><a href="' . $ruta[0] . '" class="evt" data-ancho="' . $ruta[1] . '"  data-alto="' . $ruta[2] . '" data-func="getImage"  data-item="'.$i.'">' . wp_get_attachment_image($imgID, "gallery") . ' </a></li>';
                                    $i++;
                                endforeach;
                            endif;
                            ?>                        
                    </ul>
                </div> 
            <?php endif; ?>
        </div>
    </div>    
</div><!--pageContent-->
<?php get_footer(); ?>