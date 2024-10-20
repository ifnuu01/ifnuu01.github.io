<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSTTEST 7</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <section class="sidebar">
        <div class="user logo">
        <i class="fa-solid fa-user"></i>
            <span>Admin</span>
        </div>
        <hr>
        <div class="menu">
            <ul>
                <li><a href="admin.php"><i class="fa-solid fa-list-check"></i><span> Management Pets</span></a></li>
                <li><a href="#" id="change-pass"><i class="fa-solid fa-user-pen"></i><span>Change Password</span></a></li>
                <li><form action="logout.php" method="post">
                    <input class="btn-logout" id="logout" type="submit" name="logout" value="Logout" onclick="return confirm('Are you sure you want to logout?');">
                </form></li>
            </ul>
        </div>
    </section>

    <section class="navbar">
        <div class="menu">
            <div class="burger"><i class="fa-solid fa-bars"></i></div>
            <div class="logo">Dashboard Pets</div>
            <div class="sun"><i class="fa-solid fa-moon"></i></div>
        </div>
    </section>

    
