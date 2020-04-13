module.exports=function(t){var e={};function n(r){if(e[r])return e[r].exports;var i=e[r]={i:r,l:!1,exports:{}};return t[r].call(i.exports,i,i.exports,n),i.l=!0,i.exports}return n.m=t,n.c=e,n.d=function(t,e,r){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:r})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var i in t)n.d(r,i,function(e){return t[e]}.bind(null,i));return r},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=19)}([function(t,e){t.exports=flarum.core.compat.app},function(t,e){t.exports=flarum.core.compat.Model},function(t,e,n){"use strict";function r(t,e){t.prototype=Object.create(e.prototype),t.prototype.constructor=t,t.__proto__=e}n.d(e,"a",function(){return r})},function(t,e){t.exports=flarum.core.compat["helpers/icon"]},function(t,e){t.exports=flarum.core.compat.extend},function(t,e){t.exports=flarum.core.compat["components/Button"]},function(t,e){t.exports=flarum.core.compat["utils/mixin"]},function(t,e){t.exports=flarum.core.compat["components/UserPage"]},function(t,e,n){"use strict";n.d(e,"a",function(){return s});var r=n(2),i=n(1),o=n.n(i),a=n(6),s=function(t){function e(){return t.apply(this,arguments)||this}return Object(r.a)(e,t),e.prototype.apiEndpoint=function(){return"/masquerade/fields"+(this.exists?"/"+this.data.id:"")},e}(n.n(a)()(o.a,{name:o.a.attribute("name"),description:o.a.attribute("description"),type:o.a.attribute("type"),validation:o.a.attribute("validation"),required:o.a.attribute("required"),prefix:o.a.attribute("prefix"),icon:o.a.attribute("icon"),sort:o.a.attribute("sort"),deleted_at:o.a.attribute("deleted_at",o.a.transformDate),answer:o.a.hasOne("answer"),on_bio:o.a.attribute("on_bio")}))},function(t,e){t.exports=flarum.core.compat["components/Select"]},,,,function(t,e){t.exports=flarum.core.compat["models/User"]},function(t,e){t.exports=flarum.core.compat["components/LinkButton"]},function(t,e){t.exports=flarum.core.compat["components/UserCard"]},,,,function(t,e,n){"use strict";n.r(e);var r=n(4),i=n(0),o=n.n(i),a=n(13),s=n.n(a),u=n(8),l=n(2),f=n(1),p=n.n(f),d=n(6),c=function(t){function e(){return t.apply(this,arguments)||this}return Object(l.a)(e,t),e.prototype.apiEndpoint=function(){return"/masquerade/configure"+(this.exists?"/"+this.data.id:"")},e}(n.n(d)()(p.a,{content:p.a.attribute("content"),field:p.a.hasOne("field"),userId:p.a.attribute("user_id")})),h=n(14),v=n.n(h),b=n(7),y=n.n(b),q=n(5),w=n.n(q),x=n(3),O=n.n(x),_=function(){function t(t){var e=t.field,n=t.set,r=t.value;this.field=e,this.set=n,this.value=r}var e=t.prototype;return e.readAttribute=function(t,e){return"function"==typeof t[e]?t[e]():t[e]},e.validationRules=function(){return this.readAttribute(this.field,"validation").split("|")},e.validationRule=function(t){var e=null;return this.validationRules().forEach(function(n){var r=n.split(":",2);r[0]===t&&(e=r[1])}),e},e.editorField=function(){return m("fieldset.Field",[m("legend",[this.field.icon()?[O()(this.field.icon())," "]:null,this.field.name(),this.field.required()?" *":null]),m(".FormField",[this.field.prefix()?m(".prefix",this.field.prefix()):null,this.editorInput(),this.field.description()?m(".helpText",this.field.description()):null])])},e.editorInput=function(){return m("input",this.editorInputProps())},e.editorInputProps=function(){return{className:"FormControl",oninput:m.withAttr("value",this.set),value:this.value(),required:this.field.required()}},e.answerField=function(){var t=this.readAttribute(this.field,"icon");return m(".Masquerade-Bio-Set",[m("span.Masquerade-Bio-Field",[t?[O()(t)," "]:null,this.readAttribute(this.field,"name")+": "]),m("span.Masquerade-Bio-Answer",this.answerContent())])},e.answerContent=function(){return this.value()},t.isNoOptionSelectedValue=function(t){return null===t||""===t},t}(),g=function(t){function e(){return t.apply(this,arguments)||this}Object(l.a)(e,t);var n=e.prototype;return n.editorInput=function(){var t=this;return this.options().map(function(e){return m("div",m("label",[m("input[type=radio]",{checked:e.selected(t.value()),onclick:function(){t.set(e.key)}})," "+e.label]))})},n.options=function(){var t=[];return this.readAttribute(this.field,"required")||t.push({selected:function(t){return _.isNoOptionSelectedValue(t)},key:null,label:app.translator.trans("fof-masquerade.forum.fields.select.none-optional")}),t.push({selected:function(t){return-1!==["true","1",1,!0,"yes"].indexOf(t)},key:"true",label:app.translator.trans("fof-masquerade.forum.fields.boolean.yes")}),t.push({selected:function(t){return-1!==["false","0",0,!1,"no"].indexOf(t)},key:"false",label:app.translator.trans("fof-masquerade.forum.fields.boolean.no")}),_.isNoOptionSelectedValue(this.value())||-1!==["true","1",1,!0,"yes","false","0",0,!1,"no"].indexOf(this.value())||t.push({selected:function(){return!0},key:this.value(),label:"(invalid) "+this.value()}),t},n.answerContent=function(){return _.isNoOptionSelectedValue(this.value())?"":-1!==[1,"1",!0,"true","yes"].indexOf(this.value())?[O()("far fa-check-square")," ",app.translator.trans("fof-masquerade.forum.fields.boolean.yes")]:[O()("far fa-square")," ",app.translator.trans("fof-masquerade.forum.fields.boolean.no")]},e}(_),F=function(t){function e(){return t.apply(this,arguments)||this}Object(l.a)(e,t);var n=e.prototype;return n.editorInputProps=function(){var e=t.prototype.editorInputProps.call(this);return e.type="email",e.placeholder="you@example.com",e},n.answerContent=function(){var t=this,e=this.value();if(!e)return null;var n=e.split(/@|\./).map(function(t){return t.replace(/(.{2})./g,"$1*")}).join("*");return w.a.component({onclick:function(){return t.mailTo()},className:"Button Button--text",icon:"far fa-envelope",children:n})},n.mailTo=function(){window.location="mailto:"+this.value()},e}(_),P=n(9),j=n.n(P),S=function(t){function e(){return t.apply(this,arguments)||this}Object(l.a)(e,t);var n=e.prototype;return n.editorInput=function(){var t=this;return j.a.component({onchange:function(e){"fof_masquerade_no_option_selected"===e&&(e=null),t.set(e)},value:_.isNoOptionSelectedValue(this.value())?"fof_masquerade_no_option_selected":this.value(),options:this.options()})},n.options=function(){var t={};this.readAttribute(this.field,"required")?_.isNoOptionSelectedValue(this.value())&&(t.fof_masquerade_no_option_selected=app.translator.trans("fof-masquerade.forum.fields.select.none-required")):t.fof_masquerade_no_option_selected=app.translator.trans("fof-masquerade.forum.fields.select.none-optional");var e=this.validationRule("in");return e&&e.split(",").forEach(function(e){t[e]=e}),_.isNoOptionSelectedValue(this.value())||void 0!==t[this.value()]||(t[this.value()]="(invalid) "+this.value()),t},e}(_),I=function(t){function e(){return t.apply(this,arguments)||this}Object(l.a)(e,t);var n=e.prototype;return n.editorInputProps=function(){var e=t.prototype.editorInputProps.call(this);return e.type="url",e.placeholder="https://example.com",e},n.answerContent=function(){var t=this,e=this.value();return e?w.a.component({onclick:function(){return t.to()},className:"Button Button--text",icon:"fas fa-link",children:e.replace(/^https?:\/\//,"")}):null},n.to=function(){window.open().location=this.value()},e}(_),A=function(){function t(){}return t.typeForField=function(t){var e=t.field,n=t.set,r=t.value,i=_,o=this.identify(e);return o&&(i=this.types()[o]),new i({field:e,set:n,value:r})},t.fieldAttribute=function(t,e){return"function"==typeof t[e]?t[e]():t[e]},t.types=function(){return{boolean:g,email:F,select:S,url:I}},t.identify=function(t){var e=this,n=(this.fieldAttribute(t,"validation")||"").split(","),r=null,i=this.fieldAttribute(t,"type");return void 0!==this.types()[i]?i:(n.forEach(function(t){t=t.trim(),void 0!==e.types()[t]&&(r=t)}),r)},t}(),M=function(t){function e(){return t.apply(this,arguments)||this}Object(l.a)(e,t);var n=e.prototype;return n.init=function(){t.prototype.init.call(this),this.loading=!0,this.loadUser(o.a.session.user.username()),this.enforceProfileCompletion=o.a.forum.attribute("masquerade.force-profile-completion")||!1,this.profileCompleted=o.a.forum.attribute("masquerade.profile-completed")||!1,this.fields=[],this.answers={},this.load()},n.content=function(){var t=this;return m("form.ProfileConfigurePane",{onsubmit:this.update.bind(this)},[this.enforceProfileCompletion&&!this.profileCompleted?m(".Alert.Alert--Error",o.a.translator.trans("fof-masquerade.forum.alerts.profile-completion-required")):null,m(".Fields",this.fields.sort(function(t,e){return t.sort()-e.sort()}).map(function(e){return t.answers.hasOwnProperty(e.id())||(t.answers[e.id()]=e.answer()?m.prop(e.answer().content()):m.prop("")),t.field(e)})),w.a.component({type:"submit",className:"Button Button--primary",children:o.a.translator.trans("fof-masquerade.forum.buttons.save-profile"),loading:this.loading})])},n.field=function(t){return A.typeForField({field:t,set:this.set.bind(this,t),value:this.answers[t.id()]}).editorField()},n.load=function(){o.a.request({method:"GET",url:o.a.forum.attribute("apiUrl")+"/masquerade/configure"}).then(this.parseResponse.bind(this))},n.set=function(t,e){this.answers.hasOwnProperty(t.id())?this.answers[t.id()](e):this.answers[t.id()]=m.prop(e)},n.update=function(t){var e=this;t.preventDefault(),this.loading=!0;var n=this.answers;o.a.request({method:"POST",url:o.a.forum.attribute("apiUrl")+"/masquerade/configure",data:n}).then(this.parseResponse.bind(this)).catch(function(){e.loading=!1,m.redraw()})},n.parseResponse=function(t){this.fields=o.a.store.pushPayload(t),this.loading=!1,m.redraw()},e}(y.a),k=function(t){function e(){return t.apply(this,arguments)||this}Object(l.a)(e,t);var n=e.prototype;return n.init=function(){t.prototype.init.call(this),this.loading=!0,this.fields=[],this.answers={},this.loadUser(m.route.param("username"))},n.content=function(){var t=this;return m(".Masquerade-Bio",[m(".Fields",this.fields.sort(function(t,e){return t.sort()-e.sort()}).map(function(e){return t.answers[e.id()]=e.answer()&&e.answer().userId()==t.user.id()?e.answer().content():null,t.field(e)}))])},n.field=function(t){return A.typeForField({field:t,value:m.prop(this.answers[t.id()])}).answerField()},n.load=function(t){app.request({method:"GET",url:app.forum.attribute("apiUrl")+"/masquerade/profile/"+t.id()}).then(this.parseResponse.bind(this))},n.show=function(e){this.load(e),t.prototype.show.call(this,e)},n.parseResponse=function(t){this.answers={},this.fields=app.store.pushPayload(t),this.loading=!1,m.redraw()},e}(y.a),B=n(15),C=n.n(B),N=function(){Object(r.extend)(C.a.prototype,"infoItems",function(t){var e=app.forum.attribute("canViewMasquerade")&&this.props.user.bioFields()||[];t.add("masquerade-bio",m("div",e.map(function(t){var e=t.attribute("field");return A.typeForField({field:e,value:function(){return t.content()}}).answerField()})))})};o.a.initializers.add("fof-masquerade",function(t){t.store.models["masquerade-field"]=u.a,t.store.models["masquerade-answer"]=c,s.a.prototype.bioFields=p.a.hasMany("bioFields"),o.a.routes["fof-masquerade-view-profile"]={path:"/masquerade/:username",component:k.component()},o.a.routes["fof-masquerade-configure-profile"]={path:"/masquerade/configure",component:M.component()},Object(r.extend)(y.a.prototype,"navItems",function(t){var e=o.a.forum.attribute("canHaveMasquerade")&&o.a.session.user.id()===this.user.id();if(o.a.forum.attribute("canViewMasquerade")||e){var n=e?o.a.route("fof-masquerade-configure-profile"):o.a.route("fof-masquerade-view-profile",{username:this.user.username()});t.add("masquerade",v.a.component({href:n,children:o.a.translator.trans("fof-masquerade.forum.buttons.view-profile"),icon:"far fa-id-card"}),200)}}),N()})}]);
//# sourceMappingURL=forum.js.map