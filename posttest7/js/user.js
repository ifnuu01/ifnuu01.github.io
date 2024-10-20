const navbar = document.querySelector('.navbar-menu');
const burger = document.querySelector('.burger');
const mode = document.querySelector('.sun .fa-solid');
const form = document.getElementById('contactForm');
const shop = document.querySelector('.shop-cart');
const btnLogin = document.querySelector('.btn-login');
const icons = document.querySelectorAll('.icons .fas');



icons.forEach(icon => {
    icon.addEventListener('click', (e) => {
        e.preventDefault();
        alert('Maaf, fitur ini belum tersedia');
    });
});

burger.addEventListener('click', (e) => {
    e.preventDefault();
    navbar.classList.toggle('active');
});

document.addEventListener('click', (e) => {
    if (!burger.contains(e.target) && !navbar.contains(e.target)) {
        navbar.classList.remove('active');
    }
})

console.log(mode);

mode.addEventListener('click', (e) => {
    e.preventDefault();
    document.body.classList.toggle('blackmode');
    mode.classList.toggle('fa-sun');
    mode.classList.toggle('fa-moon');
});

form.addEventListener('submit', (event) => {
    event.preventDefault();

    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let message = document.getElementById('pesan').value;

    let fullMessage = `Name: ${name}\nEmail: ${email}\nmessage: ${message}`;


    let whatsappUrl = `https://wa.me/6289501603099?text=${encodeURIComponent(fullMessage)}`;

    window.open(whatsappUrl, '_blank');
});

