<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pets_shop"; 


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function tambahHewan($name, $jenis, $jenis_kelamin, $berat, $tanggal_lahir, $path_poto, $harga) {
    global $conn;
    $sql = "INSERT INTO data_pet (name_pet, jenis, jenis_kelamin, berat, tanggal_lahir, path_poto, harga) 
            VALUES ('$name', '$jenis', '$jenis_kelamin', '$berat', '$tanggal_lahir', '$path_poto', '$harga')";
    return mysqli_query($conn, $sql);
}


function lihatHewan() {
    global $conn;
    $sql = "SELECT * FROM data_pet";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;
}

function cariHewan($keyword) {
    global $conn;
    $sql = "SELECT * FROM data_pet WHERE name_pet LIKE ?";
    $stmt = $conn->prepare($sql);
    $keyword = "%" . $keyword . "%";
    $stmt->bind_param("s", $keyword);
    $stmt->execute();
    $result = $stmt->get_result();

    $pets = [];
    while ($row = $result->fetch_assoc()) {
        $pets[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $pets;
}


function getHewanById($id_pet) {
    global $conn;
    $sql = "SELECT * FROM data_pet WHERE id_pet = $id_pet";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}


function editHewan($id_pet, $name, $jenis, $jenis_kelamin, $berat, $tanggal_lahir, $path_poto, $harga) {
    global $conn;
    $sql = "UPDATE data_pet SET name_pet = '$name', jenis = '$jenis', jenis_kelamin = '$jenis_kelamin', 
            berat = '$berat', tanggal_lahir = '$tanggal_lahir', path_poto = '$path_poto', harga = '$harga' 
            WHERE id_pet = $id_pet";
    return mysqli_query($conn, $sql);
}


function hapusHewan($id_pet) {
    global $conn;
    $sql = "DELETE FROM data_pet WHERE id_pet = $id_pet";
    return mysqli_query($conn, $sql);
}
?>
