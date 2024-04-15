<?php
include 'templates/header.php';

if (isset($_POST['submit'])) {
    echo '<br><div class="info"><img src="./images/info.png" alt="logo">Your response is submitted. We will reply you in 2 working days. Thank you for trusting us!</b></div>';
}

?>

<h2>Contact Us</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="contactForm">
    <!-- Input name and last name -->
    <label for="name">Name<sup>*</sup></label>
    <input type="text" name="name" id="name" required placeholder="Full Name">

    <!-- Input Email -->
    <label for="email">Email<sup>*</sup></label>
    <input type="email" name="email" id="email" required>

    <!-- Input Messagge -->
    <label for="message">Message<sup>*</sup></label>
    <textarea name="message" id="message" rows="4" required></textarea>
    <!-- send button -->
    <input type="submit" name="submit" value="Send">
</form>

<?php
include 'templates/footer.php';
?>