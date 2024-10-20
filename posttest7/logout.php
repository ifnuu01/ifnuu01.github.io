<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    echo "<script>
    alert('Logout success.');
    window.location.href='login.php';
    </script>";
} else {
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    } else if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] != 'admin') {
            echo "<script>
            alert('Invalid request.');
            window.location.href='admin.php';
            </script>";
            exit();
        }else {
            echo "<script>
            alert('Invalid request.');
            window.location.href='index.php';
            </script>";
        }
    }
}

?>