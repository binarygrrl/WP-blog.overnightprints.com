/*global jQuery */
/*!	
* Lettering.JS 0.6.1
*
* Copyright 2010, Dave Rupert http://daverupert.com
* Released under the WTFPL license 
* http://sam.zoy.org/wtfpl/
*
* Thanks to Paul Irish - http://paulirish.com - for the feedback.
*
* Date: Mon Sep 20 17:14:00 2010 -0600
*/

!function(t){function n(n,e,i,a){var s=n.text().split(e),o="";s.length&&(t(s).each(function(t,n){o+='<span class="'+i+(t+1)+'">'+n+"</span>"+a}),n.empty().append(o))}var e={init:function(){return this.each(function(){n(t(this),"","char","")})},words:function(){return this.each(function(){n(t(this)," ","word"," ")})},lines:function(){return this.each(function(){var e="eefec303079ad17405c889e092e105b0";n(t(this).children("br").replaceWith(e).end(),e,"line","")})}};t.fn.lettering=function(n){return n&&e[n]?e[n].apply(this,[].slice.call(arguments,1)):"letters"!==n&&n?(t.error("Method "+n+" does not exist on jQuery.lettering"),this):e.init.apply(this,[].slice.call(arguments,0))}}(jQuery),function(t){"use strict";function n(n){return/In/.test(n)||t.inArray(n,t.fn.textillate.defaults.inEffects)>=0}function e(n){return/Out/.test(n)||t.inArray(n,t.fn.textillate.defaults.outEffects)>=0}function i(t){return"true"!==t&&"false"!==t?t:"true"===t}function a(n){var e=n.attributes||[],a={};return e.length?(t.each(e,function(t,n){var e=n.nodeName.replace(/delayscale/,"delayScale");/^data-in-*/.test(e)?(a["in"]=a["in"]||{},a["in"][e.replace(/data-in-/,"")]=i(n.nodeValue)):/^data-out-*/.test(e)?(a.out=a.out||{},a.out[e.replace(/data-out-/,"")]=i(n.nodeValue)):/^data-*/.test(e)&&(a[e.replace(/data-/,"")]=i(n.nodeValue))}),a):a}function s(t){for(var n,e,i=t.length;i;n=parseInt(Math.random()*i),e=t[--i],t[i]=t[n],t[n]=e);return t}function o(t,n,e){t.addClass("animated "+n).css("visibility","visible").show(),t.one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){t.removeClass("animated "+n),e&&e()})}function l(i,a,l){var r=i.length;return r?(a.shuffle&&(i=s(i)),a.reverse&&(i=i.toArray().reverse()),void t.each(i,function(i,s){function c(){n(a.effect)?u.css("visibility","visible"):e(a.effect)&&u.css("visibility","hidden"),r-=1,!r&&l&&l()}var u=t(s),f=a.sync?a.delay:a.delay*i*a.delayScale;u.text()?setTimeout(function(){o(u,a.effect,c)},f):c()})):void(l&&l())}var r=function(i,s){var o=this,r=t(i);o.init=function(){o.$texts=r.find(s.selector),o.$texts.length||(o.$texts=t('<ul class="texts"><li>'+r.html()+"</li></ul>"),r.html(o.$texts)),o.$texts.hide(),o.$current=t("<span>").html(o.$texts.find(":first-child").html()).prependTo(r),n(s["in"].effect)?o.$current.css("visibility","hidden"):e(s.out.effect)&&o.$current.css("visibility","visible"),o.setOptions(s),o.timeoutRun=null,setTimeout(function(){o.options.autoStart&&o.start()},o.options.initialDelay)},o.setOptions=function(t){o.options=t},o.triggerEvent=function(n){var e=t.Event(n+".tlt");return r.trigger(e,o),e},o["in"]=function(i,s){i=i||0;var r,c=o.$texts.find(":nth-child("+((i||0)+1)+")"),u=t.extend(!0,{},o.options,c.length?a(c[0]):{});c.addClass("current"),o.triggerEvent("inAnimationBegin"),o.$current.html(c.html()).lettering("words"),"char"==o.options.type&&o.$current.find('[class^="word"]').css({display:"inline-block","-webkit-transform":"translate3d(0,0,0)","-moz-transform":"translate3d(0,0,0)","-o-transform":"translate3d(0,0,0)",transform:"translate3d(0,0,0)"}).each(function(){t(this).lettering()}),r=o.$current.find('[class^="'+o.options.type+'"]').css("display","inline-block"),n(u["in"].effect)?r.css("visibility","hidden"):e(u["in"].effect)&&r.css("visibility","visible"),o.currentIndex=i,l(r,u["in"],function(){o.triggerEvent("inAnimationEnd"),u["in"].callback&&u["in"].callback(),s&&s(o)})},o.out=function(n){var e=o.$texts.find(":nth-child("+((o.currentIndex||0)+1)+")"),i=o.$current.find('[class^="'+o.options.type+'"]'),s=t.extend(!0,{},o.options,e.length?a(e[0]):{});o.triggerEvent("outAnimationBegin"),l(i,s.out,function(){e.removeClass("current"),o.triggerEvent("outAnimationEnd"),s.out.callback&&s.out.callback(),n&&n(o)})},o.start=function(t){setTimeout(function(){o.triggerEvent("start"),function n(t){o["in"](t,function(){var e=o.$texts.children().length;t+=1,!o.options.loop&&t>=e?(o.options.callback&&o.options.callback(),o.triggerEvent("end")):(t%=e,o.timeoutRun=setTimeout(function(){o.out(function(){n(t)})},o.options.minDisplayTime))})}(t||0)},o.options.initialDelay)},o.stop=function(){o.timeoutRun&&(clearInterval(o.timeoutRun),o.timeoutRun=null)},o.init()};t.fn.textillate=function(n,e){return this.each(function(){var i=t(this),s=i.data("textillate"),o=t.extend(!0,{},t.fn.textillate.defaults,a(this),"object"==typeof n&&n);s?"string"==typeof n?s[n].apply(s,[].concat(e)):s.setOptions.call(s,o):i.data("textillate",s=new r(this,o))})},t.fn.textillate.defaults={selector:".texts",loop:!1,minDisplayTime:2e3,initialDelay:0,"in":{effect:"fadeInLeftBig",delayScale:1.5,delay:50,sync:!1,reverse:!1,shuffle:!1,callback:function(){}},out:{effect:"hinge",delayScale:1.5,delay:50,sync:!1,reverse:!1,shuffle:!1,callback:function(){}},autoStart:!0,inEffects:[],outEffects:["hinge"],callback:function(){},type:"char"}}(jQuery);