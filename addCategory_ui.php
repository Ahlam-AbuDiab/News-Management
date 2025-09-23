<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <title>Add Category</title>
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
  <h2 class="mb-4">➕ Add new Category</h2>
  <form action="addCategory_logic.php" method="post">
    <div class="mb-3">
      <label class="form-label">Category Name: </label>
      <input type="text" class="form-control" name="categoryName" placeholder="Sport News" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Description:</label>
      <textarea class="form-control" name="description" placeholder="Write a small description "></textarea>
    </div>
    <button type="submit" class="btn btn-primary"name="save">💾 Save</button>
    <a href="viewCategories.php" class="btn btn-secondary">⬅️ Back to Categories </a>
  </form>
</div>

</body>
</html>