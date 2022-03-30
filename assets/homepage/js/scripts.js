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
    const closeIcon = document.getElementsByClassName("close")[0];
    const sidebar = document.body.querySelector('.wrapper');
    const navbar = document.body.querySelector('.nav-header');

    console.log("WOKWOKWOK");
    console.log(closeIcon);
    closeIcon.addEventListener("click", () => {
        if (sidebar.classList.contains("hide")){
            document.body.style.marginLeft = "225px";
        } else {
            document.body.style.marginLeft = "0px";
        }
        sidebar.classList.toggle("hide");
        sidebar.classList.toggle("show");        
    });
    menuIcon.addEventListener("click", () => {
        console.log("AA");
        if (sidebar.classList.contains("hide")){
            console.log(window.innerWidth);
            document.body.style.marginLeft = "1000px";
        } else {
            document.body.style.marginLeft = "0px";
        }
        sidebar.classList.toggle("hide");
        sidebar.classList.toggle("show");
    });


});
