<?php
/**
 Template Name: Noticias Diario Financiero
 */
get_header(); ?>



<div id="contenido">
<div id="pageContent">
<h1><?php the_title();?></h1>
<div id="wNoticias">
    <?php echo parseFeed("http://www.df.cl/prontus_df/site/tax/port/all/rss_3___1.xml", 20, true);?>
</div><!--/wNoticias-->
</div><!--pageContent-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>