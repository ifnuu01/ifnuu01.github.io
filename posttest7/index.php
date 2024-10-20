<?php
require 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if(isset($_SESSION['role'])){
    if($_SESSION['role'] != 'user'){
        header("Location: admin.php");
        exit();
    }
}

$pets = lihatHewan();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSTTEST 7</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/user.css">
</head>

<body>
    <header>
        <a href="#" class="logo"><i class="fa-solid fa-paw"></i> PET SHOP</a>
        <nav class="navbar-menu">
            <a href="#Home">Home</a>
            <a href="#About">About</a>
            <a href="#Shop">Shop</a>
            <a href="#Gallery">Gallery</a>
            <a href="#Contact">Contact</a>
        </nav>
        <div class="icons">
            <a href="#" class="burger"><i class="fa-solid fa-bars"></i></a>
            <a href="#Shop" class="shop-cart"><i class="fa-solid fa-shopping-cart"></i></a>
            <a href="#" class="sun"><i class="fa-solid fa-moon"></i></a>
            <form action="logout.php" method="post">
                <input class="btn-login" id="logout" type="submit" name="logout" value="Logout" onclick="return confirm('Are you sure you want to logout?');">
            </form>
        </div>
    </header>

    <section class="home" id="Home">
        <div class="content">
            <h1>WELCOME TO PET SHOP <br> FIND THE BEST PET FOR YOU</h1>
            <p>Website ini menyediakan banyak <br> sekelian hewan peliharaan untuk dipelihara <br> semoga <b><?php echo $_SESSION['username'] ?></b> menemukan
                sahabat anda <br> di sini!</p>
            <a href="#Shop" class="btn-explore">Explore😎</a>
        </div>
        <img src="img/kucing_home.png" alt="gambar kucing kebeleh">
    </section>

    <section class="about" id="About">
        <h2>About Us</h2>
        <div class="container-about">
            <div class="title-about">
                <p>Kami adalah PET SHOP yang berdedikasi untuk menyediakan berbagai jenis hewan peliharaan yang sehat
                    dan bahagia. Dengan pengalaman bertahun-tahun dalam merawat dan menjual hewan peliharaan, kami
                    berkomitmen untuk memberikan layanan terbaik kepada pelanggan kami. Kami percaya bahwa setiap
                    hewan
                    peliharaan layak mendapatkan rumah yang penuh kasih dan perhatian. Di sini, Anda dapat
                    menemukan
                    berbagai jenis hewan peliharaan mulai dari kucing, anjing, burung, hingga hewan eksotis
                    lainnya.
                    Bergabunglah dengan komunitas kami dan temukan sahabat sejati Anda di PET SHOP!
                </p>
            </div>
            <div class="box">
                <img src="img/profile-picture.png" alt="Gambar yang buat">
                <h3>Ifnu Umar | 2309106060</h3>
                <p>Menjadi tempat yang menyediakan hewan peliharaan terbaik dan terpercaya</p>
            </div>
        </div>
    </section>


    <section class="shop" id="Shop">
        <h1 class="heading">Our <span>Pets</span></h1>

        <div class="shop-container">
            <?php foreach ($pets as $pet) : 
                $pet['path_poto'] = str_replace('C:/laragon/www/posttest7/', '', $pet['path_poto']);    
            ?>
            <div class="box-container">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="<?= $pet['path_poto'] ?>" alt="">
                </div>
                <div class="content">
                    <h3><?php  echo $pet['name_pet'] ?></h3>
                    <div class="harga">Rp. <?php echo $pet['harga'] ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>


    <section class="gallery" id="Gallery">
        <h1 class="heading">Gal<span>lery</span></h1>

        <div class="container-gallery">
            <div class="box-gallery big    ">
                <img src="img/gal-1.jpeg" alt="">
            </div>
            <div class="box-gallery wide">
                <img src="img/gal-2.jpeg" alt="">
            </div>
            <div class="box-gallery wide">
                <img src="img/gal-3.jpeg" alt="">
            </div>
            <div class="box-gallery big">
                <img src="img/gal-4.jpeg" alt="">
            </div>
            <div class="box-gallery wide">
                <img src="img/gal-5.jpeg" alt="">
            </div>
            <div class="box-gallery big">
                <img src="img/gal-6.jpeg" alt="">
            </div>
            <div class="box-gallery wide">
                <img src="img/gal-7.jpeg" alt="">
            </div>
            <div class="box-gallery big">
                <img src="img/gal-8.jpeg" alt="">
            </div>
            <div class="box-gallery big">
                <img src="img/gal-9.jpeg" alt="">
            </div>
            <div class="box-gallery wide">
                <img src="img/gal-10.jpeg" alt="">
            </div>
            <div class="box-gallery wide">
                <img src="img/gal-11.jpeg" alt="">
            </div>
            <div class="box-gallery wide">
                <img src="img/gal-12.jpeg" alt="">
            </div>
            <div class="box-gallery wide">
                <img src="img/gal-13.jpeg" alt="">
            </div>
        </div>
    </section>

    <section class="contact" id="Contact">
        <h2 class="heading"><span>Contact </span>Us</h2>
        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d240.91420497448127!2d117.14769761339193!3d-0.45033467967692253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f32a9af1359%3A0x2e22d921d486a398!2sPT.%20Sriwijaya%20Teknik%20Utama!5e1!3m2!1sid!2sid!4v1721892921391!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
            <form action="#" method="post" class="my-contact" id="contactForm">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" id="name" placeholder="Masukkan Nama " required>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" id="email" placeholder="Masukkan Email " required>
                </div>
                <div class="form-group">
                    <label for="pesan">Message: </label>
                    <textarea name="pesan" id="pesan" placeholder="Masukan Pesan " rows="4" required></textarea>
                </div>
                <button type="submit" class="btn-explore">Submit</button>
            </form>
        </div>
    </section>


    <footer class="footer">
        <div class="link">
            <a href="#Home">Home</a>
            <a href="#About">About</a>
            <a href="#Shop">Shop</a>
            <a href="#Gallery">Gallery</a>
            <a href="#Contact">Contact</a>
        </div>
        <div class="credit">
            <p>Created By Ifnu Umar. | &copy; 2024</p>
        </div>
    </footer>

    <script src="js/user.js"></script>
</body>

</html>