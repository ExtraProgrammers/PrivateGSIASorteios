window["WIDGETKIT_URL"]="/demo/themes/joomla/2013/venture/media/widgetkit";function wk_ajax_render_url(widgetid){return"/demo/themes/joomla/2013/venture/index.php/component/widgetkit/?format=raw&amp;id="+widgetid}
(function(g,f){var a={};f.$widgetkit={lazyloaders:{},load:function(b){a[b]||(a[b]=g.getScript(b));return a[b]},lazyload:function(a){a=a||document;g("[data-widgetkit]",a).each(function(){var a=g(this),b=a.data("widgetkit"),c=a.data("options")||{};!a.data("wk-loaded")&&$widgetkit.lazyloaders[b]&&($widgetkit.lazyloaders[b](a,c),a.data("wk-loaded",!0))})}};g(function(){$widgetkit.lazyload()});for(var b=document.createElement("div"),c=b.style,b=!1,d=["-webkit-","-moz-","-o-","-ms-","-khtml-"],e=["Webkit","Moz","O","ms","Khtml"],j="",h=0;h<e.length;h++)if(""===c[e[h]+"Transition"]){b=e[h]+"Transition";j=d[h];break}$widgetkit.prefix=j;c=$widgetkit;b=(d=b)&&"WebKitCSSMatrix"in window&&"m11"in new WebKitCSSMatrix&&!navigator.userAgent.match(/Chrome/i);e=document.createElement("canvas");e=!(!e.getContext||!e.getContext("2d"));c.support={transition:d,css3d:b,canvas:e};$widgetkit.css3=function(a){a=a||{};a.transition&&(a[j+"transition"]=a.transition);a.transform&&(a[j+"transform"]=a.transform);a["transform-origin"]&&(a[j+"transform-origin"]=a["transform-origin"]);return a};if(!(b=g.browser))c=navigator.userAgent,c=c.toLowerCase(),b={},c=/(chrome)[ \/]([\w.]+)/.exec(c)||/(webkit)[ \/]([\w.]+)/.exec(c)||/(opera)(?:.*version)?[ \/]([\w.]+)/.exec(c)||/(msie) ([\w.]+)/.exec(c)||0>c.indexOf("compatible")&&/(mozilla)(?:.*? rv:([\w.]+))?/.exec(c)||[],b[c[1]]=!0,b.version=c[2]||"0";g.browser=b;b=null})(jQuery,window);(function(g){var f;a:{try{f=parseInt(navigator.appVersion.match(/MSIE (\d\.\d)/)[1],10);break a}catch(a){}f=!1}f&&9>f&&(g(document).ready(function(){g("body").addClass("wk-ie wk-ie"+f)}),g.each("abbr article aside audio canvas details figcaption figure footer header hgroup mark meter nav output progress section summary time video".split(" "),function(){document.createElement(this)}))})(jQuery);(function(g,f){f.$widgetkit.trans={__data:{},addDic:function(a){g.extend(this.__data,a)},add:function(a,b){this.__data[a]=b},get:function(a){if(!this.__data[a])return a;var b=1==arguments.length?[]:Array.prototype.slice.call(arguments,1);return this.printf(String(this.__data[a]),b)},printf:function(a,b){if(!b)return a;var c="",d=a.split("%s");if(1==d.length)return a;for(var e=0;e<b.length;e++)d[e].lastIndexOf("%")==d[e].length-1&&e!=b.length-1&&(d[e]+="s"+d.splice(e+1,1)[0]),c+=d[e]+b[e];return c+
d[d.length-1]}}})(jQuery,window);(function(g){g.easing.jswing=g.easing.swing;g.extend(g.easing,{def:"easeOutQuad",swing:function(f,a,b,c,d){return g.easing[g.easing.def](f,a,b,c,d)},easeInQuad:function(f,a,b,c,d){return c*(a/=d)*a+b},easeOutQuad:function(f,a,b,c,d){return-c*(a/=d)*(a-2)+b},easeInOutQuad:function(f,a,b,c,d){return 1>(a/=d/2)?c/2*a*a+b:-c/2*(--a*(a-2)-1)+b},easeInCubic:function(f,a,b,c,d){return c*(a/=d)*a*a+b},easeOutCubic:function(f,a,b,c,d){return c*((a=a/d-1)*a*a+1)+b},easeInOutCubic:function(f,a,b,c,d){return 1>(a/=d/2)?c/2*a*a*a+b:c/2*((a-=2)*a*a+2)+b},easeInQuart:function(f,a,b,c,d){return c*(a/=d)*a*a*a+b},easeOutQuart:function(f,a,b,c,d){return-c*((a=a/d-1)*a*a*a-1)+b},easeInOutQuart:function(f,a,b,c,d){return 1>(a/=d/2)?c/2*a*a*a*a+b:-c/2*((a-=2)*a*a*a-2)+b},easeInQuint:function(f,a,b,c,d){return c*(a/=d)*a*a*a*a+b},easeOutQuint:function(f,a,b,c,d){return c*((a=a/d-1)*a*a*a*a+1)+b},easeInOutQuint:function(f,a,b,c,d){return 1>(a/=d/2)?c/2*a*a*a*a*a+b:c/2*((a-=2)*a*a*a*a+2)+b},easeInSine:function(f,a,b,c,d){return-c*Math.cos(a/d*(Math.PI/2))+c+b},easeOutSine:function(f,a,b,c,d){return c*Math.sin(a/d*(Math.PI/2))+b},easeInOutSine:function(f,a,b,c,d){return-c/2*(Math.cos(Math.PI*a/d)-1)+b},easeInExpo:function(f,a,b,c,d){return 0==a?b:c*Math.pow(2,10*(a/d-1))+b},easeOutExpo:function(f,a,b,c,d){return a==d?b+c:c*(-Math.pow(2,-10*a/d)+1)+b},easeInOutExpo:function(f,a,b,c,d){return 0==a?b:a==d?b+c:1>(a/=d/2)?c/2*Math.pow(2,10*(a-1))+b:c/2*(-Math.pow(2,-10*--a)+2)+b},easeInCirc:function(f,a,b,c,d){return-c*(Math.sqrt(1-(a/=d)*a)-1)+b},easeOutCirc:function(f,a,b,c,d){return c*Math.sqrt(1-(a=a/d-1)*a)+b},easeInOutCirc:function(f,a,b,c,d){return 1>(a/=d/2)?-c/2*(Math.sqrt(1-a*a)-1)+b:c/2*(Math.sqrt(1-(a-=2)*a)+1)+b},easeInElastic:function(f,a,b,c,d){f=1.70158;var e=0,g=c;if(0==a)return b;if(1==(a/=d))return b+c;e||(e=0.3*d);g<Math.abs(c)?(g=c,f=e/4):f=e/(2*Math.PI)*Math.asin(c/g);return-(g*Math.pow(2,10*(a-=1))*Math.sin((a*d-f)*2*Math.PI/e))+b},easeOutElastic:function(f,a,b,c,d){f=1.70158;var e=0,g=c;if(0==a)return b;if(1==(a/=d))return b+c;e||(e=0.3*d);g<Math.abs(c)?(g=c,f=e/4):f=e/(2*Math.PI)*Math.asin(c/g);return g*Math.pow(2,-10*a)*Math.sin((a*d-f)*2*Math.PI/e)+c+b},easeInOutElastic:function(f,a,b,c,d){f=1.70158;var e=0,g=c;if(0==a)return b;if(2==(a/=d/2))return b+c;e||(e=d*0.3*1.5);g<Math.abs(c)?(g=c,f=e/4):f=e/(2*Math.PI)*Math.asin(c/g);return 1>a?-0.5*g*Math.pow(2,10*(a-=1))*Math.sin((a*d-f)*2*Math.PI/e)+b:0.5*g*Math.pow(2,-10*(a-=1))*Math.sin((a*d-f)*2*Math.PI/e)+c+b},easeInBack:function(f,a,b,c,d,e){void 0==e&&(e=1.70158);return c*(a/=d)*a*((e+1)*a-e)+b},easeOutBack:function(f,a,b,c,d,e){void 0==e&&(e=1.70158);return c*((a=a/d-1)*a*((e+1)*a+e)+1)+b},easeInOutBack:function(f,a,b,c,d,e){void 0==e&&(e=1.70158);return 1>(a/=d/2)?c/2*a*a*(((e*=1.525)+1)*a-e)+b:c/2*((a-=2)*a*(((e*=1.525)+1)*a+e)+2)+b},easeInBounce:function(f,a,b,c,d){return c-g.easing.easeOutBounce(f,d-a,0,c,d)+b},easeOutBounce:function(f,a,b,c,d){return(a/=d)<1/2.75?c*7.5625*a*a+b:a<2/2.75?c*(7.5625*(a-=1.5/2.75)*a+0.75)+
b:a<2.5/2.75?c*(7.5625*(a-=2.25/2.75)*a+0.9375)+b:c*(7.5625*(a-=2.625/2.75)*a+0.984375)+b},easeInOutBounce:function(f,a,b,c,d){return a<d/2?0.5*g.easing.easeInBounce(f,2*a,0,c,d)+b:0.5*g.easing.easeOutBounce(f,2*a-d,0,c,d)+0.5*c+b}})})(jQuery);(function(g){function f(a){var c=a||window.event,d=[].slice.call(arguments,1),e=0,f=0,h=0;a=g.event.fix(c);a.type="mousewheel";a.wheelDelta&&(e=a.wheelDelta/120);a.detail&&(e=-a.detail/3);h=e;void 0!==c.axis&&c.axis===c.HORIZONTAL_AXIS&&(h=0,f=-1*e);void 0!==c.wheelDeltaY&&(h=c.wheelDeltaY/120);void 0!==c.wheelDeltaX&&(f=-1*c.wheelDeltaX/120);d.unshift(a,e,f,h);return g.event.handle.apply(this,d)}var a=["DOMMouseScroll","mousewheel"];g.event.special.mousewheel={setup:function(){if(this.addEventListener)for(var b=a.length;b;)this.addEventListener(a[--b],f,!1);else this.onmousewheel=f},teardown:function(){if(this.removeEventListener)for(var b=a.length;b;)this.removeEventListener(a[--b],f,!1);else this.onmousewheel=null}};g.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})})(jQuery);(function(g){var f=g.support;var a=document.createElement("INPUT");a.type="file";if(a="files"in a)a=new XMLHttpRequest,a=!(!a||!("upload"in a&&"onprogress"in a.upload))&&!!window.FormData;f.ajaxupload=a;g.support.ajaxupload&&g.event.props.push("dataTransfer");g.fn.uploadOnDrag=function(a){return!g.support.ajaxupload?this:this.each(function(){var c=g(this),b=g.extend({action:"",single:!1,method:"POST",params:{},loadstart:function(){},load:function(){},loadend:function(){},progress:function(){},complete:function(){},allcomplete:function(){},readystatechange:function(){}},a);c.on("drop",function(a){function c(a,b){for(var d=new FormData,e=new XMLHttpRequest,f=0,h;h=a[f];f++)d.append("files[]",h);for(var l in b.params)d.append(l,b.params[l]);e.upload.addEventListener("progress",function(a){b.progress(100*(a.loaded/a.total),a)},!1);e.addEventListener("loadstart",function(a){b.loadstart(a)},!1);e.addEventListener("load",function(a){b.load(a)},!1);e.addEventListener("loadend",function(a){b.loadend(a)},!1);e.addEventListener("error",function(a){b.error(a)},!1);e.addEventListener("abort",function(a){b.abort(a)},!1);e.open(b.method,b.action,!0);e.onreadystatechange=function(){b.readystatechange(e);if(4==e.readyState){var a=e.responseText;if("json"==b.type)try{a=g.parseJSON(a)}catch(c){a=!1}b.complete(a,e)}};e.send(d)}a.stopPropagation();a.preventDefault();var d=a.dataTransfer.files;if(b.single){var f=a.dataTransfer.files.length,e=0,j=b.complete;b.complete=function(a,g){e+=1;j(a,g);e<f?c([d[e]],b):b.allcomplete()};c([d[0]],b)}else c(d,b)}).on("dragover",function(a){a.stopPropagation();a.preventDefault()})})};g.fn.ajaxform=function(a){return!g.support.ajaxupload?this:this.each(function(){var b=g(this),c=g.extend({action:b.attr("action"),method:b.attr("method"),loadstart:function(){},load:function(){},loadend:function(){},progress:function(){},complete:function(){},readystatechange:function(){}},a);b.on("submit",function(a){a.preventDefault();a=new FormData(this);var b=new XMLHttpRequest;a.append("formdata","1");b.upload.addEventListener("progress",function(a){c.progress(100*(a.loaded/a.total),a)},!1);b.addEventListener("loadstart",function(a){c.loadstart(a)},!1);b.addEventListener("load",function(a){c.load(a)},!1);b.addEventListener("loadend",function(a){c.loadend(a)},!1);b.addEventListener("error",function(a){c.error(a)},!1);b.addEventListener("abort",function(a){c.abort(a)},!1);b.open(c.method,c.action,!0);b.onreadystatechange=function(){c.readystatechange(b);if(4==b.readyState){var a=b.responseText;if("json"==c.type)try{a=g.parseJSON(a)}catch(d){a=!1}c.complete(a,b)}};b.send(a)})})};if(!g.event.special.debouncedresize){var b=g.event,c,d;c=b.special.debouncedresize={setup:function(){g(this).on("resize",c.handler)},teardown:function(){g(this).off("resize",c.handler)},handler:function(a,f){var g=this,m=arguments,k=function(){a.type="debouncedresize";b.dispatch.apply(g,m)};d&&clearTimeout(d);f?k():d=setTimeout(k,c.threshold)},threshold:150}}})(jQuery);(function(b,f,g){function d(h){e.innerHTML='&shy;<style media="'+h+'"> #mq-test-1 { width: 42px; }</style>';a.insertBefore(j,m);l=42==e.offsetWidth;a.removeChild(j);return l}function k(h){var a=d(h.media);if(h._listeners&&h.matches!=a){h.matches=a;for(var a=0,c=h._listeners.length;a<c;a++)h._listeners[a](h)}}function c(a,c,d){var b;return function(){var f=this,g=arguments,e=d&&!b;clearTimeout(b);b=setTimeout(function(){b=null;d||a.apply(f,g)},c);e&&a.apply(f,g)}}if(!f.matchMedia||b.userAgent.match(/(iPhone|iPod|iPad)/i)){var l,a=g.documentElement,m=a.firstElementChild||a.firstChild,j=g.createElement("body"),e=g.createElement("div");e.id="mq-test-1";e.style.cssText="position:absolute;top:-100em";j.style.background="none";j.appendChild(e);f.matchMedia=function(a){var b,e=[];b={matches:d(a),media:a,_listeners:e,addListener:function(a){"function"===typeof a&&e.push(a)},removeListener:function(a){for(var b=0,c=e.length;b<c;b++)e[b]===a&&delete e[b]}};f.addEventListener&&f.addEventListener("resize",c(function(){k(b)},150),!1);g.addEventListener&&g.addEventListener("orientationchange",function(){k(b)},!1);return b}}})(navigator,window,document);(function(b,f,g){if(!b.onMediaQuery){var d={},k=f.matchMedia&&f.matchMedia("only all").matches;b(g).ready(function(){for(var c in d)b(d[c]).trigger("init"),d[c].matches&&b(d[c]).trigger("valid")});b(f).bind("load",function(){for(var c in d)d[c].matches&&b(d[c]).trigger("valid")});b.onMediaQuery=function(c,g){var a=c&&d[c];a||(a=d[c]=f.matchMedia(c),a.supported=k,a.addListener(function(){b(a).trigger(a.matches?"valid":"invalid")}));b(a).bind(g);return a}}})(jQuery,window,document);(function(d){var a=function(){};a.prototype=d.extend(a.prototype,{name:"accordion",options:{index:0,duration:500,easing:"easeOutQuart",animated:"slide",event:"click",collapseall:true,matchheight:true,toggler:".toggler",content:".content"},initialize:function(a,b){var b=d.extend({},this.options,b),c=a.find(b.toggler),g=function(a){var f=c.eq(a).hasClass("active")?d([]):c.eq(a),e=c.eq(a).hasClass("active")?c.eq(a):d([]);f.hasClass("active")&&(e=f,f=d([]));b.collapseall&&(e=c.filter(".active"));switch(b.animated){case"slide":f.next().stop().show().animate({height:f.next().data("height")},{easing:b.easing,duration:b.duration});e.next().stop().animate({height:0},{easing:b.easing,duration:b.duration,complete:function(){e.next().hide()}});break;default:f.next().show().css("height",f.next().data("height")),e.next().hide().css("height",0)}f.addClass("active");e.removeClass("active")},j=function(){var i=0;b.matchheight&&a.find(b.content).css("min-height","").css("height","").each(function(){i=Math.max(i,d(this).height())}).css("min-height",i);c.each(function(){var b=d(this),a=b.next();a.data("height",a.css("height","").show().height());b.hasClass("active")?a.show():a.hide().css("height",0)})};c.each(function(a){var c=d(this).bind(b.event,function(){g(a)}),e=c.next().css("overflow","hidden").addClass("content-wrapper");a==b.index||b.index=="all"?(c.addClass("active"),e.show()):e.hide().css("height",0)});j();d(window).bind("resize",function(){j()})}});d.fn[a.prototype.name]=function(){var h=arguments,b=h[0]?h[0]:null;return this.each(function(){var c=d(this);if(a.prototype[b]&&c.data(a.prototype.name)&&b!="initialize")c.data(a.prototype.name)[b].apply(c.data(a.prototype.name),Array.prototype.slice.call(h,1));else if(!b||d.isPlainObject(b)){var g=new a;a.prototype.initialize&&g.initialize.apply(g,d.merge([c],h));c.data(a.prototype.name,g)}else d.error("Method "+b+" does not exist on jQuery."+a.name)})};window.$widgetkit&&($widgetkit.lazyloaders.accordion=function(a,b){d(a).accordion(b)})})(jQuery);(function(){$widgetkit.lazyloaders["gallery-slider"]=function(b,a){var f=b.find(".slides:first"),d=f.children(),e=a.total_width=="auto"?b.width():a.total_width>b.width()?b.width():a.total_width,h=e/d.length-a.spacing,g=a.width,c=a.height;if(a.total_width=="auto"||a.total_width>=e)c=a.width/(e/2),g=a.width/c,c=a.height/c,d.css("background-size",g+"px "+c+"px");d.css({width:h,"margin-right":a.spacing});f.width(d.eq(0).width()*d.length*2);b.css({width:e,height:c});$widgetkit.load(WIDGETKIT_URL+"/widgets/gallery/js/slider.js").done(function(){b.galleryslider(a)})}})(jQuery);$widgetkit.load('media/widgetkit/widgets/lightbox/js/lightbox.js').done(function(){jQuery(function($){setTimeout(function(){$('a[data-lightbox]').lightbox({"titlePosition":"float","transitionIn":"fade","transitionOut":"fade","overlayShow":1,"overlayColor":"#777","overlayOpacity":0.7});},500);});});(function(){$widgetkit.lazyloaders.googlemaps=function(a,b){$widgetkit.load(WIDGETKIT_URL+"/widgets/map/js/map.js").done(function(){a.googlemaps(b)})}})(jQuery);$widgetkit.trans.addDic({"FROM_ADDRESS":"From address: ","GET_DIRECTIONS":"Get directions","FILL_IN_ADDRESS":"Please fill in your address.","ADDRESS_NOT_FOUND":"Sorry, address not found!","LOCATION_NOT_FOUND":", not found!"});if(!window['mejs']){$widgetkit.load('media/widgetkit/widgets/mediaplayer/mediaelement/mediaelement-and-player.js').done(function(){jQuery(function($){mejs.MediaElementDefaults.pluginPath='media/widgetkit/widgets/mediaplayer/mediaelement/index.html';$('video,audio').each(function(){var ele=$(this);if(!ele.parent().hasClass('mejs-mediaelement')){ele.data('mediaelement',new mejs.MediaElementPlayer(this,{"pluginPath":"\/demo\/themes\/joomla\/2013\/venture\/media\/widgetkit\/widgets\/mediaplayer\/mediaelement\/"}));var w=ele.data('mediaelement').width,h=ele.data('mediaelement').height;$.onMediaQuery('(max-width: 767px)',{valid:function(){ele.data('mediaelement').setPlayerSize('100%',ele.is('video')?'100%':h);},invalid:function(){var parent_width=ele.parent().width();if(w>parent_width){ele.css({width:'',height:''}).data('mediaelement').setPlayerSize('100%','100%');}else{ele.css({width:'',height:''}).data('mediaelement').setPlayerSize(w,h);}}});if($(window).width()<=767){ele.data('mediaelement').setPlayerSize('100%',ele.is('video')?'100%':h);}}});});});}else{jQuery(function($){mejs.MediaElementDefaults.pluginPath='media/widgetkit/widgets/mediaplayer/mediaelement/index.html';$('video,audio').each(function(){var ele=$(this);if(!ele.parent().hasClass('mejs-mediaelement')){ele.data('mediaelement',new mejs.MediaElementPlayer(this,{"pluginPath":"\/demo\/themes\/joomla\/2013\/venture\/media\/widgetkit\/widgets\/mediaplayer\/mediaelement\/"}));var w=ele.data('mediaelement').width,h=ele.data('mediaelement').height;$.onMediaQuery('(max-width: 767px)',{valid:function(){ele.data('mediaelement').setPlayerSize('100%',ele.is('video')?'100%':h);},invalid:function(){var parent_width=ele.parent().width();if(w>parent_width){ele.css({width:'',height:''}).data('mediaelement').setPlayerSize('100%','100%');}else{ele.css({width:'',height:''}).data('mediaelement').setPlayerSize(w,h);}}});if($(window).width()<=767){ele.data('mediaelement').setPlayerSize('100%',ele.is('video')?'100%':h);}}});});;}
(function(e){$widgetkit.lazyloaders.slideset=function(a,f){a.css("visibility","hidden");var h=a.find(".sets:first"),c=h.css({width:""}).width(),d=a.find("ul.html").show(),g=0;f.width=="auto"&&a.width();var i=f.height=="auto"?d.eq(0).children().eq(0).outerHeight(true):f.height;d.each(function(){var a=e(this).show(),b=0;e(this).children().each(function(){var a=e(this);a.css("left",b);b+=a.width()});g=Math.max(g,b);a.css("width",b).data("width",b).hide()});d.eq(0).show();h.css({height:i});g>c&&(c=g/c,d.css($widgetkit.css3({transform:"scale("+1/c+")"})),h.css("height",i/c));d.css({height:i});$widgetkit.load(WIDGETKIT_URL+"/widgets/slideset/js/slideset.js").done(function(){a.slideset(f).css("visibility","visible");a.find("img[data-src]").each(function(){var a=e(this),b=a.data("src");setTimeout(function(){a.attr("src",b)},1)})})}})(jQuery);(function(f){$widgetkit.lazyloaders.slideshow=function(a,c){$widgetkit.support.canvas&&a.find("img[data-src]").each(function(){var a=f(this),b=document.createElement("canvas"),c=b.getContext("2d");b.width=a.attr("width");b.height=a.attr("height");c.drawImage(this,0,0);a.attr("src",b.toDataURL("image/png"))});a.css("visibility","hidden");var b=c.width,d=c.height,e=a.find("ul.slides:first"),g=e.children();g.css("width","");g.css("height","");e.css("height","");a.css("width","");b!="auto"&&a.width()<b&&(d=b="auto");a.css({width:b=="auto"?a.width():b});e.width();b=d;b=="auto"&&(b=g.eq(0).show().height());g.css({height:b});e.css("height",b);$widgetkit.load(WIDGETKIT_URL+"/widgets/slideshow/js/slideshow.js").done(function(){a.find("img[data-src]").each(function(){var a=f(this),b=a.data("src");setTimeout(function(){a.attr("src",b)},1)});a.slideshow(c).css("visibility","visible")})};$widgetkit.lazyloaders.showcase=function(a,c){var b=a.find(".wk-slideshow").css("visibility","hidden"),d=a.find(".wk-slideset").css("visibility","hidden"),e=d.find("ul.set > li");$widgetkit.lazyloaders.slideshow(b,c);$widgetkit.lazyloaders.slideset(d,f.extend({},c,{width:"auto",height:"auto",autoplay:false,duration:c.slideset_effect_duration,index:parseInt(c.index/c.items_per_set)}));f(window).bind("resize",function(){var b=function(){a.css("width","");c.width=="auto"||c.width>a.width()?a.width(a.width()):a.width(c.width)};b();return b}());f.when($widgetkit.load(WIDGETKIT_URL+"/widgets/slideset/js/slideset.js"),$widgetkit.load(WIDGETKIT_URL+"/widgets/slideshow/js/slideshow.js")).done(function(){b.css("visibility","visible");d.css("visibility","visible");var a=b.data("slideshow"),c=d.data("slideset");e.eq(a.index).addClass("active");b.bind("slideshow-show",function(a,b,d){if(!e.removeClass("active").eq(d).addClass("active").parent().is(":visible"))switch(d){case 0:c.show(0);break;case e.length-1:c.show(c.sets.length-1);break;default:c[d>b?"next":"previous"]()}});e.each(function(b){f(this).bind("click",function(){a.stop();a.show(b)})})})}})(jQuery);$widgetkit.load('media/widgetkit/widgets/spotlight/js/spotlight.js').done(function(){jQuery(function($){$('[data-spotlight]').spotlight({"duration":300});});});jQuery(function(b){var f=function(b){var a=new Date(Date.parse(b.replace(/(\d+)-(\d+)-(\d+)T(.+)([-\+]\d+):(\d+)/g,"$1/$2/$3 $4 UTC$5$6"))),a=parseInt(((arguments.length>1?arguments[1]:new Date).getTime()-a)/1E3);return a<60?$widgetkit.trans.get("LESS_THAN_A_MINUTE_AGO"):a<120?$widgetkit.trans.get("ABOUT_A_MINUTE_AGO"):a<2700?$widgetkit.trans.get("X_MINUTES_AGO",parseInt(a/60).toString()):a<5400?$widgetkit.trans.get("ABOUT_AN_HOUR_AGO"):a<86400?$widgetkit.trans.get("X_HOURS_AGO",parseInt(a/3600).toString()):a<172800?$widgetkit.trans.get("ONE_DAY_AGO"):$widgetkit.trans.get("X_DAYS_AGO",parseInt(a/86400).toString())};b(".wk-twitter time").each(function(){b(this).html(f(b(this).attr("datetime")))});var d=b(".wk-twitter-bubbles");if(d.length){var e=function(){d.each(function(){var c=0;b(this).find("p.content").each(function(){var a=b(this).height();a>c&&(c=a)}).css("min-height",c)})};e();b(window).bind("load",e)}});$widgetkit.trans.addDic({"LESS_THAN_A_MINUTE_AGO":"less than a minute ago","ABOUT_A_MINUTE_AGO":"about a minute ago","X_MINUTES_AGO":"%s minutes ago","ABOUT_AN_HOUR_AGO":"about an hour ago","X_HOURS_AGO":"about %s hours ago","ONE_DAY_AGO":"1 day ago","X_DAYS_AGO":"%s days ago"});