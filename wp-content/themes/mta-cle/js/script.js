(function(window, $, undefined) {

    window.SiteHandler = function() {
        //cosas para el init
        this.autoHandle($('.evt'));
        this.equalizeHeights($(".page-template-tpl_miembros-php #pageContent .one_third .bio"));
        this.equalizeHeights($(".page-template-tpl_representantes-php #pageContent .one_third .bio"));
        this.equalizeHeights($(".page-template-quienessomos-php #pageContent .one_third .bio"));
        this.equalizeHeights($(".page-template-quienessomos-php #pageContent .one_third .bio .infoMiembro .cargo"));
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
               }
    };

    $.fn.Slider = function() {
        this.each(function() {
            var control = $(this).attr("data-control");
            var id = $(this).attr("id");
            slideHome[id] = new iScroll(id, {snap: true, momentum: false, hScrollbar: false, hScroll: true, lockDirection: false, onScrollEnd: function() {
                    $('#'+control+' > li a.active').removeClass('active');
                    $('#'+control+' > li:nth-child(' + (this.currPageX + 1) + ') a').addClass('active');
                }
            });


        });
    }
    
    $(window.document).ready(function() {
        window.siteHandler = new window.SiteHandler();
    });


}(this, jQuery));

