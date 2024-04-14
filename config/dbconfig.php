<?php
//DB Connection Info.
$host = 'localhost';
$dbname = 'accounts';
$user = 'root';
$password = ''; // Empty by default 

$dsn = "mysql:host=$host;dbname=$dbname; port=3307"; //Using 3307 Port

try {
    //Creating New PDO Object
    $pdo = new PDO($dsn, $user, $password);
    //Testing Statement
    // echo "Connection Done!";
} catch (PDOException $e) {
    //Print the Error Message if connection failed
    echo "Database Connection failed: " . $e->getMessage();
    // Using the keyword "throw" to STOP the execution of our app and display the error message
    throw new PDOException($e->getMessage());
}
