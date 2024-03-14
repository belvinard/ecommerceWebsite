<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$dbname = "myStores";
$server = "localhost";
$login = "root";
$pass = "";

try {
    $con = new PDO("mysql:host=$server;dbname=$dbname", $login, $pass);

    if($con){
        // Output a success message
        //echo "Connected to the database ";
    }


} catch (PDOException $e) {
    // Output an error message if an exception occurs
    echo "Error: " . $e->getMessage();
}
?>
