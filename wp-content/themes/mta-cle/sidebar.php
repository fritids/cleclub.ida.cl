<div id="sidebar" class="column4 last down pad <?php
if ( !is_home() ) {
  echo 'hide-on-phones';  // This is a homepage
} 
?>">
    <div id="wRegistro" class="boxSidebar wRegistro hide-on-tablets">
        <?php if (!is_user_logged_in()) : ?>
        <div class="tituloLog">
            <p class="tituloNM">INGRESO <a href="/solicitud-de-membresia/">Solicitar Membresía</a></p>
        </div>    
            <div class="loginWrap">
            <form id="frontLog" name="login" method="post">
                <div class="clearfix boxLog">
                    <label class="label" for="log">Usuario:</label>
                    <input type="text" name="log" id="log" value="" class="itLoginFront" required />
                </div>
                <div class="clearfix">
                    <label class="label boxLog" for="pwd">Contraseña:</label>
                    <input type="password" name="pwd" id="pwd" class="itLoginFront" required />
                </div>  
                <div class="clearfix">
                    <a class="forgot" href="/recuperacion-de-contrasena/" title="Olvidé la contraseña">Olvidé la contraseña</a>
                    <input name="input" type="submit" value="Ingresar" class="btn"/>
                </div>    
            </form>
            </div>    
            <?php
        else :
            global $current_user;
            get_currentuserinfo();
            ?>
        <div class="logIn">
            <div class="picAvatar"><?php echo get_avatar($current_user->id, 75); ?></div>
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
    <div id="wEventoSociales" class="tituloBox">
        <p class="tituloNM"><a href="/eventos-cle/agenda/">CALENDARIO CLE CLUB</a></p> 
    </div>
    <div id="listadoEventos">
        <div class="boxNotas">
            <?php
            $args = array(
                'post_type' => 'eventos_sociales',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'taxeventos',
                        'field' => 'slug',
                        'terms' => 'agenda'
                    )
                ),
                'order' => 'ASC',
                'orderby'=> 'date',
                'posts_per_page' => 2
            );
            $queryEventos = new WP_Query($args);
            $i = 1;
            while ($queryEventos->have_posts()) : $queryEventos->the_post();
                $pic = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                $fechaEvento = get_field('fecha');
                $dia = date('d', strtotime($fechaEvento));
                $mes = traduceMes(date('m', strtotime($fechaEvento)));
                $ano = date('Y', strtotime($fechaEvento));
                ?>
                <div class="wNota clearfix">
                    <div class="tituloNotaW">
                        <small><?php echo $dia . ' ' . $mes . ' ' . $ano ?>,  <?php the_field('hora'); ?> hrs. <br /><?php the_field('lugar'); ?> <br />
                        <?php if(get_field('relator')){
                 echo '<strong>Relator:' . get_field('relator') . '</strong>';
                 } ?>        
                        </small>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                </div>
                <?php
                $i++;
            endwhile;
            ?>
        </div>
    </div><!--/listadoEventos-->
</div><!--/sidebar-->
<?php wp_reset_query(); ?>
