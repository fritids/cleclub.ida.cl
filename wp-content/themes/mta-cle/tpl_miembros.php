<?php

/**

 Template Name: Miembros

*/



get_header(); ?>



<div id="contenido">



<!--CONTENIDOS -->

<div id="pageContent">



<h1><?php the_title();?></h1>



<div id="bajadaContent">

<?php the_excerpt_rss();?>

</div>


                <div id="contenidoMiembros">
                <?php the_post(); the_content();?>
                </div>

  <?

                $args = array(

					'category_name'      => 'miembros',

					'order'    => 'ASC',

					'posts_per_page' => 16

				)

				?>



                <?php query_posts( $args ); $i = 1?>   

				<?php while (have_posts()) : the_post(); ?> 

                <? 

				$pic 		= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

				$postID 	= $post->ID; 

				?>


                  <div class="one_fourth <?php if ($i %4 == 0) { echo 'last'; } ?>">

	                    <div class="bio">

		    	            <div id="fotoMiembro">

							  <a href="<?php the_permalink();?>"><img class="overPic" src="<?php echo get_template_directory_uri(); ?>/tt.php?src=<?php echo $pic;?>&w=212&h=212"></a>

            	            </div>

                   	      <div id="infoMiembro">

   	                    	  <hgroup class="head">

                                	<h5><?php the_title();?><br /></h5>

                                    <h4><?php the_field('cargo'); ?></h4>

                                    </hgroup>

                             <span class="header_shadow"></span>

	                        </div><!--/infoMiembro-->

        		        </div><!--/bio-->

           		  </div>  <!--/one_fourth_1-->

                  

				<? $i++;endwhile;?>                  



<div class="clr"></div>

</div><!--pageContent-->

<!--/END OF CONTENIDOS-->



<?php get_footer(); ?>