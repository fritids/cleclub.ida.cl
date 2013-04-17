<?php
/**
  Template Name: representantes
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
        $blogusers = get_users('orderby=nicename&role=representante');
        
        foreach ($blogusers as $user){
            $orden = get_user_meta($user->ID ,'orden', true);
            $usuarios[$orden] = $user;
        }
        ksort($usuarios);
        foreach ($usuarios as $user) {
            $last = $i % 3 == false ? ' last' : '';
            echo '<div class="one_third'.$last.'">
                    <div class="bio">
                        <div class="fotoMiembro">
                            <a href="'. get_author_posts_url($user->ID).'" title="'.$user->display_name.'">'.  get_wp_user_avatar($user->ID,"portadaPerfil").'</a>
                        </div>
                        <div class="infoMiembro">
                                <h4><a href="'. get_author_posts_url($user->ID).'" title="'.$user->display_name.'">'.$user->display_name.'</a></h4>
                                <p>'.get_field('cargo', "user_$user->ID").'</p>                            
                                <p>'.get_field('empresa', "user_$user->ID").'</p>                            
                        </div>
                    </div>
                </div>';
            $i++;
        }
        ?>
    </div>
    <?php get_sidebar();?>
    <?php get_footer(); ?>
