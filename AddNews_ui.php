<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <title>Add News</title>
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
  <h2 class="mb-4">➕ Add new News</h2>
  <form action="addNews_logic.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">News Title: </label>
      <input type="text" class="form-control" name="title" placeholder="new News" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Category:</label>
      <?php 
      include "connectionToDataBase.php";
      $cats = $connection->query("SELECT id,categoryName FROM categories ");
      ?>
      <select name="categoryName" class="form-select" required>
        <option value="">Select category: </option>
        <?php if ($cats->num_rows > 0): ?>
            <?php while($row = $cats->fetch_assoc()): ?>
              <option value="<?= htmlspecialchars($row['categoryName']) ?>">
                      <?= htmlspecialchars($row['categoryName']) ?>
              </option>
              <?php endwhile;?>
              <?php endif;?>
    </select>
    </div>
    <div class="mb-3">
      <label class="form-label"> Details:</label>
      <textarea class="form-control" name="details" rows="5" placeholder="Write details" required></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">News Image</label>
        <input type="file" name="image" class="form-control" accept="image/*" required>
      </div>
    <button type="submit" class="btn btn-primary" name="save">💾 Save</button>
    <a href="viewNews.php" class="btn btn-secondary">⬅️ Back to News </a>
  </form>
</div>
</body>
</html>