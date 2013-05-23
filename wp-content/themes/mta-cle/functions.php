<?php

function sliderHome(){
    $out = "";
    
    $out .= '<div id="slider">';
    $out .='<ul class="sliderHome swipe-wrap">';
    $args = array(
               'post_type' => array( 'post', 'eventos_sociales' ),
               'tax_query' => array(array(
			'taxonomy' => 'destacado',
			'field' => 'slug',
			'terms' => 'destacada'
		))
        );
    $querySlide = new WP_Query($args);
    if($querySlide->have_posts()){
        while ($querySlide->have_posts()) { 
            $querySlide->the_post();
                $out .='<li>';
                $out .='<figure>';
                $out .= get_the_post_thumbnail($post->ID, "slideHome");
                $out .='<figcaption>';
                $out .='<div class="cap">';
                $out .='<h2>'.get_the_title().'</h2>';
                $out .='<p class="hide-on-phones">'.cortar(get_the_content(),50).'</p>';
                $out .='</div>';
                $out .='</figcaption>';
                $out .='</figure>';
                $out .='</li>';
        }
    }
    $out .='</ul>';
    $out .='</div>';
    $out .='<ul class="slideNav">';
    $out .='<li><a class="active" href="#" title="Esto es un titulo de dos o mas lineas" rel="contents">1</a></li>';
    $out .='<li><a href="#">3</a></li>';
    $out .='<li><a href="#">4</a></li>';
    $out .='</ul>';
    
    
    return $out;
}

function cortar($str, $n, $cutter = false) {
    $str = trim($str);
    $str = strip_tags($str);
    if (strlen($str) > $n) {
        $out = substr($str, 0, $n);
        $out = explode(" ", $out);
        array_pop($out);
        if ($cutter) {
            $out = implode(" ", $out) . $cutter;
        } else {
            $out = implode(" ", $out) . "...";
        }
    } else {
        $out = $str;
    }
    return $out;
}


function traduceMes($mes) {
    if ($mes == 1) {
        $mes = 'Enero';
    }

    if ($mes == 2) {
        $mes = 'Febrero';
    }

    if ($mes == 3) {
        $mes = 'Marzo';
    }

    if ($mes == 4) {
        $mes = 'Abril';
    }

    if ($mes == 5) {
        $mes = 'Mayo';
    }

    if ($mes == 6) {
        $mes = 'Junio';
    }

    if ($mes == 7) {
        $mes = 'Julio';
    }

    if ($mes == 8) {
        $mes = 'Agosto';
    }

    if ($mes == 9) {
        $mes = 'Septiembre';
    }

    if ($mes == 10) {
        $mes = 'Octubre';
    }

    if ($mes == 11) {
        $mes = 'Noviembre';
    }

    if ($mes == 11) {
        $mes = 'Diciembre';
    }

    return $mes;
}


function parseFeed($url, $cuantos = 3, $descripcion = true) {
    $rss = fetch_feed($url);
    $maxitems = $rss->get_item_quantity($cuantos);
    $rss_items = $rss->get_items(0, $maxitems);
    $out = '';

    if ($maxitems == 0) :
        _e('No items', 'my-text-domain');
    else :
        foreach ($rss_items as $item) :
            $clase = $i % 2 ? ' odd' : '';
            $out .= '<li><div class="bajadaNoticia"><span class="dateEvent">' . __(strtolower($item->get_date('j \d\e ')), "cleclub") . __(strtolower(traduceMes($item->get_date('n'))), "cleclub") .", ". __(strtolower($item->get_date('Y')), "es_ES") . '</span><h2><a href="/noticias-df/?url=' . urldecode(esc_url($item->get_permalink())) . '&amp;titulo=' . urldecode(esc_html($item->get_title())) . '">' . esc_html($item->get_title()) . '</a><h2></div><p class="desc">' . $item->get_content() . '</p></li>';
            $i++;
        endforeach;
        return $out;
    endif;
}

function return_7200( $seconds )
{
  // change the default feed cache recreation period to 2 hours
  return 7200;
}

function parseFeedHome($url, $cuantos = 3, $descripcion = true) {
    add_filter( 'wp_feed_cache_transient_lifetime' , 'return_7200' );
    $rss = fetch_feed($url);
    remove_filter( 'wp_feed_cache_transient_lifetime' , 'return_7200' );
    $maxitems = $rss->get_item_quantity($cuantos);
    $rss_items = $rss->get_items(0, $maxitems);
    $out = '';

    if ($maxitems == 0) :
        _e('No items', 'my-text-domain');
    else :
        foreach ($rss_items as $item) :
            $clase = $i % 2 ? ' odd' : '';
            $desc = $descripcion ? '<small>' . cortar($item->get_content(), 60) . '</small>' : "";
            $out .= '<div class="wNota clearfix"><div class="tituloNotaW"><small>' . __(strtolower($item->get_date('j \d\e ')), "cleclub") . __(strtolower(traduceMes($item->get_date('n'))), "cleclub") .", ". __(strtolower(traduceMes($item->get_date('Y'))), "es_ES") . '</small><a href="/noticias-df/?url=' . urldecode(esc_url($item->get_permalink())) . '&amp;titulo=' . urldecode(esc_html($item->get_title())) . '">' . esc_html($item->get_title()) . '</a>' . $desc . '</div></div>';
            $i++;
        endforeach;
        return $out;
    endif;
}



