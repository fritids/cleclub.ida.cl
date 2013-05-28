(function(window, $, undefined) {
    Modernizr.addTest('chromebrowser', function() {
        return navigator.userAgent.toLowerCase().match('chrome');

    });

    window.SiteHandler = function() {
        //cosas para el init
        var esto = this;
        
        esto.autoHandle($('.evt'));
        esto.svgFallBack();
        setTimeout(function(){
            esto.equalizeHeights($(".bio"));
        },2000);
        
        esto.equalizeHeights($("#pageContent .bio .infoMiembro .cargo"));
        esto.equalizeHeights($(".bio .infoMiembro .empresa"));
        
        if(Modernizr.mq('only screen and (min-width : 640px)')){
            esto.equalizeHeights($("#wNotas .tituloNota"));
            esto.equalizeHeights($("#wNotas .boxNotas"));
            esto.equalizeHeights($(".equal"));
        }
        if(Modernizr.mq('only screen and (max-width : 920px)')){
            esto.deployMobilMenu();
        }
        if(Modernizr.mq('only screen and (max-width : 640px)')){
            esto.textOverflow();
            if($('#pageContent[data-bkbtn="true"]').length > 0){
                esto.deployBackButton();
            }
        }
        if(Modernizr.mq('only screen and (max-width : 1025px) and (min-width : 801px) ')){
            esto.deploySelectTablet();
        }
        $(window).on('resize',function(){
            $('#menuSelect').remove();
            $('.realSelect').remove();

            esto.equalizeHeights($(".bio"));
            esto.equalizeHeights($("#pageContent .bio .infoMiembro .cargo"));
            esto.equalizeHeights($(".bio .infoMiembro .empresa"));
            if(Modernizr.mq('only screen and (max-width : 640px)')){
                $("#wNotas .boxNotas").css('height','auto');
                $("#wNotas .tituloNota").css('height','auto');
                $(".equal").css('height','auto');
            }
            if(Modernizr.mq('only screen and (min-width : 640px)')){
                esto.equalizeHeights($("#wNotas .tituloNota"));
                esto.equalizeHeights($("#wNotas .boxNotas"));
                esto.equalizeHeights($(".equal"));
            }
            if(Modernizr.mq('only screen and (max-width : 920px)')){
                esto.deployMobilMenu();
            }
            if(Modernizr.mq('only screen and (max-width : 640px)')){
                if($('#pageContent[data-bkbtn="true"]').length > 0){
                    esto.deployBackButton();
                }
            }
            if(Modernizr.mq('only screen and (max-width : 1025px) and (min-width : 801px)')){
                $('.realSelect').remove();
                esto.deploySelectTablet();
            }
        });
        
        
        $('#formPassword').validizr({
            customValidations : {
                checkPass : function($input){
                    var valor = $input.val();
                    var valor2 = $('#passW').val();
                    
                    if( $input.next().is('.errorMsn') ){
                        $input.next().remove();
                    }
                    
                    return valor && valor2 === valor;
                }
            },
            customErrorHandlers : {
                passwordError : function( $input ){
                    $input.after('<span class="errorMsn">Las contraseñas no coinciden</span>');
                }
            },
            validFormCallback : function( $formulario ){
                //if( ! parseInt( $formulario.find('input[name="userId"]').val() ) ){ return; }
                
                $.ajax({
                    type: "POST",
                    url: '/wp-admin/admin-ajax.php',
                    data: 'action=envioAjax&func=cambiarContrasena&' + $formulario.serialize(),
                    dataType: "html",
                    beforeSend: function( xhr ) { $formulario.css('opacity', '0.5'); },
                    success: function( respuesta ) {
                        $formulario.parent().append(respuesta);
                        $formulario.remove();
                    }
                });
            
            }
        });
        
        
        
        $('#backPass').validizr({
            customValidations : {
                checkEmail : function($input){
                    var valor = $input.val(),
                    emailRegEx = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;

                    if( $input.next().is('.errorMsn') ){
                        $input.next().remove();
                    }
                    return valor && emailRegEx.test( valor );
                }
            },
            customErrorHandlers : {
                emailError : function( $input ){
                    $input.after('<span class="errorMsn">Debe ingresar email correcto</span>');
                }
            },
            validFormCallback : function( $formulario ){
                $.ajax({
                    type: "POST",
                    url: '/wp-admin/admin-ajax.php',
                    data: 'action=envioAjax&func=recuperarContrasena&' + $formulario.serialize(),
                    dataType: "html",
                    beforeSend: function( xhr ) { 
                        $formulario.find('.errorMsn').remove();
                        $formulario.css('opacity', '0.5'); 
                    },
                    success: function( respuesta ) {
                        if( respuesta === 'noUser' ){
                            
                            $('#mailLog').after('<span class="errorMsn">Email ingresado no se encuentra en nuestro registro</span>') ;
                            $formulario.css('opacity','1');
                        } else {
                            $formulario.parent().append(respuesta);
                            $formulario.remove();
                        }
                    }
                });
            }
        });
            
         $('#frontLog').validizr({
             validFormCallback : function( $formulario ){
                
                $.ajax({
                    type: "POST",
                    url: '/wp-admin/admin-ajax.php',
                    data: 'action=envioAjax&func=loginFront&' + $formulario.serialize(),
                    dataType: "html",
                    beforeSend: function( xhr ) { 
                        $formulario.find('.errorMsn').remove();
                        $formulario.css('opacity', '0.5'); 
                    },
                    success: function( respuesta ) {
                        if(respuesta === 'errorcontrasena'){
                            $('#pwd').after('<span class="errorMsn frontLogg">Nombre de Usuario o Contraseña Incorrectos</span>');
                            $formulario.css('opacity','1');
                        }
                        else{
                          window.location.reload();
                        }
                    }
                });
            
            }
            
          
        });
        
        $('#frontLogMobile').validizr({
             validFormCallback : function( $formulario ){
                
                $.ajax({
                    type: "POST",
                    url: '/wp-admin/admin-ajax.php',
                    data: 'action=envioAjax&func=loginFront&' + $formulario.serialize(),
                    dataType: "html",
                    beforeSend: function( xhr ) { 
                        $formulario.find('.errorMsn').remove();
                        $formulario.css('opacity', '0.5'); 
                    },
                    success: function( respuesta ) {
                        if(respuesta === 'errorcontrasena'){
                            $('#pwd').after('<span class="errorMsn frontLogg">Nombre de Usuario o Contraseña Incorrectos</span>');
                            $formulario.css('opacity','1');
                        }
                        else{
                          window.location.assign(window.location.origin);
                        }
                    }
                });
            
            }
            
          
        });
        
        if($('#slider').length > 0){
            $('#slider').Swipe({auto: 3000, continuous: true, callback: function(index, item){
                    var $bulletsContainer = $('#bullets-slider'),
                        $bullets = $bulletsContainer.find('a'),
                        $actualBullet = $bulletsContainer.find('a[data-slide="'+index+'"]');
                        $bullets.removeClass('active');
                        $actualBullet.addClass('active');
                        
            }});
        }
        
        


    };
    window.SiteHandler.prototype = {
        autoHandle: function($elements) {
            if (!$elements.length) {
                return;
            }
            var esto = this;
            $elements.each(function(index, elem) {
                var $item = $(elem),
                        func = $item.attr('data-func'),
                        event = $item.attr('data-event') ? $item.attr('data-event') : 'click';
                if (func && $.isFunction(esto[ func ])) {
                    $item.off(event, $.proxy(esto[ func ], esto));
                    $item.on(event, $.proxy(esto[ func ], esto));
                }
            });
        },
        svgFallBack : function() {
            if( !Modernizr.svg ) { 
                var svgObjects = $('[data-fallback]');
                $.each(svgObjects, function(i, elm){
                    $(elm).attr('src', $(elm).attr('data-fallback'));
                });
            }
        },
        deployMobilMenu : function (){
            var count = 0;
            var $submenu = $("ul.sub-menu");
            $submenu.children('li').children('a').addClass('group');
            
            var $menuContainer = $('#menuContainer');
            var $listMenu = $menuContainer.find('.menu-item');
            var options = '<option value="">Seleccione una sección</option>';
            var selectedAttr, mainTitle = "";

            $.each($listMenu,function(i,item) {
                var aLink = $(item).children('a');
                
                if(aLink.parent().hasClass('current-menu-item')){
                    selectedAttr = 'selected';
                    mainTitle = aLink.text();
                }else{
                    selectedAttr = '';
                }
                
                if(!aLink.hasClass('group')){
                   options += '<option value="'+aLink.attr('href')+'" '+selectedAttr+'>'+aLink.text()+'</option>';
                   
                }
//                else if(aLink.hasClass('group')){
//                   if(count == 0){
//                      options += '<optgroup>'; 
//                      options += '<option value="'+aLink.attr('href')+'" '+selectedAttr+'>'+aLink.text()+'</option>'; 
//                      count++; 
//                   }else if(count > 0 && count < 3){
//                      options += '<option value="'+aLink.attr('href')+'" '+selectedAttr+'>'+aLink.text()+'</option>';
//                      count++;
//                   }else if(count == 3){
//                      options += '<option value="'+aLink.attr('href')+'" '+selectedAttr+'>'+aLink.text()+'</option>';
//                      options += '</optgroup>';
//                      count = 0;
//                   } 
//                }
            });
            $menuContainer.prepend('<select id="menuSelect" class="evt-new" data-func="redirectMenu" data-event="change" name="menu-principal"></select>');
            this.autoHandle($('.evt-new'));
            var $select = $('#menuSelect');
            if($('.mobile-title').length == 0){ 
               $select.after('<h2 class="mobile-title">'+mainTitle+'</h2>'); 
            }
            $select.prepend(options);
        },
        deploySelectTablet : function (){
            var $submenu = $('#menuContainer').find("ul.sub-menu").find('li').find('a');
            var $listMenu = $('#menuContainer').find('.selectReplace');
            var classes = $listMenu.attr('class');
            var options = '<option value="'+$listMenu.find('a').attr('href')+'">¿Quienes Somos?</option>';
            $.each($submenu, function(val, item){
                options += '<option value="'+$(item).attr('href')+'">'+$(item).text()+'</option>';
            });

            $listMenu.after('<select class="evt-new realSelect" data-func="redirectMenu" data-event="change" name="menu-principal">'+options+'</select>');
            this.autoHandle($('.evt-new'));
        },
        textOverflow : function(){
            var $parrafo = $('#overflow-text').find('p'),
                texto = $parrafo.text(),
                textocortado = texto.substring(0,150);
                textocortado += '...';
                $parrafo.text(textocortado).append('<button class="evt mas-btn" data-func="showText" data-text="'+texto+'" data-type="mas">Más</button>');
                this.autoHandle($('.evt'));
        },
        deployBackButton : function(){
            var est = this;
            $(window).on('scroll', function(){
                if(($(window).scrollTop() >=  400) && ($('.volver-arriba').length == 0)){
                   $('body').append('<button class="evt volver-arriba" data-func="slideUp">Subir</button>'); 
                   est.autoHandle($('.evt'));
                }else if($(window).scrollTop() <  400){
                   $('.volver-arriba').remove(); 
                }
            });
            
        }, 
        slideUp : function (evento){
            $('body,html').animate({
				scrollTop: 0
			}, 800);
            $(evento.currentTarget).remove(); 
        },        
        showText : function(evento){
            var $boton = $(evento.currentTarget),
                type = $boton.attr('data-type'),
                texto = $boton.attr('data-text'),
                $parrafo = $boton.parent(),
                textoparrafo = $parrafo.contents().eq(0).text();
                
                $parrafo.addClass('transition');
                $parrafo.text(texto).append($boton);

                if(type === 'mas'){
                    $boton.attr('data-type','menos').text('Menos');
                }else{
                    $boton.attr('data-type','mas').text('Más');
                }
                $boton.attr('data-text',textoparrafo);
                this.autoHandle($('.evt'));
            
        },
        equalizeHeights: function($elements) {
                       if ($elements.length) {
                               var heightArray = [],
                                           maxValue;
                               $elements.height('auto');
                               $.each($elements, function(index, elm) {
                                       heightArray.push($(elm).height());
                               });
                               maxValue = Math.max.apply(Math, heightArray);
                               $elements.height(maxValue);
                       }
               },
        getLightBox: function() {
                       var $lightBox_bg = $('<div />').attr({'id': 'lightbox', 'class': 'lightbox-holder'}).css({'opacity': '0.7'});
                       $lightBox_bg.css({
                               'width': '100%',
                               'height': $(window.document).height()
                       });
                       $('body').append($lightBox_bg);
                       this.prevScrollTop = $(window).scrollTop();
                       // setTimeout con 1ms, es un hack para ejecutar el código de forma asincronica con el thread principal. sirve para gatillar animaciones de css mas facilmente
                       setTimeout(function() {
                               $lightBox_bg.css('opacity', '0.7');
                       }, 0);
                       return $lightBox_bg;
               },
        getImage: function(e) {
            e.preventDefault();

            var t = this;
            var sWidth = $(window).width() / 2;
            var sHeight = $(window).height() / 2;
            var alto = $(e.currentTarget).attr("data-alto") / 2;
            var ancho = $(e.currentTarget).attr("data-ancho") / 2;
            var item = $(e.currentTarget).attr("data-item");
            var lightbox = t.getLightBox();
            var $lightBox_img = $('<div />').attr({'id': 'lightboxImg', 'class': 'lightbox_img_box'}).css('top', '70px'),
                    $closeBtn = $('<button>Cerrar</button>').attr({'class': 'lb-close-btn', 'data-func': 'closeLightBox', 'title': 'Cerrar'}),
                    $arrowR = $('<a />').attr({'href': '#','data-item': item,'class': 'arrowR', 'data-func': 'nextPic', 'title': 'Siguiente'}).text("Siguiente"),
                    $arrowL = $('<a />').attr({'href': '#','data-item': item,'class': 'arrowL', 'data-func': 'prevPic', 'title': 'Anterior'}).text("Anterior");
            $("body").append($lightBox_img);
            $("#lightboxImg").prepend('<img class="imgLigthbox central" src="' + $(e.currentTarget).attr("href") + '">');
            
            $(".imgLigthbox").load(function(){
                $lightBox_img.append($closeBtn);   
                $lightBox_img.append($arrowR);   
                $lightBox_img.append($arrowL);   
                t.autoHandle($('.lb-close-btn'));
                t.autoHandle($('.arrowR'));
                t.autoHandle($('.arrowL'));
                
            });
            $(window).scrollTop(0,0);
        },
        closeLightBox: function() {
            $("#lightbox,#lightboxImg").remove();
        },
        nextPic: function(e) {
            e.preventDefault();

            var item = parseInt($(e.currentTarget).attr("data-item")) + 1;
            var fotos = $(".gallery li").length;
            if(item >= fotos){item=0}
            var $img = $('<img />').attr({'src': '/wp-content/themes/mta-cle/_img/ajax-loader.gif', 'id':"loading"});
            $("#lightboxImg").prepend($img)
            var img = $(".gallery").find('a[data-item="'+item+'"]').attr("href");
            $(".imgLigthbox").attr("src", img);
            $(".arrowL,.arrowR").attr("data-item", item);
            $(".imgLigthbox").load(function(){$("#loading").fadeOut().promise().done(function(){$("#loading").remove()})})
        },
        prevPic: function(e) {
            e.preventDefault();
            var item = parseInt($(e.currentTarget).attr("data-item")) - 1;            
            if(item < 0){item = parseInt($(".gallery li").length)-1;}            
            var $img = $('<img />').attr({'src': '/wp-content/themes/mta-cle/_img/ajax-loader.gif', 'id':"loading"});
            $("#lightboxImg").prepend($img)
            var img = $(".gallery").find('a[data-item="'+item+'"]').attr("href");
            $(".imgLigthbox").attr("src", img);
            $(".arrowL,.arrowR").attr("data-item", item);
            $(".imgLigthbox").load(function(){$("#loading").fadeOut().promise().done(function(){$("#loading").remove()})})
        },
        salirLog : function( e ){
            e.preventDefault();
            
            $.ajax({
                    type: "POST",
                    url: '/wp-admin/admin-ajax.php',
                    data: 'action=envioAjax&func=desloguear',
                    dataType: "html",
                    beforeSend: function( xhr ) {  },
                    success: function( respuesta ) { window.location.reload(); }
                });
        },
        loadComments : function( e ){
            var commentCount = $('.comment').length;
            $.ajax({
                type: "POST",
                url: '/wp-admin/admin-ajax.php',
                data: 'action=envioAjax&func=loadComments&offset=' + commentCount,
                dataType: "html",
                beforeSend: function( xhr ) { $('#pageContent').css('opacity','0.5'); },
                success: function( respuesta ) {
                    $('#pageContent').css('opacity','1.0');
                    $('#all-comments').append(respuesta);
                }
            });
        },
        goToSlide : function( evento ){
            evento.preventDefault();
            var bulletSlide = $(evento.currentTarget).attr('data-slide');
            $('#slider').data('Swipe').slide(parseInt(bulletSlide,10));
        },
        redirectMenu : function( evento ){
            var selection = $(evento.currentTarget).find('option:selected').val(); //Selecciona el value del option seleccionado
            window.location.href = selection; //Redirige a la URL de la seleccón a través de su value
        },
        deploySearch : function ( evento ){
            if(Modernizr.mq('only screen and (max-width : 640px)')){
                evento.preventDefault();
            }
            var button = $(evento.currentTarget);
            var input = button.prev();
            var deploy = button.attr('data-deploy');
            var deployed = "";
            
            var deployFunc = function(){
                input.css({
                    'width' : '140px',
                    'padding' : '5px',
                    'border' : '1px solid #e6e6e6',
                    'margin-left' : '20px'
                });
                deployed = "true";
                input.parent().focus();
            };
            
            var hideFunc = function(){
                input.removeAttr('style');
                deployed = "false";
            };
            
            if(deploy === 'false'){
                deployFunc();
            }else{
                hideFunc();
            }
            button.attr('data-deploy', deployed);
            input.blur(function(){
                hideFunc();
            });
            input.on("keypress", function(e) {
                 if (e.keyCode == 13) {
                    input.parent().submit(); 
                }
             });
        }
    };

    $.fn.Slider = function() {
        this.each(function() {
            var control = $(this).attr("data-control");
            var id = $(this).attr("id");
            slideHome[id] = new iScroll(id, {snap: true, momentum: false, hScrollbar: false, hScroll: true, lockDirection: false, onScrollEnd: function() {
                    $('#' + control + ' > li a.active').removeClass('active');
                    $('#' + control + ' > li:nth-child(' + (this.currPageX + 1) + ') a').addClass('active');
                }
            });


        });
    };

    $(window.document).ready(function() {
        window.siteHandler = new window.SiteHandler();
    });


}(this, jQuery));

