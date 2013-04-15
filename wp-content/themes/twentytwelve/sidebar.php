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
	<div id="wRegistro" class="boxSidebar">
        <p class="titulo">Registro </p>
        <div class="label"> <span class="labelTitle"> Usuario: </span><input name="input" type="text" class="itLogin"></div>
        <div class="label"> <span class="labelTitle"> Contraseña: </span><input name="input" type="text" class="itLogin"></div>
        <input name="input" type="button" value="Enviar" class="btn">
        <br class="clr">
	</div><!--/wRegistro-->
    
    <div id="wEventoSociales" class="tituloBox">
	    <p class="tituloNM">Eventos Sociales</p> 
    </div><!--/wEventoSociales-->

	<div id="listadoEventos">
	<ul class="eventos">
            <li>01 ENE 2013 <span class="naranjo">|</span> 19:00 <span class="naranjo">|</span> Centro de Eventos <br>
            <strong>Evento de Prueba Uno </strong></li>
            <li>05 ENE 2013 <span class="naranjo">|</span>  15:00 <span class="naranjo">|</span> Palacio de la Moneda   <br>
            <b>Test Evento Two </b></li>
        </ul>
     </div><!--/listadoEventos-->

</div><!--/sidebar-->
<div class="clr"></div>