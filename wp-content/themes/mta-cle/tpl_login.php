<?php

/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 Template Name: login mobile

*/
get_header(); ?>
    <script>
   
    </script>
<div id="contenido">
    <div id="pageContent" class="column8 downV down pad">
       
 
<div class="loginMobile">
    
    <div id="wRegistro" class="boxSidebar wRegistro">
        <?php if (!is_user_logged_in()) : ?>
        <div class="tituloLog">
            <p class="tituloNM">INGRESO <a href="/solicitud-de-membresia/">Solicitar Membresía</a></p>
        </div>    
            <div class="loginWrap">
            <form id="frontLogMobile" name="login" method="post">
                <div class="clearfix boxLog">
                    <label class="label" for="log">Usuario:</label>
                    <input type="text" name="log" id="log" value="" class="itLoginFront" required  autocapitalize="off" />
                </div>
                <div class="clearfix">
                    <label class="label boxLog" for="pwd">Contraseña:</label>
                    <input type="password" name="pwd" id="pwd" class="itLoginFront" required />
                </div>  
                <div class="clearfix">
                    
                    <input name="input" type="submit" value="Ingresar" class="btn"/>
                    <a class="forgot" href="/recuperacion-de-contrasena/" title="Olvidé la contraseña">Olvidé la contraseña</a>
                </div>    
            </form>
            </div>    
            <?php
        else :
            global $current_user;
            get_currentuserinfo();
            ?>
        <div class="logIn">
            <div class="picAvatar"><?php echo get_avatar($current_user->id,  75, get_bloginfo('template_directory') . "/_img/avatardefault.jpg"); ?></div>
            <div class="userData">
                <span>Bienvenido</span>
                <?php
                if ($current_user->user_firstname != '' && $current_user->user_lastname) {
                    $empresa = get_the_author_meta('aim', $current_user->ID);
                    echo "<strong>" . $current_user->user_firstname . " " . $current_user->user_lastname . "</strong>";
                } else {
                    echo "<strong>" . $current_user->user_login . "</strong>";
                }
                echo "
                    <a class='btn'href='/cambio-de-contrasena/'>Cambiar Contraseña</a>

                    <a class='btnLogOut evt' data-func='salirLog' href='" . wp_logout_url('/') . "'>Salir</a>";
                ?>
            </div>
        </div>   
        <?php endif; ?>
    </div>

   
</div>
</div><!--pageContent-->
<?php get_sidebar();?>
<?php get_footer(); ?>

