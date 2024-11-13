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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-
        QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
        
</head>

<body>
    
    <header>
        <h2>Student Information Registration System</h2>
    </header><br>

    <?php
        include "db_conn.php";
    ?>

    <h3> List of Registered Students </h3>

    <table border="1">
            <tr>
                <td> ID </td>
                <td> Name </td>
                <td> Email </td>
                <td> Program of study </td>
                <td> Year </td>
                <td> Update </td>
                <td> Delete </td>
            </tr>

    <?php
        // include "db_conn.php"; //Using database file here

        $sql = "SELECT * FROM students";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['programme'] . "</td>";
                echo "<td>" . $row['year'] . "</td>";
                echo "<td> <a href='update.php?id=" . $row['id'] . "'> Edit</a></td>";
                echo "<td> <a href='delete.php?id=" . $row['id'] . "'> Delete</a></td>";
                echo "</tr>";
            }
        }else{
            echo "<tr><td colspan = '7' > No Data Found </td></tr>";
        }


    ?>
        </table>
        <br>
        <a href="create.php">Register New Student</a>
        <br>
        <a href="logout.php">Logout</a>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous"></script>
        
</body>

</html>