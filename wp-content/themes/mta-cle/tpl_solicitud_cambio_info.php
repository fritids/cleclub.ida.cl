<?php

/**

 Template Name: Solicitud cambio de informacion

*/
the_post();
get_header(); ?>
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
        <p> Fecha Recepción : '.date('d-m-Y').'</p>
        <p> Empresa      : '.$empresa.'</p>
        <p> Cargo      : '.$cargo.'</p>
        <p> Telefono     : '.$telefono.'</p>
        <p> Mail    : '.$mail.'</p>
        <p> Estado Civil :'. $estadocivil .'</p>
        <p> Grupos y Asociaciones :'. $grupos .'</p>
        <p>Actividades y Talentos :' . $actividad . '</p>
        <p>Familia : '. $familia. '</p>    
        
    </body> 
</html> 
'; 
//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$headers .= "From: CLE CLUB - Contacto <no-reply@cleclub.cl>\r\n"; 
$cuerpo = utf8_decode($cuerpo);

//mail($destinatario,utf8_decode($asunto),$cuerpo, utf8_decode($headers));
//mail($d2,utf8_decode($asunto),$cuerpo, utf8_decode($headers));
//
//mail($d1,utf8_decode($asunto),$cuerpo, utf8_decode($headers));
//mail($d3,utf8_decode($asunto),$cuerpo, utf8_decode($headers));
//mail($d4,utf8_decode($asunto),$cuerpo, utf8_decode($headers));
//mail($d5,utf8_decode($asunto),$cuerpo, utf8_decode($headers));
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
    wp_mail('francisco@ida.cl,'.$d4 , $asunto, $cuerpo, $headers, $filename);
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
            <input name="empresa" type="text" class="itLogin" id="nombre">
            <label>Cargo</label>
            <input name="cargo" type="text" class="itLogin" id="mail">
            <label>
                Teléfono
            </label>
            <input name="telefono" type="text" class="itLogin" id="empresa" />
            <label>
                Mail
            </label>
            <input name="mail" type="text" class="itLogin" id="cargo" />
            <label>
               Estado Civil
            </label>
            <select class="itLogin">
                <option>Casado</option>
                <option>Casado</option>
                <option>Casado</option>
            </select>
            <label>Grupos y Asociaciones:</label>
            <textarea name="grupos" rows="5" class="itLoginML mid" id="mensaje"></textarea>
            <label>Actividades y talentos:</label>
            <textarea name="actividad" rows="5" class="itLoginML mid" id="mensaje"></textarea>
            <label>Adjuntar Imagen de Perfil </label>
            <input name="imagen" type="file" class="itLogin" value="Examinar...">
            
            <input name="enviar" type="submit" value="Enviar" class="btnCont" id="enviar">
        </form>
</div><!--/contacto-->
<!--    <div id="picPage">

	<img src="<?php echo get_template_directory_uri(); ?>/tt.php?src=<?php // echo $pic;?>&w=460&h=300">                

	</div>/picPage-->

<?php };?>
</div><!--pageContent-->
<?php get_sidebar();?>
<?php get_footer(); ?>

