let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');
let profile = document.querySelector('.header  .profile');
    
document.querySelector('#menu-btn').onclick  = () =>{
    menu.classList.toggle('fa-times');
   navbar.classList.toggle('active');
    profile.classList.remove('active');
 }
 
 document.querySelector('#user-btn').onclick = () =>{
    profile.classList.toggle('active');
    navbar.classList.remove('active');
 }

 window.onscroll = () =>{
   menu.classList.remove('fa-times');
    profile.classList.remove('active');
    navbar.classList.remove('active');
 }

 var swiper = new Swiper("home-slider", {
   loop:true,
   navigation: {
     nextEl: ".swiper-button-next",
     prevEl: ".swiper-button-prev",
   },
 })

 /* contact us start*/
 const inputs = document.querySelectorAll(".input");

 function focusFunc() {
   let parent = this.parentNode;
   parent.classList.add("focus");
 }
 
 function blurFunc() {
   let parent = this.parentNode;
   if (this.value == "") {
     parent.classList.remove("focus");
   }
 }
 
 inputs.forEach((input) => {
   input.addEventListener("focus", focusFunc);
   input.addEventListener("blur", blurFunc);
 });
 /* contact us end*/
