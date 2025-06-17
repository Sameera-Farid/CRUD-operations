<?php
$con = mysqli_connect("localhost", "root", "", "wpl_db");

$query = "SELECT id, name, email, password, contact FROM users2;";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_all($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      background: linear-gradient(to right, #8e9eab, #eef2f3);
      font-family: 'Segoe UI', sans-serif;
    }
    .container {
      margin-top: 60px;
    }
    .table-container {
      background: #fff;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    .btn-edit {
      background-color: #4caf50;
      color: white;
    }
    .btn-edit:hover {
      background-color: #45a049;
    }
    .btn-delete {
      background-color: #f44336;
      color: white;
    }
    .btn-delete:hover {
      background-color: #da190b;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="table-container">
      <h2 class="text-center mb-4 text-primary">User List</h2>
      <table class="table table-hover table-bordered align-middle">
        <thead class="table-dark">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Contact</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php for($i = 0; $i < count($data); $i++) { ?>
            <tr>
              <td><?php echo htmlspecialchars($data[$i][1]) ?></td>
              <td><?php echo htmlspecialchars($data[$i][2]) ?></td>
              <td><?php echo htmlspecialchars($data[$i][3]) ?></td>
              <td><?php echo htmlspecialchars($data[$i][4]) ?></td>
              <td>
                <a href="view.php?id=<?php echo $data[$i][0]; ?>" class="btn btn-info btn-sm">View</a>
                <a href="edit.php?id=<?php echo $data[$i][0] ?>" class="btn btn-sm btn-edit">Edit</a>
                <a href="delete.php?id=<?php echo $data[$i][0] ?>" class="btn btn-sm btn-delete">Delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>