<?php
include 'templates/header.php';
?>

<h2>Contact Us</h2>

<form action="process_contact.php" method="post" id="contactForm">
    <!-- Input name and last name -->
    <label for="name">Name<sup>*</sup></label>
    <input type="text" name="name" id="name" required placeholder="Full Name">

    <!-- Input Email -->
    <label for="email">Email<sup>*</sup></label>
    <input type="email" name="email" id="email" required>

    <!-- Input Messagge -->
    <label for="message">Message<sup>*</sup></label>
    <textarea name="message" id="message" rows="5" required></textarea>

    <!-- send button -->
    <input type="submit" name="submit" value="Send">
</form>

<?php
include 'templates/footer.php';
?>
