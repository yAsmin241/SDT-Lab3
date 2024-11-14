<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<html>
<head>
    <title>Add Students</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <i class="bi bi-list"></i> <!-- This replaces the "Menu" text with a list icon -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="https://www.utm.my/about/vision-mission/">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.utm.my/about/achievements/">STUDY AT UTM</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            FACULTIES
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="https://comp.utm.my/?_gl=1%2A19au12w%2A_ga%2ANDExMDc0MTI0LjE2OTU2NTY4Mzg.%2A_ga_N3HJW8G3P7%2AMTczMTYxMTU1Mi4zNy4xLjE3MzE2MTE5MzQuNC4wLjA.">
            Faculty of Computing</a></li>
            <li><a class="dropdown-item" href="https://mech.utm.my/?_gl=1%2Ag57d33%2A_ga%2ANDExMDc0MTI0LjE2OTU2NTY4Mzg.%2A_ga_N3HJW8G3P7%2AMTczMTYxMTU1Mi4zNy4xLjE3MzE2MTIwNjAuMzQuMC4w">
            Faculty of Mechanical Engineering</a></li>
            <li><a class="dropdown-item" href="https://fke.utm.my/?_gl=1%2A1omlqnk%2A_ga%2ANDExMDc0MTI0LjE2OTU2NTY4Mzg.%2A_ga_N3HJW8G3P7%2AMTczMTYxMTU1Mi4zNy4xLjE3MzE2MTIxMzkuNjAuMC4w">
            Faculty of Electrical Engineering</a></li>
          </ul>
        </li>
      </ul>
      <a href="logout.php" style="color: red; font-size: 16px; text-decoration: none; text-align: right;">Logout</a>

      <img src="logo_utm.png" alt="UTM Logo" style="height: 100px; margin-left: auto;">
    </div>
  </div>
</nav>


    <header>
        <h2>Student Information Registration System</h2>
    </header><br>

    <?php
    include "db_conn.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $programme = $_POST['programme'];
        $year = $_POST['year'];

        $sql = "INSERT INTO students (name, email, programme, year) VALUES ('$name', '$email', '$programme', '$year')";

        if (mysqli_query($conn, $sql)) {
            echo "<div class='success-record'>New record has successfully created!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>

    <div class="container form-container">
        <h2 class="form-title">Add New Students</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter student name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter student email" required>
            </div>
            <div class="mb-3">
                <label for="program" class="form-label">Program of Study:</label>
                <select class="form-select" id="program" name="programme">
                    <option value="data engineering" selected>Data Engineering</option>
                    <option value="software engineering">Software Engineering</option>
                    <option value="network and security">Network and Security</option>
                    <option value="bioinformatics">Bioinformatics</option>
                    <option value="graphic and multimedia">Graphic and Multimedia</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year of Study:</label>
                <select class="form-select" id="year" name="year">
                    <option value="1" selected>Year 1</option>
                    <option value="2">Year 2</option>
                    <option value="3">Year 3</option>
                    <option value="4">Year 4</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Add Student</button>
            <div class="mt-3 text-center">
                <a href="index.php" class="link-primary">Back to Student List</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
