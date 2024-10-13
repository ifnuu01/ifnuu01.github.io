<?php

include 'config.php';

if (isset($_GET['id_pet'])) {
    $id_pet = $_GET['id_pet'];
    $data_pet = getHewanById($id_pet);
    $current_image = str_replace('C:/laragon/www/posttest5/', '', $data_pet['path_poto']);
    $current_jenis = $data_pet['jenis'];
}

if (isset($_POST['submit']) && isset($id_pet) ) { 
    $name = $_POST['name'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jekel = $_POST['jekel'];
    $jenis = $_POST['jenis'];
    $berat = $_POST['berat'];
    $harga = $_POST['harga'];

    $target_dir = "C:/laragon/www/posttest5/img/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        if ($_FILES['image']['size'] <= 2 * 1024 * 1024) { 
            if (strpos($_FILES['image']['type'], 'image') !== false) {
                $imageFileType = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                date_default_timezone_set('Asia/Makassar');
                $newFileName = date('Y-m-d H-i-s') . '.' . $imageFileType;
                $target_file = $target_dir . $newFileName;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    if ($current_image && file_exists($current_image)) {
                        unlink($current_image);
                    }
                    editHewan($id_pet, $name, $jenis, $jekel, $berat, $tanggal_lahir, $target_file, $harga);
                    echo "<script>alert('Pet edited successfully')
                    window.location.href = 'index.php';
                    </script>";
                    exit();
                } else {
                    echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
                }
            } else {
                echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
            }
        } else {
            echo "<script>alert('Sorry, your file is too large.')</script>";
        }
    } else {
        editHewan($id_pet, $name, $jenis, $jekel, $berat, $tanggal_lahir, $current_image, $harga);
        header('Location: index.php');
        exit();
    }
}

include 'template/header.php';
?>

<div class="container-form ">
    <div class="title">
        <h2>Edit Pet</h2>
        <a href="index.php"><button class="btn-edit"><i class="fa-solid fa-door-open"></i> Back</button></a>
    </div>
    <form action="edit_pet.php?id_pet=<?php echo $id_pet; ?>" class="form" method="POST" enctype="multipart/form-data">
        
        <div class="container-input-all">
            <div class="container-input">
                <label for="name">Pet Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Pet Name" value="<?php echo $data_pet['name_pet'] ?>" required>
            </div>
            <div class="container-input">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $data_pet['tanggal_lahir'] ?>" required>
            </div>
            <div class="container-input">
                <label for="jekel">Jenis Kelamin</label>
                <div class="radio-jekel">
                    <input type="radio" id="jekel-jantan" <?php echo $data_pet['jenis_kelamin'] == 'Jantan' ? 'checked' : ''; ?> name="jekel" value="Jantan" required>
                    <label for="jekel-jantan">Jantan</label>
                    <input type="radio" name="jekel" <?php echo $data_pet['jenis_kelamin'] == 'Betina' ? 'checked' : ''; ?> id="jekel-betina" value="Betina" required>
                    <label for="jekel-betina">Betina</label>
                </div>
            </div>
            <div class="container-input">
                <label for="jenis">Jenis</label>
                <select name="jenis" id="jenis" required class="options-jenis">
                    <option value="Anjing" <?php echo ($current_jenis == 'Anjing') ? 'selected' : ''; ?>>Anjing</option>
                    <option value="Kucing" <?php echo ($current_jenis == 'Kucing') ? 'selected' : ''; ?>>Kucing</option>
                    <option value="Kelinci" <?php echo ($current_jenis == 'Kelinci') ? 'selected' : ''; ?>>Kelinci</option>
                    <option value="Hamster" <?php echo ($current_jenis == 'Hamster') ? 'selected' : ''; ?>>Hamster</option>
                    <option value="Unggas" <?php echo ($current_jenis == 'Unggas') ? 'selected' : ''; ?>>Unggas</option>
                    <option value="Bebek" <?php echo ($current_jenis == 'Bebek') ? 'selected' : ''; ?>>Bebek</option>
                    <option value="Ular" <?php echo ($current_jenis == 'Ular') ? 'selected' : ''; ?>>Ular</option>
                    <option value="Kura-kura" <?php echo ($current_jenis == 'Kura-kura') ? 'selected' : ''; ?>>Kura-kura</option>
                    <option value="Kadal" <?php echo ($current_jenis == 'Kadal') ? 'selected' : ''; ?>>Kadal</option>
                    <option value="Kapibara" <?php echo ($current_jenis == 'Kapibara') ? 'selected' : ''; ?>>Kapibara</option>
                </select>
            </div>
                        
            <div class="container-input">
                <label for="berat">Berat (Kg)</label>
                <input type="number" step="0.01" id="berat" value="<?php echo $data_pet['berat'] ?>" name="berat" placeholder="Enter Berat" min="1" required>
            </div>
            
            <div class="container-input value-image">
                <label for="image">Foto</label>
                <?php if ($current_image): ?>
                    <div class="current-image">
                        <img src="<?php echo $current_image; ?>" alt="Current Image" style="max-width: 100px; max-height: 100px;">
                    </div>
                <?php endif; ?>
                <input type="file" id="image" name="image" accept="image/*" <?php echo $current_image ? '' : 'required'; ?>>
            </div>
            
            <div class="container-input">
                <label for="harga">Harga</label>
                <input type="number" step="0.01" id="harga" value="<?php echo $data_pet['harga']?>" name="harga" placeholder="Enter Harga" min="1" required>
            </div>
        </div>

        <button class="btn-add" type="submit" name="submit" >Edit Pet</button>
    </form>
</div>

<?php
include 'template/footer.php';
?>
