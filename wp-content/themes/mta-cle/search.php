<?php

/**

 * The Template for displaying all single posts.

 *

 * @package WordPress

 * @subpackage Twenty_Twelve

 * @since Twenty Twelve 1.0

 Template Name: Noticias

 */
get_header(); ?>
<div id="contenido">
<div id="pageContent" class="column8 down downV pad clearfix">
<h1>Búsqueda</h1>
<div id="wNoticias">
    <ul>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
            <li>
                <div id="picNoticia">
                     <?php the_post_thumbnail('notas'); ?>
                </div>
                <?php
                    $fechaEvento = get_field('fecha');
                    $dia = date('d', strtotime($fechaEvento));
                    $mes = traduceMes(date('m', strtotime($fechaEvento)));
                    $ano = date('Y', strtotime($fechaEvento));
                 ?>
                <div class="bajadaNoticia">
                    <span class="dateEvent"><?php echo $dia . ' de ' . $mes . ' de ' . $ano ?> , <?php the_field('hora'); ?> hrs., <?php the_field('lugar'); ?></span>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php echo cortar($post->post_content, 150); ?>
                </div>
            </li>
<?php endwhile; else: ?>
            
            <p>No se ha encontrado ning&uacute;n registro para su b&uacute;squeda. <br>
            Intent&aacute;lo de nuevo bajo otro criterio.</p>
<?php endif; ?>
    </ul>
</div><!--/wNoticias-->
</div><!--pageContent-->
<!--/END OF CONTENIDOS-->
<?php get_sidebar();?>
<?php get_footer(); ?>