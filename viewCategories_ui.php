<?php
session_start();
$authId = $_SESSION["authUser"]["id"];
include "connectionToDataBase.php";
$sql = "SELECT * FROM categories ORDER BY id asc";
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <title>Veiw Categories</title>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
      <a class="navbar-brand fw-semibold" href="dashboard_ui.php">
        <i class="bi bi-newspaper me-2"></i>News Management
      </a>

      <div class="ms-auto">
        <a href="dashboard_ui.php" class="btn btn-outline-secondary">
          <i class="bi bi-arrow-left"></i> Back to Dashboard
        </a>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
        <div class="card p-4 shadow">
    <table border="1px" width="100%" class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
        <tr>
          <th>Id</th>
          <th>CategoryName</th>
          <th>Description</th>
        </tr>
        </thead>
        <?php
        if($result->num_rows != 0){
            while($row = $result->fetch_assoc()){?>
                <tr>
                  <td>
                    <?php echo $row["id"];?>
            </td>
                  <td>
                        <?php echo $row["categoryName"]; ?>
                    </td>
                    <td>
                        <?php echo $row["description"]; ?>
                    </td>
            </tr>
            <?php
            }
        } 
        ?>
        </table>
    </div>
    </div>
</body>
</html>