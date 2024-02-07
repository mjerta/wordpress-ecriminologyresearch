/*
========================================================
add id to all according mailchimp classes
========================================================
*/

//adds an id to class .mc4wp-response
const mc4wpResponseClass = document.querySelector(".mc4wp-response");
if (mc4wpResponseClass) {
    mc4wpResponseClass.id = "mc4wp-response";
    const mc4wpResponsId = document.getElementById("mc4wp-response");

    //adds an id to class .mc4wp-alert
    const mc4wpAlertClass = document.querySelector(".mc4wp-alert");
    if (mc4wpAlertClass) {
        mc4wpAlertClass.id = "mc4wp-alert";
    }
    const mc4wpAlertId = document.getElementById("mc4wp-alert");

    //add an id to p element inside .mc4wp-alert
    const mc4wpAlertClassP = document.querySelector(".mc4wp-alert p");
    if (mc4wpAlertClassP) {
        mc4wpAlertClassP.id = "mc4wpAlertClassP";
    }

    /*
    ========================================================
    create all html elements inside .mc4wp-response
    ========================================================
    */

    // creates <div class="pop-up-menu">
    const popUpMenu = document.createElement("div");
    popUpMenu.classList.add("pop-up-menu");

    //creates svg element <svg class="circles">
    const svgCircles =
        "<svg xmlns='http://www.w3.org/2000/svg' class='circles' viewBox='0 0 80 22'><g id='Group_165' data-name='Group 165' transform='translate(-1115 -304)'><circle id='Ellipse_27' data-name='Ellipse 27' cx='11' cy='11' r='11' transform='translate(1115 304)' fill='#465a33'/><circle id='Ellipse_28' data-name='Ellipse 28' cx='11' cy='11' r='11' transform='translate(1144 304)' fill='#465a33'/><circle id='Ellipse_29' data-name='Ellipse 29' cx='11' cy='11' r='11' transform='translate(1173 304)' fill='#465a33'/></g></svg>";

    //creates svg element <svg class="close-button">
    const svgCloseButton =
        "<svg xmlns='http://www.w3.org/2000/svg' class='close-button' width='39.482' height='38.407' viewBox='0 0 39.482 38.407'><g id='Group_164' data-name='Group 164' transform='translate(-817.366 -115.03)'><g id='Group_157' data-name='Group 157' transform='translate(-486.883 -289)'><line id='Line_32' data-name='Line 32' x1='25.682' y1='26.756' transform='translate(1337.368 410.392) rotate(90)' fill='none' stroke='#fffbfb' stroke-linecap='round' stroke-width='9'/><line id='Line_33' data-name='Line 33' x1='25.682' y2='26.756' transform='translate(1337.368 410.392) rotate(90)' fill='none' stroke='#fffbfb' stroke-linecap='round' stroke-width='9'/></g><g id='Group_162' data-name='Group 162' transform='translate(-486.883 -289)'><line id='Line_32-2' data-name='Line 32' x1='25.682' y1='26.756' transform='translate(1337.368 410.392) rotate(90)' fill='none' stroke='#fffbfb' stroke-linecap='round' stroke-width='9'/><line id='Line_33-2' data-name='Line 33' x1='25.682' y2='26.756' transform='translate(1337.368 410.392) rotate(90)' fill='none' stroke='#fffbfb' stroke-linecap='round' stroke-width='9'/></g></g></svg>";

    // creates <div class="pop-up-content">
    const popUpContent = document.createElement("div");
    popUpContent.classList.add("pop-up-content");

    document.addEventListener("DOMContentLoaded", function () {
        if (mc4wpAlertId) {
            //add <div class="pop-up-menu">
            mc4wpAlertId.appendChild(popUpMenu);

            //add <svg class="circles"> inside <div class="pop-up-menu">
            popUpMenu.innerHTML = svgCircles;

            // add <svg class="close-button"> inside <div class="pop-up-menu">
            popUpMenu.innerHTML += svgCloseButton;

            //add <div class="pop-up-content">
            mc4wpAlertId.appendChild(popUpContent);

            //add <p id="mc4wpAlertClassP"> inside <div class="pop-up-content">
            popUpContent.appendChild(mc4wpAlertClassP);

            /*
            ========================================================
            display the pop-up in the right form
            ========================================================
            */

            //add .mc4wp-response to the front with darkened background
            mc4wpResponsId.style.zIndex = "9999";
            mc4wpResponsId.style.background = "hsla(0, 0%, 0%, 0.7)";
            //add class for transition
            mc4wpAlertId.classList.add("mc4wp-alert-toggle");

            /*
            ========================================================
            the exit button
            ========================================================
            */

            const closeButton = document.querySelector(".close-button");

            /*
            ========================================================
            executing the exit button
            ========================================================
            */

            closeButton.addEventListener("click", () => {
                //closes the <div class="close-popup">
                mc4wpAlertId.style.display = "none";
                //set back the .mc4wp-response behind and unset the background
                mc4wpResponsId.style.background = "unset";
                mc4wpResponsId.style.zIndex = "-1";
            });
        }
    });
}
