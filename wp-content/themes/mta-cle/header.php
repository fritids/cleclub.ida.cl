<!DOCTYPE html>
<!--[if IE 7]>
    <html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
   <html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width" />
        <title><?php echo is_home() ? get_bloginfo("name")." &raquo ". get_bloginfo("description") : wp_title('|', false, 'right') .  get_bloginfo("name"); ?></title>
        <link rel="profile" href="<?php echo get_template_directory_uri(); ?>/http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php echo get_template_directory_uri(); ?>/<?php bloginfo('pingback_url'); ?>" />
        <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
        <!--jquery core-->
        <script src="<?php echo get_template_directory_uri(); ?>/_js/jquery-1.7.1.min.js"></script>
        <!--end jquery core-->
        <!--layerslider-->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_js/css/layerslider.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_js/static/layerslider/skins/defaultskin/skin.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/_js/validationEngine.jquery.css" type="text/css"/>
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css"/>
        <!--end layerslider-->
        <link href="<?php echo get_template_directory_uri(); ?>/_js/jquery.qtip.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/_js/jquery.qtip.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/_js/static/js/jqueryui.js" type="text/javascript"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/_js/static/js/plugins.js" type="text/javascript"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/_js/static/layerslider/js/page.js" type="text/javascript"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/_js/static/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
        <script src="<?php bloginfo('template_directory'); ?>/_js/jquery.validationEngine.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/_js/jquery.validationEngine-es.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        
        
        <div id="container">

            <div id="top">
                <div id="logos">
                    <div id="logo"> <a href="<?php bloginfo('url'); ?>" class="home"><img src="<?php echo get_template_directory_uri(); ?>/_img/logoCLE.png" width="178" height="81" /></a> </div>
                    <div id="logo2">
                        <ul class="members Top">
                            <li>
                                <a href="http://www.cdduc.cl/" title="Centro de Desarrollo Directivo UC" rel="#"><img src="<?php bloginfo('template_directory'); ?>/_img/logoUC.png"/></a>
                            </li>
                            <li>
                                <a href="http://www.df.cl/" title="Diario Financiero" rel="#"><img src="<?php bloginfo('template_directory'); ?>/_img/logoDF.png"/></a>
                            </li>
                            <li>
                                <a href="http://www.eychile.cl/" title="Ernst & Young" rel="#"><img src="<?php bloginfo('template_directory'); ?>/_img/logoEY.png"/></a>
                            </li>
                        </ul>

                    </div>
                    <div id="buscador">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
            <div id="menuContainer">
                <?php
                if (is_user_logged_in()) {

                    wp_nav_menu(array('theme_location' => 'primary'));
                } else {

                    wp_nav_menu(array('theme_location' => 'public'));
                };
                ?>
            </div>
            <div id="wrapper" class="clearfix">
                
               