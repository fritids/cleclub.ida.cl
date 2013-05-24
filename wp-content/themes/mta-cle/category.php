<?php get_header(); ?>
<div id="contenido">
    <div id="pageContent" class="column8 downV pad down">
        <h1><?php echo single_cat_title('', false) ?></h1>
        <div id="wNoticias">
            <ul>
               

                <?php while (have_posts()) : the_post(); ?> 
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
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php echo cortar($post->post_content, 150); ?>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div><!--/wNoticias-->
    </div><!--pageContent-->
    <!--/END OF CONTENIDOS-->
    <?php get_sidebar(); ?>
    <?php get_footer(); ?>