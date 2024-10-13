<?php

include 'config.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jekel = $_POST['jekel'];
    $jenis = $_POST['jenis'];
    $berat = $_POST['berat'];
    $harga = $_POST['harga'];
    

    $tager_dir = "C:/laragon/www/posttest5/img/";
    if (!file_exists($tager_dir)) {
        mkdir($tager_dir, 0777, true);
    }

    if (isset($_FILES['image'])) {
        if (strpos($_FILES['image']['type'], 'image') !== false) {
            if ($_FILES['image']['size'] <= 2 * 1024 * 1024) {
                $file_info = pathinfo($_FILES['image']['name']);
                $extension = $file_info['extension'];
                date_default_timezone_set('Asia/Makassar');
                $timestamp = date('Y-m-d H-i-s');
                $target_file = $tager_dir . $timestamp . '.' . $extension;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    tambahHewan($name, $jenis, $jekel, $berat, $tanggal_lahir, $target_file, $harga);
                    echo "<script>alert('Pet added successfully')</script>";
                } else {
                    echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
                }
            } else {
                echo "<script>alert('Sorry, your file is too large.')</script>";
            }
        } else {
            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
        }
    }
}

include 'template/header.php'
?>

<div class="container-form ">
    <div class="title">
        <h2>Tambah Pet</h2>
        <a href="index.php"><button class="btn-edit"><i class="fa-solid fa-door-open"></i> Back</button></a>
    </div>
    <form class="form" method="POST" enctype="multipart/form-data">
        
        <div class="container-input-all">
            <div class="container-input">
                <label for="name">Pet Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Pet Name" required>
            </div>
            <div class="container-input">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
            <div class="container-input">
                <label for="jekel">Jenis Kelamin</label>
                <div class="radio-jekel">
                    <input type="radio" id="jekel-jantan" name="jekel" value="Jantan" required>
                    <label for="jekel-jantan">Jantan</label>
                    <input type="radio" name="jekel" id="jekel-betina" value="Betina" required>
                    <label for="jekel-betina">Betina</label>
                </div>
            </div>
            <div class="container-input">
                <label for="jenis">Jenis</label>
                <select name="jenis" id="jenis" required class="options-jenis">
                    <option value="Anjing">Anjing</option>
                    <option value="Kucing">Kucing</option>
                    <option value="Kelinci">Kelinci</option>
                    <option value="Hamster">Hamster</option>
                    <option value="Unggas">Unggas</option>
                    <option value="Bebek">Bebek</option>
                    <option value="Ular">Ular</option>
                    <option value="Kura-kura">Kura-kura</option>
                    <option value="Kadal">Kadal</option>
                    <option value="Kapibara">Kapibara</option>
                </select>
            </div>
            
            <div class="container-input">
                <label for="berat">Berat (Kg)</label>
                <input type="number" step="0.01" id="berat" name="berat" placeholder="Enter Berat" min="1" required>
            </div>
            
            <div class="container-input">
                <label for="image">Foto </label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            
            <div class="container-input">
                <label for="harga">Harga</label>
                <input type="number" step="0.01" id="harga" name="harga" placeholder="Enter Harga" min="1" required>
            </div>
        </div>

        <button class="btn-add" type="submit" name="submit" >Add Pet</button>
    </form>
</div>


<?php
include 'template/footer.php'
?>