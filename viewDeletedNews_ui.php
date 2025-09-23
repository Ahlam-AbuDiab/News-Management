<?php
include "connectionToDataBase.php";
$sql = "SELECT * FROM news WHERE is_deleted = 1";
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <title>Veiw Deleted News</title>
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
  <center>
        <h1 class="mb-4">Deleted News Page</h1>
  </center>
  <center>
  <div class="container mt-5">
  <h2 class="mb-4">📑🗑️ All Deleted News</h2>
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
          <th>Restore</th>
        </tr>
        </thead>
       <tbody>
      <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['categoryName']) ?></td>
            <td><?= htmlspecialchars($row['details']) ?></td>
            <td>
              <img src="<?= htmlspecialchars($row['image']) ?>" alt="News Image"
                   style="max-width:100px; max-height:100px;">
            </td>
            <td>
             <a class="btn btn-warning text-dark" href="returnDeletedNews_logic.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure to restart the news?!');">🆙restore</a><br>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="5" class="text-center">No deleted news</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
  <a href="viewNews_ui.php" class="btn btn-secondary">⬅️Back to news</a>
</div>
</body>
</html>
  