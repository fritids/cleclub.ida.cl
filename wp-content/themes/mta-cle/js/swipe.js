(function(window, document, undefined){
    "use strict";
    window.Swipe = function( container, options ){
        // quit if no root element
        if ( !container ) return;
        
        // seteos previos
        options = options || {};
        options.continuous = options.continuous !== undefined ? options.continuous : true;
        
        var noop = function(){}, // nooperation fn
            offloadFunc = function( func ){ setTimeout( (func || noop), 0 ) }, // offloads
            browser = {
                addEventListener: !!window.addEventListener,
                touch: ('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch,
                transitions: (function(temp) {
                  var props = ['transitionProperty', 'WebkitTransition', 'MozTransition', 'OTransition', 'msTransition'];
                  for ( var i in props ) if (temp.style[ props[i] ] !== undefined) return true;
                  return false;
                })(document.createElement('swipe'))
            },
            element = container.children[0],
            index = parseInt(options.startSlide, 10) || 0,
            speed = options.speed || 300,
            delay = options.auto || 0,
            startPos = {},
            delta = {},
            isScrolling,
            interval,
            slides,
            slidePos,
            width;
        
        // metodos
        var methods = {
            setup : function(){
                slides = element.children;
                slidePos = new Array( slides.length );
                width = container.getBoundingClientRect().width || container.offsetWidth;
                
                // variables locales
                var pos = slides.length,
                    slide;
            
                while( pos-- ){
                    slide = slides[ pos ];
                    
                    slide.style.width = width + 'px';
                    slide.setAttribute('data-index', pos);
                    
                    if ( browser.transitions ) {
                        slide.style.left = (pos * -width) + 'px';
                        methods.move(pos, index > pos ? -width : (index < pos ? width : 0), 0);
                    }
                    
                    if ( !browser.transitions ) { element.style.left = (index * -width) + 'px'; }
                    
                    container.style.visibility = 'visible';
                }
                
                
                element.style.width = (slides.length * width) + 'px';
            },
            move : function( index, dist, speed ){
                methods.translate( index, dist, speed );
                slidePos[ index ] = dist;
            },
            translate : function( index, dist, speed ){
                var slide = slides[index];
                var style = slide && slide.style;

                if ( !style ) { return; }

                style.webkitTransitionDuration = 
                style.MozTransitionDuration = 
                style.msTransitionDuration = 
                style.OTransitionDuration = 
                style.transitionDuration = speed + 'ms';

                style.webkitTransform = 'translate(' + dist + 'px,0)' + 'translateZ(0)';
                style.msTransform = 
                style.MozTransform = 
                style.OTransform = 
                style.transform ='translateX(' + dist + 'px)';
            },
            animate : function( from, to, speed ){
                if ( !speed ) { element.style.left = to + 'px'; return; }
                
                var start = +new Date,
                    timer = setInterval(function(){
                        var timeElap = +new Date - start;
                        
                        if (timeElap > speed) {
                            element.style.left = to + 'px';
                            if (delay) { methods.begin(); }
                            
                            options.transitionEnd && options.transitionEnd.call(event, index, slides[index]);
                            clearInterval(timer);
                            return;
                        }
                        element.style.left = (( (to - from) * (Math.floor((timeElap / speed) * 100) / 100) ) + from) + 'px';
                    }, 4);
            },
            begin : function(){ interval = setTimeout(methods.next, delay); },
            stop : function(){
                delay = 0;
                clearTimeout(interval);
            },
            slide : function( to, slideSpeed ){
                // do nothing if already on requested slide
                if ( index == to ) { return; }
                
                if ( browser.transitions ) {
                    var diff = Math.abs(index-to) - 1,
                        direction = Math.abs(index-to) / (index-to); // 1:right -1:left

                    while (diff--){ methods.move((to > index ? to : index) - diff - 1, width * direction, 0); }

                    methods.move(index, width * direction, slideSpeed || speed);
                    methods.move(to, 0, slideSpeed || speed);
                }
                else {
                    methods.animate(index * -width, to * -width, slideSpeed || speed);
                }

                index = to;

                offloadFunc( options.callback && options.callback(index, slides[index]) );
            },
            prev : function(){
                if ( index ) { methods.slide( index-1 ); }
                else if ( options.continuous ) { methods.slide( slides.length-1 ); }
            },
            next : function(){

                if ( index < slides.length - 1 ) { methods.slide( index+1 ); }
                else if ( options.continuous ) { methods.slide( 0 ); }
            }
        };       
        // end metodos
        
        // event Handlers
        var events = {
            handleEvent: function(event) {
                switch ( event.type ) {
                    case 'touchstart':
                    case 'MSPointerDown' : this.start(event); break;
                    case 'touchmove':
                    case 'MSPointerMove' : this.move(event); break;
                    case 'touchend':
                    case 'MSPointerUp' : offloadFunc( this.end(event) ); break;
                    case 'webkitTransitionEnd':
                    case 'msTransitionEnd':
                    case 'oTransitionEnd':
                    case 'otransitionend':
                    case 'transitionend': offloadFunc( this.transitionEnd(event) ); break;
                    case 'resize': offloadFunc( methods.setup.call() ); break;
                }
                if (options.stopPropagation) { event.stopPropagation(); }
            },
            start : function( event ){
                var touches = event.type === 'MSPointerDown' ? event : event.touches[0];
                
                startPos = {
                    x: touches.pageX,
                    y: touches.pageY,
                    time: +new Date
                };
                
                delta = {};
                
                isScrolling = undefined;
                
                element.addEventListener('touchmove', this, false);
                element.addEventListener('MSPointerMove', this, false);
                element.addEventListener('touchend', this, false);
                element.addEventListener('MSPointerUp', this, false);
            },
            move : function( event ){
                // ensure swiping with one touch and not pinching
                if ( event.touches.length > 1 || event.scale && event.scale !== 1) { return; }

                if ( options.disableScroll ) { event.preventDefault(); }

                var touches = event.type === 'MSPointerMove' ? event : event.touches[0];

                // measure change in x and y
                delta = {
                    x: touches.pageX - startPos.x,
                    y: touches.pageY - startPos.y
                }

                // determine if scrolling test has run - one time test
                if ( typeof(isScrolling) === 'undefined') {
                    isScrolling = !!( isScrolling || Math.abs(delta.x) < Math.abs(delta.y) );
                }

                // if user is not trying to scroll vertically
                if ( !isScrolling ) {
                    // prevent native scrolling 
                    event.preventDefault();

                    // stop slideshow
                    methods.stop();

                    // increase resistance if first or last slide
                    delta.x = 
                            delta.x / 
                            ( (!index && delta.x > 0               // if first slide and sliding left
                            || index == slides.length - 1        // or if last slide and sliding right
                            && delta.x < 0                       // and if sliding at all
                            ) ?                      
                            ( Math.abs(delta.x) / width + 1 )      // determine resistance level
                            : 1 );                                 // no resistance if false

                    // translate 1:1
                    methods.translate(index-1, delta.x + slidePos[index-1], 0);
                    methods.translate(index, delta.x + slidePos[index], 0);
                    methods.translate(index+1, delta.x + slidePos[index+1], 0);
                }
            },
            end : function( event ) {
                // measure duration
                var duration = +new Date - startPos.time;

                // determine if slide attempt triggers next/prev slide
                var isValidSlide = 
                        Number(duration) < 250               // if slide duration is less than 250ms
                        && Math.abs(delta.x) > 20            // and if slide amt is greater than 20px
                        || Math.abs(delta.x) > width/2;      // or if slide amt is greater than half the width

                // determine if slide attempt is past start and end
                var isPastBounds = 
                        !index && delta.x > 0                            // if first slide and slide amt is greater than 0
                        || index == slides.length - 1 && delta.x < 0;    // or if last slide and slide amt is less than 0

                // determine direction of swipe (true:right, false:left)
                var direction = delta.x < 0;

                // if not scrolling vertically
                if (!isScrolling) {
                    if (isValidSlide && !isPastBounds) {
                        if (direction) {
                            methods.move( index-1, -width, 0 );
                            methods.move( index, slidePos[index]-width, speed );
                            methods.move( index+1, slidePos[index+1]-width, speed );
                            index += 1;
                        }
                        else {
                            methods.move(index+1, width, 0);
                            methods.move(index, slidePos[index]+width, speed);
                            methods.move(index-1, slidePos[index-1]+width, speed);
                            index += -1;
                        }
                        
                        options.callback && options.callback(index, slides[index]);

                    } else {
                        methods.move(index-1, -width, speed);
                        methods.move(index, 0, speed);
                        methods.move(index+1, width, speed);
                    }

                }

                // kill touchmove and touchend event listeners until touchstart called again
                element.removeEventListener('touchmove', events, false);
                element.removeEventListener('MSPointerMove', events, false);
                element.removeEventListener('touchend', events, false);
                element.removeEventListener('MSPointerUp', events, false);
            },
            transitionEnd : function( event ) {
                if ( parseInt( event.target.getAttribute('data-index'), 10 ) == index ) {
                    if (delay) { methods.begin(); }
                    options.transitionEnd && options.transitionEnd.call( event, index, slides[index] );
                }
            }
        };
        
        // ejecucion
        methods.setup();
        if ( delay ) { methods.begin(); }
        if ( browser.addEventListener ) {
            // set touchstart event on element    
            if ( browser.touch ){ element.addEventListener('touchstart', events, false); }
            if( window.navigator.msPointerEnabled ){ element.addEventListener('MSPointerDown', events, false); }
            if ( browser.transitions ) {
                element.addEventListener('webkitTransitionEnd', events, false);
                element.addEventListener('msTransitionEnd', events, false);
                element.addEventListener('oTransitionEnd', events, false);
                element.addEventListener('otransitionend', events, false);
                element.addEventListener('transitionend', events, false);
            }
            
            window.addEventListener('resize', events, false);
        }
        else {
            window.onresize = function () { methods.setup() }; // to play nice with old IE
        }
        
        /// devolver el api
        return {
            setup: function() { methods.setup(); },
            getPos: function() { return index; },
            slide: function(to, speed) {
                methods.stop();
                methods.slide(to, speed);
            },
            prev: function() {
                methods.stop();
                methods.prev();
            },
            next: function() {
                methods.stop();
                methods.next();
            },
            kill : function(){
                methods.stop();
                element.style.width = 'auto';
                element.style.left = 0;
                
                var pos = slides.length,
                    slide;
                
                while( pos-- ) {
                    slide = slides[pos];
                    slide.style.width = '100%';
                    slide.style.left = 0;

                    if ( browser.transitions ) { methods.translate(pos, 0, 0); }
                }
                if ( browser.addEventListener ) {
                    element.removeEventListener('touchstart', events, false);
                    element.removeEventListener('MSPointerDown', events, false);
                    element.removeEventListener('webkitTransitionEnd', events, false);
                    element.removeEventListener('msTransitionEnd', events, false);
                    element.removeEventListener('oTransitionEnd', events, false);
                    element.removeEventListener('otransitionend', events, false);
                    element.removeEventListener('transitionend', events, false);
                    window.removeEventListener('resize', events, false);
                }
                else {
                    window.onresize = null;
                }
            },
            stop :function(){
                methods.stop();
            }        
        };
    };
    
    // jQuery plugin
    if ( window.jQuery || window.Zepto ) {
        (function($) {
            $.fn.Swipe = function(params) {
                return this.each(function() {
                    $(this).data('Swipe', new Swipe($(this)[0], params));
                });
                }
        })( window.jQuery || window.Zepto )
    }
    
}( this, document ));