function notas($args) {
    query_posts($args);
    $i = 1;
    $out = "";
    while (have_posts()) : the_post();
        $clase = $i % 2 ? ' odd' : '';
        $out .= '<div class="wNota clearfix"><div class="fotoNota">' . get_the_post_thumbnail($post->ID, "notas") . '</div><div class="tituloNotaW"><a href="' . get_permalink() . '"> ' . cortar(get_the_title(), 60) . '</a><small>' . cortar(get_the_content(), 65) . '</small></div></div>';
        $i++;
    endwhile;
    return $out;
}

function slideHome() {
    $out = '';
    $args = array('page_id' => 392);
    $querySlide = new WP_Query($args);
    while ($querySlide->have_posts()) : $querySlide->the_post();
        $rows = get_field('slider_imagen'); 
        if ($rows):
            foreach  ($rows as $imagen):
                $imgID = $imagen['imagen'];
                $out .= '<div class="ls-layer" style="slidedelay: 3000">' . wp_get_attachment_image($imgID, "slideHome") . ' </div>';
            endforeach;
        endif;
    endwhile;
    return $out;
}

add_theme_support('menus');
register_nav_menu('primary', __('Primary Menu', 'twentytwelve'));
register_nav_menu('public', __('Public Menu', 'twentytwelve'));
register_nav_menu('footerPublico', __('Public Footer Menu', 'twentytwelve'));

add_theme_support('post-thumbnails');
add_image_size("notas", 70, 70, true);
add_image_size("slideHome", 640, 371, true);
add_image_size("perfil", 280, 380, true);
add_image_size("portadaPerfil", 175, 240, true);
add_image_size("gallery", 200, 110, true);

add_action('acf/register_fields', 'my_register_fields');

function my_register_fields()
{
	include_once(ABSPATH .'/wp-content/plugins/acf-repeater/repeater.php');
}


