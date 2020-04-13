module.exports=function(e){var t={};function n(r){if(t[r])return t[r].exports;var a=t[r]={i:r,l:!1,exports:{}};return e[r].call(a.exports,a,a.exports,n),a.l=!0,a.exports}return n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)n.d(r,a,function(t){return e[t]}.bind(null,a));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=17)}([function(e,t){e.exports=flarum.core.compat.app},function(e,t){e.exports=flarum.core.compat["helpers/icon"]},function(e,t){e.exports=flarum.core.compat["components/Button"]},function(e,t){e.exports=flarum.core.compat["components/DashboardWidget"]},function(e,t){e.exports=flarum.core.compat["components/Modal"]},function(e,t){e.exports=flarum.core.compat.extend},function(e,t){e.exports=flarum.core.compat["components/AdminNav"]},function(e,t){e.exports=flarum.core.compat["components/DashboardPage"]},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});const r=n(12),a=n(13),s=n(15),i=()=>{},o=new a.TimeoutError;t.default=class extends r{constructor(e){if(super(),Object.defineProperty(this,"_carryoverConcurrencyCount",{enumerable:!0,configurable:!0,writable:!0,value:void 0}),Object.defineProperty(this,"_isIntervalIgnored",{enumerable:!0,configurable:!0,writable:!0,value:void 0}),Object.defineProperty(this,"_intervalCount",{enumerable:!0,configurable:!0,writable:!0,value:0}),Object.defineProperty(this,"_intervalCap",{enumerable:!0,configurable:!0,writable:!0,value:void 0}),Object.defineProperty(this,"_interval",{enumerable:!0,configurable:!0,writable:!0,value:void 0}),Object.defineProperty(this,"_intervalEnd",{enumerable:!0,configurable:!0,writable:!0,value:0}),Object.defineProperty(this,"_intervalId",{enumerable:!0,configurable:!0,writable:!0,value:void 0}),Object.defineProperty(this,"_timeoutId",{enumerable:!0,configurable:!0,writable:!0,value:void 0}),Object.defineProperty(this,"_queue",{enumerable:!0,configurable:!0,writable:!0,value:void 0}),Object.defineProperty(this,"_queueClass",{enumerable:!0,configurable:!0,writable:!0,value:void 0}),Object.defineProperty(this,"_pendingCount",{enumerable:!0,configurable:!0,writable:!0,value:0}),Object.defineProperty(this,"_concurrency",{enumerable:!0,configurable:!0,writable:!0,value:void 0}),Object.defineProperty(this,"_isPaused",{enumerable:!0,configurable:!0,writable:!0,value:void 0}),Object.defineProperty(this,"_resolveEmpty",{enumerable:!0,configurable:!0,writable:!0,value:i}),Object.defineProperty(this,"_resolveIdle",{enumerable:!0,configurable:!0,writable:!0,value:i}),Object.defineProperty(this,"_timeout",{enumerable:!0,configurable:!0,writable:!0,value:void 0}),Object.defineProperty(this,"_throwOnTimeout",{enumerable:!0,configurable:!0,writable:!0,value:void 0}),!("number"==typeof(e=Object.assign({carryoverConcurrencyCount:!1,intervalCap:1/0,interval:0,concurrency:1/0,autoStart:!0,queueClass:s.default},e)).intervalCap&&e.intervalCap>=1))throw new TypeError(`Expected \`intervalCap\` to be a number from 1 and up, got \`${e.intervalCap}\` (${typeof e.intervalCap})`);if(void 0===e.interval||!(Number.isFinite(e.interval)&&e.interval>=0))throw new TypeError(`Expected \`interval\` to be a finite number >= 0, got \`${e.interval}\` (${typeof e.interval})`);this._carryoverConcurrencyCount=e.carryoverConcurrencyCount,this._isIntervalIgnored=e.intervalCap===1/0||0===e.interval,this._intervalCap=e.intervalCap,this._interval=e.interval,this._queue=new e.queueClass,this._queueClass=e.queueClass,this.concurrency=e.concurrency,this._timeout=e.timeout,this._throwOnTimeout=!0===e.throwOnTimeout,this._isPaused=!1===e.autoStart}get _doesIntervalAllowAnother(){return this._isIntervalIgnored||this._intervalCount<this._intervalCap}get _doesConcurrentAllowAnother(){return this._pendingCount<this._concurrency}_next(){this._pendingCount--,this._tryToStartAnother()}_resolvePromises(){this._resolveEmpty(),this._resolveEmpty=i,0===this._pendingCount&&(this._resolveIdle(),this._resolveIdle=i)}_onResumeInterval(){this._onInterval(),this._initializeIntervalIfNeeded(),this._timeoutId=void 0}_isIntervalPaused(){const e=Date.now();if(void 0===this._intervalId){const t=this._intervalEnd-e;if(!(t<0))return void 0===this._timeoutId&&(this._timeoutId=setTimeout(()=>{this._onResumeInterval()},t)),!0;this._intervalCount=this._carryoverConcurrencyCount?this._pendingCount:0}return!1}_tryToStartAnother(){if(0===this._queue.size)return this._intervalId&&clearInterval(this._intervalId),this._intervalId=void 0,this._resolvePromises(),!1;if(!this._isPaused){const e=!this._isIntervalPaused();if(this._doesIntervalAllowAnother&&this._doesConcurrentAllowAnother)return this.emit("active"),this._queue.dequeue()(),e&&this._initializeIntervalIfNeeded(),!0}return!1}_initializeIntervalIfNeeded(){this._isIntervalIgnored||void 0!==this._intervalId||(this._intervalId=setInterval(()=>{this._onInterval()},this._interval),this._intervalEnd=Date.now()+this._interval)}_onInterval(){0===this._intervalCount&&0===this._pendingCount&&this._intervalId&&(clearInterval(this._intervalId),this._intervalId=void 0),this._intervalCount=this._carryoverConcurrencyCount?this._pendingCount:0,this._processQueue()}_processQueue(){for(;this._tryToStartAnother(););}get concurrency(){return this._concurrency}set concurrency(e){if(!("number"==typeof e&&e>=1))throw new TypeError(`Expected \`concurrency\` to be a number from 1 and up, got \`${e}\` (${typeof e})`);this._concurrency=e,this._processQueue()}async add(e,t={}){return new Promise((n,r)=>{this._queue.enqueue(async()=>{this._pendingCount++,this._intervalCount++;try{const s=void 0===this._timeout&&void 0===t.timeout?e():a.default(Promise.resolve(e()),void 0===t.timeout?this._timeout:t.timeout,()=>{(void 0===t.throwOnTimeout?this._throwOnTimeout:t.throwOnTimeout)&&r(o)});n(await s)}catch(e){r(e)}this._next()},t),this._tryToStartAnother()})}async addAll(e,t){return Promise.all(e.map(async e=>this.add(e,t)))}start(){return this._isPaused?(this._isPaused=!1,this._processQueue(),this):this}pause(){this._isPaused=!0}clear(){this._queue=new this._queueClass}async onEmpty(){if(0!==this._queue.size)return new Promise(e=>{const t=this._resolveEmpty;this._resolveEmpty=()=>{t(),e()}})}async onIdle(){if(0!==this._pendingCount||0!==this._queue.size)return new Promise(e=>{const t=this._resolveIdle;this._resolveIdle=()=>{t(),e()}})}get size(){return this._queue.size}sizeBy(e){return this._queue.filter(e).length}get pending(){return this._pendingCount}get isPaused(){return this._isPaused}set timeout(e){this._timeout=e}get timeout(){return this._timeout}}},function(e,t,n){var r,a,s;a=[],void 0===(s="function"==typeof(r=function(){var e=/^v?(?:\d+)(\.(?:[x*]|\d+)(\.(?:[x*]|\d+)(\.(?:[x*]|\d+))?(?:-[\da-z\-]+(?:\.[\da-z\-]+)*)?(?:\+[\da-z\-]+(?:\.[\da-z\-]+)*)?)?)?$/i;function t(e){var t,n,r=e.replace(/^v/,"").replace(/\+.*$/,""),a=(n="-",-1===(t=r).indexOf(n)?t.length:t.indexOf(n)),s=r.substring(0,a).split(".");return s.push(r.substring(a+1)),s}function n(e){return isNaN(Number(e))?e:Number(e)}function r(t){if("string"!=typeof t)throw new TypeError("Invalid argument expected string");if(!e.test(t))throw new Error("Invalid argument not valid semver ('"+t+"' received)")}function a(e,a){[e,a].forEach(r);for(var s=t(e),i=t(a),o=0;o<Math.max(s.length-1,i.length-1);o++){var u=parseInt(s[o]||0,10),l=parseInt(i[o]||0,10);if(u>l)return 1;if(l>u)return-1}var c=s[s.length-1],d=i[i.length-1];if(c&&d){var h=c.split(".").map(n),p=d.split(".").map(n);for(o=0;o<Math.max(h.length,p.length);o++){if(void 0===h[o]||"string"==typeof p[o]&&"number"==typeof h[o])return-1;if(void 0===p[o]||"string"==typeof h[o]&&"number"==typeof p[o])return 1;if(h[o]>p[o])return 1;if(p[o]>h[o])return-1}}else if(c||d)return c?-1:1;return 0}var s=[">",">=","=","<","<="],i={">":[1],">=":[0,1],"=":[0],"<=":[-1,0],"<":[-1]};return a.validate=function(t){return"string"==typeof t&&e.test(t)},a.compare=function(e,t,n){!function(e){if("string"!=typeof e)throw new TypeError("Invalid operator type, expected string but got "+typeof e);if(-1===s.indexOf(e))throw new TypeError("Invalid operator, expected one of "+s.join("|"))}(n);var r=a(e,t);return i[n].indexOf(r)>-1},a})?r.apply(t,a):r)||(e.exports=s)},function(e,t){e.exports=flarum.core.compat["components/Switch"]},function(e,t){e.exports=flarum.core.compat["components/LoadingIndicator"]},function(e,t,n){"use strict";var r=Object.prototype.hasOwnProperty,a="~";function s(){}function i(e,t,n){this.fn=e,this.context=t,this.once=n||!1}function o(e,t,n,r,s){if("function"!=typeof n)throw new TypeError("The listener must be a function");var o=new i(n,r||e,s),u=a?a+t:t;return e._events[u]?e._events[u].fn?e._events[u]=[e._events[u],o]:e._events[u].push(o):(e._events[u]=o,e._eventsCount++),e}function u(e,t){0==--e._eventsCount?e._events=new s:delete e._events[t]}function l(){this._events=new s,this._eventsCount=0}Object.create&&(s.prototype=Object.create(null),(new s).__proto__||(a=!1)),l.prototype.eventNames=function(){var e,t,n=[];if(0===this._eventsCount)return n;for(t in e=this._events)r.call(e,t)&&n.push(a?t.slice(1):t);return Object.getOwnPropertySymbols?n.concat(Object.getOwnPropertySymbols(e)):n},l.prototype.listeners=function(e){var t=a?a+e:e,n=this._events[t];if(!n)return[];if(n.fn)return[n.fn];for(var r=0,s=n.length,i=new Array(s);r<s;r++)i[r]=n[r].fn;return i},l.prototype.listenerCount=function(e){var t=a?a+e:e,n=this._events[t];return n?n.fn?1:n.length:0},l.prototype.emit=function(e,t,n,r,s,i){var o=a?a+e:e;if(!this._events[o])return!1;var u,l,c=this._events[o],d=arguments.length;if(c.fn){switch(c.once&&this.removeListener(e,c.fn,void 0,!0),d){case 1:return c.fn.call(c.context),!0;case 2:return c.fn.call(c.context,t),!0;case 3:return c.fn.call(c.context,t,n),!0;case 4:return c.fn.call(c.context,t,n,r),!0;case 5:return c.fn.call(c.context,t,n,r,s),!0;case 6:return c.fn.call(c.context,t,n,r,s,i),!0}for(l=1,u=new Array(d-1);l<d;l++)u[l-1]=arguments[l];c.fn.apply(c.context,u)}else{var h,p=c.length;for(l=0;l<p;l++)switch(c[l].once&&this.removeListener(e,c[l].fn,void 0,!0),d){case 1:c[l].fn.call(c[l].context);break;case 2:c[l].fn.call(c[l].context,t);break;case 3:c[l].fn.call(c[l].context,t,n);break;case 4:c[l].fn.call(c[l].context,t,n,r);break;default:if(!u)for(h=1,u=new Array(d-1);h<d;h++)u[h-1]=arguments[h];c[l].fn.apply(c[l].context,u)}}return!0},l.prototype.on=function(e,t,n){return o(this,e,t,n,!1)},l.prototype.once=function(e,t,n){return o(this,e,t,n,!0)},l.prototype.removeListener=function(e,t,n,r){var s=a?a+e:e;if(!this._events[s])return this;if(!t)return u(this,s),this;var i=this._events[s];if(i.fn)i.fn!==t||r&&!i.once||n&&i.context!==n||u(this,s);else{for(var o=0,l=[],c=i.length;o<c;o++)(i[o].fn!==t||r&&!i[o].once||n&&i[o].context!==n)&&l.push(i[o]);l.length?this._events[s]=1===l.length?l[0]:l:u(this,s)}return this},l.prototype.removeAllListeners=function(e){var t;return e?(t=a?a+e:e,this._events[t]&&u(this,t)):(this._events=new s,this._eventsCount=0),this},l.prototype.off=l.prototype.removeListener,l.prototype.addListener=l.prototype.on,l.prefixed=a,l.EventEmitter=l,e.exports=l},function(e,t,n){"use strict";const r=n(14);class a extends Error{constructor(e){super(e),this.name="TimeoutError"}}const s=(e,t,n)=>new Promise((s,i)=>{if("number"!=typeof t||t<0)throw new TypeError("Expected `milliseconds` to be a positive number");if(t===1/0)return void s(e);const o=setTimeout(()=>{if("function"==typeof n){try{s(n())}catch(e){i(e)}return}const r=n instanceof Error?n:new a("string"==typeof n?n:`Promise timed out after ${t} milliseconds`);"function"==typeof e.cancel&&e.cancel(),i(r)},t);r(e.then(s,i),()=>{clearTimeout(o)})});e.exports=s,e.exports.default=s,e.exports.TimeoutError=a},function(e,t,n){"use strict";e.exports=(e,t)=>(t=t||(()=>{}),e.then(e=>new Promise(e=>{e(t())}).then(()=>e),e=>new Promise(e=>{e(t())}).then(()=>{throw e})))},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});const r=n(16);t.default=class{constructor(){Object.defineProperty(this,"_queue",{enumerable:!0,configurable:!0,writable:!0,value:[]})}enqueue(e,t){const n={priority:(t=Object.assign({priority:0},t)).priority,run:e};if(this.size&&this._queue[this.size-1].priority>=t.priority)return void this._queue.push(n);const a=r.default(this._queue,n,(e,t)=>t.priority-e.priority);this._queue.splice(a,0,n)}dequeue(){const e=this._queue.shift();return e&&e.run}filter(e){return this._queue.filter(t=>t.priority===e.priority).map(e=>e.run)}get size(){return this._queue.length}}},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e,t,n){let r=0,a=e.length;for(;a>0;){const s=a/2|0;let i=r+s;n(e[i],t)<=0?(r=++i,a-=s+1):a=s}return r}},function(e,t,n){"use strict";n.r(t);var r=n(5),a=n(6),s=n.n(a),i=n(7),o=n.n(i);function u(e,t){e.prototype=Object.create(t.prototype),e.prototype.constructor=e,e.__proto__=t}var l=n(0),c=n.n(l),d=n(3),h=n.n(d),p=function(e){function t(){return e.apply(this,arguments)||this}u(t,e);var n=t.prototype;return n.init=function(){e.prototype.init.call(this),this.months=[c.a.translator.trans("datitisev-dashboard.admin.dashboard.months.january"),c.a.translator.trans("datitisev-dashboard.admin.dashboard.months.february"),c.a.translator.trans("datitisev-dashboard.admin.dashboard.months.march"),c.a.translator.trans("datitisev-dashboard.admin.dashboard.months.april"),c.a.translator.trans("datitisev-dashboard.admin.dashboard.months.may"),c.a.translator.trans("datitisev-dashboard.admin.dashboard.months.june"),c.a.translator.trans("datitisev-dashboard.admin.dashboard.months.july"),c.a.translator.trans("datitisev-dashboard.admin.dashboard.months.august"),c.a.translator.trans("datitisev-dashboard.admin.dashboard.months.september"),c.a.translator.trans("datitisev-dashboard.admin.dashboard.months.october"),c.a.translator.trans("datitisev-dashboard.admin.dashboard.months.november"),c.a.translator.trans("datitisev-dashboard.admin.dashboard.months.december")]},n.content=function(){var e=c.a.data["datitisev-dashboard.data"],t=e.userCount,n=e.discussionCount,r=e.postCount;return m("div",{className:"DashboardGraph--Categories"},m("div",{className:"DashboardGraph--Category Category--Users"},m("span",{className:"color"}),c.a.translator.trans("datitisev-dashboard.admin.dashboard.graph.users"),m("br",null),m("span",{className:"number"},t)),m("div",{className:"DashboardGraph--Category Category--Discussions"},m("span",{className:"color"}),c.a.translator.trans("datitisev-dashboard.admin.dashboard.graph.discussions"),m("br",null),m("span",{className:"number"},n)),m("div",{className:"DashboardGraph--Category Category--Posts"},m("span",{className:"color"}),c.a.translator.trans("datitisev-dashboard.admin.dashboard.graph.posts"),m("br",null),m("span",{className:"number"},r)))},n.className=function(){return"DashboardGraph"},n.graphView=function(){return m("div",{className:"DashboardGraph--Graph"},Object.keys(this.months).map((function(e){var t=months[e];return m("div",{className:"DashboardGraph--Month"},m("div",{className:"bars"},"BAR"),m("div",{className:"name"},t))})))},t}(h.a),f=n(2),v=n.n(f),b=n(1),_=n.n(b),y=n(4),g=n.n(y),x=n(8),w=n.n(x),I=n(9),C=function(e){function t(){return e.apply(this,arguments)||this}u(t,e);var n=t.prototype;return n.init=function(){this.loading=!0,this.needsUpdate=[],this.errors=[],this.getPackagesAndVersions()},n.className=function(){return"DashboardSettingsModal ExtensionUpdatesModal Modal--large"},n.title=function(){var e=this.needsUpdate.length;return e>0?c.a.translator.transChoice("datitisev-dashboard.admin.dashboard.updates.available",e,{count:e}):this.loading?c.a.translator.trans("datitisev-dashboard.admin.dashboard.updates.checking"):0===e?c.a.translator.trans("datitisev-dashboard.admin.dashboard.updates.none"):void 0},n.content=function(){var e=this;return m("div",{className:"PermissionGrid container"},m("table",{className:"PermissionGrid",style:this.errors||0!==this.needsUpdate.length?"":"display: none"},m("thead",null,m("tr",null,m("th",null,"Extension",this.loading&&m("span",null,"  ",m("i",{className:"fas fa-circle-notch fa-spin"}))),m("th",null,"Version Installed"),m("th",null,"New Version"))),m("tbody",null,Object.keys(this.needsUpdate).map((function(t){var n=e.needsUpdate[t];return m("tr",{className:"PermissionGrid-child"},m("td",null,n.name),m("td",null,n.oldVersion),m("td",null,n.newVersion))})),this.errors&&this.errors.map((function(e){return m("tr",{className:"ExtensionUpdatesModal--Error PermissionGrid-child"},m("td",null,e.name),m("td",null,e.version),m("td",null,e.error))})))),m("div",{style:0!==this.needsUpdate.length||this.errors||this.loading?"display: none":""},m("h3",null,c.a.translator.trans("datitisev-dashboard.admin.dashboard.updates.none"))))},n.getPackagesAndVersions=function(){var e=this,t=new w.a({intervalCap:2,interval:500}),n=Object.values(c.a.data.extensions).filter((function(e){return!e.version.startsWith("dev")})).map((function(t){return function(){return m.request({url:"https://packagist.org/packages/"+t.name+".json"}).then((function(n){n=n.package;var r=Object.keys(n.versions).filter((function(e){return!e.startsWith("dev")})).sort(I),a=r[r.length-1],s=t.version;a&&s!==a&&e.needsUpdate.push({name:t.name,oldVersion:s,newVersion:a}),m.redraw()})).catch((function(n){if(!n||"object"!=typeof n||!n.message)return!1;e.errors.push({name:t.name,version:t.version,error:n.status?n.status+": "+n.message:n.message})}))}}));t.addAll(n).then((function(){return e.loading=!1}))},t}(g.a),E=n(10),N=n.n(E),O=n(11),P=n.n(O),j=function(e){function t(){return e.apply(this,arguments)||this}u(t,e);var n=t.prototype;return n.init=function(){e.prototype.init.call(this),this.extension=this.props.extension},n.className=function(){return"DashboardExtensionInfoModal Modal--large"},n.content=function(){var e=this.extension,t=this.isEnabled(e.id),n=e.source&&e.source.url||e.support&&e.support.source;return m("div",{className:"DashboardExtensionInfo"},m("div",{className:"Modal-close App-backControl"},this.loading&&m(P.a,{className:"LoadingIndicator--inline"}),t&&app.extensionSettings[e.id]&&v.a.component({icon:"fas fa-cog",onclick:function(){return app.extensionSettings[e.id]()},className:"Button Button--icon Button--link"}),!t&&v.a.component({icon:"fas fa-unlink",onclick:this.uninstall.bind(this),className:"Button Button--icon Button--link"}),v.a.component({icon:"fas fa-times",onclick:this.hide.bind(this),className:"Button Button--icon Button--link"})),m("div",{className:"DashboardExtensionInfo-Main"},m("spam",{className:"DashboardExtensionInfoMain-icon",style:e.icon},e.icon?_()(e.icon.name):""),m("h3",{className:"DashboardExtensionInfoMain-title"},e.extra["flarum-extension"].title),m("span",{className:"DashboardExtensionInfoMain-name"},e.name),m("span",{className:"DashboardExtensionInfoMain-version"},e.version),m("p",{className:"DashboardExtensionInfoMain-description"},e.description||""),m("p",{className:"DashboardExtensionInfoMain-useful"},m("p",{className:"DashboardExtensionInfoMainUseful-author"},e.authors&&1===e.authors.length?_()("fas fa-user"):_()("fas fa-users")," ",e.authors?e.authors.map((function(e){return e.name})).join(", "):"Unknown"),m("p",{className:"DashboardExtensionInfoMainUseful-source"},_()("fas fa-code")," ",n?m("a",{href:n,target:"_blank"},"Source"):"Unknown")),m("div",{className:"DashboardExtensionInfoMain-enabled"},N.a.component({state:t,children:t?"Enabled":"Disabled",onchange:this.toggle.bind(this,e.id)}))))},n.isDismissible=function(){return!0},n.isEnabled=function(e){return JSON.parse(app.data.settings.extensions_enabled).includes(e)},n.toggle=function(e){var t=this.isEnabled(e);app.request({url:app.forum.attribute("apiUrl")+"/extensions/"+e,method:"PATCH",data:{enabled:!t}}).then((function(){var n=JSON.parse(app.data.settings.extensions_enabled);t?n.splice(n.indexOf(e),1):n.push(e),app.data.settings.extensions_enabled=JSON.stringify(n),m.redraw()}))},n.uninstall=function(){var e=this;return this.loading=!0,app.request({url:app.forum.attribute("apiUrl")+"/extensions/"+this.extension.id,method:"DELETE"}).then((function(){e.loading=!1,m.redraw()}))},t}(g.a),D=function(e){function t(){return e.apply(this,arguments)||this}u(t,e);var n=t.prototype;return n.content=function(){var e=this,t=app.data.extensions;return m("div",null,m("div",{className:"DashboardExtensions--Title"},m("span",null,app.translator.trans("core.admin.nav.extensions_button")),v.a.component({children:_()("fas fa-upload"),className:"Button",onclick:function(){return app.modal.show(new C)}})),m("div",{className:"DashboardExtensions--List"},Object.values(t).map((function(t){return m("li",{className:"DashboardExtensions--Item "+(e.isEnabled(t.id)?"enabled":"disabled"),onclick:function(){return app.modal.show(new j({extension:t}))}},m("div",{className:"DashboardExtensionsItem-content"},m("spam",{className:"DashboardExtensionsItem-icon",style:t.icon},t.icon?_()(t.icon.name):""),m("label",{className:"DashboardExtensionsItem-title"},t.extra["flarum-extension"].title)))}))))},n.isEnabled=function(e){return JSON.parse(app.data.settings.extensions_enabled).includes(e)},n.className=function(){return"DashboardExtensions"},t}(h.a);app.initializers.add("datitisev/dashboard",(function(){Object(r.extend)(s.a.prototype,"items",(function(e){e.remove("extensions")})),Object(r.extend)(o.a.prototype,"availableWidgets",(function(e){e.push(m(p,null)),e.push(m(D,null))}))}))}]);
//# sourceMappingURL=admin.js.map