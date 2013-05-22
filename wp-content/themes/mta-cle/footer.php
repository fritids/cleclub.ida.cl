            </div><!--contenido-->
        </div><!--/wrapper-->
    </div><!--/container-->
    <footer class="footerBox">
        <div class="row pad">
            <div class="center clearfix">
                <div class="infoFoot column4 down">
                    <div class="logo">
                        <img src="<?php bloginfo('template_directory'); ?>/_img/logoFooter.png" alt="Logotipo de CLE">
                    </div>
                    <p>
                        <strong>C Level Executive Club</strong><br />
                        Av.Presidente Riesco 5435, piso 4,<br />
                        Las Condes, Santiago<br />
                        <a href="mailto:contacto@cleclub.cl">contacto@cleclub.cl</a>
                    </p>
                </div>
                <div class="menuBlock clearfix column4">
                    <nav id="menuFooter" class="clearfix">
                        <?php
                        if (is_user_logged_in()) {

                            wp_nav_menu(array('theme_location' => 'primary', 'items_wrap' => '<ul class="menuFoot hide-on-phones">%3$s</ul>'));
                        } else {

                            wp_nav_menu(array('theme_location' => 'footerPublico', 'items_wrap' => '<ul class="menuFoot hide-on-phones">%3$s</ul>'));
                        };
                        ?>
                        
                        
                    </nav>
                       
                </div>
                <div class="column4 down last">
                        <ul class="members clearfix">
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

            </div> 
        </div>
            </footer>
    <?php // wp_footer(); ?>
    </body>
</html>

