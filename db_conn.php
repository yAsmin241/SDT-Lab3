<?php

$servername = "localhost";
$username = "root";;
$password = "";
$database = "test_db";

//create connection
$conn = mysqli_connect($servername, $username, $password, $database);

//check connection
if(!$conn){
    die("Connection failed" .mysqli_connect_error());
} else{
    echo "<div class='success-message'>Connected successfully</div>";
}

?>