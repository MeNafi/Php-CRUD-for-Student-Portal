<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: ../login.php"); exit(); }
include '../db.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM students WHERE id=$id");
header("Location: index.php");
?>
