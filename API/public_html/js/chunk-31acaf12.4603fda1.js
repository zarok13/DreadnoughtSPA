(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-31acaf12"],{"3b8f":function(t,e,n){"use strict";n.r(e);var r=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[n("Header"),n("main",{attrs:{role:"main"}},[n("article",[n("header",{staticClass:"section background-primary text-center"},[n("h1",{staticClass:"text-white margin-bottom-0 text-size-50 text-thin text-line-height-1"},[t._v(t._s(this.getStaticContent.title))])]),n("div",{staticClass:"section background-white"},[n("div",{staticClass:"line",domProps:{innerHTML:t._s(this.getStaticContent.text)}})])])]),n("Footer")],1)},a=[],i=(n("ac1f"),n("5319"),n("5530")),c=n("2f62"),o=n("99bd"),s=n("e573"),u=n("a5f8"),l={name:"about",components:{Header:o["a"],Footer:s["a"]},computed:Object(i["a"])(Object(i["a"])({},Object(c["b"])({getStaticContent:"getStaticContent"})),{},{currentRouteName:function(){return this.$route.path.replace(/\//g,"")}}),mounted:function(){this.$store.dispatch(u["e"],this.currentRouteName)}},d=l,h=n("2877"),v=Object(h["a"])(d,r,a,!1,null,"24945d93",null);e["default"]=v.exports},5319:function(t,e,n){"use strict";var r=n("d784"),a=n("825a"),i=n("7b0b"),c=n("50c4"),o=n("a691"),s=n("1d80"),u=n("8aa5"),l=n("14c3"),d=Math.max,h=Math.min,v=Math.floor,f=/\$([$&'`]|\d\d?|<[^>]*>)/g,g=/\$([$&'`]|\d\d?)/g,p=function(t){return void 0===t?t:String(t)};r("replace",2,(function(t,e,n,r){var b=r.REGEXP_REPLACE_SUBSTITUTES_UNDEFINED_CAPTURE,m=r.REPLACE_KEEPS_$0,S=b?"$":"$0";return[function(n,r){var a=s(this),i=void 0==n?void 0:n[t];return void 0!==i?i.call(n,a,r):e.call(String(a),n,r)},function(t,r){if(!b&&m||"string"===typeof r&&-1===r.indexOf(S)){var i=n(e,t,this,r);if(i.done)return i.value}var s=a(t),v=String(this),f="function"===typeof r;f||(r=String(r));var g=s.global;if(g){var E=s.unicode;s.lastIndex=0}var $=[];while(1){var C=l(s,v);if(null===C)break;if($.push(C),!g)break;var _=String(C[0]);""===_&&(s.lastIndex=u(v,c(s.lastIndex),E))}for(var w="",k=0,A=0;A<$.length;A++){C=$[A];for(var P=String(C[0]),R=d(h(o(C.index),v.length),0),I=[],O=1;O<C.length;O++)I.push(p(C[O]));var T=C.groups;if(f){var j=[P].concat(I,R,v);void 0!==T&&j.push(T);var y=String(r.apply(void 0,j))}else y=x(P,v,R,I,T,r);R>=k&&(w+=v.slice(k,R)+y,k=R+P.length)}return w+v.slice(k)}];function x(t,n,r,a,c,o){var s=r+t.length,u=a.length,l=g;return void 0!==c&&(c=i(c),l=f),e.call(o,l,(function(e,i){var o;switch(i.charAt(0)){case"$":return"$";case"&":return t;case"`":return n.slice(0,r);case"'":return n.slice(s);case"<":o=c[i.slice(1,-1)];break;default:var l=+i;if(0===l)return e;if(l>u){var d=v(l/10);return 0===d?e:d<=u?void 0===a[d-1]?i.charAt(1):a[d-1]+i.charAt(1):e}o=a[l-1]}return void 0===o?"":o}))}}))}}]);
//# sourceMappingURL=chunk-31acaf12.4603fda1.js.map