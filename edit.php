<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wpl_db";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users2 WHERE id = $id";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        die("User not found.");
    }
} else {
    die("No ID provided.");
}

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(135deg, #c2e9fb, #a1c4fd);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
    }
    .edit-form {
      background: #fff;
      padding: 2.5rem;
      border-radius: 1rem;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 450px;
    }
    .edit-form h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      color: #2c3e50;
    }
    .form-control:focus {
      border-color: #2980b9;
      box-shadow: 0 0 0 0.2rem rgba(41, 128, 185, 0.25);
    }
    .btn-primary {
      background-color: #2980b9;
      border: none;
    }
    .btn-primary:hover {
      background-color: #2471a3;
    }
  </style>
</head>
<body>

  <div class="edit-form">
    <h2>Edit User</h2>
    <form action="update_user.php" method="post">
      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

      <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" name="name" id="name" class="form-control" value="<?php echo $data['name']; ?>" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo $data['email']; ?>" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" value="<?php echo $data['password']; ?>" required>
      </div>

      <div class="mb-3">
        <label for="contact" class="form-label">Contact Number</label>
        <input type="number" name="contact" id="contact" class="form-control" value="<?php echo $data['contact']; ?>" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>

</body>
</html>