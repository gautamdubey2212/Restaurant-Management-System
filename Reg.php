<?php

include "Db.php";

if ($_SERVER["REQUEST_METHOD"]==="POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    
    $check = $conn->prepare("SELECT id FROM Reg WHERE Email=?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "Email already exists!";
        exit();
    }

   
    $sql = $conn->prepare("INSERT INTO Reg (Name, Email, Pasword) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $name, $email, $password);

    if ($sql->execute()) {
        header("Location: Login.php");
    } else {
        echo "Error occurred!!";
    }
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


body {
    background: linear-gradient(-45deg, #00c6ff, #0072ff, #ff7e5f, #feb47b);
    background-size: 400% 400%;
    animation: gradientBG 10s ease infinite;
    min-height: 100vh;
}


@keyframes gradientBG {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}


.container {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(12px);
    border-radius: 15px;
    animation: fadeInUp 0.8s ease;
}


@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


.form-control:focus {
    border-color: #00c6ff;
    box-shadow: 0 0 10px rgba(0, 198, 255, 0.6);
}

.btn {
    transition: 0.3s ease;
}

.btn:hover {
    transform: scale(1.05);
    background-color: #0072ff !important;
    border: none;
}


h3 {
    color: white;
    font-weight: bold;
    animation: fadeIn 1s ease;
}


@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.container {
    transform: translateY(0);
    transition: 0.3s;
}

.container:hover {
    transform: translateY(-5px);
}

</style>
        
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <h3 class="text-center mt-5">Register with us!!!</h3>

            <form action="" method="POST">
                <div
                    class="container rounded shadow border mt-5 col-5 p-5"
                >
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            id="name"
                            placeholder="Enter Name"
                        />
                        <label for="formId1">Name</label>
                    </div>

                     <div class="form-floating mb-3">
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            id="email"
                            placeholder="Enter Email"
                        />
                        <label for="formId1">Email</label>
                    </div>

                     <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="password"
                            id="password"
                            placeholder="Enter Password"
                        />
                        <label for="formId1">Password</label>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary w-100"
                    >
                        Submit
                    </button>
                    
                    
                </div>
                
            </form>

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
