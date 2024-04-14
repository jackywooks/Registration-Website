<?php
include 'templates/header.php';
//setting the default fetch mode as fetching associative array

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

// if the form is submitted
if (isset($_POST['submit'])) {
   // for checking/testing/reviewing:
   // print_r($_POST);
   /*
        Output:
        Array ( [username] => alexchow [password] => alex123 [submit] => Login )
    */
   // Store the input information in local variables
   $email = $_POST['email'];
   $password = $_POST['password'];

   //select data from database based on the input
   $sqlQuery = "SELECT * FROM users WHERE email = ? and password = ?";
   //prepare the statement
   $stmt = $pdo->prepare($sqlQuery);

   //execute the statement
   $stmt->execute([$email, $password]);

   //fetch record from the database, as email is unique, only one record should return
   $userRecord = $stmt->fetch();
   //for testing
   // print_r($userRecord);
   //check the case if the user record return query, and the email and password match record in databases
   if ($userRecord == true && $email == $userRecord['email'] && $password == $userRecord['password']) {
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;
      $_SESSION['id'] = $userRecord['user_id'];
      $_SESSION['first_name'] = $userRecord['first_name'];
      $_SESSION['last_name'] = $userRecord['last_name'];

      //redirect to member page if the login is successful
      header("Location: member.php");
      exit();
   } else {
      echo "<br>Invalid Credential, Please try again!";
   }
}
include 'templates/footer.php';
?>