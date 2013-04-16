<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header();
?>
<?php if (in_category(9)) { ?>
    <div id="contenido">
        <?php while (have_posts()) : the_post(); ?> 
            <?php
            $pic = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            $postID = $post->ID;
        endwhile;
        ?>
        <div id="leftSide">
    <?php if (is_user_logged_in()) {
        the_post(); ?>
                <div id="fotoMiembroBig" class="bioBig">
                    <img src="<?php echo get_template_directory_uri(); ?>/tt.php?src=<?php echo $pic; ?>&w=250&h=320" >
                </div>				
                <div id="bioMiembro">
                    <h1><?php the_title(); ?></h1>
                    <p class="subTitulo"><?php the_field('cargo'); ?></p>
                    <p class="subTitulo"><?php the_field('empresa'); ?></p	>                
                    <p class="subTitulo"><?php the_field('telefono'); ?></p>                
                    <p class="subTitulo ultimo"><a href="<?php the_field('mail'); ?>"><?php the_field('mail'); ?></a></p>                                
                    <div id="bioText">
                <?php the_content(); ?>
                    </div>
                    <p class="subTitulo primero"><a href="/miembros-del-club/"> <img src="<?php echo get_template_directory_uri(); ?>/_img/volver.gif" style="margin-bottom:-3px;margin-right:10px;" /> volver al listado de miembros</a></p>
                </div>
        <?php } else {
            echo '<strong>Acceso restringido para miembros del CLE Club</strong>';
        }; ?>       

        </div>
        <?php get_sidebar(); ?>
    </div><!--pageContent-->
    <?php } else { ?>
    <div id="contenido">
    <?php while (have_posts()) : the_post(); ?> 
                        <?php
                        $pic = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                        $postID = $post->ID;
                    endwhile;
                    ?>
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
        <?php if (is_user_logged_in()) { ?>
        <?php
        if (get_field('fecha')) {
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
            
        <?php }
    } else {
        echo '<strong>Acceso restringido para miembros del CLE Club</strong>';
    }; ?>
            <?php the_post();the_content(); ?>
        </div>
        </div>    
    </div><!--pageContent-->
<?php } ?>
<?php get_footer(); ?>