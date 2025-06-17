<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wpl_db";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $pass     = $_POST['password'];
    $contact  = $_POST['contact'];

    $sql = "INSERT INTO users2 (name, email, password, contact) 
            VALUES ('$name', '$email', '$pass', '$contact')";

    if (mysqli_query($con, $sql)) {
        header("Location: display.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>