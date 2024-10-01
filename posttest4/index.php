<?php
session_start();

if (!isset($_SESSION['dataHewan'])) {
    $_SESSION['dataHewan'] = [
        [
            "nama" => 'Miko',
            "jenis" => 'Kucing',
            "jekel" => 'Jantan',
            "berat" => 2,
            "tanggal_lahir" => '12-12-2012',
            "harga" => 2000000,
            "image" => 'img/1.jpeg'
        ],
        [
            "nama" => 'Jamal',
            "jenis" => 'Kucing',
            "jekel" => 'Jantan',
            "berat" => 2,
            "tanggal_lahir" => '12-12-2012',
            "harga" => 2000000,
            "image" => 'img/2.jpeg'
        ],
        [
            "nama" => 'Cico',
            "jenis" => 'Unggas',
            "jekel" => 'Jantan',
            "berat" => 0.5,
            "tanggal_lahir" => '12-12-2012',
            "harga" => 2000000,
            "image" => 'img/3.jpeg'
        ]
    ];
}

$dataHewan = $_SESSION['dataHewan'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['name'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jekel = $_POST['jekel'];
    $jenis = $_POST['jenis'];
    $berat = $_POST['berat'];
    $harga = $_POST['harga'];
    
    $target_dir = "img/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (isset($_FILES['image'])) {
        if (strpos($_FILES['image']['type'], 'image/') === 0) {
            $image = $_FILES['image'];
            $target_file = $target_dir . basename($image["name"]);
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                $image_path = $target_file;
            } else {
                echo "Terjadi eror saat upload file";
                exit;
            }
        } else {
            echo "Hanya image file yang boleh diupload";
            exit;
        }
    } else {
        echo "No file uploaded.";
        exit;
    }

    $dataHewan[] = [
        "nama" => $nama,
        "jenis" => $jenis,
        "jekel" => $jekel,
        "berat" => $berat,
        "tanggal_lahir" => $tanggal_lahir,
        "harga" => $harga,
        "image" => $image_path
    ];

    $_SESSION['dataHewan'] = $dataHewan;
}
    include 'template/header.php';
?>

<div class="container-form">
<h1 class="heading">Add <span>Pets</span></h1>
<form action="index.php" class="form" method="POST" enctype="multipart/form-data">
    
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
                <option value="Ikan">Ikan</option>
            </select>
        </div>
        
        <div class="container-input">
            <label for="berat">Berat (Kg)</label>
            <input type="number" id="berat" name="berat" placeholder="Enter Berat" min="1" required>
        </div>
        
        <div class="container-input">
            <label for="image">Foto </label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        
        <div class="container-input">
            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga" placeholder="Enter Harga" min="1" required>
        </div>
    </div>

    <button class="btn-add">Add Pet</button>
</form>
</div>


    <section class="shop" id="Shop">
        <h1 class="heading">Daftar <span>Pets</span></h1>

        <div class="shop-container">

            <?php
            
            if (count($dataHewan) > 0) {
                foreach ($dataHewan as $hewan){
            ?>
            <div class="box-container">
                <div class="icons">
                    <a href="#" class="fas fa-eye"></a>
                    <a href="#" class="fas fa-pencil"></a>
                    <a href="#" class="fas fa-trash"></a>
                </div>
                <div class="image">
                    <img src="<?= $hewan['image'] ?>" alt="">
                </div>
                <div class="content">
                    <h3 class="name-pet"><?= $hewan['nama'] ?></h3>
                    <div class="container-keterangan">
                        <div class="item">
                            <i class="fa-solid fa-venus-mars"></i>
                            <p><?= $hewan['jekel'] ?></p>
                        </div>
                        <div class="item">
                            <i class="fa-solid fa-paw"></i>
                            <p><?= $hewan['jenis'] ?></p>
                        </div>
                        <div class="item">
                            <i class="fa-solid fa-scale-balanced"></i>
                            <p><?= $hewan['berat'] ?> Kg</p>
                        </div>
                        <div class="item">
                            <i class="fa-solid fa-cake-candles"></i>
                            <p><?= $hewan['tanggal_lahir'] ?></p>
                        </div>
                        <div class="item">
                            <p>Rp. <?= $hewan['harga'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }}else{
                echo "<h1 class='kosong'>Data Kosong</h1>";
            }
            ?>
        </div>
    </section>

<?php
    include 'template/footer.php';
?>