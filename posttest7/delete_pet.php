<?php
require 'config.php';

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

if(isset($_SESSION['role'])){
    if($_SESSION['role'] != 'admin'){
        header("Location: index.php");
        exit();
    }
}

if(isset($_GET['id_pet'])){
    $id_pet = $_GET['id_pet'];
    $data_pet = getHewanById($id_pet);
    if (hapusHewan($id_pet)) {
        if ($data_pet['path_poto'] && file_exists($data_pet['path_poto'])) {
            unlink($data_pet['path_poto']);
        }
        echo "<script>alert('Data berhasil dihapus')
        window.location.href = 'index.php';
        </script>";
        exit();
    } else {
        echo "Gagal menghapus data";
    }
}