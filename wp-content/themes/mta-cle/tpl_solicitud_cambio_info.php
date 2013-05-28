<?php

/**

 Template Name: Solicitud cambio de informacion

*/
the_post();
get_header();
$user = wp_get_current_user();
?>
    <script>
    $(document).ready(function(){
        $("#contactoCle").validationEngine('attach');
       });
    </script>
<div id="contenido">
    <div id="pageContent" class="clearfix column8 down downV pad">
        <h1><?php the_title();?></h1>
                <?php $pic = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?> 
                
                <?php the_content();?>
        <p>
            <?php if ($_POST['mail']) { ?>
                <?php //varså
//                    $d3 = 'despinosa@df.cl';
//                    $d4 = 'francesca.canziani@cl.ey.com'; 
//                    $d5 = 'comunicaciones.eychile@cl.ey.com';
                    //vars
                    $empresa = $_POST['empresa'];
                    $cargo = $_POST['cargo'];
                    $telefono = $_POST['telefono'];
                    $mail = $_POST['mail'];
                    $estadocivil = $_POST['ecivil'];
                    $grupos = $_POST['grupos'];
                    $actividad = $_POST['actividad'];
                    $familia = $_POST['familia'];
                    $cuerpo = ' 
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
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="10" bgcolor="#E9E9E9">
                <tr>
                    <td width="600" align="center">
                        <img style="display:block" src="'.get_bloginfo("template_directory").'/_img/mailfirm.jpg"/>
                    </td>
                </tr>
                    
            </table>
        
    </body> 
</html> 

 
'; 
//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$headers .= "From: CLE CLUB - Contacto <no-reply@cleclub.cl>\r\n"; 
$cuerpo = utf8_decode($cuerpo);

if(!empty($_FILES['imagen'])){
    
 
   if ( ! function_exists( 'wp_handle_upload' ) ) { require_once( ABSPATH . 'wp-admin/includes/file.php' ); }
    
    $upload = wp_handle_upload( $_FILES['imagen'], array( 'test_form' => false ) );
    $filename = $upload['file'];
    $wp_upload_dir = wp_upload_dir();
    $wp_filetype = wp_check_filetype(basename($filename), null );
    
    $attachment = array(
        'guid' => $wp_upload_dir['baseurl'] . _wp_relative_upload_path($filename),
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    
    $attach_id = wp_insert_attachment( $attachment, $filename, $postid );
    $archivo = $filename;
    wp_mail('francisco@ida.cl', 'Nueva Solicitud de Cambio de Perfil', $cuerpo, $headers, $filename);
    wp_mail('jorge@ida.cl', 'Nueva Solicitud de Cambio de Perfil', $cuerpo, $headers, $filename);
    wp_mail($mail , 'Tu solicitud de cambio de perfil ha sido efectiva', $cuerpo, $headers, $filename);
} else {
    
    $archivo = null;
}


?>
<div id="ok">
Gracias por contactarse con<br /> 
C LEVEL EXECUTIVE CLUB<br />
Te responderemos a la brevedad

<a class="btn" href="/" style="float:none;display:block; width:100px; margin:20px auto 0; color:#fff; font-size:12px">Volver al Inicio</a>
</div>
<?php
 }
 else {
?> 
        
        
<div id="contacto">

    <form name="contactoCle" id="contactoCle" method="post" action="#" enctype="multipart/form-data">
            <label>
                Empresa
            </label>
            <input name="empresa" type="text" class="itLogin" id="nombre" value="<?php the_field('empresa',"user_$user->ID"); ?>">
            <label>Cargo</label>
            <input name="cargo" type="text" class="itLogin" id="mail" value="<?php the_field('cargo',"user_$user->ID"); ?>">
            <label>
                Teléfono
            </label>
            <input name="telefono" type="text" class="itLogin" id="empresa" value="<?php the_field('telefono',"user_$user->ID"); ?>"/>
            <label>
                Mail
            </label>
            <input name="mail" type="text" class="itLogin" id="cargo" value="<?php the_field('mail',"user_$user->ID"); ?>" />
            <label>
               Estado Civil
            </label>
            <select class="itLogin" name="ecivil">
                <option value="Casado">Casado(a)</option>
                <option value="Soltero">Soltero(a)</option>
                <option value="Divorciado">Divorciado(a)</option>
                <option value="Viudo">Viudo(a)</option>
            </select>
            <label>Grupos y Asociaciones:</label>
            <textarea name="grupos" rows="5" class="itLoginML mid" id="grupos"><?php the_field('grupos_y_asociaciones',"user_$user->ID"); ?></textarea>
            <label>Actividades y talentos:</label>
            <textarea name="actividad" rows="5" class="itLoginML mid" id="actividades"><?php the_field('actividades_y_talentos',"user_$user->ID"); ?></textarea>
            <label>Familia:</label>
            <textarea name="familia" rows="5" class="itLoginML mid" id="familia"><?php the_field('grupo_familiar',"user_$user->ID"); ?></textarea>
            <label>Adjuntar Imagen de Perfil </label>
            <input name="imagen" type="file" class="itLogin" value="Examinar...">
            
            <input name="enviar" type="submit" value="Enviar" class="btnCont" id="enviar">
        </form>
</div>

<?php };?>
</div><!--pageContent-->
<?php get_sidebar();?>
<?php get_footer(); ?>

