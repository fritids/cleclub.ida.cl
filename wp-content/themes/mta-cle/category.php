<?php

/**

 * The Template for displaying all single posts.

 *

 * @package WordPress

 * @subpackage Twenty_Twelve

 * @since Twenty Twelve 1.0

 Template Name: Noticias

 */



get_header(); ?>



<div id="contenido">



<!--CONTENIDOS -->

<div id="pageContent">





<h1><?php echo single_cat_title( '', false ) ?></h1>



<!--<div id="bajadaContent">

<?php // echo category_description(); ?>

</div>-->



<div id="wNoticias">

 <ul>



				<?php while (have_posts()) : the_post(); ?> 

                <? 

				$pic 		= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

				$postID 	= $post->ID; 

				?>

                

  <li>

  <div id="picNoticia">

  <img src="<?php echo get_template_directory_uri(); ?>/tt.php?src=<?php echo $pic;?>&w=200&h=150">

  </div>

  

  <div id="bajadaNoticia">

  <h2><?php the_title();?> </h2>

	<?php if (is_category(15)) {
	
	$fechaEvento= get_field('fecha');
	$dia		= date('d', strtotime($fechaEvento));
	$mes		= traduceMes(date('m' , strtotime($fechaEvento)));
	$ano		= date('Y', strtotime($fechaEvento));

	?>
    
    
	<div id="detalleEVento">
	<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="6%"><strong>Fecha </strong></td>
    <td width="1%">:</td>
    <td width="93%"><?php echo $dia.' de '.$mes.' de '.$ano ?> </td>
  </tr>
  <tr>
    <td><strong>Hora </strong></td>
    <td>:</td>
    <td><?php the_field('hora'); ?> hrs.</td>
  </tr>
  <tr>
    <td><strong>Lugar</strong></td>
    <td>:</td>
    <td><?php the_field('lugar'); ?></td>
  </tr>
</table>

    </div>
	
	<?php } ?>

	<?php the_excerpt();?>

 <span class="more"><a href="<?php the_permalink();?>"> Leer Más</a></span>

  </div>

	<br class="clr">  

  

  </li>

<? endwhile; ?>

 </ul>

</div><!--/wNoticias-->





</div><!--pageContent-->

<!--/END OF CONTENIDOS-->



<?php get_footer(); ?>