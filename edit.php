<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM employees WHERE id=$id");
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    $sql = "UPDATE employees SET name='$name', check_in='$check_in', check_out='$check_out' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
</head>
<body>

<h2>Edit Employee</h2>
<form action="edit.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
    <input type="datetime-local" name="check_in" value="<?php echo date('Y-m-d\TH:i', strtotime($row['check_in'])); ?>" required>
    <input type="datetime-local" name="check_out" value="<?php echo date('Y-m-d\TH:i', strtotime($row['check_out'])); ?>" required>
    <button type="submit" name="update">Update Employee</button>
</form>

</body>
</html>
