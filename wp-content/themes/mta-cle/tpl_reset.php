<?php  
/*
Template Name: Login Page
*/
the_post();
get_header();
?>
    <?php
    $error = '';
    $success = '';
    $user_id = get_current_user_id();
    if(isset($_POST['task']) && $_POST['task'] == 'reset') {
    $password = $_POST['pwd1'];
    $con_password = $_POST['pwd2'];
    if($password == "" || $con_password == "") {
    $error = 'Password field is required.';
    } else if($password <> $con_password){
    $error = 'Password does not match.';
    } else {
        $qry = $wpdb->query("UPDATE $wpdb->users SET user_pass = '".md5($password)."' WHERE ID=$user_id ");
        if($qry) {
            $success= 'Password updated successfully, it will take effect in your next login.';
        }
    }
    }
    ?>
 
    <div id="pageContent" class="clearfix">
        <h1><?php the_title();?></h1>
        
        <?php the_content();?>
        <?php if (is_user_logged_in()): ?>
        <form name="frmreset" id="frmreset" action="" method="post">
            <div class="msgBox"> 
            <?php if($error != "") : echo '<p class="errormsg">'.$error.'</p>'; endif; if($success != "") : echo '<p class="successmsg">'.$success.'</p>'; endif; ?> </div>
                <label>Password</label><br/>
                <input type="password" value="<?php echo (isset($_POST['pwd1']) ? $_POST['pwd1'] : ''); ?>" name="pwd1" id="pwd2" /><br/>    
                <label>Password Again</label><br/>
                <input type="password" value="<?php echo (isset($_POST['pwd2']) ? $_POST['pwd2'] : ''); ?>"" name="pwd2" id="pwd2" /><br/>
                <button type="submit" class="alignright" >SUBMIT</button>
                <input type="hidden" name="task" value="reset" />
        </form>
        <?php else:?>
        <?php 
        $user_login = ( 'incorrect_password' == $errors->get_error_code() || 'empty_password' == $errors->get_error_code() ) ? esc_attr(stripslashes($_POST['log'])) : '';
	$rememberme = ! empty( $_POST['rememberme'] );
        ;?>
        <form name="registerform" id="registerform" action="<?php echo esc_url(site_url('wp-login.php?action=register', 'login_post')); ?>" method="post">
                <p>
                    <label for="user_login"><?php _e('Username') ?><br />
                        <input type="text" name="user_login" id="user_login" class="input" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" /></label>
                </p>
                <p>
                    <label for="user_email"><?php _e('E-mail') ?><br />
                    <input type="text" name="user_email" id="user_email" class="input" value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="25" /></label>
                </p>
                <?php do_action('register_form'); ?>
                <p id="reg_passmail"><?php _e('A password will be e-mailed to you.') ?></p>
                <br class="clear" />
                <input type="hidden" name="redirect_to" value="<?php echo esc_attr($redirect_to); ?>" />
                <p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e('Register'); ?>" /></p>
            </form>
        <?php endif;?>    
        
    
    </div>
 
<?php get_sidebar();?>
<?php get_footer();?>