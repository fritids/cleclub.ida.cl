	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<span style="margin-right:20px; color:#333;"><a href="/contacto/">Contacto <img src="<?php bloginfo('template_directory');?>/_img/contacto.gif" style="margin-bottom:-3px;margin-right:10px"> </a>|</span>
        <input type="text" class="field searchInput round5" name="s" id="s" placeholder="Buscar" />
		<input type="image" style="margin-bottom:-3px" value="buscar" id="searchsubmit" name="submit" class="submit" src="<?php bloginfo('template_directory');?>/_img/lupa.gif">
	</form>
