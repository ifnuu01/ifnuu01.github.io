<?php

include 'config.php';

if(isset($_GET['id_pet'])){
    $id_pet = $_GET['id_pet'];
    $data_pet = getHewanById($id_pet);
    if (hapusHewan($id_pet)) {
        if ($data_pet['path_poto'] && file_exists($data_pet['path_poto'])) {
            unlink($data_pet['path_poto']);
        }
        header('Location: index.php');
        exit();
    } else {
        echo "Gagal menghapus data";
    }
}