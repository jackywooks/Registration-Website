<?php
include 'templates/header.php';

?>

<?php
session_start();
session_destroy();
header("Location: index.php");
exit();
?>

<?php
include 'templates/footer.php';
?>