<html>
    <head>
        <title><?php the_title(); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
       
    </head>
    <body style="font-family: Helvetica;color: #555555;margin: 0;" >
        <hr style="border:3px solid #000000;margin:0">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" height="32" style="margin-top: 10px;margin-bottom: 10px;">
            <tr>
                <td>
                    <a style="border: none; outline: none;" href="<?php bloginfo('url'); ?>" target="_blank"><img style="border: none; outline: none;" src="<?php bloginfo('template_directory'); ?>/img/logo.jpg" alt="Logo CLE CLUB"/></a>
                </td>
                <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" align="right">
                        <tr>
                            <td style="color:#555555;font-size: 16px;text-align: right;">
                                <strong>
                                Newsletter CLE CLUB
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right; font-size: 12px; color: #555555;">
                                Mayo 2013
                            </td>
                        </tr>
                        <tr height="10">
                            
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <img src="<?php bloginfo('template_directory'); ?>/img/logos.jpg"/>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table cellpadding="6" border ="0" cellspacing="0" width="600" align="center">
            <tr>
                <td width="1" bgcolor="#ff9900" height="20">
                </td>
                <td bgcolor="#000">
                    <font face="Helvetica" style="font-size: 16px; color: #ffffff;">
                    Departamento de Estudios Ernst &amp; Young
                    </font>
                </td>
            </tr>
        </table>
            <?php get_destacada();?>
        </table>
        
        <table cellpadding="6" border ="0" cellspacing="0" width="600" align="center">
            <tr>
                <td width="1" bgcolor="#ff9900" height="20">
                </td>
                <td bgcolor="#000">
                    <font face="Helvetica" style="font-size: 16px; color: #ffffff;">
                    Última Charla CLE CLUB
                    </font>
                </td>
            </tr>
        </table>
           <?php get_ultima_charla();?>
        <table cellpadding="6" border ="0" cellspacing="0" width="600" align="center">
            <tr>
                <td width="1" bgcolor="#ff9900" height="20">
                </td>
                <td bgcolor="#000">
                    <font face="Helvetica" style="font-size: 16px; color: #ffffff;">
                     Próxima Charla CLE CLUB 
                    </font>
                </td>
            </tr>
        </table>
            <?php get_proxima_charla();?>
        
        <table cellpadding="6" border ="0" cellspacing="0" width="600" align="center">
            
            <tr>
                <td width="1" bgcolor="#ff9900" height="20">
                </td>
                <td bgcolor="#000">
                    <font face="Helvetica" style="font-size: 16px; color: #ffffff;">
                    CDD-UC
                    </font>
                </td>
            </tr>
        </table>
           <?php get_cdduc();?>
        <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#DDDDDD">
         
            <tr>
                <td valign="top">
                    <table cellpading="" cellspacing="10" border="0" width="600" align="center">  
                        <tr>
                            <td>
                                <img src="<?php bloginfo('template_directory'); ?>/img/footer.jpg"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p style="font-size: 10px;line-height: 130%;text-align: center;">
                                    Para asegurar la entrega de nuestros e-mail en su correo, por favor agregue news@cleclub.cl a su libreta de direcciones de correo. Si usted no visualiza bien este mail, 
                                    puede ver el <a href="<?php the_permalink(); ?>" style="color:#ff9900;text-decoration: underline;">newsletter online</a></p>

                                <p style="font-size: 10px;line-height: 130%;text-align: center;">
                                En caso que no desee seguir recibiendo este tipo de información,solicitamos que responda este mismo correo al remitente con el subject “Remove” o “Remover”. 
                                </p>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
          <?php if(is_user_logged_in()){?>
             <div class="code">
                 <textarea style="width: 600px; height: 400px; margin:20px auto; display:block;" name="htmlCode" value=""><?php echo callcurl(get_permalink($post->ID)) ?></textarea>
            </div>
    <?php } ?>
        
    </body>
</html>
