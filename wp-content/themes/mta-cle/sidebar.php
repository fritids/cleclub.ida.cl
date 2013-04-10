<?php

/**

 * The sidebar containing the main widget area.

 *

 * If no active widgets in sidebar, let's hide it completely.

 *

 * @package WordPress

 * @subpackage Twenty_Twelve

 * @since Twenty Twelve 1.0

 */

?>

<div id="sidebar">



            

  <div id="wRegistro" class="boxSidebar wRegistro">

		<?php    

    	if(!is_user_logged_in())

		{

		?>

        <p class="titulo">Acceso miembros CLE CLUB </p>

        <form name="login" method="post" action="<?php echo get_option('home'); ?>/wp-login.php">

			<input type="hidden" name="action" value="login" />

			<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />

    		    <div class="label"> <span class="labelTitle"> Usuario: </span><input type="text" name="log" id="log" value="" class="itLogin" /></div>

		        <div class="label"> <span class="labelTitle"> Contraseña: </span><input type="password" name="pwd" id="pwd" class="itLogin"></div>

        	<input name="input" type="submit" value="Ingresar" class="btn">

	        <br class="clr">

        </form>

        <?php 

		} else {

		global $current_user;

		get_currentuserinfo();

		?>

    <p class="titulo">Bienvenido a CLE CLUB </p>

      <table width="100%" border="0" cellspacing="2" cellpadding="2" style="font-size:12px">

  <tr>

    <td width="100" valign="top"><div class="picAvatar"><?php echo get_avatar($current_user->id,75);?></div></td>

    <td align="center" valign="top">

    

      <?php

	if($current_user->user_firstname != '' && $current_user->user_lastname) {

		$empresa = get_the_author_meta('aim',$current_user->ID);



			echo "<strong>" . $current_user->user_firstname . " " . $current_user->user_lastname."</strong><br><a href='mailto:".$current_user->user_email."'>".$current_user->user_email."<br><strong>".$empresa."</strong></a>";

			echo "<br><br><a class='btnLogOut' href='" . wp_logout_url('index.php') . "'>Salir</a>";

	}

		else {

			echo "<strong>" . $current_user->user_login . "</strong><br><a href='mailto:".$current_user->user_email."'>".$current_user->user_email."<br>".the_author_meta('aim',$current_user->ID)."</a>";

			echo "<br><br><a class='btnLogOut' href='" . wp_logout_url('index.php') . "'>Salir</a>";			

	}

	?>

    </tr>

  </table>

    <br /><div class="smallFont">Tienes alguna duda o sugerencia, contáctanos <a href="#">acá</a></div></td>

	  <?



 

		

		?>

      <?php } ?>

	</div><!--/wRegistro-->

    

    <div id="wEventoSociales" class="tituloBox">

	    <p class="tituloNM"><a href="category/agenda/">Agenda [+]</a></p> 

    </div><!--/wEventoSociales-->



	<div id="listadoEventos">

	<ul class="eventos">

              <?

                $args = array(

					'category_name'      => 'agenda',

					'order'    => 'desc',

					'posts_per_page' => 2

				)

				?>



                <?php query_posts( $args ); $i = 1?>   

				<?php while (have_posts()) : the_post(); ?> 

                <? 

				$pic 		= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

				$postID 	= $post->ID; 

				$fechaEvento= get_field('fecha');

				$dia		= date('d', strtotime($fechaEvento));

				$mes		= traduceMes(date('m' , strtotime($fechaEvento)));

				$ano		= date('Y', strtotime($fechaEvento));

				



				

				?>

            <li><?php echo $dia.' '.$mes.' '.$ano ?> <span class="naranjo">|</span> <?php the_field('hora'); ?> hrs. <span class="naranjo">|</span> <?php the_field('lugar'); ?> <br>

            <strong><a href="<?php the_permalink();?>"><?php the_title();?> - Leer más</a></strong></li>

            <?php $i++; endwhile;?>

        </ul>

     </div><!--/listadoEventos-->



</div><!--/sidebar-->

<?php wp_reset_query();?>

<div class="clr"></div>