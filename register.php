<?php
include 'templates/header.php';
?>
<h2>Register for accessing Member Only Benefit</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="registerForm">
    <!-- Input First name and last name fields, required  -->
    <label for="first_name">First Name<sup>*</sup></label>
    <input type="text" name="first_name" id="first_name" required>
    <label for="last_name">Last Name<sup>*</sup></label>
    <input type="text" name="last_name" id="last_name" required>
    <!-- Input Email field, type email and required  -->
    <label for="email">Email<sup>*</sup></label>
    <input type="email" name="email" id="email" autocomplete="email" required>
    <!-- Input password field, type password and required  -->
    <label for="password">Password<sup>*</sup></label>
    <input type="password" name="password" id="password" required>
    <input type="submit" name="submit" value="Register">
</form>
<?php
if (isset($_POST['submit'])) {
    // for checking/testing/reviewing:
    // print_r($_POST);
    /*
        Output:
        Array ( [username] => alexchow [password] => alex123 [submit] => Login )
    */
    // Store the input information in local variables
    $email = $_POST['email'];

    //check if the email is registered
    $sql = "SELECT * FROM users WHERE email=:email";
    $stmt = $pdo->prepare($sql);
    $isFound = $stmt->execute(['email' => $email]);

    //check if the email is already in the database
    if ($stmt->rowCount() == 0) {
        //save other information if the email is not registered
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        //prepare sql and bind param to insert the new registered user to database
        $sql = "INSERT INTO users (email,first_name,last_name,password) VALUES (:email, :first_name, :last_name, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(
            ':email',
            $email
        );
        $stmt->bindParam(
            ':password',
            $password
        );
        //store the insert result in a variable
        $isInserted = $stmt->execute();

        if ($isInserted) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;

            //redirect to member page if the registration is successful
            header("Location: member.php");
            exit();
        }
    } else {
        echo "The email has been already registered, Please try again with new Email!";
    }
}
include 'templates/footer.php';
?>