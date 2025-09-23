<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create Account Page</title>
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
          <a class="nav-link text-danger" href="loginPage_ui.php">Log In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="createAccount_ui.php">Sign Up</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <center>
        <div class="container py-5">
        <div class="card shadow-lg">
        <div class="card-body text-center">
        <h1 class="mb-3"> 🔴📢 Welcome to News Managment website</h1>
        <h2 class="text-muted mb-4">🚻 Create account to login to website ↙️</h2>
        <br>
        <form action="createAccount_logic.php" method="post">
        <label>Name: </label>
        <input type="text" name="name" placeholder="name">
        <br><br>
        <label>Email: </label>
        <input type="email" name="email" placeholder="email">
        <br><br>
        <label>Password: </label>
        <input type="password" name="password" placeholder="password">
        <br><br><br>
        <input type="submit" value="create" name="create_account" class="btn btn-danger">
        </form>
    </center>
</body>
</html>