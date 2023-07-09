<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin login</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!--custom css-->
<link rel="stylesheet" href="style/admin.css">


</head>
<body>
<div class="container">


<form action="admin_login.php" method="post">
    <h3>Admin Login</h3>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password" id="pwd">
  </div>
  
  <input type="submit" name="submit"class="btn btn-primary" value="login">
</form>
</div>






</body>
</html>


<?php
include('db/connection.php');


if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

        $_query=mysqli_query($conn,"select * from admin_login where email='$email' AND password='$password'");
            if($_query){
                if(mysqli_num_rows($_query)>0) {
                    
                    $_SESSION['email']=$email;
                    header('location:home.php');
        

        }else {
            echo "<script> alert('Invalid Credentials, Please Try Again')</script>";
        }
     }
}
?>

