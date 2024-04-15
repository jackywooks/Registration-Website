<?php
// Include database config file => to get the PDO object 
require_once 'config/dbconfig.php';
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
session_start();
?>
<!DOCTYPE HTML> <!-- Using full HTML 5 -->
<html>

<head>
    <meta charset="utf-8">
    <title>PHP Final Assignment</title>
    <meta name="author" content="Carlos Aragundi Rivas, Erick Ovando Perez, Jacky Woo">
    <meta name="description" content="Final PHP Assignment">
    <meta name="keywords" content="PHP">
    <link rel="icon" type="image/x-icon" href="/images/icon.png">
    <!-- Roboto Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Styles -->
    <style>
    <?php include 'css\styles.css'; ?>
    </style>
</head>

<body>
    <div id="container">
        <header id="banner">
            <h1>Final Assignment</h1>
            <h3>Users' Info Using PHP with MySQL</h3>
        </header>
        <div id="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <!-- If user logged in, show member and logout page. If not, show register page -->
                <?php if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) : ?>
                    <li><a href="register.php">Register</a></li>
                <?php else : ?>
                    <li><a href="member.php">Member</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php endif; ?>

                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
        <div class="main-content">