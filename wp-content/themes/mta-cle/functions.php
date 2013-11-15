<?php

function sliderHome(){
    $out = "";
    $out .='<div id="slider" class="swipe">';
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
                $out .='<a href="'.get_permalink().'" title="'.get_the_title().'" rel="contents">'. get_the_post_thumbnail($post->ID, "slideHome") .'</a>';
                $out .='<figcaption>';
                $out .='<div class="cap">';
                $out .='<h2><a href="'.get_permalink().'" title="'.get_the_title().'" rel="contents">'.get_the_title().'</a></h2>';
//                $out .='<p class="hide-on-phones">'.cortar(get_the_content(),150).'</p>';
                $out .='</div>';
                $out .='</figcaption>';
                $out .='</figure>';
                $out .='</li>';
        }
    }
    $out .='</ul>';
    $out .='</div>';
    $out .='<ul id="bullets-slider" class="slideNav">';
    $out .='<li><a class="active evt" data-func="goToSlide" data-slide="0" href="#" rel="nofollow">1</a></li>';
    $out .='<li><a class="evt" data-func="goToSlide" href="#" data-slide="1" rel="nofollow">3</a></li>';
    $out .='<li><a class="evt" data-func="goToSlide" href="#" data-slide="2" rel="nofollow">4</a></li>';
    $out .='</ul>';
    
    
    return $out;
}
   
function breadcrumb() {
    global $post, $wp_query;
    $out = "";
    $separador = ' - ';
    if (!is_front_page()) {
        $out .= '<div class="breadcrumb">';
        $out .= '<span class="simple-text">Estás en: </span>';
        $out .= '<a class="bc-item" href="' . home_url() . '" title="Inicio">Inicio</a>';

        if (is_category()) {
            $out .= $separador;
            $out .= get_option( "category_base" ) ? '<span class="bc-item">'. get_option( "category_base" ) .'</span>' : '<span class="bc-item">CategorÃ­as</span>' ;
            $out .= single_cat_title("", false);
        } 
        elseif (is_page()) {
            if ($post->post_parent && count($post->ancestors) <= 1) {
                $out .= $separador;
                $out .= '<a class="bc-item" href="' . get_permalink($post->post_parent) . '" title="' . get_the_title($post->post_parent) . '">' . get_the_title($post->post_parent) . '</a>';
            }
                $out .= $separador;
                $out .= '<span class="bc-item end-item">'. get_the_title() .'</span>';
            
        }
        // repetir modulo por cada post_type
        elseif (is_singular('post')) {
            $out .= $separador;
            $out .=  '<a class="bc-item" href="#" title="Entradas">Entradas</a>';
            $out .= $separador;
            $out .= '<span class="bc-item end-item">'. get_the_title() .'</span>';
        }elseif (is_author()){
            $autor = get_query_var( 'author' );
            $autor = get_userdata( $autor );
            
            $out .= $separador;
            if($_GET['representante']){
                $out .= '<a class="bc-item" href="/quienes-somos/representantes-cle/" title="Representantes">Representantes CLE CLUB</a>';
            }else{
                $out .= '<a class="bc-item" href="/miembros-del-club/" title="Miembros">Miembros del Club</a>';
            }
            $out .= $separador;
            $out .= $autor->first_name.' '.$autor->last_name;
        }
        elseif(is_tax()){
            $out .= $separador;
            $out .= '<span class="bc-item end-item">'. single_cat_title( '', false ) .'</span>';
        }
        elseif(is_singular()){
            $terms = wp_get_post_terms( $post->ID, 'taxeventos');
            $term_link = get_term_link( $terms[0], $terms[0]->term_taxonomy_id );
            $out .= $separador;
            $out .=  '<a class="bc-item" href="'.$term_link.'" title="'.$terms[0]->name.'">'.$terms[0]->name.'</a>';
            $out .= $separador;
            $out .= '<span class="bc-item end-item">'. get_the_title() .'</span>';
        }
        else{
            $out .= $separador;
            $out .= '<span class="bc-item end-item">'. get_the_title() .'</span>';
        }
        
      
        $out .= '</div>';
    }
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
            $out .= '<li><div class="bajadaNoticia"><span class="dateEvent">' . __(strtolower($item->get_date('j \d\e ')), "cleclub") . __(strtolower(traduceMes($item->get_date('n'))), "cleclub") .", ". __(strtolower($item->get_date('Y')), "es_ES") . '</span><h2><a href="/noticias-df/?url=' . urldecode(esc_url($item->get_permalink())) . '&amp;titulo=' . urldecode(esc_html($item->get_title())) . '">' . esc_html($item->get_title()) . '</a></h2></div><p class="desc">' . $item->get_content() . '</p></li>';
            $i++;
        endforeach;
        return $out;
    endif;
}

