<?php
session_start();
$authId = $_SESSION["authUser"]["id"];
include "connectionToDataBase.php";
$sql = "SELECT * FROM news WHERE is_deleted = 0";
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <title>View News</title>
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
          <th>Title</th>
          <th>Category</th>
          <th>Details</th>
          <th>Image</th>
          <th>User_id</th>
          <th>Operation</th>
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
                        <?php echo $row["title"]; ?>
                    </td>
                    <td>
                        <?php echo $row["categoryName"]; ?>
                    </td>
                    <td>
                        <?php echo $row["details"]; ?>
                    </td>
                    <td>
                    <?php
                       $src = $row['image'];
                       $fs  = __DIR__ . '/' . ltrim($src, '/'); 
                    ?>
                    <?php if (!empty($src) && file_exists($fs)): ?>
                       <img src="<?= htmlspecialchars($src, ENT_QUOTES, 'UTF-8') ?>"
                          alt="news" width="100" height="70" style="object-fit:cover;border-radius:6px;">
                    <?php else: ?>(fail)<?php endif; ?>
                    </td>
                    <td>
                      <?php echo $row["user_id"]; ?>
                    </td>
                    <td>
                      <a class="btn btn-sm btn-danger" href="ViewDeletedNews_logic.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure to delete the news?!');">🗑delete</a><br>
                      <a class="btn btn-sm btn-primary" href="updateNews_ui.php?id=<?= (int)$row['id'] ?>">update-news</a>
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