            </div><!--contenido-->
        </div><!--/wrapper-->
    </div><!--/container-->
    <footer class="footerBox clearfix">
             <div class="center">
                 <div class="left logo">
                     <img src="<?php bloginfo('template_directory'); ?>/_img/logoFooter.png" alt="Logotipo de CLE">
                 </div>
                 <div class="menuBlock">
                     <nav id="menuFooter">
                         <?php
                         if (is_user_logged_in()) {

                             wp_nav_menu(array('theme_location' => 'primary','items_wrap'=> '<ul class="menuFoot">%3$s</ul>'));
                         } else {

                             wp_nav_menu(array('theme_location' => 'public','items_wrap'=> '<ul class="menuFoot">%3$s</ul>'));
                         };
                         ?>
                     </nav>
                     <ul class="members">
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
                  <a class="contactMail clearfix" href="mailto: <?php echo get_bloginfo('admin_email'); ?>" title="E-mail de contacto"><?php echo get_bloginfo('admin_email'); ?></a>   
                 </div>
                
                 
             </div> 
             
            </footer>
    <?php wp_footer(); ?>
    </body>
</html>

