<?php

/**

 * The main template file.

 *

 * This is the most generic template file in a WordPress theme

 * and one of the two required files for a theme (the other being style.css).

 * It is used to display a page when nothing more specific matches a query.

 * For example, it puts together the home page when no home.php file exists.

 *

 * Learn more: http://codex.wordpress.org/Template_Hierarchy

 *

 * @package WordPress

 * @subpackage Twenty_Twelve

 * @since Twenty Twelve 1.0

 */



get_header(); ?>



	<div id="contenido">

<div id="leftSide">

	<div id="cSlider">

    <div id="layerslider">



                <?

                $args = array(

					'category_name'      => 'banner',

					'order'    => 'ASC',

					'posts_per_page' => 5

				)

				?>



                <?php query_posts( $args ); $i = 1?>   

				<?php while (have_posts()) : the_post(); ?> 

                <? 

				$pic 		= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

				$postID 	= $post->ID; 

				?>

                

				<div class="ls-layer" style="slidedelay: 3000">

					<img class="ls-bg" src="<?php echo get_template_directory_uri(); ?>/tt.php?src=<?php echo $pic;?>&w=645&h=300" alt="layer">

				</div>

				<?php endwhile;?>



	 </div><!--/layerslider-->

</div><!--/cSlider-->

        

</div><!--/leftSide -->



<?php get_sidebar(); ?>



<!--3 bloques de notas-->



<div id="wNotas">



	<div id="wNotasEY" class="boxNotas">


		<?php
    	if(is_user_logged_in())
		{
		?>
        <div class="tituloNota"><span class="naranjo">|</span> <a hreF="http://www.cleclub.cl/category/estudios-ernst-young/"> Estudios Ernst &amp; Young </a> </div>
		<?php } else { ?>
        <div class="tituloNota"><span class="naranjo">|</span> Estudios Ernst &amp; Young </div>
		<?php } ?>

    	  <?

                $args = array(

					'category_name'      => 'estudios-ernst-young',

					'order'    => 'DESC',

					'posts_per_page' => 3

				)

				?>



                <?php query_posts( $args ); $i = 1?>   

				<?php while (have_posts()) : the_post(); ?> 

                <? 

				$pic 		= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

				$postID 	= $post->ID; 

				?>        

			<div class="wNota">                 

                <div class="fotoNota"><img src="<?php echo get_template_directory_uri(); ?>/tt.php?src=<?php echo $pic;?>&w=80&h=80"></div>

                <div class="bajadaNota <?php if ($i == 2) { echo 'odd'; } ?>"><div class="tituloNotaW"><?php the_title();?></div><span class="exp"><a href="<?php the_permalink();?>"><?php echo get_the_popular_excerpt();?></a></span></div>

		    </div><!--/wNota-->

    		<?php $i++;endwhile;?>

    		<div class="clr"></div>



            



    </div>



	<div id="wNotasDF" class="boxNotas middleBox">

		<?php
    	if(is_user_logged_in())
		{
		?>
    	<div class="tituloNota"> <span class="naranjo">|</span> <a href="http://www.cleclub.cl/category/noticias-diario-financiero/">Diario Financiero</a></div>
		<?php } else { ?>
    	<div class="tituloNota"> <span class="naranjo">|</span> Diario Financiero</div>
		<?php } ?>
        


		  <?

                $args = array(

					'category_name'      => 'noticias-diario-financiero',

					'order'    => 'DESC',

					'posts_per_page' => 3

				)

				?>



                <?php query_posts( $args ); $i = 1?>   

				<?php while (have_posts()) : the_post(); ?> 

                <? 

				$pic 		= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

				$postID 	= $post->ID; 

				?>        

			<div class="wNota">                 

                <div class="fotoNota"><img src="<?php echo get_template_directory_uri(); ?>/tt.php?src=<?php echo $pic;?>&w=80&h=80"></div>

                <div class="bajadaNota <?php if ($i == 2) { echo 'odd'; } ?>"><div class="tituloNotaW"><?php the_title();?></div><span class="exp"><a href="<?php the_permalink();?>"><?php echo get_the_popular_excerpt();?></a></span></div>

		    </div><!--/wNota-->

    		<?php $i++;endwhile;?>

    		<div class="clr"></div>



    </div>

    

	<div id="wNotasEY" class="boxNotas">

		<?php
    	if(is_user_logged_in())
		{
		?>
    	<div class="tituloNota"> <span class="naranjo">|</span> <a href="http://www.cleclub.cl/category/charlas-cdd-uc/">Charlas CDD – UC Noticias</a></div>
		<?php } else { ?>
    	<div class="tituloNota"> <span class="naranjo">|</span> Charlas CDD – UC Noticias</div>
		<?php } ?>
        


		 <?

                $args = array(

					'category_name'      => 'charlas-cdd-uc',

					'order'    => 'DESC',

					'posts_per_page' => 3

				)

				?>



                <?php query_posts( $args ); $i = 1?>   

				<?php while (have_posts()) : the_post(); ?> 

                <? 

				$pic 		= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

				$postID 	= $post->ID; 

				?>        

			<div class="wNota">                 

                <div class="fotoNota"><img src="<?php echo get_template_directory_uri(); ?>/tt.php?src=<?php echo $pic;?>&w=80&h=80"></div>

                <div class="bajadaNota <?php if ($i == 2) { echo 'odd'; } ?>"><div class="tituloNotaW"><?php the_title();?></div><span class="exp"><a href="<?php the_permalink();?>"><?php echo get_the_popular_excerpt();?></a></span></div>

		    </div><!--/wNota-->

    		<?php $i++;endwhile;?>

    		<div class="clr"></div>

  </div>    

    

    <div class="clr"></div><!--/clear div-->

</div><!--/wNotas-->

    		<div class="clr"></div>

<!--end of 3 bloques -->



<?php get_footer(); ?>