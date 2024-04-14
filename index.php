<?php
include 'templates/header.php';
// echo "<br>Session Info:</br>";
var_dump($_SESSION);
// Warning: Undefined global variable $_SESSION => if you not run session_start()
if (isset($_POST['submit'])) {
   // for checking/testing/reviewing:
   print_r($_POST);
   /*
        Output:
        Array ( [username] => alexchow [password] => alex123 [submit] => Login )
    */
   $email = $_POST['email'];
   $password = $_POST['password'];
   echo "$email and $password";
   // Associative Array => represents one record from our table in the DB:
   // Hard coding the values! 
   $oneRecord = [
      "user_id" => 1,
      "email" => "j@j.j",
      "password" => "jj"
   ];

   if ($email == $oneRecord['email'] && $password == $oneRecord['password']) {
      echo "<br>Credentials are ok!";
      // It's better to use the keys as string values (Associative Array):
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;

      //redirect to member page if the login is successful
      header("Location: member.php");
      exit();
   } else {
      echo "<br>Invalid Credentials!";
   }
}
?>
<h2>Home Page</h2>
<p>Welcome to the PHP Regstiration Website</p>
<p>In here, you can login if you have a account below,</p>
<p><a href="register.php">register</a> a new account,</p>
<p>or <a href="contact.php">contact</a> us if you have any query</p>
<p>Enjoy your journey here</p>

<?php if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) : ?>
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form">
      <!-- Input Email field, type email and required  -->
      <label for="email">Email<sup>*</sup></label>
      <input type="email" name="email" id="email" autocomplete="email" required>
      <!-- Input password field, type password and required  -->
      <label for="password">Password<sup>*</sup></label>
      <input type="password" name="password" id="password" required>
      <input type="submit" name="submit" value="Login">
   </form>
<?php endif; ?>
<?php
include 'templates/footer.php';
?>