<?php
$con = mysqli_connect("localhost", "root", "", "wpl_db");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $contact = $_POST['contact'];

    $sql = "UPDATE users2 SET 
                name = '$name',
                email = '$email',
                password = '$pass',
                contact = '$contact'
            WHERE id = $id";

    if (mysqli_query($con, $sql)) {
        header("Location: display.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>