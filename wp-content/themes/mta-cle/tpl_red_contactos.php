<?php
/**
  Template Name: Red de contactos
 */
?>
<?php
get_header();
the_post();
?>

<div id="contenido">
    <div id="pageContent" class="clearfix">
        <h1><?php the_title();?></h1>
        <?php the_content();?>
        
        <form id="formComment" action="" method="post" class="formComment">
            <div class="picAvatar">
                <img src="<?php bloginfo('template_directory'); ?>/_img/avatar.jpg"/>
            </div>
            <textarea class="txtComment" placeholder="Añadir comentario...">
            
            </textarea>
            <span>Estas conectado como Juan Juanet( Salir )</span>
            <input type="submit" value="Comentar" class="btnCont"/>
        </form>
        
        <ul class="commentList">
            <li class="comment">
                <div class="commentInfo">
                    <div class="picAvatar">
                        <img src="<?php bloginfo('template_directory'); ?>/_img/avatar.jpg"/>
                    </div>
                    <a class="perfil_ico">Ver Perfil</a>
                </div>
                <div class="commmentBody">
                    <span class="date">Lunes 24 de Oct 23:21</span>
                    <span class="userCom"><strong>Juan Juanet</strong> Comento:</span>
                    <p>Nullam quis risus eget urna mollis ornare vel eu leo. Sed posuere consectetur est at lobortis. 
                       Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit 
                       amet risus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                <a class="btnCont">Responder</a>
                </div>
                
            </li>
            <li class="commentReply">
                <div class="commentInfo">
                    <div class="picAvatar">
                        <img src="<?php bloginfo('template_directory'); ?>/_img/avatar.jpg"/>
                    </div>
                    <a class="perfil_ico">Ver Perfil</a>
                </div>
                <div class="commmentBody">
                    <span class="date">Lunes 24 de Oct 23:21</span>
                    <span class="userCom"><strong>Juan Juanet</strong> Comento:</span>
                    <p>Nullam quis risus eget urna mollis ornare vel eu leo. Sed posuere consectetur est at lobortis. 
                        Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit 
                        amet risus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    
                </div>

            </li>
            
            
        </ul>
    </div>
    <?php get_sidebar();?>
    <?php get_footer();?>