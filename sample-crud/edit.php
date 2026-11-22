<?php include 'db.php';
$id = (int)$_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("UPDATE books SET title=?, author=?, year_published=?, status=? WHERE id=?");
    $stmt->bind_param("ssisi", $_POST['title'], $_POST['author'], $_POST['year'], $_POST['status'], $id);
    $stmt->execute();
    header("Location: index.php");
    exit;
}
$stmt = $conn->prepare("SELECT * FROM books WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc(); ?>
<!DOCTYPE html>
<html>
<head><title>Edit Book</title></head>
<body>
  <h2>Edit Book</h2>
  <form method="POST">
    Title: <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required><br><br>
    Author: <input type="text" name="author" value="<?= htmlspecialchars($row['author']) ?>" required><br><br>
    Year: <input type="number" name="year" value="<?= $row['year_published'] ?>" required><br><br>
    Status:
    <select name="status">
      <option <?= $row['status']=='Available' ? 'selected' : '' ?>>Available</option>
      <option <?= $row['status']=='Borrowed' ? 'selected' : '' ?>>Borrowed</option>
    </select><br><br>
    <button type="submit">Update</button>
    <a href="index.php">Cancel</a>
  </form>
</body>
</html>
