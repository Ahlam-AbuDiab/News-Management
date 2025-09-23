<?php
include "connectionToDataBase.php";
function system_count(mysqli $connection, string $sql): int {
    $res = $connection->query($sql);
    if ($res && ($row = $res->fetch_row())) {
        return (int)$row[0];
    }
    return 0;
}
$newsCount=system_count($connection,"SELECT COUNT(*) FROM news WHERE is_deleted = 0");
$deletedNewsCount= system_count($connection,"SELECT COUNT(*) FROM news WHERE is_deleted = 1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>News</title>
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
          <a class="nav-link" href="viewCategories.php">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="viewNews.php">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="loginPage_ui.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
       
        <div class="container text-center mt-5">
    <div class="card shadow p-5">
      <div>
                 <center>
            <h1 class="mb-4">👋Hello to News</h1>
        </center> 
</div>
      <p class="lead">What do you think?</p>
      <div class="d-flex justify-content-center gap-3 mt-4">
       <a href="viewNews_ui.php" class="btn btn-outline-info">📋 View News</a>
        <a href="AddNews_ui.php"  class="btn btn-warning text-dark">➕ Add News</a>
      </div>
      <div class="d-flex justify-content-center gap-3 mt-4">
         <h4 class="text-muted mb-4"><?php echo "we have ".number_format($newsCount)."news";?></h4>
  </div>
  <div class="d-flex justify-content-center gap-3 mt-4">
       <a href="viewDeletedNews_ui.php" class="btn btn-danger">❌ View Deleted News</a>
</div>
  <div class="d-flex justify-content-center gap-3 mt-4">
         <h4 class="text-muted mb-4"><?php echo "we have ".number_format($deletedNewsCount)."Deleted news"?></h4>
</div>
      <div class="d-flex justify-content-center gap-3 mt-4">
        <a class="btn btn-outline-info" href="dashboard_ui.php">👈 Back to Dashboard</a>
</div>
    </div>
  </div>
</div>
</body>
</html>