	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <span style="margin-right:20px; color:#333;">
                <a class="contactoButton" href="/contacto/">
                    Contacto 
                </a>
            </span>
                <input type="text" class="field searchInput hide-on-phones" name="s" id="s" placeholder="Buscar" />
		<input type="image" style="margin-bottom:-3px" value="buscar" id="searchsubmit" name="submit" class="submit evt" data-func="deploy-search" src="<?php bloginfo('template_directory');?>/_img/buscarIcon.png">
	</form>
