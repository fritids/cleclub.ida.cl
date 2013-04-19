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
                       var $lightBox_bg = $('<div />').attr({'id': 'lightbox', 'class': 'lightbox-holder'}).css({'opacity': '0.7'}),
                           $lightBox_content = $('<div />').attr({'id': 'lightbox-content', 'class': 'lightbox_content_box'}).css({'opacity': '0.7'}),
                           $lightBox_img = $('<div />').attr({'id': 'lightboxImg', 'class': 'lightbox_img_box'}),
                           $closeBtn = $('<button />').attr({
                                   'class': 'lb-close-btn',
                                   'data-func': 'closeLightBox',
                                   'title': 'Cerrar'
                           });
             
                       $lightBox_bg.css({
                               'width': '100%',
                               'height': $(window.document).height()
                       });
            
                       $('body').append($lightBox_bg);
                       $lightBox_bg.append($lightBox_content);
                       $lightBox_img.append($closeBtn);   
            
                       this.prevScrollTop = $(window).scrollTop();
            
                       this.autoHandle($closeBtn);
            
                       // setTimeout con 1ms, es un hack para ejecutar el código de forma asincronica con el thread principal. sirve para gatillar animaciones de css mas facilmente
                       setTimeout(function() {
                               $lightBox_bg.css('opacity', '0.7');
                       }, 0);
            
                       return $lightBox_content;
               },
        getImage: function(e) {
            e.preventDefault();

            var sWidth = window.innerWidth /2;
            var sHeight = window.innerHeight /2;
            var sTop = $(window).scrollTop();
            var alto = $(e.currentTarget).attr("data-alto") / 2;
            var ancho = $(e.currentTarget).attr("data-ancho") / 2;
            lightbox = this.getLightBox();
            $("#lightbox").after('<img style="left:' + (sWidth - ancho) + 'px;top:' + (sTop + alto) + 'px" class="imgLigthbox central" src="' + $(e.currentTarget).attr("href") + '">');
            $(lightbox).show("0.7")
            this.autoHandle($('.lb-close-btn'));

        },
        closeLightBox : function(){
            $("#lightbox,.imgLigthbox").remove();
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

