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
<link rel="stylesheet" href="http://cleclub.ida.cl/wp-content/themes/mta-cle/style.css" type="text/css"/>
<title></title>
<style type="text/css" media="screen">
* {
	margin:0;
	padding: 0; }

body#radarExternalLink {
        margin: 0;
        overflow: hidden;
        padding: 50px 0 0 0;
	width: 100%; 
}
#externalLinkTitle a, #externalLinkFuente{
    text-decoration: none;
    color: rgb(51,51,51);
}   
#dfnewsExternalLink #contextualBarCiper {
	background: rgb(254,254,254);
	border-bottom: 10px solid rgb(0,0,0);
	color: rgb(51,51,51);
	font-family: Arial, Helvetica, sans-serif;
	left: 0;
	position: fixed;
	top:0;
	width: 100%;
	z-index: 200; 
        padding: 10px;    
}

#dfnewsExternalLink #contextualBarCiper p {
	font-size: 14px;
	position: relative;
        margin-top: 24px;
}

.dfWrap a{
    
    color: rgb(51,51,51);
    text-decoration: none;
    text-decoration: underline;
}

#dfnewsExternalLink #contextualBarCiper span {
	font-size: 14px;
	text-transform: uppercase; }

#dfnewsExternalLink #contextualBarCiper strong {
	border-left: 4px solid #FF9A00;
        color: #333333;
        padding-left: 5px;
}

#cleCorpMark {
	display: block;
	float: left;
	margin: -13px 30px 0 30px;
	text-indent: -99999px;
	width: 125px;
        height: 54px;
}

.dfWrap{
    float: left;
    width:70%;
}
#contextualBarClose {
	background:  rgb(192,197,200);
	color: rgb(0,0,0);
	font-size: 10px;
	line-height: 1.5em;
	padding: 0.5em 2em;
	text-decoration: none;
	text-transform: uppercase;
	top: 0;
        float: right;
        display: block;
        width: 145px;
        margin-right: 30px;
        text-align: center;
	 }

#contextualBarClose:hover {
	background:  #FF9900;
        color: #fff;
}

#dfnewsExternalLink iframe {
	width: 100%;
        height: 100%;
	z-index: 10; }

</style>
</head>
    <body id="dfnewsExternalLink">
        <div id="contextualBarCiper" class="clearfix">
            <p>
                <a href="#" id="cleCorpMark"><img src="http://cleclub.ida.cl/wp-content/themes/mta-cle/css/imgBarra/logoBarra.jpg"/></a>
                    <div class="clearfix dfWrap">
                        <span>
                            <strong id="externalLinkTitle">
                                Noticia Diario Financiero:
                            </strong>
                        </span>
                        <a href="<?php echo $url; ?>" title="#"><?php echo $titulo; ?></a>
                    </div>
                <a href="/" id="contextualBarClose">Volver a CLE CLUB</a>
            </p>
        </div>
        <iframe  id="eliframe" src="<?php echo $url;?>" frameborder="0">
            <p>Your browser does not support iframes.</p>
        </iframe>
    </body>
</html>


