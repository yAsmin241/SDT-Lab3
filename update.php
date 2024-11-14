<?php
session_start(); //starting session
if(!isset ($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
?>


<html>
<head>
    <title>Update Students</title>
    <link rel="stylesheet"  href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <header>
        <h2>Student Information Registration System</h2>
    </header><br>

    <?php
        include "db_conn.php";

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM students WHERE id=$id";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
        }

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $programme = $_POST['programme'];
            $year = $_POST['year'];
        
            $sql = "UPDATE students SET name='$name', email='$email', programme='$programme', year='$year' WHERE id='$id'";
    
            if(mysqli_query ($conn, $sql)){
                echo "<div class='success-record'>Record is successfully updated!</div>";
            } else{
                echo "Error: ".sql. "<br>" . mysqli_error($conn); 
            }
        }
    ?>
    
    <div class="container form-container">
        <h2 class="form-title">Update Students</h2>
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter student name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter student email" required>
            </div>
            <div class="mb-3">
                <label for="program" class="form-label">Program of Study:</label>
                <select class="form-select" id="program">
                    <option value="data-engineering" selected>Data Engineering</option>
                    <option value="computer-science">Computer Science</option>
                    <option value="information-technology">Information Technology</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year of Study:</label>
                <select class="form-select" id="year">
                    <option value="1" selected>Year 1</option>
                    <option value="2">Year 2</option>
                    <option value="3">Year 3</option>
                    <option value="4">Year 4</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Update Student</button>
            <div class="mt-3 text-center">
                <a href="index.php" class="link-primary">Back to Student List</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>