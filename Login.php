<?php

include "Db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Reg WHERE Email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        if (password_verify($password, $row['Pasword'])) {

            $_SESSION['user'] = $row['id'];

            header("Location: Home.php");
            exit();

        } else {
            echo "❌ Wrong Password!";
        }

    } else {
        echo "❌ User not found!";
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
    background: linear-gradient(-45deg, #667eea, #764ba2, #ff7e5f, #feb47b);
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
    border-color: #ff7e5f;
    box-shadow: 0 0 10px rgba(255, 126, 95, 0.5);
}


.btn {
    transition: 0.3s ease;
}

.btn:hover {
    transform: scale(1.05);
    background-color: #ff7e5f !important;
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
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border-radius: 15px;
}

</style>
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <h3 class="text-center mt-5">Login with us!!!</h3>

            <form action="" method="POST">
                <div
                    class="container rounded shadow border mt-5 col-5 p-5"
                >
                    <div class="form-floating mb-3">
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            id="email"
                            placeholder="Enter email"
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
