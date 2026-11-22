<?php include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("INSERT INTO books (title, author, year_published, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $_POST['title'], $_POST['author'], $_POST['year'], $_POST['status']);
    $stmt->execute();
    header("Location: index.php");
    exit;
} ?>
<!DOCTYPE html>
<html>
<head><title>Add Book</title></head>
<body>
  <h2>Add Book</h2>
  <form method="POST">
    Title: <input type="text" name="title" required><br><br>
    Author: <input type="text" name="author" required><br><br>
    Year: <input type="number" name="year" required><br><br>
    Status:
    <select name="status">
      <option>Available</option>
      <option>Borrowed</option>
    </select><br><br>
    <button type="submit">Save</button>
    <a href="index.php">Cancel</a>
  </form>
</body>
</html>
