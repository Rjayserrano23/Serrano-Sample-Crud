<?php include 'db.php';
$result = $conn->query("SELECT * FROM books ORDER BY id DESC"); ?>
<!DOCTYPE html>
<html>
<head><title>Simple Library</title></head>
<body>
  <h2>Library Books</h2>
  <a href="create.php">+ Add Book</a><br><br>
  <table border="1" cellpadding="8">
    <tr><th>ID</th><th>Title</th><th>Author</th><th>Year</th><th>Status</th><th>Actions</th></tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= htmlspecialchars($row['title']) ?></td>
      <td><?= htmlspecialchars($row['author']) ?></td>
      <td><?= $row['year_published'] ?></td>
      <td><?= htmlspecialchars($row['status']) ?></td>
      <td>
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this book?')">Delete</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
