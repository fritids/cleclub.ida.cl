            </div><!--contenido-->
            <footer class="footerBox clearfix">
                <div class="left logo">
                    <img src="ruta al logo" alt="Logotipo de CLE">
                </div>
                <div class="left">
                    <nav id="menuFooter">
                        <?php
                            if (is_user_logged_in()) {

                                wp_nav_menu(array('theme_location' => 'primary'));
                            } else {

                                wp_nav_menu(array('theme_location' => 'public'));
                            };
                        ?>
                    </nav>
                    <a href="mailto: <?php echo get_bloginfo( 'admin_email');?>" title="E-mail de contacto"><?php echo get_bloginfo( 'admin_email');?></a>
                </div>
            </footer>
        </div><!--/wrapper-->
    </div><!--/container-->
    <?php wp_footer(); ?>
    </body>
</html>

