<?php

/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 Template Name: Contacto

*/
get_header(); ?>
<div id="contenido">
    <div id="pageContent" class="column8 downV down pad">
        <h1><?php the_title();?></h1>
                <?php $pic = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?> 
        <p>
            <?php if ($_POST['mail']) { ?>
                <?php //vars
                    $d1 = 'francisco@ida.cl';
//                    $d3 = 'despinosa@df.cl';
//                    $d4 = 'francesca.canziani@cl.ey.com'; 
//                    $d5 = 'comunicaciones.eychile@cl.ey.com';
                    //vars
                    $nombre = $_POST['nombre'];
                    $cargo = $_POST['cargo'];
                    $empresa = $_POST['empresa'];
                    $telefono = $_POST['telefono'];
                    $mail = $_POST['mail'];
                    $mensaje = $_POST['mensaje'];
                    $asunto = "Contacto - CLE CLUB";
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
                                            Contacto CLE-CLUB
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
                        <p> Nombre      : '.$nombre.'</p>
                        <p> Cargo       : '.$cargo.'</p>
                        <p> Empresa     : '.$empresa.'</p>
                        <p> Teléfono    : '.$telefono.'</p>
                        <p> E-Mail      : '.$mail.'</p>
                        <p> Mensaje     : '.$mensaje.'</p>
                        <p> Fecha Recepción : '.date('d-m-Y').'</p>
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

//mail($destinatario,utf8_decode($asunto),$cuerpo, utf8_decode($headers));

mail($d1,'Contacto CLE-CLUB',$cuerpo, utf8_decode($headers));
//mail($d3,utf8_decode($asunto),$cuerpo, utf8_decode($headers));
//mail($d4,utf8_decode($asunto),$cuerpo, utf8_decode($headers));
//mail($d5,utf8_decode($asunto),$cuerpo, utf8_decode($headers));

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
                Nombre
            </label>
            <input name="nombre" type="text" class="itLogin" id="nombre" required>
            <label>
                Cargo
            </label>
            <input name="cargo" type="text" class="itLogin" id="cargo" />
            <label>
                Empresa
            </label>
            <input name="empresa" type="text" class="itLogin" id="empresa" />
            <label>Teléfono </label>
            <input name="telefono" type="text" class="itLogin" id="telefono">
            <label>Mail</label>
            <input name="mail" type="text" class="itLogin validate" id="mail" required data-custom-validation="checkEmail" data-customError="emailError">
            <label>Mensaje</label>
            <textarea name="mensaje" rows="5" class="itLoginML" id="mensaje"></textarea>
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