load_theme_textdomain( 'cleclub', TEMPLATEPATH.'/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH."/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);

function printMe( $toPrint ) {
    echo '<pre>';
    print_r($toPrint);
    echo '</pre>';
}
function set_html_content_type(){ return 'text/html'; }

function ajaxHandler(){
    
    if( $_POST['func'] === 'cambiarContrasena' ){
        if( $_POST['passW'] !== $_POST['passW2'] ){ die('intenta denuevo'); } // si es que las contrasenas no concuerdan
        
        if( is_numeric( $_POST['userId'] ) ){
            $usid = intval( $_POST['userId'] );
        } else {
            $user = get_user_by('email', $_POST['userId']);
            $usid = $user->ID;
        }
        
        wp_update_user(array(
            'ID' => $usid,
            'user_pass' => $_POST['passW']
        ));
        
      
        $out  = "<div class='exito'>";
        $out .= "<strong>¡FELICITACIONES!</strong>";
        $out .= "<p>Tu contraseña ha sido cambiada exitosamente.</p>";
        $out .= " </div>";
      
        
        die( $out );
    }
    elseif( $_POST['func'] === 'recuperarContrasena' ){
        $usuario= get_user_by('email', $_POST['mailLog']);
        if($usuario){
            $headers = 'From: cleclub <contacto@cleclub.cl>' . "\r\n";
            
            $message = '
                
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td bgcolor="#000000" height="5">
                    </td>
                </tr>
                <tr>
                    <td width="600" align="center">
                        <img style="display:block" src="'.get_bloginfo("template_directory").'/_img/headermail.jpg"/>
                    </td>
                </tr>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td bgcolor="#000000">
                        <table width="600" align="center" border="0" cellpadding="0" cellspacing="10">
                            <tr>
                                <td>
                                    <font face="Helvetica" style="font-size: 18px; color: #ffffff;">
                                            Recuperaci&oacute;n de Contrase&ntilde;a
                                        </strong>
                                    </font>
                                </td>
                            </tr>
                           
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="600" align="center" border="0" cellpadding="0" cellspacing="10">
                            <tr>
                                <td height="10">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font face="Helvetica" style="font-size: 14px; color: #000000;">
                                        Estimado(a) <strong>' . $usuario->first_name . ' ' . $usuario->last_name . '</strong>
                                    </font>        
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font face="Helvetica" style="font-size: 14px; color: #000000;">
                                        Usted ha solicitado la recuperación de su contraseña. Haga click en el siguiente botón y siga las instrucciones.
                                    </font>    
                               </td>
                            </tr>
                             <tr>
                                <td height="10">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font face="Helvetica" style="font-size: 12px; color: #999999;">
                                        Si lo realizó por error, solo ignore este mensaje
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td height="10">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <a href="'. home_url() .'/recuperacion-de-contrasena/?userEmail='. $_POST['mailLog'] .'"> <img style="display:block" src="'.get_bloginfo("template_directory").'/_img/mailbutton.jpg"/></a>
                                </td>
                            </tr>
                            <tr>
                                <td height="10">
                                </td>
                            </tr>
                           
                         </table>
                    </td>
                </tr>
                
                 <tr>
                    <td height="50">
                    </td>
                </tr>
                
            </table>
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="10" bgcolor="#E9E9E9">
                <tr>
                    <td width="600" align="center">
                        <img style="display:block" src="'.get_bloginfo("template_directory").'/_img/mailfirm.jpg"/>
                    </td>
                </tr>
               
            </table>';




            add_filter( 'wp_mail_content_type', 'set_html_content_type' );
            wp_mail( $_POST['mailLog'], 'contraseña', $message, $headers );    
            remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
            $out = "<div class='exito'>";
            $out .= "<strong>¡FELICITACIONES!</strong>";
            $out .= "<p>Te hemos enviado un email para recuperar tu contraseña</p>";
            $out .= " </div>";
            die( $out );
            
        }else { // usuario no existe
            die('noUser');
        }
    }
    elseif( $_POST['func'] === 'desloguear' ){
        wp_logout();
        die();
    }
    elseif( $_POST['func'] === 'loginFront'){
        $creds = array();
        $creds['user_login'] = $_POST['log'];
        $creds['user_password'] = $_POST['pwd'];
        $creds['remember'] = true;
        $user = wp_signon($creds, false);
        if (is_wp_error($user)){
            die('errorcontrasena');
        }
        else{
            die('exito');
        }
    }elseif($_POST['func'] === 'loadComments'){
        $out = getComentarios($_POST['offset']);
        die($out);
    }
    else { die('Error!'); }
}

function getComentarios($offset = 0){
    $out = "";
    
    $args = array(
                'parent' => 0,
                'number' => 20,
                'offset' => $offset
        );
        
    $comments = get_comments($args); 

    foreach($comments as $comment){
        $out .= '<li id="comment-'.$comment->comment_ID.'" class="comment">';
        $out .= '<div class="commentInfo">';
        $out .= '<div class="picAvatar hide-on-phones">';
        $out .= get_wp_user_avatar($comment->user_id, 72,72);
        $out .= '</div>';
        $out .= '<a href="'.get_author_posts_url($comment->user_id).'" class="perfil_ico hide-on-phones" rel="contents">Ver Perfil</a>';
        $out .= '</div>';
        $out .= '<div class="commmentBody">';

        $commentDate = get_comment_date( 'l d \d\e M G:i  ', $comment->comment_ID );

        $out .= '<span class="date">'.$commentDate.'</span>';
        $out .= '<span class="userCom"><strong>'.$comment->comment_author.'</strong> Comento:</span>';
        $out .= '<p>'.$comment->comment_content.'</p>';
        $out .= get_comment_reply_link($args = array('reply_text' => 'Responder', 'depth' => 1, 'max_depth' => 2, 'respond_id' => 'formComment' ), $comment->comment_ID, $post-ID);
        $out .= '</div>';
        $out .= '</li>';

        $replyArgs = array(
                       'parent' => $comment->comment_ID,
                       'order' => 'ASC'
        );
        $replyComments = get_comments($replyArgs);
        foreach($replyComments as $reply){
            $out .= '<li id="comment-'.$reply->comment_ID.'" class="commentReply">';
            $out .= '<div class="commentInfo">';
            $out .= '<div class="picAvatar hide-on-phones">';
            $out .= get_wp_user_avatar($reply->user_id, 72,72);
            $out .= '</div>';
            $out .= '<a href="'.get_author_posts_url($comment->user_id).'" class="perfil_ico hide-on-phones">Ver Perfil</a>';
            $out .= '</div>';
            $out .= '<div class="commmentBody">';

            $commentDate = get_comment_date( 'l d \d\e M G:i  ', $reply->comment_ID );

            $out .= '<span class="date">'.$commentDate.'</span>';
            $out .= '<span class="userCom"><strong>'.$reply->comment_author.'</strong> Comento:</span>';
            $out .= '<p>'.$reply->comment_content.'</p>';
            $out .= '</div>';
            $out .= '</li>';
        }
    }
    return $out;
}

add_action('wp_ajax_envioAjax', 'ajaxHandler');
add_action('wp_ajax_nopriv_envioAjax', 'ajaxHandler');


?>