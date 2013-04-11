<?php get_header(); ?>

<div id="contenido">






    <div id="leftSide">


        <?php
        if (is_user_logged_in()) {

            the_post();
            ?>

            <div id="fotoMiembroBig" class="bioBig">
                <?php echo get_wp_user_avatar($user->ID,"medium"); ?> 
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

            <?
        } else {

            echo '<strong>Acceso restringido para miembros del CLE Club</strong>';
        };
        ?>       

    </div><!--/leftSide -->

    <?php get_sidebar(); ?>


</div><!--pageContent-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>