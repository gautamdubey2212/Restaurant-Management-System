<?php
include "Db.php";


if (!isset($_GET['id'])) {
    header("Location: Home.php");
    exit();
}

$id = $_GET['id'];

$result = $conn->query("SELECT image FROM menu WHERE id=$id");
$row = $result->fetch_assoc();

if ($row) {
    $imagePath = "uploads/" . $row['image'];

    // Agar file exist karti hai to delete karo
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}


$sql = "DELETE FROM menu WHERE id=$id";

if ($conn->query($sql)) {
    header("Location: Home.php");
    exit();
} else {
    echo "Delete Failed!";
}
?>