function mailContent($empresa,$cargo,$telefono,$mail,$estadocivil,$grupos,$actividad,$familia,$content){
    $out = ' 
<html> 
<head> 
   <title>Contacto - CLE CLUB</title> 
</head> 
    <body style="font-family:Tahoma;font-size:11px"> 
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
                                            Solicitud cambio de informacion Perfil
                                        </strong>
                                    </font>
                                </td>
                                <td>
                                    <p>'.$cargo.'</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                    <table width="600" align="center" border="0" cellpadding="0" cellspacing="10">
                        <p> Fecha Recepción : '.date('d-m-Y').'</p>
                        <p> Empresa      : '.$empresa.'</p>
                        <p> Cargo      : '.$cargo.'</p>
                        <p> Telefono     : '.$telefono.'</p>
                        <p> Mail    : '.$mail.'</p>
                        <p> Estado Civil :'. $estadocivil .'</p>
                        <p> Grupos y Asociaciones :'. $grupos .'</p>
                        <p>Actividades y Talentos :' . $actividad . '</p>
                        <p>Familia : '. $familia. '</p>    
                    </table>
                    </td>
                </tr>
                 <tr>
                    <td height="50">
                    </td>
                </tr>
                
            </table>
        
    </body> 
</html> 

 
';
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

function spanishdate($date){
    $date = explode(' ', $date);
    $mes = $date[0];
    $ano = $date[1];
    
    if($mes == 'January'){
        $finaldate = 'Enero '.$ano;
    }elseif($mes == 'February'){
        $finaldate = 'Febrero '.$ano;
    }elseif($mes == 'March'){
        $finaldate = 'Marzo '.$ano;
    }elseif($mes == 'April'){
        $finaldate = 'Abril '.$ano;
    }elseif($mes == 'May'){
        $finaldate = 'Mayo '.$ano;
    }elseif($mes == 'June'){
        $finaldate = 'Junio '.$ano;
    }elseif($mes == 'July'){
        $finaldate = 'Julio '.$ano;
    }elseif($mes == 'August'){
        $finaldate = 'Agosto '.$ano;
    }elseif($mes == 'September'){
        $finaldate = 'Septiembre '.$ano;
    }elseif($mes == 'October'){
        $finaldate = 'Octubre '.$ano;
    }elseif($mes == 'November'){
        $finaldate = 'Noviembre '.$ano;
    }elseif($mes == 'December'){
        $finaldate = 'Diciembre '.$ano;
    }
    
    return $finaldate;
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
                $out .= '<div class="ls-layer" style="slidedelay: 3000">' . wp_get_attachment_image($imgID, 'slideHome') . ' </div>';
            endforeach;
        endif;
    endwhile;
    return $out;
}

add_theme_support('menus');
register_nav_menu('primary', __('Primary Menu', 'twentytwelve'));
register_nav_menu('public', __('Public Menu', 'twentytwelve'));
register_nav_menu('footerPublico', __('Public Footer Menu', 'twentytwelve'));
register_nav_menu('footerPrivate', __('private Footer Menu', 'twentytwelve'));

add_theme_support('post-thumbnails');
add_image_size("notas", 70, 70, true);
add_image_size("slideHome", 660, 371, true);
add_image_size("perfil", 280, 380, true);
add_image_size("portadaPerfil", 175, 240, true);
add_image_size("gallery", 200, 110, true);
add_image_size("newsThumb", 310, 180, true);

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

function my_function_admin_bar(){ return false; }
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

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
    }elseif( $_POST['func'] === 'recuperarContrasena' ){
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
                                        Si lo realizó por error, ignore este mensaje
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
    }elseif( $_POST['func'] === 'desloguear' ){
        wp_logout();
        die();
    }elseif( $_POST['func'] === 'loginFront'){
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
    }elseif( $_POST['func'] === 'sendCommentMails' ){
            global $post;
            $actualComments = get_comment( intval($_POST['commentParentID']) );
            $parentauthor = $actualComments->comment_author_email;
            $childComments = get_comments( array('parent' => $_POST['commentParentID']));
            $current_user = wp_get_current_user();
            
            if($parentauthor != $current_user->user_email){
                $authormails = array($parentauthor);
            }
            
            foreach($childComments as $child){
                if($child->comment_author_email == $current_user->user_email){
                    continue;
                }
                $authormails[] = $child->comment_author_email; 
            } 
            
            $authormails = array_unique($authormails); 

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
                                            Mensaje de CLECLUB
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
                                        Estimado(a), alguien ha respondido a tu comentario en El Muro de CLECLUB
                                    </font>        
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font face="Helvetica" style="font-size: 14px; color: #000000;">
                                        Puede ver la respuesta en la siguiente URL: '. get_permalink($_POST['pid']) .'
                                    </font>    
                               </td>
                            </tr>
                             <tr>
                                <td height="10">
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
                
            </table>';
            
            add_filter( 'wp_mail_content_type', 'set_html_content_type' );
            wp_mail( $authormails, 'Tienes una respuesta a tu comentario en El Muro de CLECLUB', $message, $headers );    
            remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
            
            die('ok');
    }elseif($_POST['func'] === 'sendMassiveMails'){

            $blogusers = get_users('orderby=display_name&role=subscriber');
            foreach($blogusers as $user){
                $authormails[] = $user->user_email;
            }
            $authormails[] = 'Francesca.Canziani@cl.ey.com';
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
                                            Mensaje de CLECLUB
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
                                        Estimado(a), Un miembro CLECLUB ha realizado el primer comentario en el muro de CLECLUB
                                    </font>        
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font face="Helvetica" style="font-size: 14px; color: #000000;">
                                        Puede ver el comentario en la siguiente URL: '. get_permalink($_POST['pid']) .'
                                    </font>    
                               </td>
                            </tr>
                             <tr>
                                <td height="10">
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
                
            </table>';
            add_filter( 'wp_mail_content_type', 'set_html_content_type' );
            wp_mail( $authormails, 'Nuevo comentario en el muro de CLECLUB', $message, $headers );    
            remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
            die('mails');
    }else { 
        die('Error!'); 
    }
}

