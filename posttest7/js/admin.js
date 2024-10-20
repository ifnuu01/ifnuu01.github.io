const mode = document.querySelector('.sun .fa-solid');
// const form = document.getElementById('contactForm');
// const btnLogin = document.querySelector('.btn-login');
const icons = document.querySelectorAll('.icons .fas');
const changePassword = document.querySelector('#change-pass');


icons.forEach(icon => {
    icon.addEventListener('click', (e) => {
        e.preventDefault();
        alert('Maaf, fitur ini belum tersedia');
    });
});

changePassword.addEventListener('click', (e) => {
    e.preventDefault();
    alert('Maaf, fitur ini belum tersedia');
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

document.getElementById('search').addEventListener('input', function () {
    const searchValue = this.value;
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'search_pets.php?search=' + searchValue, true);
    xhr.onload = function () {
        if (this.status === 200) {
            const data_pets = JSON.parse(this.responseText);
            let output = '';
            if (data_pets.length > 0) {
                let number = 1;
                data_pets.forEach(function (pet) {
                    pet.path_poto = pet.path_poto.replace('C:/laragon/www/posttest7/', '');
                    output += `
                    <tr>
                        <td>${number++}</td>
                        <td>${pet.name_pet}</td>
                        <td>${pet.jenis}</td>
                        <td>${pet.jenis_kelamin}</td>
                        <td>${pet.berat} Kg</td>
                        <td>${pet.tanggal_lahir}</td>
                        <td><img src="${pet.path_poto}" alt="Foto Pet"></td>
                        <td>Rp. ${pet.harga}</td>
                        <td>
                            <div class="action">
                                <a href="edit_pet.php?id_pet=${pet.id_pet}"><button class="btn-edit"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                <a href="delete_pet.php?id_pet=${pet.id_pet}"><button class="btn-delete" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya 😲?')"><i class="fa-solid fa-trash"></i></button></a>
                            </div>
                        </td>
                    </tr>
                    `;
                });
            } else {
                output = '<tr><td colspan="9">Data masih kosong</td></tr>';
            }
            document.getElementById('pets-table-body').innerHTML = output;
        }
    }
    xhr.send();
});