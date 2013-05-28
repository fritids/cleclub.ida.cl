<?php
/**
  Template Name: dfnews
 */
    $titulo=urldecode($_GET["titulo"]);
    $url= urldecode($_GET["url"]);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<link rel="stylesheet" href="http://cleclub.ida.cl/wp-content/themes/mta-cle/style.css" type="text/css"/>
<script src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/_js/jquery-1.7.1.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
<title></title>
<style type="text/css" media="screen">
* {
	margin:0;
	padding: 0; }

</style>
</head>
    <body id="dfnewsExternalLink">
        <div id="contextualBarCiper" class="clearfix">
            <div class="wrap">
                <a href="/" id="cleCorpMark"><img src="<?php echo get_template_directory_uri(); ?>/_img/logoCLE.svg" data-fallback="<?php echo get_template_directory_uri(); ?>/_img/logoCLE.png"/></a>
                    <div class="clearfix dfWrap">
                        <span>
                            <strong id="externalLinkTitle">
                                Noticia Diario Financiero:
                            </strong>
                        </span>
                        <a href="<?php echo $url; ?>" title="#"><?php echo $titulo; ?></a>
                    </div>
                <a href="/" id="contextualBarClose">Volver a CLE CLUB</a>
            
        </div>
            </div>
        <iframe  id="eliframe" src="<?php echo $url;?>" frameborder="0">
            <p>Your browser does not support iframes.</p>
        </iframe>
    </body>
</html>


