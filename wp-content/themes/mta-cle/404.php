<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<html <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width" />
        <title><?php echo is_home() ? get_bloginfo("name")." &raquo ". get_bloginfo("description") : wp_title(" &raquo; ", false, 'right') .  get_bloginfo("name"); ?></title>
        <link rel="profile" href="<?php echo get_template_directory_uri(); ?>/http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php echo get_template_directory_uri(); ?>/<?php bloginfo('pingback_url'); ?>" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/_img/icons/touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/_img/icons/touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_directory'); ?>/_img/icons/touch-icon-57.png">
        <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_img/icons/favicon.ico">
        <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
        <!--jquery core-->
        
        <!--end jquery core-->
        <!--layerslider-->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_js/css/layerslider.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_js/static/layerslider/skins/defaultskin/skin.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/_js/validationEngine.jquery.css" type="text/css"/>
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css"/>
        <!--end layerslider-->
        <link href="<?php echo get_template_directory_uri(); ?>/_js/jquery.qtip.css" rel="stylesheet" type="text/css" />
        <script src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/_js/jquery-1.7.1.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/selectivizr.js"></script>
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

	<div id="primary" class="site-content">
		<div id="content" role="main">
                    <div id="noFound">
                        <article id="post-0" class="post error404 no-results not-found">
                                        <img src ="<?php bloginfo('template_directory'); ?>/_img/logoBig.png"/>
					<h1>
                                            ERROR 404
                                        </h1>
                                        <h2>
                                            Pagina no encontrada!

                                        </h2>
                                        <p>
                                            Disculpa los inconvenientes, pero parece que la página que estás buscando ha cambiado,
                                            ha sido borrada o no existe. Como nuestro objetivo es entregarte el mejor servicio posible, 
                                            acá encontrarás el acceso a nuestros principales ítems de navegación:
                                        </p>
                                        
                                        <?php
                if (is_user_logged_in()) {

                    wp_nav_menu(array('theme_location' => 'primary','items_wrap'=> '<ul class="noMenu">%3$s</ul>','container'=> 'nav','container_class' => 'noMenuWrap'));
                } else {

                    wp_nav_menu(array('theme_location' => 'public','items_wrap'=> '<ul class="noMenu">%3$s</ul>','container'=> 'nav','container_class' => 'noMenuWrap'));
                };
                ?>

			</article><!-- #post-0 -->
                    </div>
		</div><!-- #content -->
	</div><!-- #primary -->
</body>
</html>