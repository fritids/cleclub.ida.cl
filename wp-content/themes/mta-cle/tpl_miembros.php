<?php
/**
  Template Name: Miembros
 */
?>
<?php
get_header();
the_post();
?>

<div id="contenido">
    <div id="pageContent" class="clearfix column8 down pad downV" data-bkbtn="true">
       <?php echo breadcrumb(); ?>  
      <?php
        if (is_user_logged_in()) {
            the_post();
            global $wp_query;
            $curauth = $wp_query->get_queried_object();            
        ?>
        <h1><?php the_title(); ?></h1>
        <?php
        $i = 1;
        $blogusers = get_users('orderby=display_name&role=subscriber');
        foreach ($blogusers as $user) {
            $last = $i % 3 == false ? ' last' : '';
            echo '<div class="miembros column4 down '.$last.'">
                    <div class="bio clearfix">
                        <div class="fotoMiembro">
                            <a href="'. get_author_posts_url($user->ID).'" title="ir a perfil de '.$user->display_name.'">'.  get_wp_user_avatar($user->ID,"portadaPerfil").'</a>
                        </div>
                        <div class="infoMiembro">
                                <h4><a title="ir a perfil de '.$user->display_name.'"  href="'. get_author_posts_url($user->ID).'" title="'.$user->display_name.'">'.$user->display_name.'</a></h4>
                                <p class="cargo">'.get_field('cargo', "user_$user->ID").'</p>                            
                                <p class="empresa">'.get_field('empresa', "user_$user->ID").'</p>                            
                                <a class="perfil_ico" title="ir a perfil de '.$user->display_name.'" href="'. get_author_posts_url($user->ID).'" title="'.$user->display_name.'">Ver Perfil</a>                            
                        </div>
                    </div>
                </div>';
            $i++;
        }
        ?>
            <?php
        } else {

            echo '<div class="authorBio clearfix pad down downV">
                <div class="authorWrap">
                <strong>Acceso restringido para miembros del CLE CLUB</strong>
                </div>
                </div>';
        };
        ?>     
    </div>
    <?php get_sidebar();?>
    <?php get_footer();?>