<?php
$con = mysqli_connect("localhost", "root", "", "wpl_db");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "DELETE FROM users2 WHERE id = $id;";
    mysqli_query($con, $query);
}

header("Location: display.php");
exit();
?>