<?php  
session_start();
if (!isset($_SESSION['email']) || !$_SESSION['email']) {
  header('location:admin_login.php');
  exit();
}



include('include/header.php');
?>

<?php
include('db/connection.php');
$id=$_GET['edit'];
$query=mysqli_query($conn,"select * from news where id='$id'");
while($row=mysqli_fetch_array($query)){
    $id=$row['id'];
    $title=$row['title'];
    $description=$row['description'];
    $date=$row['date'];
    $thumbnail=$row['thumbnail']; 
    $category=$row['category'];
    
}
?>

<div style="margin-left:17%; width:80%">
  <ul class="breadcrumb">
    <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
    <li class="breadcrumb-item active"><a href="news.php">News</a></li>
    <li class="breadcrumb-item active">Add News</li>
  </ul>
</div>

<div style="width: 70%; margin-left: 25%;">

  <form action="news_edit.php" method="post" enctype="multipart/form-data" name="categoryform" onsubmit="return validateform()">
    <h1>Updated News</h1>
    <hr>
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" value="<?php echo $title;?>" placeholder="Title..." name="title" class="form-control" id="title">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control"  placeholder="Enter category description" rows="5" name="description" id="description">
      <?php echo $description; ?></textarea>
    </div>

    <div class="form-group">
      <label for="date">Date:</label>
      <input type="date" value="<?php echo $date;?>" placeholder="Enter date" name="date" class="form-control" id="date">
    </div>

    <div class="form-group">
      <label for="thumbnail">Thumbnail:</label>
      <input type="file" value="<?php echo $thumbnail;?>" placeholder="Enter Thumbnail" name="thumbnail" class="form-control img-thumbnail" id="thumbnail">
      <img  class="img img-thumbnail"src="images/<?php echo $thumbnail;?>" alt="" width="300" >
    </div>
    <input type="hidden" name="id"value="<?php echo $_GET['edit'];?>">

    <div class="form-group">
      <label for="category">Category:</label>
      <select class="form-control" name="category">
        <?php
        include('db/connection.php');
        $query=mysqli_query($conn,"SELECT * FROM category");
        while($row=mysqli_fetch_array($query)) {
          ?>
          <option value="<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></option>
        <?php
        }
        ?>
      </select>
    </div>

    <input type="submit" name="submit" class="btn btn-default" value="update">
  </form>

  <script>
    function validateform() {
      var x=document.forms['categoryform']['title'].value;
      var y=document.forms['categoryform']['description'].value;
      var z=document.forms['categoryform']['date'].value;
      var w=document.forms['categoryform']['category'].value;
      if (x=="") {
        alert('Title must be filled out');
        return false;
      }
      if (y=="") {
        alert('Description must be filled out');
        return false;
      }
      if (y.length<100) {
        alert('Description must be at least 100 characters long');
        return false;
      }
      if (z=="") {
        alert('Date must be filled out');
        return false;
      }
      if (w=="") {
        alert('Category must be filled out');
        return false;
      }
    }
  </script>
</div>

<?php
include('include/footer.php');
?>

<?php
include('db/connection.php');
include('db/connection.php');
if(isset($_POST['submit'])){
  $id=$_POST['id'];
  $title=$_POST['title'];
  $description=$_POST['description'];
  $date=$_POST['date'];
  $thumbnail=$_FILES['thumbnail']['name'];
  $tmp_thumbnail=$_FILES['thumbnail']['tmp_name'];
  $category=$_POST['category'];
  move_uploaded_file($tmp_thumbnail,"images/$thumbnail");
$sql=mysqli_query($conn,"update news set title='$title',description='$description',date='$date',thumbnail='$thumbnail',category='$category' where id='$id'");
if($sql){
    echo "<script> alert('News Updated successfully')</script>";
    echo"<script>window.location='http://localhost/news/news.php';</script>";

}
else{
    echo "<script> alert('try again')</script>";

}
}

?>
