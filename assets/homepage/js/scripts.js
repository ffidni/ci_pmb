/*!
* Start Bootstrap - Simple Sidebar v6.0.5 (https://startbootstrap.com/template/simple-sidebar)
* Copyright 2013-2022 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
*/
// 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const menuIcon = document.body.querySelector('.menu');
    const sidebar = document.body.querySelector('.wrapper');
    const navbar = document.body.querySelector('.nav-header');
    menuIcon.addEventListener("click", () => {
        if (sidebar.classList.contains("hide")){
            document.body.style.marginLeft = "225px";
        } else {
            document.body.style.marginLeft = "0px";
        }
        sidebar.classList.toggle("hide");
        sidebar.classList.toggle("show");
    });


});
