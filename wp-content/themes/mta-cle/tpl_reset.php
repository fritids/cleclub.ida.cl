<?php  
/*
Template Name: cambio contraseña
*/

global $user_ID;
get_currentuserinfo();

the_post();
get_header();
?>

 <?php if( is_user_logged_in() || isset( $_GET['userEmail'] ) ) { ?>
    <div id="pageContent" class="clearfix">
        <h1><?php the_title();?></h1>
        <p><strong>Introduce tu nueva contraseña.</strong><br /> 
            Para que tu contraseña sea segura, usa mayúsculas, minúsculas, números y símbolos como ! “ ? $ % ^ & ).
        </p>
        <div class="contacto">
            
            <form id="formPassword" action="" method="post" class="formPass">
                <label for="passW">Nueva contraseña</label>
                <input type="password" name="passW" id="passW" class="inputPass" value="" size="25" placeholder="*******" required/>
                <label for="passW2">Confirma la nueva contraseña</label>
                <input type="password" name="passW2" id="passW2" class="inputPass" value="" size="25" placeholder="*******" required data-custom-validation="checkPass" data-customError="passwordError"/>
                <input type="hidden" name="userId" value="<?php echo isset( $_GET['userEmail'] ) ? $_GET['userEmail'] : $user_ID; ?>"/>
                <input type="submit" value="Cambiar Contraseña" class="btnCont"/>
            </form>
            
        </div>
    </div>
 <?php }  else { ?>
        <div id="pageContent" class="clearfix">
            <h1><?php the_title(); ?></h1>
                <p><strong>Introduce tu nueva contraseña.</strong><br /> 
                    Ingrese su correo electrónico para cambiar su contraseña.<br /> 
                    Recibirá un email con un enlace para crear su contraseña nueva.
                    <small>* Revisa tu correo electrónico para obtener el enlace de confirmación.</small>
                </p>
            <div class="contacto">
                <form id="backPass" action="" method="post" class="formPass">
                    <label for="mailLog">Correo Electrónico</label>
                    <input type="email" name="mailLog" id="mailLog" class="inputPass" placeholder="mail@correo.cl" required data-custom-validation="checkEmail" data-customError="emailError"/>
                    <input type="submit" value="Cambiar Contraseña" class="btnCont"/>
                </form>
            </div>
        </div>
        


 <?php } ?>
<?php get_sidebar();?>
<?php get_footer();?>