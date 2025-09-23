<?php
include "connectionToDataBase.php";
session_start();
if(isset($_SESSION["authUser"])!=true){
    header("Location:loginPage_ui.php");
}
$name = $_SESSION["authUser"]["name"];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard Page</title>
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
          <a class="nav-link active" href="dashboard_ui.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewCategories.php">Categories</a>
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

<div class="container py-2">
  <div class="hero-logo text-center mb-3">    
    <div class="card shadow-lg">
        <div class="card-body ">
          <img src="news.jpeg" width=200 height= 200>
        <h1 class="mb-3">👋Hello <?php echo $type;echo " "; echo $name?></h1>
      <p class="text-muted mb-4">Welcome to your dashboard. Use the options below:</p>
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <div>
        <a href="addCategory_ui.php" class="btn btn-success">➕ Add Category</a>
        <a href="viewCategories_ui.php" class="btn btn-outline-primary">📋 View Categories</a>
</div>
        <div>
        <a href="viewNews_ui.php" class="btn btn-outline-info">📋 View News</a>
        <a href="AddNews_ui.php"  class="btn btn-warning text-dark">➕ Add News</a>
</div>
        <div>
        <a href="viewDeletedNews_ui.php" class="btn btn-danger";>❌ View Deleted News</a>
</div>
        </div>
        
</div>
<div>
        <img src="chart2.jpg" width="380" height="380" alt="Chart">
      </div>
      
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>