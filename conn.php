<?php 

$conn = mysqli_connect("localhost", "root", "", "g-arat");

if(mysqli_connect_error()){
    echo "<script>alert('Cannot connect to database!');</script>";
    exit();
}

?>