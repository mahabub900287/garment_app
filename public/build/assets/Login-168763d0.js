import{j as k,o as u,c as b,b as e,e as l,T as v,d as _,w as m,a as t,u as s,Z as y,g as F,t as x,h as f,f as B,i as g,n as S}from"./app-45a82ee6.js";import{F as V}from"./FrontendLayout-ed4d1e4d.js";import{_ as p,a as h}from"./InputLabel-9bdfcb39.js";import"https://connect.facebook.net/en_US/sdk.js";import{_ as $}from"./_plugin-vue_export-helper-c27b6911.js";import{P as j}from"./PrimaryButton-be3622fd.js";import{_ as w}from"./TextInput-0c3075b6.js";import"https://code.jquery.com/jquery-3.7.0.min.js";import"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js";import"https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js";import"https://unpkg.com/metismenu@3.0.7/dist/metisMenu.min.js";const P={setup(){k(()=>{window.fbAsyncInit=function(){FB.init({appId:"822187999192846",cookie:!0,xfbml:!0,version:"v17.0"})},function(r,a,n){var i,d=r.getElementsByTagName(a)[0];r.getElementById(n)||(i=r.createElement(a),i.id=n,i.src="https://connect.facebook.net/en_US/sdk.js",d.parentNode.insertBefore(i,d))}(document,"script","facebook-jssdk")});const c=()=>{FB.login(function(r){r.authResponse?o():console.log("User cancelled login or did not fully authorize.")},{scope:"public_profile,email"})},o=()=>{window.location.href="/auth/facebook"};return{loginWithFacebook:c,handleFacebookCallback:o}}},C={class:"ic__social--auth"},E={href:"/auth/google"},N=["src"],I=["src"];function L(c,o,r,a,n,i){return u(),b("div",C,[e("a",E,[e("img",{src:"assets/front/images/gmail.svg",alt:""},null,8,N),l(" Sign in with Gmail")]),e("a",{onClick:o[0]||(o[0]=(...d)=>a.loginWithFacebook&&a.loginWithFacebook(...d)),style:"cursor: pointer"},[e("img",{src:"assets/front/images/faceb.svg",alt:""},null,8,I),l(" Sign in with Facebook")])])}const T=$(P,[["render",L]]),U={class:"ic-section-space ic-auth-info ic-login-wrap"},z={class:"container"},R={class:"ic-info-content"},q={class:"logo"},W=["src"],D={class:"right_content"},G=e("div",{class:"top-section"},[e("h2",{class:"title"},"Login"),e("p",{class:"sub-heading"}," Customize this piece to make it your own and discover how even a small change can make a big difference. ")],-1),M={key:0,class:"mb-4 font-medium text-sm text-green-600 text-info"},O=["onSubmit"],A={class:"form-group"},Z={class:"form-group"},H={class:"ic__account--ask d-flex justify-content-between"},J=e("div",{class:"ic_or"},[e("p",{class:""},"OR")],-1),K={methods:{redirectToGoogle(){window.location.href="/auth/google"},redirectToFacebook(){window.location.href="/auth/facebook"}}},ce=Object.assign(K,{__name:"Login",props:{canResetPassword:{type:Boolean},status:{type:String}},setup(c){const o=v({email_or_username:"",password:"",remember:!1}),r=()=>{o.post(route("login"),{onSuccess:a=>{console.log("test"),console.log(a),o.reset("password")}})};return(a,n)=>(u(),_(V,null,{main:m(()=>[t(s(y),{title:"Log In"}),e("section",U,[e("div",z,[e("div",R,[e("div",{class:"left_content",style:F("background-image: url(/assets/front/images/login-bg.png);")},[e("div",q,[e("img",{src:"/assets/front/images/logo/white-logo.png",alt:""},null,8,W)])],4),e("div",D,[G,c.status?(u(),b("div",M,x(c.status),1)):f("",!0),e("form",{onSubmit:B(r,["prevent"]),class:"ic-form"},[e("div",A,[t(p,{for:"email",value:"Email"}),t(w,{id:"email",type:"text",class:"form-control",placeholder:"Enter your email",modelValue:s(o).email_or_username,"onUpdate:modelValue":n[0]||(n[0]=i=>s(o).email_or_username=i),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),t(h,{class:"mt-2",message:s(o).errors.email_or_username},null,8,["message"])]),e("div",Z,[t(p,{for:"password",value:"Password"}),t(w,{id:"password",type:"password",class:"form-control",placeholder:"Password",modelValue:s(o).password,"onUpdate:modelValue":n[1]||(n[1]=i=>s(o).password=i),required:"",autocomplete:"current-password"},null,8,["modelValue"]),t(h,{class:"mt-2",message:s(o).errors.password},null,8,["message"])]),e("div",H,[e("p",null,[l(" Don’t have an account? "),t(s(g),{href:"/register"},{default:m(()=>[l("Sign Up")]),_:1})]),c.canResetPassword?(u(),_(s(g),{key:0,href:a.route("password.request"),class:""},{default:m(()=>[l(" Forgot Password? ")]),_:1},8,["href"])):f("",!0)]),t(j,{class:S(["ic-btn w-100",{"opacity-25":s(o).processing}]),disabled:s(o).processing},{default:m(()=>[l(" Sign In ")]),_:1},8,["class","disabled"]),J,t(T)],40,O)])])])])]),_:1}))}});export{ce as default};
