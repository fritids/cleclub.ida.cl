<?php
/**
  Template Name: Red de contactos
 */
?>
<?php
    if(!is_user_logged_in()){
        wp_redirect(home_url());
        exit;
    }
?>
<?php
get_header();
the_post();
$user = wp_get_current_user();
?>
<?php wp_enqueue_script( 'comment-reply' );?>
<div id="contenido">
    <div id="pageContent" class="clearfix column8 down downV pad">
        <h1><?php the_title();?></h1>
        <?php the_content();?>
        <?php
            $args = array(
                   'id_form' => 'formComment',
                   'title_reply' => '',
                   'title_reply_to' => '',
                   'logged_in_as' => '',
                   'id_submit' => 'btnComment',
                   'label_submit'=>'Comentar',
                   'comment_notes_before' => '',
                   'comment_notes_after' => '',
                   'author' => '',
                   'email' => '',
                   'url' => '',
                   'comment_field' => '<div class="picAvatar">
                                            '.get_wp_user_avatar($user->ID, 72,72).' 
                                        </div>
                                        <textarea class="txtComment" placeholder="Añadir comentario..." name="comment">

                                        </textarea>
                                        <span>Estas conectado como '.$user->user_login .'<a href="'. wp_logout_url( home_url()) .'" title="Salir y volver al Inicio" rel="nofollow"> ( Salir )</a></span>'   
            );
       ?>

        <?php comment_form($args) ?>
        <ul id="all-comments" class="commentList">
            <?php echo getComentarios() ?> 
        </ul>
        <button class="evt btnCont" data-func="loadComments">Ver mas comentarios</button>

    </div>
    <?php get_sidebar();?>
    <?php get_footer();?>