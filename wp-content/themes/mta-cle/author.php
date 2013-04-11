<?php get_header(); ?>
<div id="contenido">
    <div id="leftSide">
        <?php
        if (is_user_logged_in()) {
            the_post();
            global $wp_query;
            $curauth = $wp_query->get_queried_object();            
        ?>
            <div id="fotoMiembroBig" class="bioBig">
                <?php echo get_wp_user_avatar($curauth->ID, "medium"); ?> 
            </div>				
            <div id="bioMiembro">
                <h1><?php echo $curauth->display_name; ?></h1>
                <p class="subTitulo"><?php the_field('cargo',"user_$curauth->ID"); ?></p>
                <p class="subTitulo"><?php the_field('empresa',"user_$curauth->ID"); ?></p	>                
                <p class="subTitulo"><?php the_field('telefono',"user_$curauth->ID"); ?></p>                
                <p class="subTitulo"><a href="mailto:<?php the_field('mail',"user_$curauth->ID");?>"><?php the_field('mail',"user_$curauth->ID"); ?></a></p>                                
                <p class="subTitulo primero"><a href="/miembros-del-club/"> <img src="<?php echo get_template_directory_uri(); ?>/_img/volver.gif" style="margin-bottom:-3px;margin-right:10px;" /> volver al listado de miembros</a></p>
            </div>
            <?
        } else {

            echo '<strong>Acceso restringido para miembros del CLE Club</strong>';
        };
        ?>       

    </div>
    <?php get_sidebar(); ?>
</div><!--pageContent-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>