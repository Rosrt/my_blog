<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Login first!");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $sql = "DELETE FROM posts WHERE id=$id AND user_id=$user_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
