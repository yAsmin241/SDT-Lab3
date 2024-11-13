<?php
session_start(); //starting session
if(!isset ($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
?>


<html>
    <head>
        <title>Add Students</title>
        <link rel="stylesheet"  href="style.css">
    </head>

    <body>

        <header>
            <h2>Student Information Registration System</h2>
        </header><br>

        <?php

        include "db_conn.php"; //uisng database connection file here

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $programme = $_POST['programme'];
            $year = $_POST['year'];

            $sql = "INSERT INTO students ( name, email, programme, year) VALUES ('$name', '$email', '$programme', '$year')";

            if (mysqli_query($conn, $sql)) {
                echo "<div class='success-record'>New record created successfully!</div>";
            } else{
                echo "Error: " . sql . "<br>" . mysqli_error($_conn);
            }
        }

        ?>

        <h3> Register New Students </h3>

        <form action="create.php" method="POST">
            <!-- <label> Student ID: </label>
            <input type="text" name="id" required><br> -->

            <label> Name: </label>
            <input type="text" name="name" required><br><br>

            <label> Email: </label>
            <input type="email" name="email" required><br><br>

            <label>Program of Study :</label>
            <select id="programme" name="programme">
                <option value="data engineering">Data engineering</option>
                <option value="software engineering">Software engineering</option>
                <option value="network and security">Network and security</option>
                <option value="graphic and multimedia">Graphic and multimedia</option>
                <option value="bioinformatic">Bioinformatic</option>
            </select><br><br>

            <label>Year of study: </label>
            <select id="year" name="year">
                <option value="1">Year 1</option>
                <option value="2">Year 2</option>
                <option value="3">Year 3</option>
                <option value="4">Year 4</option>
            </select><br><br>

            <button type="submit"> Add Student </button>
        </form><br>

        <a href="index.php"> Back to Student List </a><br><br>
</html>
