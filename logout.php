<?php
include 'templates/header.php';

?>

<?php
session_start();
//destroy the session and redirect back to index page
session_destroy();
header("Location: index.php");
exit();
?>

<?php
include 'templates/footer.php';
?>