(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-4f2758c6"],{"14c3":function(t,e,n){var r=n("c6b6"),a=n("9263");t.exports=function(t,e){var n=t.exec;if("function"===typeof n){var i=n.call(t,e);if("object"!==typeof i)throw TypeError("RegExp exec method returned something other than an Object or null");return i}if("RegExp"!==r(t))throw TypeError("RegExp#exec called on incompatible receiver");return a.call(t,e)}},"3b8f":function(t,e,n){"use strict";n.r(e);var r=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[n("Header"),n("main",{attrs:{role:"main"}},[n("article",[n("header",{staticClass:"section background-primary text-center"},[n("h1",{staticClass:"text-white margin-bottom-0 text-size-50 text-thin text-line-height-1"},[t._v(" "+t._s(this.getStaticContent.title)+" ")])]),n("div",{staticClass:"section background-white"},[n("div",{staticClass:"line",domProps:{innerHTML:t._s(this.getStaticContent.text)}})])])]),n("Footer")],1)},a=[],i=(n("ac1f"),n("5319"),n("5530")),c=n("2f62"),o=n("99bd"),u=n("e573"),l=n("5b55"),s={name:"about",components:{Header:o["a"],Footer:u["a"]},computed:Object(i["a"])(Object(i["a"])({},Object(c["c"])({getStaticContent:"getStaticContent"})),{},{currentRouteName:function(){return this.$route.path.replace(/^\/|\/$/g,"")}}),mounted:function(){this.setStatic([]),this.initStatic(this.currentRouteName)},methods:Object(i["a"])(Object(i["a"])({},Object(c["b"])({initStatic:l["a"].GET_STATIC_CONTENT})),Object(c["d"])({setStatic:l["a"].SET_STATIC_CONTENT}))},f=s,d=n("2877"),p=Object(d["a"])(f,r,a,!1,null,"5c42ce64",null);e["default"]=p.exports},5319:function(t,e,n){"use strict";var r=n("d784"),a=n("825a"),i=n("7b0b"),c=n("50c4"),o=n("a691"),u=n("1d80"),l=n("8aa5"),s=n("14c3"),f=Math.max,d=Math.min,p=Math.floor,v=/\$([$&'`]|\d\d?|<[^>]*>)/g,h=/\$([$&'`]|\d\d?)/g,g=function(t){return void 0===t?t:String(t)};r("replace",2,(function(t,e,n,r){var x=r.REGEXP_REPLACE_SUBSTITUTES_UNDEFINED_CAPTURE,E=r.REPLACE_KEEPS_$0,b=x?"$":"$0";return[function(n,r){var a=u(this),i=void 0==n?void 0:n[t];return void 0!==i?i.call(n,a,r):e.call(String(a),n,r)},function(t,r){if(!x&&E||"string"===typeof r&&-1===r.indexOf(b)){var i=n(e,t,this,r);if(i.done)return i.value}var u=a(t),p=String(this),v="function"===typeof r;v||(r=String(r));var h=u.global;if(h){var R=u.unicode;u.lastIndex=0}var T=[];while(1){var _=s(u,p);if(null===_)break;if(T.push(_),!h)break;var m=String(_[0]);""===m&&(u.lastIndex=l(p,c(u.lastIndex),R))}for(var C="",I=0,y=0;y<T.length;y++){_=T[y];for(var A=String(_[0]),$=f(d(o(_.index),p.length),0),O=[],P=1;P<_.length;P++)O.push(g(_[P]));var w=_.groups;if(v){var N=[A].concat(O,$,p);void 0!==w&&N.push(w);var U=String(r.apply(void 0,N))}else U=S(A,p,$,O,w,r);$>=I&&(C+=p.slice(I,$)+U,I=$+A.length)}return C+p.slice(I)}];function S(t,n,r,a,c,o){var u=r+t.length,l=a.length,s=h;return void 0!==c&&(c=i(c),s=v),e.call(o,s,(function(e,i){var o;switch(i.charAt(0)){case"$":return"$";case"&":return t;case"`":return n.slice(0,r);case"'":return n.slice(u);case"<":o=c[i.slice(1,-1)];break;default:var s=+i;if(0===s)return e;if(s>l){var f=p(s/10);return 0===f?e:f<=l?void 0===a[f-1]?i.charAt(1):a[f-1]+i.charAt(1):e}o=a[s-1]}return void 0===o?"":o}))}}))},6547:function(t,e,n){var r=n("a691"),a=n("1d80"),i=function(t){return function(e,n){var i,c,o=String(a(e)),u=r(n),l=o.length;return u<0||u>=l?t?"":void 0:(i=o.charCodeAt(u),i<55296||i>56319||u+1===l||(c=o.charCodeAt(u+1))<56320||c>57343?t?o.charAt(u):i:t?o.slice(u,u+2):c-56320+(i-55296<<10)+65536)}};t.exports={codeAt:i(!1),charAt:i(!0)}},"8aa5":function(t,e,n){"use strict";var r=n("6547").charAt;t.exports=function(t,e,n){return e+(n?r(t,e).length:1)}},9263:function(t,e,n){"use strict";var r=n("ad6d"),a=n("9f7f"),i=RegExp.prototype.exec,c=String.prototype.replace,o=i,u=function(){var t=/a/,e=/b*/g;return i.call(t,"a"),i.call(e,"a"),0!==t.lastIndex||0!==e.lastIndex}(),l=a.UNSUPPORTED_Y||a.BROKEN_CARET,s=void 0!==/()??/.exec("")[1],f=u||s||l;f&&(o=function(t){var e,n,a,o,f=this,d=l&&f.sticky,p=r.call(f),v=f.source,h=0,g=t;return d&&(p=p.replace("y",""),-1===p.indexOf("g")&&(p+="g"),g=String(t).slice(f.lastIndex),f.lastIndex>0&&(!f.multiline||f.multiline&&"\n"!==t[f.lastIndex-1])&&(v="(?: "+v+")",g=" "+g,h++),n=new RegExp("^(?:"+v+")",p)),s&&(n=new RegExp("^"+v+"$(?!\\s)",p)),u&&(e=f.lastIndex),a=i.call(d?n:f,g),d?a?(a.input=a.input.slice(h),a[0]=a[0].slice(h),a.index=f.lastIndex,f.lastIndex+=a[0].length):f.lastIndex=0:u&&a&&(f.lastIndex=f.global?a.index+a[0].length:e),s&&a&&a.length>1&&c.call(a[0],n,(function(){for(o=1;o<arguments.length-2;o++)void 0===arguments[o]&&(a[o]=void 0)})),a}),t.exports=o},"9f7f":function(t,e,n){"use strict";var r=n("d039");function a(t,e){return RegExp(t,e)}e.UNSUPPORTED_Y=r((function(){var t=a("a","y");return t.lastIndex=2,null!=t.exec("abcd")})),e.BROKEN_CARET=r((function(){var t=a("^r","gy");return t.lastIndex=2,null!=t.exec("str")}))},ac1f:function(t,e,n){"use strict";var r=n("23e7"),a=n("9263");r({target:"RegExp",proto:!0,forced:/./.exec!==a},{exec:a})},ad6d:function(t,e,n){"use strict";var r=n("825a");t.exports=function(){var t=r(this),e="";return t.global&&(e+="g"),t.ignoreCase&&(e+="i"),t.multiline&&(e+="m"),t.dotAll&&(e+="s"),t.unicode&&(e+="u"),t.sticky&&(e+="y"),e}},d784:function(t,e,n){"use strict";n("ac1f");var r=n("6eeb"),a=n("d039"),i=n("b622"),c=n("9263"),o=n("9112"),u=i("species"),l=!a((function(){var t=/./;return t.exec=function(){var t=[];return t.groups={a:"7"},t},"7"!=="".replace(t,"$<a>")})),s=function(){return"$0"==="a".replace(/./,"$0")}(),f=i("replace"),d=function(){return!!/./[f]&&""===/./[f]("a","$0")}(),p=!a((function(){var t=/(?:)/,e=t.exec;t.exec=function(){return e.apply(this,arguments)};var n="ab".split(t);return 2!==n.length||"a"!==n[0]||"b"!==n[1]}));t.exports=function(t,e,n,f){var v=i(t),h=!a((function(){var e={};return e[v]=function(){return 7},7!=""[t](e)})),g=h&&!a((function(){var e=!1,n=/a/;return"split"===t&&(n={},n.constructor={},n.constructor[u]=function(){return n},n.flags="",n[v]=/./[v]),n.exec=function(){return e=!0,null},n[v](""),!e}));if(!h||!g||"replace"===t&&(!l||!s||d)||"split"===t&&!p){var x=/./[v],E=n(v,""[t],(function(t,e,n,r,a){return e.exec===c?h&&!a?{done:!0,value:x.call(e,n,r)}:{done:!0,value:t.call(n,e,r)}:{done:!1}}),{REPLACE_KEEPS_$0:s,REGEXP_REPLACE_SUBSTITUTES_UNDEFINED_CAPTURE:d}),b=E[0],S=E[1];r(String.prototype,t,b),r(RegExp.prototype,v,2==e?function(t,e){return S.call(t,this,e)}:function(t){return S.call(t,this)})}f&&o(RegExp.prototype[v],"sham",!0)}}}]);
//# sourceMappingURL=chunk-4f2758c6.bcf254c3.js.map