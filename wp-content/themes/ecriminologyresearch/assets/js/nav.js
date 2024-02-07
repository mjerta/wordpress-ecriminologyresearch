const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks =  document.querySelectorAll('.nav-links li.menu-item');
    const logo = document.querySelector('.logo-branding');

    burger.addEventListener('click', ()=> {

        navLinks.forEach((el, key) => {
            
            if(nav.classList.contains("nav-link-toggle")) {
                el.style.animation = 'navLinkSlideReverse 250ms ease-in-out';
            }
            else {
                console.log(el.lastElementChild.nodeName);
                el.style.animation = `navLinkSlide 500ms ease-in-out forwards ${key /7 +0.5}s`;
            }
            
        });

        nav.classList.toggle('nav-link-toggle');
        burger.classList.toggle('toggle');
        logo.classList.toggle('logo-branding-toggle');
        
        if(nav.classList.contains('nav-link-toggle')){
            document.body.style.overflow = 'hidden';
        }
        else {
            document.body.style.overflow = '';
        }
    });
}
navSlide();