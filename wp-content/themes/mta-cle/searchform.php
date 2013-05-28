	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <span style="margin-right:20px; color:#333;">
                <a class="contactoButton" href="/contacto/">
                    Contacto 
                </a>
            </span>
                <input type="text" class="field searchInput transition" name="s" id="s" placeholder="Buscar" />
		<input type="image" style="margin-bottom:-3px" value="buscar" id="searchsubmit" name="submit" class="submit evt" data-func="deploySearch" data-deploy="false" src="<?php bloginfo('template_directory');?>/_img/buscarIcon.svg" data-fallback="<?php echo get_template_directory_uri(); ?>/_img/buscarIcon.png">
	</form>
