<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wpl_db";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_GET['id'])) {
    die("User ID is missing.");
}

$id = $_GET['id'];
$query = "SELECT * FROM users2 WHERE id = $id";
$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("User not found.");
}

$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #fbc2eb, #a6c1ee);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }
    .card {
      width: 100%;
      max-width: 450px;
      border-radius: 1rem;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .card-header {
      background-color: #7e57c2;
      color: #fff;
      border-radius: 1rem 1rem 0 0;
      text-align: center;
    }
    .btn-back {
      background-color: #7e57c2;
      color: white;
      border: none;
    }
    .btn-back:hover {
      background-color: #5e35b1;
    }
  </style>
</head>
<body>

<div class="card">
  <div class="card-header py-3">
    <h4>User Details</h4>
  </div>
  <div class="card-body">
    <p><strong>Name:</strong> <?php echo $data['name']; ?></p>
    <p><strong>Email:</strong> <?php echo $data['email']; ?></p>
    <p><strong>Password:</strong> <?php echo $data['password']; ?></p>
    <p><strong>Contact:</strong> <?php echo $data['contact']; ?></p>
    <div class="text-center mt-4">
      <a href="display.php" class="btn btn-back">← Back to List</a>
    </div>
  </div>
</div>

</body>
</html>