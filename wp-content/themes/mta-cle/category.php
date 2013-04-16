<?php get_header(); ?>
<div id="contenido">
    <div id="pageContent">
        <h1><?php echo single_cat_title('', false) ?></h1>
        <div id="wNoticias">
            <ul>
                <?php
                if (is_category("agenda")) {
                    query_posts(array("orderby" => "date", "order" => "ASC"));
                }
                ?> 

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
                        <div id="bajadaNoticia">
                            <span class="dateEvent"><?php echo $dia . ' de ' . $mes . ' de ' . $ano ?> , <?php the_field('hora'); ?> hrs., <?php the_field('lugar'); ?></span>
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