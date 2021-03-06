<?php

/**
 * The Template for displaying all single posts.    
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 Template Name: Registro

*/
get_header(); ?>
    <script>
    $(document).ready(function(){
        $("#contactoCle").validationEngine('attach');
       });
    </script>
<div id="contenido">
    <div id="pageContent" class="column8 down pad downV">
        <h1><?php the_title();?></h1>
                <?php $pic = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?> 
        <p>
            <?php if ($_POST['mail']) { ?>
                <?php //vars
                    $d1 = 'despinosa@df.cl';
                    $d2 = 'francesca.canziani@cl.ey.com'; 
                    $d3 = 'comunicaciones.eychile@cl.ey.com';
                    $d4 = 'paolo.bessolo@brandbook.cl';
                   
                    //vars
                    $nombre = $_POST['nombre'];
                    $mail = $_POST['mail'];
                    $empresa = $_POST['empresa'];
                    $cargo = $_POST['cargo'];
                    $asunto = "Solicitud de Membresia - CLE CLUB";
                    $cuerpo = ' 
<html> 
<head> 
   <title>Contacto - CLE CLUB</title> 
</head> 
    <body style="font-family:Tahoma;font-size:11px"> 
        <p> Nombre      : '.$nombre.'</p>
        <p> E-Mail      : '.$mail.'</p>
        <p> Empresa     : '.$empresa.'</p>
        <p> Cargo       : '.$cargo.'</p>
        <p> Fecha Recepción : '.date('d-m-Y').'</p>
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
if(!empty($_FILES['curriculum'])){
    
 
   if ( ! function_exists( 'wp_handle_upload' ) ) { require_once( ABSPATH . 'wp-admin/includes/file.php' ); }
    
    $upload = wp_handle_upload( $_FILES['curriculum'], array( 'test_form' => false ) );
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
    wp_mail($d1 , $asunto, $cuerpo, $headers, $filename);
    wp_mail($d2 , $asunto, $cuerpo, $headers, $filename);
    wp_mail($d3 , $asunto, $cuerpo, $headers, $filename);
    wp_mail($d4 , $asunto, $cuerpo, $headers, $filename);
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

    <form name="contactoCle" id="membresia" method="post" action="#" enctype="multipart/form-data">
            <label>
                Nombre
            </label>
            <input name="nombre" type="text" class="itLogin" id="nombre" required>
            <label>Mail</label>
            <input name="mail" type="text" class="itLogin" id="mail" required>
            <label>
                Empresa
            </label>
            <input name="empresa" type="text" class="itLogin" id="empresa" required />
            <label>
                Cargo
            </label>
            <input name="cargo" type="text" class="itLogin" id="cargo" required />
            
            <label class="hide-on-phones">Adjuntar Curriculum </label>
            <input class="hide-on-phones" name="curriculum" type="file" class="itLogin" required>
            
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

