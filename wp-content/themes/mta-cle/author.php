<?php get_header(); ?>
<div id="contenido">
    <div id="leftSide" class="authorBio clearfix pad column8 down downV">
        <div  class="authorWrap">
        <?php
        if (is_user_logged_in()) {
            the_post();
            global $wp_query;
            $curauth = $wp_query->get_queried_object();            
        ?>
            <div id="fotoMiembroBig" class="bioBig">
                <?php echo get_wp_user_avatar($curauth->ID, "perfil"); ?> 
            </div>				
            <div id="bioMiembro">
                <h1><?php echo $curauth->display_name; ?></h1>
                
                <p class="subTitulo"><strong>Empresa:</strong> <?php the_field('empresa',"user_$curauth->ID"); ?></p>
                <p class="subTitulo"><strong>Cargo:</strong> <?php the_field('cargo',"user_$curauth->ID"); ?></p>
                <p class="subTitulo"><strong>Teléfono:</strong> <?php the_field('telefono',"user_$curauth->ID"); ?></p>                
                <p class="subTitulo"><strong>Mail: </strong> <a href="mailto:<?php the_field('mail',"user_$curauth->ID");?>"><?php the_field('mail',"user_$curauth->ID"); ?></a></p> 
                <p class="subTitulo"><strong>Edad: </strong><?php the_field('edad',"user_$curauth->ID"); ?></a></p>
                <p class="subTitulo"><strong>Estado Civil: </strong><?php the_field('estado_civil',"user_$curauth->ID"); ?></a></p>
                <p class="subTitulo"><strong>Grupos y asociaciones:  <br /></strong><?php the_field('grupos_y_asociaciones',"user_$curauth->ID"); ?></a></p>
                <p class="subTitulo"><strong>Actividades y talentos: <br /></strong><?php the_field('actividades_y_talentos',"user_$curauth->ID"); ?></a></p>
                <p class="subTitulo"><strong>Grupo Familiar: </strong><?php the_field('grupo_familiar',"user_$curauth->ID"); ?></a></p>

            </div>
            <?php
        } else {

            echo '<strong>Acceso restringido para miembros del CLE CLUB</strong>';
        };
        ?>       
        </div>
    </div>
    <?php get_sidebar(); ?>
</div><!--pageContent-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>