<?php
require 'config.php';

if(isset($_GET['search'])){
    $keyword = $_GET['search'];
    $data_pets = cariHewan($keyword);
} else {
    $data_pets = lihatHewan();
}

echo json_encode($data_pets);
?>