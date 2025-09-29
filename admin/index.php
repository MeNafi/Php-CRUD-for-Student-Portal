<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: ../login.php"); exit(); }
include '../db.php';

$results = mysqli_query($conn, "SELECT * FROM students");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="student-container">
    <h1>⚡ Admin Dashboard</h1>
    <a href="add.php"><button>Add Result</button></a>
    <a href="../logout.php"><button>Logout</button></a>
    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll</th>
                <th>Subject</th>
                <th>Marks</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($results)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['roll'] ?></td>
                <td><?= $row['subject'] ?></td>
                <td><?= $row['marks'] ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id'] ?>"><button>Edit</button></a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')"><button>Delete</button></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
</body>
</html>
