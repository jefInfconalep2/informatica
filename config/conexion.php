<?php 
    $servername = "localhost";
    $database = "informatica";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername,$username,$password,$database);
    if(!$conn){
        die("connection failed: ".mysqli_conect_error());
    }
?>