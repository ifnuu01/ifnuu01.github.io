<?php
require 'config.php';

if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: admin.php");
        exit();
    } else {
        header("Location: index.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    login();
}
$pageTitle = 'Login Page';
include 'template-auth/header.php'
?>
    <div class="container">
        <div class="login-page">
            <form action="#" method="POST">
                <h2>Login</h2>
                <div class="input">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" id="username" placeholder="Username" autocomplete="off" autofocus required>
                </div>
                <div class="input">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
            <span>Don't have an account? <a href="registration.php" class="regis">Registration</a></span>
        </div>
    </div>

<?php
include 'template-auth/footer.php'
?>
    