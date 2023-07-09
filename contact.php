<?php

include('db/connection.php');

$query1 = mysqli_query($conn, "SELECT * FROM news");
$query2 = mysqli_query($conn, "SELECT * FROM news ORDER BY id DESC LIMIT 1,2");

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$page1 = ($page == "" || $page == 1) ? 0 : ($page * 5) - 5;

$query3 = mysqli_query($conn, "SELECT * FROM news LIMIT $page1,5");

$count = mysqli_num_rows($query1);
$totalPages = ceil($count / 5);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trading News Channel</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="style/blog.css" rel="stylesheet">
    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</head>

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="text-muted" href="#"><div id="google_translate_element"></div></a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="#">Trading News Channel</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <form action="search.php" method="post">
                        <div class="input-group sm-3">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-success" name="submit" type="submit">Go</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-muted" href="index.php">Home</a>
                <!--<a class="p-2 text-muted" href="#">Business</a>
                <a class="p-2 text-muted" href="#">Stocks</a>
                <a class="p-2 text-muted" href="#">Economy</a>-->
                <a class="p-2 text-muted" href="#">Contact us</a>
            </nav>
        </div>

        <div class="card" style="width: 100%; height: 350px;">
        <img class="card-img-top" src="https://www.investopedia.com/thmb/evNkUMsyriphOTV2FbproUB7FlI=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/Technical.Tools_Yuichiro-Chino-4eff14f1f6e74e3babaa863d5909a6f3.jpg" alt="Card image" height="350">
      <div class="card-img-overlay">
       <!-- <h3 class="card-title" >Trading News Channel</h3>
        <p class="card-text">Online Trading News Website</p>-->
      </div>

            </div>



            


        </div>

        <main role="main" class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <h3 class="pb-3 mb-4 font-italic border-bottom">
                        Comment
                    </h3>
                </div><!-- /.blog-main -->

                <div class="container">
                    <form action="contact.php" method="post" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="uname">Enter your name:</label>
                            <input type="text" class="form-control" id="uname" placeholder="Enter your name" name="name" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Email:</label>
                            <input type="email" class="form-control" id="pwd" placeholder="Enter email" name="email" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment:</label>
                            <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>

                <?php 
                include('db/connection.php');
                if(isset($_POST['submit'])){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $comment = $_POST['comment'];

                    $query = mysqli_query($conn,"INSERT INTO comment (name,email,comment) VALUES ('$name','$email','$comment')");
                    if ($query) {
                        echo "<script>alert('Your comment has been sent');</script>";
                    } else {
                        echo "Please try again";
                    }
                }
                ?>

                <script>
                    // Disable form submissions if there are invalid fields
                    (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            // Get the forms we want to add validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
                </script>
            </div><!-- /.row -->
        </main><!-- /.container -->

        <footer class="blog-footer">
           <!-- <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a
                    href="https://twitter.com/mdo">@mdo</a>.</p>-->
            <p>
                <a href="#">Back to top</a>
            </p>
        </footer>

        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="../../assets/js/vendor/popper.min.js"></script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <script src="../../assets/js/vendor/holder.min.js"></script>
        <script>
            Holder.addTheme('thumb', {
                bg: '#55595c',
                fg: '#eceeef',
                text: 'Thumbnail'
            });
        </script>
    </body>
</html>
