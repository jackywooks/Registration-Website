<?php
include 'templates/header.php';

//Redirect user to login page if he is not logged in
if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
    header('Location: index.php');
    exit();
}
?>
<h2><?php echo "Welcome" . " " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?></h2>
<p>From System Record,</p>
<p>Your email is <?php echo $_SESSION['email'] ?></p>
<p>Please proceed to purchase if you want </p>

<?php
include 'templates/footer.php';
?>