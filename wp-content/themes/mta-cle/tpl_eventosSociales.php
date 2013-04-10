<?php

/**

 * The Template for displaying all single posts.

 *

 * @package WordPress

 * @subpackage Twenty_Twelve

 * @since Twenty Twelve 1.0

 Template Name: Eventos Sociales

 */



get_header(); ?>



<div id="contenido">



				<?php while (have_posts()) : the_post(); ?> 

                <? 

				$pic 		= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

				$postID 	= $post->ID; 

				endwhile;

				?>

                

<div id="leftSide">

	<div id="cSlider">

				<div id="fixedPic" class="picPost">

					<img class="ls-bg" src="<?php echo get_template_directory_uri(); ?>/tt.php?src=<?php echo $pic;?>&w=630&h=300">

				</div>



	</div><!--/cSlider-->

        

</div><!--/leftSide -->

<?php get_sidebar();?>



<!--CONTENIDOS -->

<div id="pageContent">





<h1><?php echo the_title();?> </h1>



<div id="bajadaContent">

<?php echo the_excerpt(); ?>

</div>



<div id="wNoticias">

 <ul>

  				<?

                $args = array(

					'category_name'      => 'eventos-sociales',

					'order'    => 'ASC',

					'posts_per_page' => 8

				)

				?>



                <?php query_posts( $args ); $i = 1?>  

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

	<?php the_excerpt();?>

 <span class="more"><a href="<?php the_permalink();?>"> Leer Más</a></span>

  </div>

	<br class="clr">  

  

  </li>

<? endwhile; ?>

 </ul>

</div><!--/wNoticias-->





</div><!--pageContent-->



<?php get_footer(); ?>