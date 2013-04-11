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
        <div id="bajadaContent">
            <?php the_excerpt(); ?>
        </div>
        <div id="contenidoMiembros">
            <?php the_content(); ?>
        </div>


        <?php
        $i = 1;
        $blogusers = get_users('orderby=nicename&role=subscriber');
        foreach ($blogusers as $user) {
            $last = !$i % 4 ? ' last' : '';
            echo '<div class="one_fourth'. $last.'">
                    <div class="bio">
                        <div id="fotoMiembro">
                            <a href="'. get_author_posts_url($user->ID).'" title="'.$user->display_name.'">'.  get_wp_user_avatar($user->ID,"medium").'</a>
                        </div>
                        <div id="infoMiembro">
                            <hgroup class="head">
                                <h4>'.$user->display_name.'</h4>
                                <h5>'.the_field('cargo').'</h5>
                            </hgroup>
                            <span class="header_shadow"></span>
                        </div>
                    </div>
                </div>';
            $i++;
        }
        ?>
    </div>
    <?php get_footer(); ?>