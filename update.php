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
</head>

<body>

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

    <h3> Update Students</h3>
    
<form action="update.php?id=<?php echo $row['id']; ?>" method="POST">
            <!-- <label> Student ID: </label>
            <input type="text" name="id" required><br> -->

            <label> Name: </label>
            <input type="text" name="name" required><br><br>

            <label> Email: </label>
            <input type="email" name="email" required><br><br>

            <label>Program of Study :</label>
            <select id="programme" name="programme">
                <option value="data engineering">Data Engineering</option>
                <option value="software engineering">Software Engineering</option>
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

            <button type="submit"> Update Student </button>
        </form>

    <br>
    <a href="index.php">Back to Student List</a>
    </br>

</body>

</html>