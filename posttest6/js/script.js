const mode = document.querySelector('.sun .fa-solid');
// const form = document.getElementById('contactForm');
// const btnLogin = document.querySelector('.btn-login');
const icons = document.querySelectorAll('.icons .fas');



icons.forEach(icon => {
    icon.addEventListener('click', (e) => {
        e.preventDefault();
        alert('Maaf, fitur ini belum tersedia');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const burger = document.querySelector('.burger');
    const sidebar = document.querySelector('.sidebar');
    const navbar = document.querySelector('.navbar');
    const footer = document.querySelector('.footer');
    const managemant = document.querySelector('.container-managemant');
    const form = document.querySelector('.container-form');
    const menuItems = document.querySelectorAll('.sidebar .menu ul li a');

    burger.addEventListener('click', function () {
        sidebar.classList.toggle('sidebar-hidden');
        navbar.classList.toggle('expanded');
        footer.classList.toggle('expanded');
        managemant.classList.toggle('expanded');
    });

    burger.addEventListener('click', function () {
        form.classList.toggle('expanded');
    });
});

mode.addEventListener('click', (e) => {
    e.preventDefault();
    document.body.classList.toggle('blackmode');
    mode.classList.toggle('fa-sun');
    mode.classList.toggle('fa-moon');
});

document.getElementById('reset-session').addEventListener('click', function (event) {
    event.preventDefault();
    if (confirm('Apakah Anda yakin ingin mereset data?')) {
        window.location.href = this.href;
    }
});

// form.addEventListener('submit', (event) => {
//     event.preventDefault();

//     let name = document.getElementById('name').value;
//     let email = document.getElementById('email').value;
//     let message = document.getElementById('pesan').value;

//     let fullMessage = `Name: ${name}\nEmail: ${email}\nmessage: ${message}`;


//     let whatsappUrl = `https://wa.me/6289501603099?text=${encodeURIComponent(fullMessage)}`;

//     window.open(whatsappUrl, '_blank');
// });