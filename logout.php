<?php
include 'templates/header.php';
?>
<?php
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    //destroy the session and redirect back to index page
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
<?php
include 'templates/footer.php';
?>