function getComentarios($offset = 0){
    $out = "";
    
    $args = array(
                'parent' => 0,
                'number' => 20,
                'offset' => $offset,
                'status' => 'approve'
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
        $out .= '<span class="userCom"><strong>'.$comment->comment_author.'</strong> Comentó:</span>';
//        $out .= '<p>'.$comment->comment_content.'</p>';
        $out .= apply_filters('the_content', $comment->comment_content);
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
            $out .= '<a href="'.get_author_posts_url($reply->user_id).'" class="perfil_ico hide-on-phones">Ver Perfil</a>';
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

function get_destacada(){
    global $post;
    $postObject = get_field('noticia_destacada',$post->ID);
    
    
    
    $out='';
    $out.='<table cellpading="" cellspacing="10" border="0" width="600" align="center" bgcolor="#EEEEEE" style="margin-bottom: 10px;">';
        foreach ($postObject as $object){
            $out.= '<tr>';
            $out.= '<td width="310">';
            $out.= '<a href="' .  get_permalink($object->ID) . '" title="Leer artículo en el sitio" target="_blank">';
            $out.= get_the_post_thumbnail($object->ID, 'newsThumb' , array('style' => 'display:block;border: 1px solid #999999;'));
            $out.= '</a>';
            $out.= '</td>';
            $out.= '<td valign="top">';
            $out.= '<table>';
            $out.= '<tr>';
            $out.= '<td>';
            $out.= '<font face="Helvetica">';
            $out.= '<a href="' .  get_permalink($object->ID) . '" title="Leer artículo en el sitio" style="font-size: 16px; color: #525252;" target="_blank">';
            $out.= '<strong>';
            $out.=  get_the_title($object->ID);
            $out.= '</strong>';
            $out.= '</a>'  ;  
            $out.= '</font>';
            $out.= '</td>';
            $out.= '</tr>' ; 
            $out.= '<tr>';
            $out.= '<td>';
            $out.= '<p style="margin: 0; font-size: 12px;line-height: 130%;">';
            $out.= cortar($object->post_content, 180,"");
            $out.= '</p>';
            $out.= '</td>';
            $out.= '</tr>';
            if(get_field('archivo_adjunto',$object->ID)){
                $out.= '<tr height="10">';
                $out.= '</tr>';
                $out.= '<tr>';
                $out.= '<td>';
                $out.= '<a href="'. wp_get_attachment_url(get_field('archivo_adjunto',$object->ID)) .'" title="Descargar Estudio">';
                $out.= '<img style="display:block; border:0 none;" src="http://www.cleclub.cl/boletin/001/img/botondescargaes.jpg">';
                $out.= '</a>';
                $out.= '</td>';
                $out.= '</tr>';
            }
            $out.= '</table>';  
            $out.= '</td>';
            $out.= '</tr>';
    }
    $out.='</table>';

    echo $out;
}

function get_ultima_charla(){
    global $post;
    $postObject = get_field('ultima_charla',$post->ID);
    
    
    
    $out='';
    $out.='<table cellpading="" cellspacing="10" border="0" width="600" align="center" bgcolor="#EEEEEE" style="margin-bottom: 10px;">';
        foreach ($postObject as $object){
             $out.='<tr>';
             $out.='<td width="310">';
             $out.='<a href="' .  get_permalink($object->ID) . '" title="Leer artículo en el sitio" target="_blank">';
             $out.= get_the_post_thumbnail($object->ID, 'newsThumb' , array('style' => 'display:block;border: 1px solid #999999;'));             
             $out.='</a>';
             $out.='</td>';
             $out.='<td valign="top">';
             $out.='<table>';
             $out.='<tr>';
             $out.='<td style="font-size: 10px;">';
             $out.= mysql2date('d F Y', $object->post_date);
             $out.='</td>';
             $out.='</tr>';
             $out.='<tr>';
             $out.='<td>';
             $out.='<font face="Helvetica">';
             $out.='<a href="' .  get_permalink($object->ID) . '" title="Leer artículo en el sitio" style="font-size: 16px; color: #525252;" target="_blank">';
             $out.='<strong>';
             $out.= get_the_title($object->ID);
             $out.='</strong>';
             $out.='</a>';    
             $out.='</font>';
             $out.='</td>';
             $out.='</tr> ' ;
             $out.='<tr>';
             $out.='<td>';
             $out.='<p style="margin: 0; font-size: 12px;line-height: 130%;">';
             $out.=cortar($object->post_content, 180,"");
             $out.='</p>';
             $out.='</td>';
             $out.='</tr>';
             $out.='<tr>';
             $out.='<td>';
             $out.='<a href="'.  get_permalink($object->ID) .'" title="Ver galeria de fotos">';
             $out.='<img style="display:block; border:0 none;" src="http://www.cleclub.cl/boletin/001/img/botongal.jpg">';
             $out.='</a>';  
             $out.='</td>';
             $out.='</tr>';
             if(get_field('archivo_adjunto',$object->ID)){
                 $out.='<tr>';
                 $out.='<td>';
                 $out.='<a href="'. wp_get_attachment_url(get_field('archivo_adjunto',$object->ID)) .'" title="Descargar Presentación">';
                 $out.='<img style="display:block; border:0 none;" src="http://www.cleclub.cl/boletin/001/img/botondescarga.jpg">';
                 $out.='</a> '; 
                 $out.='</td>';
                 $out.='</tr>';
             }
             $out.='</table>';    
             $out.='</td>';
             $out.='</tr>';
    }
    $out.='</table>';

    echo $out;
}

function get_proxima_charla(){
    global $post;
    $postObject = get_field('proxima_charla',$post->ID);
    $out='';
    $out.='<table cellpading="" cellspacing="10" border="0" width="600" align="center" bgcolor="#EEEEEE" style="margin-bottom: 10px;">';
        foreach ($postObject as $object){
        $fechaEvento = get_field('fecha',$object->ID);
        $dia = date('d', strtotime($fechaEvento));
        $mes = traduceMes(date('m', strtotime($fechaEvento)));
        $ano = date('Y', strtotime($fechaEvento));
            $out.='<tr>';
            $out.='<td valign="top">';
            $out.='<table>';
            $out.='<tr>';
            $out.='<td style="font-size: 10px;">';
            $out.= $dia .' ' . $mes .' ' . $ano . ' ' .get_field('hora',$object->ID).'hrs '.get_field('lugar',$object->ID); 
            $out.='</td>';
            $out.='</tr>';
            $out.='<tr>';
            $out.='<td>';
            $out.='<font face="Helvetica">';
            $out.='<a href="' .  get_permalink($object->ID) . '" title="Leer artículo en el sitio" style="font-size: 16px; color: #525252;" target="_blank">';
            $out.='<strong>';
            $out.= get_the_title($object->ID);
            $out.='</strong>';
            $out.='</a>' ;   
            $out.='</font>';
            $out.='</td>';
            $out.='</tr>';  
            $out.='<tr>';
            $out.='<td style="font-size: 12px;">';
            $out.='<strong>';
            $out.='Relator: '. get_field('relator',$object->ID);
            $out.='</strong>';
            $out.='</td>';
            $out.='</tr>';
            $out.='<tr>';
            $out.='<td>';
            $out.='<p style="font-size: 12px;margin:0;">';
            $out.= cortar($object->post_content, 180,"");
            $out.='</p>';
            $out.='</td>';
            $out.='</tr>';
            $out.='</table>' ;   
            $out.='</td>';
            $out.='</tr>';
    }
    $out.='</table>';

    echo $out;
}

function get_cdduc(){
    global $post;
    $postObject = get_field('cdd_uc',$post->ID);
       
    
    
    $out='';
    $out.='<table cellpading="" cellspacing="10" border="0" width="600" align="center" bgcolor="#EEEEEE" style="margin-bottom: 10px;">';
        foreach ($postObject as $object){
             $out.=  '  <tr>
                <td width="70" valign="top">
                <a href="' .  get_permalink($object->ID) . '" title="Leer artículo en el sitio" target="_blank">'
                . get_the_post_thumbnail($object->ID, 'notas' , array('style' => 'display:block;border: 1px solid #999999;')) .
                '</a>
                </td>
                <td valign="top">
                <table>
                <tr>
                <td>
                <font face="Helvetica">
                <a href="' .  get_permalink($object->ID) . '" title="Leer artículo en el sitio" style="font-size: 16px; color: #525252;" target="_blank">
                <strong>
                '. get_the_title($object->ID).
                '</strong>
                </a>    
                </font>
                </td>
                </tr>  
                <tr>
                <td>
                <p style="margin: 0; font-size: 12px;line-height: 130%;">
                En esta edición podemos encontrar una entrevista a José Miguel Sánchez, director del Instituto de Economía de la Facultad de Ciencias Económicas y Administrativas de la...
                </p>
                </td>
                </tr>
                </table>    
                </td>
                </tr>';
    }
    $out.='</table>';

    echo $out;
}

function callcurl($permalink) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $permalink);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);

    $page = curl_exec($ch);
    if (!curl_errno($ch)) {
         $info = curl_getinfo($ch);
    }
    curl_close($ch);
    return $page;
}


?>