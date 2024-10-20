<?php
session_start();

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

function login(){
    global $conn;
    
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];
            if ($row['role'] == 'admin') {
                echo "<script>alert('Login success.');
                window.location.href='admin.php';
                </script>"; 
                exit();
            }else{
                echo "<script>alert('Login success.');
                window.location.href='index.php';
                </script>"; 
                exit();
            }
        } else {
            echo "<script>alert('Invalid username or password.');</script>";
        }
    }
    
}

function register(){
    global $conn;
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $role = 'user';

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('Username already exists.');</script>";
        return;
    }
    
    if(strlen($password) < 8){
        echo "<script>alert('Password must be at least 8 characters.');</script>";
        return;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $password, $role);
    $stmt->execute();

    if($stmt){
        echo "<script>
        alert('Registration success.');
        window.location.href = 'login.php';
        </script>";
        exit();
    } else {
        echo "<script>alert('Registration failed.');</script>";
    }
}

?>
