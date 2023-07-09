<?php 
include('db/connection.php');


    $id = $_GET['delete'];
    $query = mysqli_query($conn, "DELETE FROM category WHERE id='$id'");
    
    if($query) {
        echo "<script>alert('Category deleted');</script>";
        echo"<script>window.location='http://localhost/news/category.php';</script>";

    } else {
        echo "Please try again";
    }


?>