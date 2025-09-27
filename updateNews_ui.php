<?php
include "connectionToDataBase.php";
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$sql = "SELECT * FROM news WHERE id=$id";
$result = $connection->query($sql);
if ($result && $result->num_rows > 0) {
    $news = $result->fetch_assoc();
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <title>Update News</title>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
      <a class="navbar-brand fw-semibold" href="dashboard_ui.php">
        <i class="bi bi-newspaper me-2"></i>News Management
      </a>

      <div class="ms-auto">
        <a href="viewNews_ui.php" class="btn btn-outline-secondary">
          <i class="bi bi-arrow-left"></i> Back to news
        </a>
      </div>
    </div>
</nav>
<center>
        <h1 class="mb-4">Welcome in News update page</h1>
        </center>
        <center>
        <div class="container mt-5">
  <h2 class="mb-4">🆕 Update News</h2>
    <div class="mb-3">
        <form action="updateNews_logic.php" method="post" enctype="multipart/form-data">
            <input  type="hidden" name ="id" value="<?php echo $_GET["id"];?>">
            <div class="mb-3">
                <input class="form-control" type="text" name="new_title" placeholder="title" value="<?= htmlspecialchars($news['title']) ?>">
                <br>
            </div>
            <div class="mb-3">
      <?php 
      include "connectionToDataBase.php";
      $cats = $connection->query("SELECT id,categoryName FROM categories ");
      ?>
      <select name="new_categoryName" class="form-select" required>
    <?php if ($cats->num_rows > 0): ?>
        <?php while($row = $cats->fetch_assoc()): ?>
            <option value="<?= htmlspecialchars($row['categoryName']) ?>"
                <?= ($news['categoryName'] === $row['categoryName']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($row['categoryName']) ?>
            </option>
        <?php endwhile; ?>
    <?php endif; ?>
</select>
    </div>
            <div class="mb-3">
                <textarea class="form-control" name="new_details"rows ="3"  placeholder="details"><?= htmlspecialchars($news['details']) ?></textarea>
                <br>
            </div>
            <div class="mb-3">
    <div class="form-label"></div>
    <?php if (!empty($news['image'])): ?>
      <img src="<?= htmlspecialchars($news['image'], ENT_QUOTES) ?>" alt="old"
           width="120" height="85" style="object-fit:cover;border-radius:6px">
    <?php else: ?>
    <?php endif; ?>
    <input type="hidden" name="current_image"
         value="<?= htmlspecialchars($news['image'] ?? '', ENT_QUOTES) ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">new image(optional)</label>
    <input type="file" name="image" accept="image/*" class="form-control">
  </div>
            <button type="submit" class="btn btn-primary" name="save">💾 Save</button>
        
            </div>
            </div>

          </form>
            </center> 
            </body>
            </html>
