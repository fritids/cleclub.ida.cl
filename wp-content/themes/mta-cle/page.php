<?php get_header(); ?>
<?php the_post(); ?>                
<div id="contenido">
    <?php if (get_post_thumbnail_id()) : ?>
        <div id="leftSide">
            <div id="cSlider">
                <div id="fixedPic" >
                    <?php echo get_the_post_thumbnail($post->ID, "slideHome", array('class' => "")); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php get_sidebar(); ?>
    <div id="pageContent">
        <h1><?php the_title(); ?></h1>
        <div id="postContent">
            <?php the_content(); ?>
        </div>
    </div>
    <?php get_footer(); ?>