<?php 
include('config/connect.php');
if(isset($_SESSION['user_id'])){
    $user_logged = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM users WHERE id = '$_SESSION[user_id]'"));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Blog App</title>
    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white py-3">
        <div class="container">
            <a href="." class="navbar-brand text-uppercase">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav gap-3 mx-auto">
                    <li class="nav-item"><a href="." class="nav-link <?= ($title == 'Homepage') ? 'active' : '' ?>">Home</a></li>
                    <li class="nav-item"><a href="." class="nav-link <?= ($title == 'Detail') ? 'active' : '' ?>">Blog</a></li>
                    <li class="nav-item"><a href="." class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="." class="nav-link">About Us</a></li>
                </ul>
                <ul class="navbar-nav gap-3">
                    <?php
                        if(!isset($_SESSION['user_id'])) {
                            ?>
                                <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                                <li class="nav-item"><a href="register.php" class="btn btn-primary rounded-pill fw-medium px-4 py-2">Register</a></li>
                            <?php
                        } else {
                            ?>
                                <li class="nav-item"><a href="blogger/" class="nav-link active">Hi, <?= $user_logged['name'] ?></a></li>
                                <li class="nav-item"><a href="php/logout.php" class="nav-link">Logout</a></li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>