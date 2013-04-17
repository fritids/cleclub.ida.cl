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
    <div id="pageContent" class="clearfix">
        <h1><?php the_title(); ?></h1>
        <?php
        $i = 1;
        $blogusers = get_users('orderby=display_name&role=subscriber');
        foreach ($blogusers as $user) {
            $last = $i % 3 == false ? ' last' : '';
            echo '<div class="one_third'.$last.'">
                    <div class="bio">
                        <div class="fotoMiembro">
                            <a href="'. get_author_posts_url($user->ID).'" title="'.$user->display_name.'">'.  get_wp_user_avatar($user->ID,"portadaPerfil").'</a>
                        </div>
                        <div class="infoMiembro">
                                <h4><a href="'. get_author_posts_url($user->ID).'" title="'.$user->display_name.'">'.$user->display_name.'</a></h4>
                                <p class="cargo">'.get_field('cargo', "user_$user->ID").'</p>                            
                                <p class="empresa">'.get_field('empresa', "user_$user->ID").'</p>                            
                        </div>
                    </div>
                </div>';
            $i++;
        }
        ?>
    </div>
    <?php get_sidebar();?>
    <?php get_footer();?>