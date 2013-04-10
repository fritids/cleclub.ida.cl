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

    <script>

    $(document).ready(function(){

        $("#contactoCle").validationEngine('attach');

       });

    </script>







<div id="contenido">

<!--CONTENIDOS -->

<div id="pageContent">



<h1><?php the_title();?></h1>



<div id="bajadaContent">

<?php the_excerpt_rss();?>

</div>

                <? 

				$pic 		= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

				?> 

<p>


<?php if ($_POST['mail']) { ?>
    
   <?php //vars
   $d2 = 'coke@mta.cl'; 
   
   $d1 = 'jghattas@uc.cl';
   $d3 = 'despinosa@df.cl';
   $d4 = 'francesca.canziani@cl.ey.com'; 
   $d5 = 'comunicaciones.eychile@cl.ey.com';
   //vars
   
   $nombre			= $_POST['nombre'];
   $cargo			= $_POST['cargo'];
   $empresa			= $_POST['empresa'];
   $telefono		= $_POST['telefono'];
   $mail			= $_POST['mail'];
   $mensaje			= $_POST['mensaje'];

   
$asunto = "Contacto - CLE CLUB";
$cuerpo = ' 
<html> 
<head> 
   <title>Contacto - CLE CLUB</title> 
</head> 
<body style="font-family:Tahoma;font-size:11px"> 
<p> Nombre      : '.$nombre.'</p>
<p> Cargo       : '.$cargo.'</p>
<p> Empresa     : '.$empresa.'</p>
<p> Teléfono    : '.$telefono.'</p>
<p> E-Mail      : '.$mail.'</p>
<p> Mensaje     : '.$mensaje.'</p>
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
mail($d2,utf8_decode($asunto),$cuerpo, utf8_decode($headers));

mail($d1,utf8_decode($asunto),$cuerpo, utf8_decode($headers));
mail($d3,utf8_decode($asunto),$cuerpo, utf8_decode($headers));
mail($d4,utf8_decode($asunto),$cuerpo, utf8_decode($headers));
mail($d5,utf8_decode($asunto),$cuerpo, utf8_decode($headers));

?>

<div id="ok">
	Gracias por ponerte en contacto con nosotros, te responderemos a la brevedad<br />
    <br />
    CLE CLUB.
</div>

<div class="clr"></div>

<?php

 }
 else {


?> 
<div id="contacto">

<form name="contactoCle" id="contactoCle" method="post" action="#">

<table width="100%" border="0" cellspacing="5" cellpadding="0" class="formContacto">

  <tr>

    <th bgcolor="#F8F7F7">Nombre</th>

    <td width="69%"><span class="label">

      <input name="nombre" type="text" class="itLogin validate[required]" id="nombre">

    </span></td>

  </tr>

  <tr>

    <th bgcolor="#F8F7F7">Cargo</th>

    <td><span class="label">
      <input name="cargo" type="text" class="itLogin validate[required]" id="cargo" />
    </span></td>

  </tr>
  <tr>
    <th bgcolor="#F8F7F7">Empresa</th>
    <td><span class="label">
      <input name="empresa" type="text" class="itLogin validate[required]" id="empresa" />
    </span></td>
  </tr>

  <tr>

    <th bgcolor="#F8F7F7">Teléfono </th>

    <td><span class="label"> 

      <input name="telefono" type="text" class="itLogin validate[required,custom[phone]]" id="telefono">

    </span></td>

  </tr>

  <tr>

    <th bgcolor="#F8F7F7">Mail</th>

    <td><span class="label">

      <input name="mail" type="text" class="itLogin validate[required,custom[email]]" id="mail">

    </span></td>

  </tr>

  <tr>

    <th bgcolor="#F8F7F7">Mensaje</th>

    <td><span class="label">

      <textarea name="mensaje" rows="5" class="itLoginML validate[required]" id="mensaje"></textarea>

    </span></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td><span class="boxSidebar">

      <br>

      <input name="enviar" type="submit" value="Enviar" class="btn" id="enviar">

    </span></td>

  </tr>

</table>

</form>


</div><!--/contacto-->

	

    <div id="picPage">

	<img src="<?php echo get_template_directory_uri(); ?>/tt.php?src=<?php echo $pic;?>&w=460&h=300">                

	</div><!--/picPage-->



<br class="clr">
<?php };?>
</div><!--pageContent-->

<!--/END OF CONTENIDOS-->



<?php get_footer(); ?>

