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

$data_pets = lihatHewan();

include 'template-admin/header.php'
?>

<div class="container-managemant">
    <div class="title">
        <h2>Management Pets</h2>
    </div>
    <div class="content">
        <div class="search">
            <input type="text" id="search" name="search" placeholder="Search" value="<?= isset($keyword) ? $keyword : '' ?>">
            <div class="btn">
                <a href="add_pet.php"><button type="button" class="btn-add"><i class="fa-regular fa-file"></i> Tambah Pet</button></a>
            </div>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Jenis</th>
                        <th>Jenis Kelamin</th>
                        <th>Berat</th>
                        <th>Tanggal Lahir</th>
                        <th>Foto</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="pets-table-body">
                    <?php
                    if (count($data_pets) > 0) {
                        $number = 1;
                        foreach ($data_pets as $key => $value) {
                        $value['path_poto'] = str_replace('C:/laragon/www/posttest7/', '', $value['path_poto']);
                    ?>
                    <tr>
                        <td><?= $number++ ?></td>
                        <td><?= $value['name_pet'] ?></td>
                        <td><?= $value['jenis'] ?></td>
                        <td><?= $value['jenis_kelamin'] ?></td>
                        <td><?= $value['berat'] ?> Kg</td>
                        <td><?= $value['tanggal_lahir'] ?></td>
                        <td><img src="<?= $value['path_poto'] ?>" alt="Foto Pet"></td>
                        <td>Rp. <?= $value['harga'] ?></td>
                        <td>
                            <div class="action">
                                <a href="edit_pet.php?id_pet=<?= $value['id_pet'] ?>"><button class="btn-edit"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                <a href="delete_pet.php?id_pet=<?= $value['id_pet'] ?>"><button class="btn-delete" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya 😲?')"><i class="fa-solid fa-trash"></i></button></a>
                            </div>
                        </td>
                    </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="9">Data masih kosong</td>
                    </tr>
                    <?php
                }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include 'template-admin/footer.php'
?>