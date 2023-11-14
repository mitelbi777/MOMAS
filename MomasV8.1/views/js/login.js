
// alert("hola")


const loginOpen = document.getElementById('login-open');
const loginLink = document.querySelector('.login-link');
const wrapper = document.querySelector('.wrapper');
const registerLink = document.querySelector('.register-link'); 
const btnPopup = document.querySelector('.btnLogin-popup');  
const iconClose = document.querySelector('.icon-close'); 


registerLink.addEventListener('click', () => {
    wrapper.classList.add('active');
});

loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');
});

loginOpen.addEventListener('click', () => {
    // console.log("Click Abrir");
    wrapper.classList.add('active-popup');
});
document.addEventListener("click", e => {
    console.log(e.target);
    // if(e.target.matches(""))
})

iconClose.addEventListener('click', () => {
    wrapper.classList.remove('active-popup');
});

// const wrapper = document.querySelector('.wrapper');
// const loginLink = document.querySelector('.login-link');
// const registerLink = document.querySelector('.register-link'); 
// const btnPopup = document.querySelector('.btnLogin-popup');  
// const iconClose = document.querySelector('.icon-close'); 


// registerLink.addEventListener('click', () => {
//     wrapper.classList.add('active');
// });

// loginLink.addEventListener('click', () => {
//     wrapper.classList.remove('active');
// });

// btnPopup.addEventListener('click', () => {
//     wrapper.classList.add('active-popup');
// });

// iconClose.addEventListener('click', () => {
//     wrapper.classList.remove('active-popup');
// });