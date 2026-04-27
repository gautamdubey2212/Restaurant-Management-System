<?php
include "Db.php";

if (!isset($_GET['id'])) {
    header("Location: Home.php");
}
$id = $_GET['id'];

$result = $conn->query("SELECT * FROM menu WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $cat = $_POST['category'];

    // IMAGE CHECK
    if ($_FILES['image']['name'] != "") {
        $img = time() . "_" . $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp, "uploads/" . $img);
    } else {
        $img = $row['image']; 
    }

    
    $sql = "UPDATE menu SET 
            name='$name', 
            description='$desc', 
            price='$price', 
            category='$cat', 
            image='$img' 
            WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: Home.php");
        exit();
    } else {
        echo "Update Failed!";
    };
};
?>

<!doctype html>
<html lang="en">
<head>
    <title>Edit Menu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5 col-6 p-4 shadow border rounded">

    <h3 class="text-center mb-4">✏️ Edit Menu Item</h3>

    <form method="POST" enctype="multipart/form-data">

        <!-- Name -->
        <div class="mb-3">
            <label>Item Name</label>
            <input type="text" name="name" class="form-control" 
                   value="<?= $row['name'] ?>" required>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label>Description</label>
            <input type="text" name="desc" class="form-control" 
                   value="<?= $row['description'] ?>" required>
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control" 
                   value="<?= $row['price'] ?>" required>
        </div>

        <!-- Category -->
        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control" 
                   value="<?= $row['category'] ?>" required>
        </div>

        <!-- Old Image -->
        <div class="mb-3">
            <label>Current Image</label><br>
            <img src="uploads/<?= $row['image'] ?>" width="120" class="mb-2">
        </div>

        <!-- New Image -->
        <div class="mb-3">
            <label>Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-success w-100">
            Update Item
        </button>

    </form>

</div>

</body>
</html>