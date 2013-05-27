<?php
/*
Template Name: Quienes Somos
*/
?>
<?php get_header();the_post(); ?>

<div id="contenido pad">
<div id="pageContent" class="clearfix column8 downV down pad">  
<?php echo breadcrumb(); ?>    
<h1><?php the_title(); ?></h1>
<?php the_content();?>
<?php $childPages=$wp_query->post->ID; ?>
    	<?php query_posts(array('showposts' => 4, 'post_parent' => $childPages, 'post_type' => 'page','post__not_in'=>array(304))); 
        if(have_posts()){
        $i = 1;    
        while (have_posts()) { the_post();
        $last = $i % 3 == false ? 'last':'';
        ?>

        <div class="quien column4 <?php echo $last;?> down">
            <div class="bio quienesSomos">
                <div class="fotoMiembro">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('portadaPerfil');?></a>
                </div>    
                <div class="infoMiembro">    
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </div>
            </div>
         </div>   
        <?php $i++; }} ?>
       

</div>   

</div>    
<?php get_sidebar();?>
<?php get_footer(); ?>
