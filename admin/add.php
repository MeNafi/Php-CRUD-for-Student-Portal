<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: ../login.php"); exit(); }
include '../db.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];

    mysqli_query($conn, "INSERT INTO students (name, roll, subject, marks) VALUES ('$name','$roll','$subject','$marks')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><title>Add Result</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="student-container">
<h1>➕ Add Student Result</h1>
<form method="post">
    <input type="text" name="name" placeholder="Student Name" required>
    <input type="text" name="roll" placeholder="Roll Number" required>
    <input type="text" name="subject" placeholder="Subject" required>
    <input type="number" name="marks" placeholder="Marks" required>
    <button type="submit" name="add">Add Result</button>
</form>
</div>
</body>
</html>
