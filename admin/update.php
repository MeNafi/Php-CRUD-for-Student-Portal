<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: ../login.php"); exit(); }
include '../db.php';

$id = $_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$data = mysqli_fetch_assoc($res);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];

    mysqli_query($conn, "UPDATE students SET name='$name', roll='$roll', subject='$subject', marks='$marks' WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><title>Update Result</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="student-container">
<h1>✏️ Update Result</h1>
<form method="post">
    <input type="text" name="name" value="<?= $data['name'] ?>" required>
    <input type="text" name="roll" value="<?= $data['roll'] ?>" required>
    <input type="text" name="subject" value="<?= $data['subject'] ?>" required>
    <input type="number" name="marks" value="<?= $data['marks'] ?>" required>
    <button type="submit" name="update">Update Result</button>
</form>
</div>
</body>
</html>
