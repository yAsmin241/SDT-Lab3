<!-- <?php
    include "db_conn.php";
    ?> -->
    
    <html>
    <head>
        <title>Login</title>
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="style.css">
        <style>
            body {
                background: url('utm3.jpg') no-repeat center center fixed;
                background-size: cover;
            }
            .card {
                backdrop-filter: blur(10px);
                border-radius: 15px;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            }
            .card-title {
                color: #444;
                font-weight: bold;
            }
            .btn-primary {
                background-color: #0056b3;
                border: none;
            }
            .btn-primary:hover {
                background-color: #004099;
            }
            .link {
                color: #0056b3;
            }
        </style>
    
    </head>
    <body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="card p-4" style="width: 22rem; background-color: rgb(245, 245, 247);">
                <div class="text-center mb-3">
                    <i class="bi bi-person-circle" style="font-size: 60px; color: #333;"></i>
                </div>   
                <h2 class="card-title text-center">LOGIN</h2>
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Usernmae:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">LOGIN</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <a href="register.php">Register Here!</a>
                </div>
            </div>
        </div>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    </body>
    </html>
    
    <?php
    session_start(); // Starting Session
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // Check if form is submitted
        $username = mysqli_real_escape_string($conn, $_POST['username']); // Get the username value from the form
        $password = $_POST['password']; // Get the password value from the form
    
        $sql = "SELECT * FROM students_reg WHERE username = '$username'"; // Query the database for user
        $result = mysqli_query($conn, $sql); // Run the query
    
        if (mysqli_num_rows($result) == 1) { // Check if user exists
            $row = mysqli_fetch_assoc($result); // Get the data from the database
            if (password_verify($password, $row['password'])) { // Check if the password matches
                $_SESSION['username'] = $username; // Set the session variable
                header("Location: index.php"); // Redirect to the home page
            } else { // If the password doesn't match
                echo "Invalid username or password"; // Display an error message
            }
        } else { // If the user doesn't exist
            echo "No user found with that username"; // Display an error message
        }
    }
    ?>
    