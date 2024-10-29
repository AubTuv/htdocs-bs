<?php
include 'db.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    $sql = "INSERT INTO employees (name, check_in, check_out) VALUES ('$name', '$check_in', '$check_out')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
