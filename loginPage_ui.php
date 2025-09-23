<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login Page</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">📰 News Management</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link text-danger" href="loginPage_ui.php">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="createAccount_ui.php">Sign Up</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container py-5">
    <div class="card shadow-lg">
        <div class="card-body text-center">
    <center>
    <h1 class="mb-3"> 🔴📢 Welcome to News Managment website</h1>
    <br>
    <h2 class="text-muted mb-4">✏️Login to go to the website</h2>
    <?php
    if(isset($_GET["statusCode"])){
        if($_GET["statusCode"]=="201"){
            echo "<b> Account Created successfully 🙌 </b>";
        }
    }
   ?>
     </center>
    <center>
    <form action="loginPage_logic.php" method="post">
    <label>Email: </label>
    <input type="email" name ="email">
    <br><br>
    <label>Password: </label>
    <input type="password" name ="password">
    <br><br>
    <input type="submit" name ="login" value="login" class="btn btn-danger">
    </form>
</center>
</body>
</html>