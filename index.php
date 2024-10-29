<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Logbook</title>
</head>
<body>

<h2>Employee Logbook</h2>

<!-- Add New Entry Form -->
<form action="add.php" method="POST">
    <input type="text" name="name" placeholder="Employee Name" required>
    <input type="datetime-local" name="check_in" required>
    <input type="datetime-local" name="check_out" required>
    <button type="submit" name="add">Add Employee</button>
</form>

<!-- Display Logbook Records -->
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Check-In</th>
        <th>Check-Out</th>
        <th>Actions</th>
    </tr>

    <?php
    $result = $conn->query("SELECT * FROM employees");
    while ($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['check_in']; ?></td>
        <td><?php echo $row['check_out']; ?></td>
        <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>

<?php $conn->close(); ?>
