<?php
include "Db.php";
if (!isset($_SESSION['user'])) {
    header("Location: Login.php");
    exit();
};


if ($_SERVER["REQUEST_METHOD"]=="POST") {

    $name = $_POST["IM"];
    $desc = $_POST["desc"];
    $price = $_POST["price"];
    $cat = $_POST["category"];

    
    $img = $_FILES["image"]["name"];
    $tmp = $_FILES["image"]["tmp_name"];

    
    move_uploaded_file($tmp, "uploads/".$img);

   
    $sql = $conn->prepare("INSERT INTO menu (name, description, price, category, image) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("ssiss", $name, $desc, $price, $cat, $img);
    $sql->execute();

    header("Location: Home.php");
}

?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
       <style>


.table {
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 10px;
    overflow: hidden;
    color: white;
    animation: fadeIn 0.8s ease;
}


.table thead {
    background: rgba(0,0,0,0.7);
}


.table tbody tr {
    transition: 0.3s ease;
}

.table tbody tr:hover {
    background-color: white;
    color: black;
    transform: scale(1.02);
}


.card {
    transition: 0.3s ease;
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0px 10px 25px rgba(0,0,0,0.3);
}


.btn {
    transition: 0.3s;
}

.btn:hover {
    transform: scale(1.05);
}


@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

body {
    background: linear-gradient(-45deg, #ff9a9e, #fad0c4, #a1c4fd);
    background-size: 400% 400%;
    animation: gradientBG 10s ease infinite;
}

@keyframes gradientBG {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

</style>
    </head>

    <body>
        <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand fw-bold" href="#">🍽️ Restaurant Admin</a>

            <!-- Toggle Button -->
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">

                <!-- Left Menu -->
                <ul class="navbar-nav me-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="Home.php">🏠 Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="add_menu.php">➕ Add Menu</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="view_menu.php">📋 View Menu</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="export.php">📤 Export Data</a>
                    </li>

                </ul>

                <!-- Right Side Buttons -->
                <div class="d-flex gap-2">

                    <a href="Login.php" class="btn btn-danger btn-sm">
                        🚪 Logout
                    </a>

                    <a href="PDF.php" class="btn btn-warning btn-sm">
                        📄 PDF
                    </a>

                    <a href="Excel.php" class="btn btn-success btn-sm">
                        📊 Excel
                    </a>

                </div>

            </div>
        </div>
    </nav>
</header>
       <main class="container mt-4">

    <div id="foodCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#foodCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#foodCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#foodCarousel" data-bs-slide-to="2"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner rounded shadow">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591" class="d-block w-100 img-fluid" style="height:450px; object-fit:cover;">
                <div class="carousel-caption bg-dark bg-opacity-50 rounded p-2">
                    <h3>🍕 Special Pizza Offer</h3>
                    <p>Flat 20% Off on All Pizzas</p>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="https://t4.ftcdn.net/jpg/02/74/99/01/360_F_274990113_ffVRBygLkLCZAATF9lWymzE6bItMVuH1.jpg" class="d-block w-100 img-fluid" style="height:450px; object-fit:cover;">
                <div class="carousel-caption bg-dark bg-opacity-50 rounded p-2">
                    <h3>🍔 Buy 1 Get 1 Burger</h3>
                    <p>Limited Time Deal</p>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="https://t3.ftcdn.net/jpg/01/10/88/00/360_F_110880055_M33EaXgmhibNtdp1EvPKN1SpsOGOQqKd.jpg" class="d-block w-100 img-fluid" style="height:450px; object-fit:cover;">
                <div class="carousel-caption bg-dark bg-opacity-50 rounded p-2">
                    <h3>🍝 Italian Pasta Special</h3>
                    <p>Authentic Taste of Italy</p>
                </div>
            </div>

        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#foodCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#foodCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
     <section class="container mt-5 col-8 p-5 rounded shadow border">
        <h3 class="text-center">Add Menu Item</h3>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="IM"
                    id="IM"
                    placeholder=""
                />
                <label for="formId1">Item Name</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="desc"
                    id="desc"
                    placeholder=""
                />
                <label for="formId1">Description</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="price"
                    id="price"
                    placeholder=""
                />
                <label for="formId1">Price</label>
            </div>

             <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="category"
                    id="category"
                    placeholder=""
                />
                <label for="formId1">Category</label>
            </div>

             <div class="form-floating mb-3">
                <input
                    type="file"
                    class="form-control"
                    name="image"
                    id="image"
                    placeholder=""
                />
                <label for="formId1">Image</label>
            </div>

            <button
                type="submit"
                class="btn btn-success w-100"
            >
                Submit
            </button>
            
            
        </form>
        <?php
       $result2 = $conn->query("SELECT * FROM menu");
         ?>

<section class="container mt-5">
    <h3 class="text-center mb-4">🍽️ Menu Cards</h3>

    <div class="row">
        <?php while($row = $result2->fetch_assoc()) { ?>

        <div class="col-md-4 mb-4">
            <div class="card shadow h-100">

                
                <img src="uploads/<?= $row['image'] ?>" 
                     class="card-img-top" 
                     style="height:200px; object-fit:cover;">

                <div class="card-body text-center">
                    <h5><?= $row['name'] ?></h5>
                    <p><?= $row['description'] ?></p>

                    <h6 class="text-success">₹<?= $row['price'] ?></h6>
                    <p class="badge bg-info"><?= $row['category'] ?></p>

                    <div class="d-flex justify-content-center gap-2 mt-2">
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Delete this item?')">
                           Delete
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <?php } ?>
    </div>
</section>
        

    </section>

    <section class="container mt-5">
    <h3 class="mb-3 text-center">Menu Table</h3>

<?php


$result = $conn->query("SELECT * FROM menu");
?>

<table class="table table-bordered table-hover text-center align-middle">

    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

    <?php while($row = $result->fetch_assoc()) { ?>

        <tr>
            <td><?= $row['id'] ?></td>

            
            <td>
                <img src="uploads/<?= $row['image'] ?>" width="80" height="60">
            </td>

            <td><?= $row['name'] ?></td>
            <td><?= $row['description'] ?></td>
            <td>₹<?= $row['price'] ?></td>
            <td><?= $row['category'] ?></td>

           
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>

                <a href="delete.php?id=<?= $row['id'] ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Are you sure?')">
                   Delete
                </a>
            </td>
        </tr>

    <?php } ?>

    </tbody>
</table>

</section>

</main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
