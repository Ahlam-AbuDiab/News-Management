<?php
include "connectionToDataBase.php";
function system_count(mysqli $connection, string $sql): int {
    $res = $connection->query($sql);
    if ($res && ($row = $res->fetch_row())) {
        return (int)$row[0];
    }
    return 0;
}
$categoriesCount= system_count($connection,"SELECT COUNT(*) FROM categories");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Categories</title>
</head>
    <body class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">📰 News Management</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="dashboard_ui.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="viewCategories.php">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewNews.php">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="loginPage_ui.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
        <center>
            <h1 class="mb-4">👋Hello to Categories</h1>
        </center> 
        <div class="container text-center mt-5">
    <div class="card shadow p-5">
      <p class="lead">What do you think?</p>
      <div class="d-flex justify-content-center gap-3 mt-4">
        
        <a href="addCategory_ui.php" class="btn btn-primary btn-lg">➕ Add Category</a>
        <a href="viewCategories_ui.php" class="btn btn-success btn-lg">📋 View Categories</a>
        </div>
        <div class="d-flex justify-content-center gap-3 mt-4">
       <h4 class="text-muted mb-4"><?php echo "we have ".number_format($categoriesCount)."categories";?></h4>
        <br><br>
      </div> 
      <div class="d-flex justify-content-center gap-3 mt-4">
        <a class="btn btn-outline-info" href="dashboard_ui.php">👈 Back to Dashboard</a>
</div>
<div>
  <img src="images.jpeg" width="380" height="380" alt="Illustration">
</div>
    </div>
  </div>

</body>
</html>