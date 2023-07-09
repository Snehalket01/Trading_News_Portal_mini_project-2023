<?php  
session_start();
if($_SESSION['email']==true){

}else
  header('location:admin_login.php');
$page='category';

include('include/header.php');
?>
<div style=" width: 70%; margin-left: 25%; margin-top:10%">
<form action="addcategory.php" method="post" name="categoryform"onsubmit="return validateform()">
<h1>Add Category </h1>
<hr>
<div class="form-group">
    <label for="email">Category:</label>
    <input type="text"  placeholder="Enter category name" name="category" class="form-control" id="email">
  </div>
  <div class="form-group">
  <label for="comment" >Decription:</label>
  <textarea class="form-control" placeholder="Enter category description" rows="5" name="des" id="comment"></textarea>
</div>
  <input type="submit" name="submit" class="btn btn-default" value="Add category">
 </form>

 <script>
function validateform(){
    var x=document.forms['categoryform']['category'].value;
    if(x==""){
        alert('category must be filled out');
        return false;
}
}
    </script>
</div>
<?php
include('include/footer.php')
?>
<?php
include('db/connection.php');
if(isset($_POST['submit'])){
  $category_name= $_POST['category'];
  $des= $_POST['des'];
  $cheak=mysqli_query($conn,"select * from category where category_name='$category_name'");
  if(mysqli_num_rows($cheak)>0){
    echo "<script> alert('Category name Already be taken')</script>";
    exit();
  }else{


  $query = mysqli_query($conn, "INSERT INTO category(category_name,des) VALUES ('$category_name', '$des')");

  if($query){
    echo "<script> alert('Category Added Successfully')</script>";
  } else{
    echo "<script> alert('Please try again') </script>";
  }
}
}
?>
