/* Polyfill service v3.108.0
 * Disable minification (remove `.min` from URL path) for more info */

(function(self, undefined) {function IsCallable(n){return"function"==typeof n}if (!("Date"in self&&"now"in self.Date&&"getTime"in self.Date.prototype
)) {Date.now=function e(){return(new Date).getTime()};}if (!("defineProperty"in Object&&function(){try{var e={}
return Object.defineProperty(e,"test",{value:42}),!0}catch(t){return!1}}()
)) {!function(e){var t=Object.prototype.hasOwnProperty.call(Object.prototype,"__defineGetter__"),r="A property cannot both have accessors and be writable or have a value";Object.defineProperty=function n(o,i,f){if(e&&(o===window||o===document||o===Element.prototype||o instanceof Element))return e(o,i,f);if(null===o||!(o instanceof Object||"object"==typeof o))throw new TypeError("Object.defineProperty called on non-object");if(!(f instanceof Object))throw new TypeError("Property description must be an object");var c=String(i),a="value"in f||"writable"in f,p="get"in f&&typeof f.get,s="set"in f&&typeof f.set;if(p){if(p===undefined)return o;if("function"!==p)throw new TypeError("Getter must be a function");if(!t)throw new TypeError("Getters & setters cannot be defined on this javascript engine");if(a)throw new TypeError(r);Object.__defineGetter__.call(o,c,f.get)}else o[c]=f.value;if(s){if(s===undefined)return o;if("function"!==s)throw new TypeError("Setter must be a function");if(!t)throw new TypeError("Getters & setters cannot be defined on this javascript engine");if(a)throw new TypeError(r);Object.__defineSetter__.call(o,c,f.set)}return"value"in f&&(o[c]=f.value),o}}(Object.defineProperty);}function CreateMethodProperty(e,r,t){var a={value:t,writable:!0,enumerable:!1,configurable:!0};Object.defineProperty(e,r,a)}if (!("bind"in Function.prototype
)) {CreateMethodProperty(Function.prototype,"bind",function t(n){var r=Array,o=Object,e=r.prototype,l=function g(){},p=e.slice,a=e.concat,i=e.push,c=Math.max,u=this;if(!IsCallable(u))throw new TypeError("Function.prototype.bind called on incompatible "+u);for(var y,h=p.call(arguments,1),s=function(){if(this instanceof y){var t=u.apply(this,a.call(h,p.call(arguments)));return o(t)===t?t:this}return u.apply(n,a.call(h,p.call(arguments)))},f=c(0,u.length-h.length),b=[],d=0;d<f;d++)i.call(b,"$"+d);return y=Function("binder","return function ("+b.join(",")+"){ return binder.apply(this, arguments); }")(s),u.prototype&&(l.prototype=u.prototype,y.prototype=new l,l.prototype=null),y});}if (!("requestAnimationFrame"in self
)) {!function(n){var e,t=Date.now(),o=function(){return n.performance&&"function"==typeof n.performance.now?n.performance.now():Date.now()-t};if("mozRequestAnimationFrame"in n?e="moz":"webkitRequestAnimationFrame"in n&&(e="webkit"),e)n.requestAnimationFrame=function(t){return n[e+"RequestAnimationFrame"](function(){t(o())})},n.cancelAnimationFrame=n[e+"CancelAnimationFrame"];else{var i=Date.now();n.requestAnimationFrame=function(n){if("function"!=typeof n)throw new TypeError(n+" is not a function");var e=Date.now(),t=16+i-e;return t<0&&(t=0),i=e,setTimeout(function(){i=Date.now(),n(o())},t)},n.cancelAnimationFrame=function(n){clearTimeout(n)}}}(self);}if (!("Window"in self
)) {"undefined"==typeof WorkerGlobalScope&&"function"!=typeof importScripts&&function(o){o.constructor?o.Window=o.constructor:(o.Window=o.constructor=new Function("return function Window() {}")()).prototype=self}(self);}if (!("getComputedStyle"in self
)) {!function(t){function e(t,o,r){var n,i=t.document&&t.currentStyle[o].match(/([\d.]+)(%|cm|em|in|mm|pc|pt|)/)||[0,0,""],l=i[1],u=i[2];return r=r?/%|em/.test(u)&&t.parentElement?e(t.parentElement,"fontSize",null):16:r,n="fontSize"==o?r:/width/i.test(o)?t.clientWidth:t.clientHeight,"%"==u?l/100*n:"cm"==u?.3937*l*96:"em"==u?l*r:"in"==u?96*l:"mm"==u?.3937*l*96/10:"pc"==u?12*l*96/72:"pt"==u?96*l/72:l}function o(t,e){var o="border"==e?"Width":"",r=e+"Top"+o,n=e+"Right"+o,i=e+"Bottom"+o,l=e+"Left"+o;t[e]=(t[r]==t[n]&&t[r]==t[i]&&t[r]==t[l]?[t[r]]:t[r]==t[i]&&t[l]==t[n]?[t[r],t[n]]:t[l]==t[n]?[t[r],t[n],t[i]]:[t[r],t[n],t[i],t[l]]).join(" ")}function r(t){var r,n=this,i=t.currentStyle,l=e(t,"fontSize"),u=function(t){return"-"+t.toLowerCase()};for(r in i)if(Array.prototype.push.call(n,"styleFloat"==r?"float":r.replace(/[A-Z]/,u)),"width"==r)n[r]=t.offsetWidth+"px";else if("height"==r)n[r]=t.offsetHeight+"px";else if("styleFloat"==r)n["float"]=i[r];else if(/margin.|padding.|border.+W/.test(r)&&"auto"!=n[r])n[r]=Math.round(e(t,r,l))+"px";else if(/^outline/.test(r))try{n[r]=i[r]}catch(c){n.outlineColor=i.color,n.outlineStyle=n.outlineStyle||"none",n.outlineWidth=n.outlineWidth||"0px",n.outline=[n.outlineColor,n.outlineWidth,n.outlineStyle].join(" ")}else n[r]=i[r];o(n,"margin"),o(n,"padding"),o(n,"border"),n.fontSize=Math.round(l)+"px"}r.prototype={constructor:r,getPropertyPriority:function(){throw new Error("NotSupportedError: DOM Exception 9")},getPropertyValue:function(t){return this[t.replace(/-\w/g,function(t){return t[1].toUpperCase()})]},item:function(t){return this[t]},removeProperty:function(){throw new Error("NoModificationAllowedError: DOM Exception 7")},setProperty:function(){throw new Error("NoModificationAllowedError: DOM Exception 7")},getPropertyCSSValue:function(){throw new Error("NotSupportedError: DOM Exception 9")}},t.getComputedStyle=function n(t){return new r(t)}}(self);}if (!((function(){if("document"in self&&"documentElement"in self.document&&"style"in self.document.documentElement&&"scrollBehavior"in document.documentElement.style)return!0
if(Element.prototype.scrollTo&&Element.prototype.scrollTo.toString().indexOf("[native code]")>-1)return!1
try{var e=!1,t={top:1,left:0}
Object.defineProperty(t,"behavior",{get:function(){return e=!0,"smooth"},enumerable:!0})
var o=document.createElement("DIV"),n=document.createElement("DIV")
return o.setAttribute("style","height: 1px; overflow: scroll;"),n.setAttribute("style","height: 2px; overflow: scroll;"),o.appendChild(n),o.scrollTo(t),e}catch(r){return!1}})()
)) {!function(e,t){var n={};!function(e){"use strict";function t(e,t){var n="function"==typeof Symbol&&e[Symbol.iterator];if(!n)return e;var r,o,i=n.call(e),l=[];try{for(;(void 0===t||t-- >0)&&!(r=i.next()).done;)l.push(r.value)}catch(c){o={error:c}}finally{try{r&&!r.done&&(n=i["return"])&&n.call(i)}finally{if(o)throw o.error}}return l}var n=function(e){return.5*(1-Math.cos(Math.PI*e))},r=function(){return"scrollBehavior"in document.documentElement.style},o={_elementScroll:undefined,get elementScroll(){return this._elementScroll||(this._elementScroll=HTMLElement.prototype.scroll||HTMLElement.prototype.scrollTo||function(e,t){this.scrollLeft=e,this.scrollTop=t})},_elementScrollIntoView:undefined,get elementScrollIntoView(){return this._elementScrollIntoView||(this._elementScrollIntoView=HTMLElement.prototype.scrollIntoView)},_windowScroll:undefined,get windowScroll(){return this._windowScroll||(this._windowScroll=window.scroll||window.scrollTo)}},i=function(e){[HTMLElement.prototype,SVGElement.prototype,Element.prototype].forEach(function(t){return e(t)})},l=function(){var e,t,n;return null!==(n=null===(t=null===(e=window.performance)||void 0===e?void 0:e.now)||void 0===t?void 0:t.call(e))&&void 0!==n?n:Date.now()},c=function(e){var t=l(),r=(t-e.timeStamp)/(e.duration||500);if(r>1)return e.method(e.targetX,e.targetY),void e.callback();var o=(e.timingFunc||n)(r),i=e.startX+(e.targetX-e.startX)*o,a=e.startY+(e.targetY-e.startY)*o;e.method(i,a),e.rafId=requestAnimationFrame(function(){c(e)})},a=function(e){return isFinite(e)?Number(e):0},u=function(e){var t=typeof e;return null!==e&&("object"===t||"function"===t)},s=function(){return s=Object.assign||function e(t){for(var n,r=1,o=arguments.length;r<o;r++){n=arguments[r];for(var i in n)Object.prototype.hasOwnProperty.call(n,i)&&(t[i]=n[i])}return t},s.apply(this,arguments)},f=function(e,t){var n,r,i=o.elementScroll.bind(e);if(t.left!==undefined||t.top!==undefined){var u=e.scrollLeft,s=e.scrollTop,f=a(null!==(n=t.left)&&void 0!==n?n:u),d=a(null!==(r=t.top)&&void 0!==r?r:s);if("smooth"!==t.behavior)return i(f,d);var w=function(){window.removeEventListener("wheel",p),window.removeEventListener("touchmove",p)},m={timeStamp:l(),duration:t.duration,startX:u,startY:s,targetX:f,targetY:d,rafId:0,method:i,timingFunc:t.timingFunc,callback:w},p=function(){cancelAnimationFrame(m.rafId),w()};window.addEventListener("wheel",p,{passive:!0,once:!0}),window.addEventListener("touchmove",p,{passive:!0,once:!0}),c(m)}},d=function(e){if(!r()){var t=o.elementScroll;i(function(n){return n.scroll=function r(){if(1===arguments.length){var n=arguments[0];if(!u(n))throw new TypeError("Failed to execute 'scroll' on 'Element': parameter 1 ('options') is not an object.");return f(this,s(s({},n),e))}return t.apply(this,arguments)}})}},w=function(e,t){var n=a(t.left||0)+e.scrollLeft,r=a(t.top||0)+e.scrollTop;return f(e,s(s({},t),{left:n,top:r}))},m=function(e){r()||i(function(t){return t.scrollBy=function n(){if(1===arguments.length){var t=arguments[0];if(!u(t))throw new TypeError("Failed to execute 'scrollBy' on 'Element': parameter 1 ('options') is not an object.");return w(this,s(s({},t),e))}var n=Number(arguments[0]),r=Number(arguments[1]);return w(this,{left:n,top:r})}})},p=function(e){switch(e){case"horizontal-tb":case"lr":case"lr-tb":case"rl":case"rl-tb":return 0;case"vertical-rl":case"tb":case"tb-rl":return 1;case"vertical-lr":case"tb-lr":return 2;case"sideways-rl":return 3;case"sideways-lr":return 4}return 0},h=function(e,n,r){var o,i=t([e.block||"start",e.inline||"nearest"],2),l=i[0],c=i[1],a=0;switch(r||(a^=2),n){case 0:a=a>>1|(1&a)<<1,o=t([c,l],2),l=o[0],c=o[1];break;case 1:case 3:a^=1;break;case 4:a^=2}return[l,c].map(function(e,t){switch(e){case"center":return 1;case"nearest":return 0;default:return"start"===e==!(a>>t&1)?2:3}})},v=function(e,t,n,r,o,i,l,c){return i<e&&l>t||i>e&&l<t?0:i<=e&&c<=n||l>=t&&c>=n?i-e-r:l>t&&c<n||i<e&&c>n?l-t+o:0},b=function(e){return"visible"!==e&&"clip"!==e},g=function(e){if(!e.ownerDocument||!e.ownerDocument.defaultView)return null;try{return e.ownerDocument.defaultView.frameElement}catch(t){return null}},y=function(e){var t=g(e);return!!t&&(t.clientHeight<e.scrollHeight||t.clientWidth<e.scrollWidth)},S=function(e,t){return(e.clientHeight<e.scrollHeight||e.clientWidth<e.scrollWidth)&&(b(t.overflowY)||b(t.overflowX)||y(e))},E=function(e){var t=e.parentNode;return null!==t&&t.nodeType===Node.DOCUMENT_FRAGMENT_NODE?t.host:t},T=function(e,t){return e<-t?-t:e>t?t:e},k=function(e){return e in document.documentElement.style},I=function(){return["scroll-margin","scroll-snap-margin"].filter(k)[0]},V=function(e,n){var r=e.getBoundingClientRect(),o=r.top,i=r.right,l=r.bottom,c=r.left,a=t(["top","right","bottom","left"].map(function(e){var t=I(),r=n.getPropertyValue(t+"-"+e);return parseInt(r,10)||0}),4);return[o-a[0],i+a[1],l+a[2],c-a[3]]},L=function(e,n){if(!1!==e.isConnected){for(var r=document.scrollingElement||document.documentElement,o=[],i=getComputedStyle(document.documentElement),l=E(e);null!==l;l=E(l)){if(l===r){o.push(l);break}var c=getComputedStyle(l);if((l!==document.body||!S(l,c)||S(document.documentElement,i))&&(S(l,c)&&o.push(l),"fixed"===c.position))break}var a=window.visualViewport?window.visualViewport.width:innerWidth,u=window.visualViewport?window.visualViewport.height:innerHeight,d=window.scrollX||window.pageXOffset,w=window.scrollY||window.pageYOffset,m=getComputedStyle(e),b=t(V(e,m),4),g=b[0],y=b[1],k=b[2],I=b[3],L=k-g,j=y-I,F=p(m.writingMode||m.getPropertyValue("-webkit-writing-mode")||m.getPropertyValue("-ms-writing-mode")),W="rtl"!==m.direction,O=t(h(n,F,W),2),X=O[0],Y=O[1],N=function(){switch(Y){case 1:return g+L/2;case 2:case 0:return g;case 3:return k}}(),H=function(){switch(X){case 1:return I+j/2;case 3:return y;case 2:case 0:return I}}(),P=[];o.forEach(function(e){var t=e.getBoundingClientRect(),o=t.height,i=t.width,l=t.top,c=t.right,m=t.bottom,p=t.left,h=getComputedStyle(e),b=parseInt(h.borderLeftWidth,10),g=parseInt(h.borderTopWidth,10),y=parseInt(h.borderRightWidth,10),S=parseInt(h.borderBottomWidth,10),E=0,k=0,I="offsetWidth"in e?e.offsetWidth-e.clientWidth-b-y:0,V="offsetHeight"in e?e.offsetHeight-e.clientHeight-g-S:0;if(r===e){switch(Y){case 2:E=N;break;case 3:E=N-u;break;case 1:E=N-u/2;break;case 0:E=v(w,w+u,u,g,S,w+N,w+N+L,L)}switch(X){case 2:k=H;break;case 3:k=H-a;break;case 1:k=H-a/2;break;case 0:k=v(d,d+a,a,b,y,d+H,d+H+j,j)}E+=w,k+=d}else{switch(Y){case 2:E=N-l-g;break;case 3:E=N-m+S+V;break;case 1:E=N-(l+o/2)+V/2;break;case 0:E=v(l,m,o,g,S+V,N,N+L,L)}switch(X){case 2:k=H-p-b;break;case 3:k=H-c+y+I;break;case 1:k=H-(p+i/2)+I/2;break;case 0:k=v(p,c,i,b,y+I,H,H+j,j)}var F=e.scrollLeft,W=e.scrollTop;E=T(W+E,e.scrollHeight-o+V),k=T(F+k,e.scrollWidth-i+I),N+=W-E,H+=F-k}P.push(function(){return f(e,s(s({},n),{top:E,left:k}))})}),P.forEach(function(e){return e()})}},j=function(e){if(!r()){var t=o.elementScrollIntoView;i(function(n){return n.scrollIntoView=function r(){var n=arguments[0];return 1===arguments.length&&u(n)?L(this,s(s({},n),e)):t.apply(this,arguments)}})}},F=function(e){if(!r()){var t=o.elementScroll;i(function(n){return n.scrollTo=function r(){if(1===arguments.length){var n=arguments[0];if(!u(n))throw new TypeError("Failed to execute 'scrollTo' on 'Element': parameter 1 ('options') is not an object.");var r=Number(n.left),o=Number(n.top);return f(this,s(s(s({},n),{left:r,top:o}),e))}return t.apply(this,arguments)}})}},W=function(e){var t,n,r=o.windowScroll.bind(window);if(e.left!==undefined||e.top!==undefined){var i=window.scrollX||window.pageXOffset,u=window.scrollY||window.pageYOffset,s=a(null!==(t=e.left)&&void 0!==t?t:i),f=a(null!==(n=e.top)&&void 0!==n?n:u);if("smooth"!==e.behavior)return r(s,f);var d=function(){window.removeEventListener("wheel",m),window.removeEventListener("touchmove",m)},w={timeStamp:l(),duration:e.duration,startX:i,startY:u,targetX:s,targetY:f,rafId:0,method:r,timingFunc:e.timingFunc,callback:d},m=function(){cancelAnimationFrame(w.rafId),d()};window.addEventListener("wheel",m,{passive:!0,once:!0}),window.addEventListener("touchmove",m,{passive:!0,once:!0}),c(w)}},O=function(e){if(!r()){var t=o.windowScroll;window.scroll=function n(){if(1===arguments.length){var n=arguments[0];if(!u(n))throw new TypeError("Failed to execute 'scroll' on 'Window': parameter 1 ('options') is not an object.");return W(s(s({},n),e))}return t.apply(this,arguments)}}},X=function(e){var t=a(e.left||0)+(window.scrollX||window.pageXOffset),n=a(e.top||0)+(window.scrollY||window.pageYOffset);return"smooth"!==e.behavior?o.windowScroll.call(window,t,n):W(s(s({},e),{left:t,top:n}))},Y=function(e){r()||(window.scrollBy=function t(){if(1===arguments.length){var t=arguments[0];if(!u(t))throw new TypeError("Failed to execute 'scrollBy' on 'Window': parameter 1 ('options') is not an object.");return X(s(s({},t),e))}var n=Number(arguments[0]),r=Number(arguments[1]);return X({left:n,top:r})})},N=function(e){if(!r()){var t=o.windowScroll;window.scrollTo=function n(){if(1===arguments.length){var n=arguments[0];if(!u(n))throw new TypeError("Failed to execute 'scrollTo' on 'Window': parameter 1 ('options') is not an object.");var r=Number(n.left),o=Number(n.top);return W(s(s(s({},n),{left:r,top:o}),e))}return t.apply(this,arguments)}}},H=function(e){r()||(O(e),N(e),Y(e),d(e),F(e),m(e),j(e))};e.elementScroll=f,e.elementScrollBy=w,e.elementScrollByPolyfill=m,e.elementScrollIntoView=L,e.elementScrollIntoViewPolyfill=j,e.elementScrollPolyfill=d,e.elementScrollTo=f,e.elementScrollToPolyfill=F,e.polyfill=H,e.seamless=H,e.windowScroll=W,e.windowScrollBy=X,e.windowScrollByPolyfill=Y,e.windowScrollPolyfill=O,e.windowScrollTo=W,e.windowScrollToPolyfill=N,Object.defineProperty(e,"__esModule",{value:!0})}(n),n.polyfill()}();}})('object' === typeof window && window || 'object' === typeof self && self || 'object' === typeof global && global || {});