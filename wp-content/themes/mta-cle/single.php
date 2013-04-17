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
                            <dl class="eventoInfo">
                                <dt><strong>Fecha:</strong></dt>
                                <dd><?php echo $fechaEvento; ?></dd>
                                <dt><strong>Hora:</strong></dt>

                                <dd><?php the_field('hora'); ?> hrs.</dd>
                                <dt><strong>Lugar:</strong></dt>

                                <dd><?php the_field('lugar'); ?></dd>
                                <dt><strong>Contacto:</strong></dt>

                                <dd><a href="mailto:contacto@cleclub.cl">contacto@cleclub.cl</a></dd>
                            </dl>
                            
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
        </div>
    </div>    
</div><!--pageContent-->
<?php get_footer(); ?>