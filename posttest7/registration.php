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
    register();
}
$pageTitle = 'Registration Page';
include 'template-auth/header.php'
?>
    <div class="container">
        <div class="registration-page">
            <form action="#" method="POST">
                <h2>Registration</h2>
                <div class="input">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" id="username" placeholder="Username" autocomplete="off" autofocus required>
                </div>
                <div class="input">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="Email" autocomplete="off" required>
                </div>
                <div class="input">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password"  name="password" id="password" placeholder="Password" autocomplete="off" required>
                </div>
                <button type="submit" class="btn">Registration</button>
            </form>
            <span>Already have an account? <a href="login.php" class="login">Login</a></span>
        </div>
    </div>

<?php
include 'template-auth/footer.php'
?>
    