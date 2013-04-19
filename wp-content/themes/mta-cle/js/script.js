(function(window, $, undefined) {
    Modernizr.addTest('chromebrowser', function() {
        return navigator.userAgent.toLowerCase().match('chrome');

    });

    window.SiteHandler = function() {
        //cosas para el init
        this.autoHandle($('.evt'));
        this.equalizeHeights($(".page-template-tpl_miembros-php #pageContent .one_third .bio"));
        this.equalizeHeights($(".page-template-tpl_representantes-php #pageContent .one_third .bio"));
        this.equalizeHeights($(".page-template-quienessomos-php #pageContent .one_third .bio"));
        this.equalizeHeights($("#pageContent .bio .infoMiembro .cargo"));
        this.equalizeHeights($(".bio .infoMiembro .empresa"));
        this.equalizeHeights($("#wNotas .boxNotas"));


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
            var sTop = $(window).scrollTop();
            var alto = $(e.currentTarget).attr("data-alto") / 2;
            var ancho = $(e.currentTarget).attr("data-ancho") / 2;
            var item = $(e.currentTarget).attr("data-item");
            var lightbox = t.getLightBox();
            var $lightBox_img = $('<div />').attr({'id': 'lightboxImg', 'class': 'lightbox_img_box'}).css('left', (sWidth - ancho)).css('margin-top', (alto * -1) + 'px'),
                    $closeBtn = $('<button />').attr({'class': 'lb-close-btn', 'data-func': 'closeLightBox', 'title': 'Cerrar'}),
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
                
            })

        },
        closeLightBox: function() {
            $("#lightbox,#lightboxImg").remove();
        }
        ,
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
        }
        ,
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
    }

    $(window.document).ready(function() {
        window.siteHandler = new window.SiteHandler();
    });


}(this, jQuery));

