import{T as _,m as f,j as p,c as b,a as t,u as a,w as d,F as g,o as h,Z as v,b as e,g as y,f as j,p as V,v as x,e as w}from"./app-45a82ee6.js";import{F as E}from"./FrontendLayout-ed4d1e4d.js";import{_ as l,a as r}from"./InputLabel-9bdfcb39.js";import{P as T}from"./PrimaryButton-be3622fd.js";import{_ as c}from"./TextInput-0c3075b6.js";import"https://code.jquery.com/jquery-3.7.0.min.js";import"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js";import"https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js";import"https://unpkg.com/metismenu@3.0.7/dist/metisMenu.min.js";import"./_plugin-vue_export-helper-c27b6911.js";const S=e("div",{class:"container"},[e("div",{class:"banner-content"},[e("h3",null,"Contact Us")])],-1),U=[S],F={class:"ic-contact-us-section"},L={class:"container"},M={class:"ic-contact-us-content"},k={class:"ic-contact-us-left"},B={class:"ic-contact-us-left-content"},C=["src"],N=e("h1",{class:"mb-16"}," 35/37 Ludgate Hill, London ",-1),q=e("p",null," There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected randomised words which don't look even slightly ",-1),P={class:"ic-contact-us-right"},$=e("div",{class:"ic-heading mb-21"},[e("h1",{class:"mb-6"},"Drop us a line"),e("p",null," There are many variations of passages of Lorem Ipsum available,but the majority have suffered alteration in some form, by injected humour, ")],-1),D={class:"ic-contact-us-form"},I=["onSubmit"],Y={class:"ic-user-info mb-20"},z={class:"info"},A={class:"info"},H={class:"subject mb-20"},Z={class:"message mb-20"},G={class:"ic-message-btn"},oe={__name:"ContactUs",setup(J){const s=_({name:"",email:"",subject:"",message:""}),m=f(),u=()=>{s.post(route("contact.store"),{onSuccess:n=>{m.add({severity:"success",summary:"success",detail:"Your message send successfully",life:3e3}),s.reset()},onError:n=>{console.error("Form submission error:",n),m.add({severity:"error",summary:"Error",detail:"An error occurred while sending your message",life:3e3})}})};return p(()=>{}),(n,o)=>(h(),b(g,null,[t(a(v),{title:"Contact Page"}),t(E,null,{main:d(()=>[e("section",{class:"ic-blog-banner",style:y("background-image: url(/assets/front/images/contact-us-banner.png);")},U,4),e("div",F,[e("div",L,[e("div",M,[e("div",k,[e("div",B,[e("img",{class:"mb-30",src:"/assets/front/images/location.svg",alt:""},null,8,C),N,q])]),e("div",P,[$,e("div",D,[e("form",{onSubmit:j(u,["prevent"])},[e("div",Y,[e("div",z,[t(l,{class:"title",for:"name",value:"Name"}),t(c,{id:"name",type:"text",class:"inputfiled",placeholder:"Enter name",modelValue:a(s).name,"onUpdate:modelValue":o[0]||(o[0]=i=>a(s).name=i),required:""},null,8,["modelValue"]),t(r,{class:"mt-2",message:a(s).errors.name},null,8,["message"])]),e("div",A,[t(l,{class:"title",for:"email",value:"Email"}),t(c,{id:"email",type:"text",class:"inputfiled",placeholder:"Enter email",modelValue:a(s).email,"onUpdate:modelValue":o[1]||(o[1]=i=>a(s).email=i),required:""},null,8,["modelValue"]),t(r,{class:"mt-2",message:a(s).errors.email},null,8,["message"])])]),e("div",H,[t(l,{class:"title",for:"subject",value:"Subject"}),t(c,{id:"subject",type:"text",class:"inputfiled",placeholder:"Enter subject",modelValue:a(s).subject,"onUpdate:modelValue":o[2]||(o[2]=i=>a(s).subject=i),required:""},null,8,["modelValue"]),t(r,{class:"mt-2",message:a(s).errors.subject},null,8,["message"])]),e("div",Z,[t(l,{class:"title",for:"message",value:"Your Message"}),V(e("textarea",{class:"inputfiled",placeholder:"Type descriptions",name:"message","onUpdate:modelValue":o[3]||(o[3]=i=>a(s).message=i),id:"",cols:"30",rows:"10"},null,512),[[x,a(s).message]])]),e("div",G,[t(T,{class:"ic-btn",disabled:a(s).processing},{default:d(()=>[w("Send Message")]),_:1},8,["disabled"])])],40,I)])])])])])]),_:1})],64))}};export{oe as default};