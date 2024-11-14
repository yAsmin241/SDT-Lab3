<?php
session_start(); //starting session
if(!isset ($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
?>


<html>
<head>
    <title>Student List</title>
    <link rel="stylesheet"  href="style.css">
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        
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
      </ul>
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
    ?>


    <h3> List of Registered Students </h3>

    <div class="container my-5">
    <table class="table table-bordered table-striped table-hover" style="width: 100%; border-collapse: collapse; border: 2px solid #ddd;">
    <thead class="table-dark" style="background-color:  #DAD4B5; color: white;">
        <tr>
            <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">ID</th>
            <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Name</th>
            <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Email</th>
            <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Program of Study</th>
            <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Year</th>
            <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Update</th>
            <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $sql = "SELECT * FROM students";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr style='background-color: #f9f9f9;'>";
                echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row['id'] . "</td>";
                echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row['name'] . "</td>";
                echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row['email'] . "</td>";
                echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row['programme'] . "</td>";
                echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row['year'] . "</td>";
                echo "<td style='padding: 8px; border: 1px solid #ddd;'><a href='update.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a></td>";
                echo "<td style='padding: 8px; border: 1px solid #ddd;'><a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7' style='text-align: center; padding: 10px;'>No Data Found</td></tr>";
        }
        ?>
    </tbody>
</table>


        <br>
        <a href="create.php">Register New Student</a>
        <br>
        <!-- <a href="logout.php">Logout</a> -->


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
</body>

</html>