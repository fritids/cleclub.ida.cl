<?php

/**

 * The Template for displaying all single posts.

 *

 * @package WordPress

 * @subpackage Twenty_Twelve

 * @since Twenty Twelve 1.0

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



<h1><?php the_title();?></h1>


<?php /* 
<div id="bajadaContent">

<?php the_excerpt_rss();?>

</div>
*/ ?>


<div id="postContent">

<?php the_post(); the_content();?>

</div>



</div><!--pageContent-->

<!--/END OF CONTENIDOS-->



<?php get_footer(); ?>