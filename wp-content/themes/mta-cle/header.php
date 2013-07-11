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
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        
        <title><?php echo is_home() ? get_bloginfo("name")." &raquo ". get_bloginfo("description") : wp_title(" &raquo; ", false, 'right') .  get_bloginfo("name"); ?></title>

        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/_img/icons/touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/_img/icons/touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_directory'); ?>/_img/icons/touch-icon-57.png">
        <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_img/icons/favicon.ico">
        <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
        <!--jquery core-->
        
        <!--end jquery core-->
        <!--layerslider-->
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css"/>
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/grid.css" type="text/css"/>
        
        <!--[if IE 7]>
            <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/ie7.css" type="text/css"/>
        <![endif]-->
        
        <!--end layerslider-->
        <script src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/_js/jquery-1.7.1.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/selectivizr.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/validizr.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/swipe.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
        <?php if(is_page('red-de-contactos-cleclub')){
            echo '<script src="'.home_url().'/wp-includes/js/comment-reply.js"></script>';
        } ?>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        
        
        <div id="container">
            <div id="top" class="row">
                <div id="logos">
                    <div id="logo"> <a href="<?php bloginfo('url'); ?>" class="home"><img src="<?php echo get_template_directory_uri(); ?>/_img/logoCLE.svg" data-fallback="<?php echo get_template_directory_uri(); ?>/_img/logoCLE.png" width="178" height="81" /></a> </div>
                    <div id="logo2">
                        <ul class="members Top hide-on-mobile">
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
                    
                    <?php
                        if (is_user_logged_in()) {
                           
                            global $current_user;
                            get_currentuserinfo();
                            
                             if ($current_user->user_firstname != '' && $current_user->user_lastname) {
                    $empresa = get_the_author_meta('aim', $current_user->ID);
                    echo "<a class='marker hide-on-desktop hide-on-h-tablets' href='/login/'>" . $current_user->user_firstname . " " . $current_user->user_lastname . "</a>";
                            
                        }     
                         } else {

                         };
                        ?>
                </div>
            </div>
            <div id="menuContainer">
                <?php
                if (is_user_logged_in()) {

                    wp_nav_menu(array('theme_location' => 'primary','items_wrap'=> '<ul id="principal-menu" class="hide-on-phones hide-on-v-tablets">%3$s</ul>'));
                } else {

                    wp_nav_menu(array('theme_location' => 'public','items_wrap'=> '<ul id="principal-menu" class=" hide-on-phones hide-on-v-tablets">%3$s</ul>'));
                };
                ?>
                
                <?php
                if (is_user_logged_in()) {
                    
                    echo ' <a class="mobilLogOut hide-on-desktop hide-on-h-tablets evt" data-func="salirLog" href="' . wp_logout_url( home_url()) . '">Salir</a>"';
                   
                } else {
                    
                   echo '<a class="mobilLog hide-on-desktop hide-on-h-tablets" href="/login/">Ingreso</a>';
                    
                };
                ?>
                
                
            </div>
            <div id="wrapper" class="clearfix row">
                
               