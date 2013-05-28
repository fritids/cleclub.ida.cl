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
<h1>Resultados de Búsqueda</h1>
<div id="wNoticias">
    <?php if($wp_query->found_posts > 0) {
          echo '<h2>Resultados de búsqueda</h2>';
          echo '<span class="description">Se encontraron '. $wp_query->found_posts .' coincidencias con  "<strong>'.$_GET['s'].'</strong>"</span>';
      } ?>
    <ul>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
            <li>
                <div id="picNoticia">
                     <?php the_post_thumbnail('notas'); ?>
                </div>
               
                <div class="bajadaNoticia">
                    
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php echo cortar($post->post_content, 150); ?>
                </div>
            </li>
<?php endwhile; else: ?>
            
            <p>No hemos encontrado ningún resultado para la búsqueda "<strong><?php the_search_query(); ?></strong>". Te sugerimos realizar una nueva búsqueda:</p>
<?php endif; ?>
    </ul>
</div><!--/wNoticias-->
</div><!--pageContent-->
<!--/END OF CONTENIDOS-->
<?php get_sidebar();?>
<?php get_footer(); ?>