<?php  
session_start();
if (!isset($_SESSION['email']) || !$_SESSION['email']) {
  header('location:admin_login.php');
  exit();
}

$page='product';

include('include/header.php');
?>

<div style="margin-left:17%; width:80%">
  <ul class="breadcrumb">
    <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
    <li class="breadcrumb-item active"><a href="news.php">News</a></li>
    <li class="breadcrumb-item active">Add News</li>
  </ul>
</div>

<div style="width: 70%; margin-left: 25%;">

  <form action="addnews.php" method="post" enctype="multipart/form-data" name="categoryform" onsubmit="return validateform()">
    <h1>Add News</h1>
    <hr>
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" placeholder="Title..." name="title" class="form-control" id="title">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" placeholder="Enter category description" rows="5" name="description" id="description"></textarea>
    </div>

    <div class="form-group">
      <label for="date">Date:</label>
      <input type="date" placeholder="Enter date" name="date" class="form-control" id="date">
    </div>

    <div class="form-group">
      <label for="thumbnail">Thumbnail:</label>
      <input type="file" placeholder="Enter Thumbnail" name="thumbnail" class="form-control img-thumbnail" id="thumbnail">
    </div>

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
    <div class="form-group">
      <label for="admin"> Admin</lable>
      <input type="text" class="form-control" disabled value="<?php echo $_SESSION['email'];?>">
      </div>

    <input type="submit" name="submit" class="btn btn-default" value="Submit">
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
      if (y.length<10) {
        alert('Description at least 100 characters long');
        return false;
      }
      /*if (z=="") {
        alert('Date must be filled out');
        return false;
      }
      if (w=="") {
        alert('Category must be filled out');
        return false;
      }*/
    }
  </script>
</div>

<?php
include('include/footer.php');
?>

<?php
include('db/connection.php');
if(isset($_POST['submit'])){
  $title=$_POST['title'];
  $description=$_POST['description'];
  $date=$_POST['date'];
  $thumbnail=$_FILES['thumbnail']['name'];
  $tmp_thumbnail=$_FILES['thumbnail']['tmp_name'];
  $category=$_POST['category'];
  $admin=$_SESSION['email'];
  move_uploaded_file($tmp_thumbnail,"images/$thumbnail");
  $query1 = $conn->prepare("INSERT INTO news (title, description, date, category, thumbnail, admin) VALUES (?, ?, ?, ?, ?, ?)");
  $query1->bind_param("ssssss", $title, $description, $date, $category, $thumbnail, $admin);
  $query1->execute();
  $query->close();
  
  //$query1=mysqli_query($conn,"INSERT INTO news (title, description, date, category, thumbnail,admin) VALUES ('$title','$description','$date','$category','$thumbnail','$admin')");
  if($query1){
    echo "<script>alert('News uploaded Successfully')</script>";
  } else {
    echo "<script>alert('Try again')</script>";
  }
}
?>
