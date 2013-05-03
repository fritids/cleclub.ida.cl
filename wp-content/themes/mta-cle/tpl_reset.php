<?php  
/*
Template Name: Login Page
*/
the_post();
get_header();
?>

 
    <div id="pageContent" class="clearfix">
        <h1><?php the_title();?></h1>
        <p><strong>Introduce tu nueva contraseña.</strong><br /> 
            Para que tu contraseña sea segura, usa mayúsculas, minúsculas, números y símbolos como ! “ ? $ % ^ & ).
        </p>
        <div id="contacto">
            
            <form id="formPassword" action="" method="post" class="formPass">
                <label>Nueva contraseña</label>
                <input type="password" name="passW" id="passW" class="inputPass" value="" size="25" placeholder="*******" required/>
                <label>Confirma la nueva contraseña</label>
                <input type="password" name="passW2" id="passW2" class="inputPass" value="" size="25" placeholder="*******" required data-custom-validation="checkPass"/>
                <input type="submit" value="Cambiar Contraseña" class="btnCont"/>
            </form>
            
        </div>
          
        
    
    </div>
 
<?php get_sidebar();?>
<?php get_footer();?>