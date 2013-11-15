<?php get_header(); the_post();?>

 <?php 
 $terms = wp_get_post_terms( $post->ID, 'category');
 $termsAgendas = wp_get_post_terms( $post->ID, 'taxeventos');
 $inornot = false;
 $agenda = false;
 $onlyEY = false;
 $onlyAgenda = false;
 if(in_array('ernst-young', (array)$terms[0]) || in_array('cdd-uc', (array)$terms[0])){
     $inornot = true;
 }
if(in_array('agenda', (array)$termsAgendas[0]) || in_array('evento', (array)$termsAgendas[0])){
     $agenda = true;
 }
 if(in_array('agenda', (array)$termsAgendas[0])){
     $onlyAgenda = true;
 }
 if(in_array('ernst-young', (array)$terms[0])){
     $onlyEY = true;
 }
 ?>   

<div id="contenido" class="row">
    <?php echo breadcrumb(); ?>      
        <?php if (is_user_logged_in() || $inornot) { ?>
        <div id="leftSide" class="column8 downV down">
            <div id="cSlider">
                <div id="fixedPic">
                    <?php echo get_the_post_thumbnail($post->ID, "slideHome", array('class' => "")); ?>
                </div>
            </div><!--/cSlider-->
        </div><!--/leftSide -->
    
    <?php get_sidebar(); ?>        <div id="pageContent" class="column8 down downV pad">
            <h1><?php the_title(); ?></h1>

            <div id="postContent">
            
                <?php
                if (is_user_logged_in() || $onlyEY) {

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
                                <li><strong>Contacto:</strong><span><a href="mailto:contacto@cleclub.cl"> contacto@cleclub.cl</a></span></li>
                            </ul>
                                
                        </div>
                
                        <?php endif;?>
                <?php if(get_field('relator') && get_field('curriculum_relator')){
                     echo '<h3>Relator:' . get_field('relator') . '</h3>';
                     echo '<div id="overflow-text">';
                     echo '<p>'.get_field('curriculum_relator').'</p>';
                     echo '</div>';
                 } ?>
                <?php if($onlyAgenda == true){ ?>
                    <h3>Descripción</h3>
                <?php } ?>
                
                <?php the_content();?>
                 <?php if($agenda == true){ 
                     if (get_field('archivo_adjunto')) {
                        echo '<div class="share"><a class="btnDown" href="' . wp_get_attachment_url(get_field('archivo_adjunto')) . ' " rel="nofollow" title="Descargar Estudio">Descargar Presentación</a>';
                    } 
                 }else{
                    if (get_field('archivo_adjunto')) {
                        echo '<div class="share"><a class="btnDown" href="' . wp_get_attachment_url(get_field('archivo_adjunto')) . ' " rel="nofollow" title="Descargar Estudio">'. ( in_category('cdd-uc') ? 'Descargar Revista' : 'Descargar Estudio') .'</a>';
                    }
                 } ?>
                
                
                <?php
                } else {
                     if(get_field('relator') && get_field('curriculum_relator')){
                         echo '<h3>Relator:' . get_field('relator') . '</h3>';
                         echo '<div id="overflow-text">';
                         echo '<p>'.get_field('curriculum_relator').'</p>';
                         echo '</div>';
                     }
                     if($onlyAgenda == true){
                        echo '<h3>Descripción</h3>';
                     }
                     the_content();
                     if(get_field('archivo_adjunto')){
                     echo '<div class="share"><div class="exclusive"><strong>Descarga exclusiva para miembros de CLE CLUB</strong><br /><small><a href="/solicitud-de-membresia/">Solicita Membresía</a> o <span class="hide-on-phones hide-on-v-tablets">Inicia Sesion</span><span><a href="/login/" class="hide-on-desktop hide-on-h-tablets">Inicia Sesion</a></span></small></div></div>';
                     }
                     
                     };
                ?>
                <?php if($onlyAgenda == false){ ?>
                <ul class="social">
                    <li><span>Comparte este artículo:</span></li>
                    <li><a class="lkd"target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title();?>&summary=<?php the_title();?>&source={articleSource}">linkedin</a></li>
                    <li><a class="twitter" href="https://twitter.com/intent/tweet?text=<?php the_title();?> <?php the_permalink();?>&amp;hashtags=#Cleclub;via=CLECLUB" rel="nofollow">twitter</a></li>
                    
                </ul>
                <?php } ?>
            </div>
                
            <?php if (has_term("evento", "taxeventos") && get_field('imagenes')): ?>
                <div class="gallery clearfix">
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
        
        <?php
        } else {

            echo '<div class="column8 authorBio clearfix pad down downV">
                <div class="authorWrap">
                <strong>Acceso restringido para miembros del CLE CLUB</strong>
                </div>
                </div>';
            
        }
       get_sidebar();
        ?>
    </div>    
</div><!--pageContent-->
<?php get_footer(); ?>