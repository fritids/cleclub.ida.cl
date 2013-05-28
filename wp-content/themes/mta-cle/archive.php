<?php get_header(); ?>
<div id="contenido">
<div id="pageContent" class="column8 downV down pad">
 <?php 
 $terms = wp_get_post_terms( $post->ID, 'taxeventos');
 $agenda = false;
 if(in_array('agenda', (array)$terms[0])){
     $agenda = true;
 }
 ?>   
 <?php if (is_user_logged_in() || $agenda) { ?>
<h1><?php echo single_cat_title( '', false ) ?></h1>
<div id="wNoticias">
    <ul>
         <?php
                if(is_tax("taxeventos", "agenda")) query_posts(array("post_type"=>"eventos_sociales", "tax_query"=>array(array("taxonomy"=>"taxeventos", "terms"=>"agenda","field"=>"slug")), "orderby" => "meta_value_num", "meta_key" => "fecha", 'order' => 'ASC'));
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
                <div class="bajadaNoticia">
                    <?php   if(is_tax("taxeventos", "agenda")): ?><span class="dateEvent"><?php echo $dia . ' de ' . $mes . ' de ' . $ano ?> , <?php the_field('hora'); ?> hrs., <?php the_field('lugar'); ?></span><?php endif;?>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php echo cortar($post->post_content, 150); ?>
                </div>
            </li>
<?php endwhile; ?>
    </ul>
</div><!--/wNoticias-->

      <?php
        } else {

            echo '<div class="authorBio clearfix pad down downV">
                <div class="authorWrap">
                <strong>Acceso restringido para miembros del CLE CLUB</strong>
                </div>
                </div>';
        };
        ?>      
</div><!--pageContent-->
<!--/END OF CONTENIDOS-->
<?php get_sidebar();?>
<?php get_footer(); ?>