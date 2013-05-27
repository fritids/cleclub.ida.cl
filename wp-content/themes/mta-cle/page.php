<?php get_header(); ?>
<?php the_post(); ?>                
<div id="contenido" class="row">
    <?php echo breadcrumb(); ?> 
    <?php if (get_post_thumbnail_id()) : ?>
        <div id="leftSide" class="column8 down downV">
            <div id="cSlider">
                <div id="fixedPic" >
                    <?php echo get_the_post_thumbnail($post->ID, "slideHome", array('class' => "")); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php get_sidebar(); ?>
    <div id="pageContent" class="column12 pad">
        <h1><?php the_title(); ?></h1>
        <div id="postContent" class="column8 down downV">
            <?php the_content(); ?>
        </div>
    </div>
    <?php get_footer(); ?>