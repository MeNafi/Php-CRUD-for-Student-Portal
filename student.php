<?php
include 'db.php';

$result = null;
if (isset($_POST['search'])) {
    $roll = $_POST['roll'];
    $query = "SELECT * FROM students WHERE roll='$roll'";
    $result = mysqli_query($conn, $query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Result Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="student-container">
    <h1>🎓 Student Result Portal</h1>
    <form method="post" class="search-box">
        <input type="text" name="roll" placeholder="Enter Roll Number" required>
        <button type="submit" name="search">🔍 Search</button>
    </form>

    <?php if ($result && mysqli_num_rows($result) > 0) { ?>
        <div class="table-container">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Subject</th>
                    <th>Marks</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['roll'] ?></td>
                        <td><?= $row['subject'] ?></td>
                        <td><?= $row['marks'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } elseif ($result) { ?>
        <p class="no-result">❌ No result found for this Roll Number</p>
    <?php } ?>
</div>
</body>
</html>
