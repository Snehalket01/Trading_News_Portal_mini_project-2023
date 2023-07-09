<?php  
session_start();
error_reporting(0);
if($_SESSION['email']==true){

}else
  header('location:admin_login.php');
$page='category';

include('include/header.php');
?>
<?php 
 include('db/connection.php');
 $id=$_GET['edit'];
 $query=mysqli_query($conn,"select * from category where id='$id'");
 while($row=mysqli_fetch_array($query)){
  $category=$row['category_name'];
  $des=$row=['des'];

 }
 ?>
<div style=" width: 70%; margin-left: 25%; margin-top:10%">
<form action="edit.php" method="post" name="categoryform"onsubmit="return validateform()">
<h1> Update Category </h1>
<hr>
<div class="form-group">
    <label for="email">Category:</label>
    <input type="text" name="category" value="<?php echo $category;?>" class="form-control" id="email">
  </div>
  <div class="form-group">
  <label for="comment" >Decription:</label>
  <textarea class="form-control" value="<?php echo $des;?>" rows="5" name="des" id="comment">
<?php echo $des;?></textarea>
<input type="hidden" name="id" value="<?php echo $_GET['edit'];?>">
</div>
  <input type="submit" name="submit" class="btn btn-default" value="update category">
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
include('db/connection.php');
if(isset($_POST['submit'])){
  $id=$_POST['id'];
  $category=$_POST['category'];
  $des=$_POST['des'];
  $query1=mysqli_query($conn,"update category set category_name='$category',des='$des' where id ='$id' ");
  if($query1){
    /*header('lcoation:category.php');*/
    echo "<script>alert('Category Updated Succesfully !')</script>";
    echo"<script>window.location='http://localhost/news/category.php';</script>";

  }
  else{
    echo "category not updated";
  }
}
?>
<?php 
include('include/footer.php');
?>