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
  <title>Trading News Website</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  <!-- Custom styles for this template -->
  <link href="style/blog.css" rel="stylesheet">

  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
    }
  </script>

  <script type="text/javascript"
    src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>

<body>
  <div class="container">
    <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <a class="text-muted" href="#">
            <div id="google_translate_element"></div>
          </a>
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo text-dark" href="#">Trading News Website</a>
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

        
        <div class="breaking-news-section">
          

        </div>
        <!--<a class="p-2 text-muted" href="#">Business</a>
                <a class="p-2 text-muted" href="#">Stocks</a>
                <a class="p-2 text-muted" href="#">Economy</a>-->
        <a class="p-2 text-muted" href="contact.php">Contact Us</a>
      </nav>
    </div>

    <div class="card" style="width: 100%; height: 350px;">
      <img class="card-img-top" src="https://www.investopedia.com/thmb/evNkUMsyriphOTV2FbproUB7FlI=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/Technical.Tools_Yuichiro-Chino-4eff14f1f6e74e3babaa863d5909a6f3.jpg" alt="Card image" height="350">
      <div class="card-img-overlay">
       <!-- <h3 class="card-title" >Trading News Channel</h3>
        <p class="card-text">Online Trading News Website</p>-->
      </div>
    </div>

    <div class="row mb-2">
      <?php
      include('db/connection.php');
      $query1 = mysqli_query($conn, "select * from news");
      while ($row = mysqli_fetch_array($query1)) {
        $category = $row['category'];
        $date = $row['date'];
        $title = $row['title'];
        $thumbnail = $row['thumbnail'];
      }
      ?>



<div class="col-md-6 card-large">
  <!-- Card content goes here -->
</div>
<div class="card flex-md-row mb-4 box-shadow h-md-250">
  <?php
  include('db/connection.php');
  $query2 = mysqli_query($conn, "SELECT * FROM news LIMIT 0,2");
  while ($row = mysqli_fetch_array($query2)) {
    $category = $row['category'];
    $title = $row['title'];
    $date = $row['date'];
    $thumbnail = $row['thumbnail'];
    ?>
    <div class="card-body d-flex flex-column align-items-start">
      <strong class="d-inline-block mb-2 text-primary">
        <?php echo $category; ?>
      </strong>
      <h3 class="mb-0">
        <a class="text-dark" href="single_page.php?single=<?php echo $row['id']; ?>" style="font-size: 20px;"><?php echo $title; ?></a>
      </h3>
      <div class="mb-1 text-muted">
        <?php echo $date; ?>
      </div>
      <a href="single_page.php?single=<?php echo $row['id']; ?>">Continue reading</a>
    </div>
    <img class="card-img-right flex d-none d-md-block" src="images/<?php echo $thumbnail; ?>" alt="Card image cap" width="200px">
    <?php
  }
  ?>
</div>
</div>
</div>






























      <main role="main" class="container">
        <div class="row">
          <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
              News
            </h3>

            <?php
            include('db/connection.php');
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $page1 = ($page == "" || $page == 1) ? 0 : ($page * 5) - 5;

            $query = mysqli_query($conn, "SELECT * FROM news LIMIT $page1,5");
            while ($row = mysqli_fetch_array($query)) {
              ?>
              <div class="blog-post">
                <h4 class="blog-post-title"><a href="single_page.php?single=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
                <p class="blog-post-meta">
                  <?php echo $row['date']; ?>
                  <br>
                  <a href="#"><span>
                      <?php echo $row['admin']; ?>
                    </span></a>
                </p>


                <p><img class="img img-thumbnail" style="height:100%" src="images/<?php echo $row['thumbnail']; ?>"
                    alt="Thumbnail"></p>

                <blockquote>
                  <?php echo substr($row['description'], 0, 200); ?>
                  <a href="single_page.php?single=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Read More</a>
                </blockquote>
                <hr>
              </div>
              <?php
            }
            ?>

            <!--<ul class="pagination">
          <li class="page-item disabled">
            <a href="#" class="page-link">Previous</a>
          </li>
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM news");
          $count = mysqli_num_rows($sql);
          $a = ceil($count / 5);

          for ($b = 1; $b <= $a; $b++) {
            ?>
            <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $b; ?>"><?php echo $b; ?></a>
            </li>
            <?php
          }
          ?>
          <li class="page-item disabled">
            <a href="#" class="page-link">Next</a>
          </li>
        </ul>-->

            <ul class="pagination">
              <!--<li class="page-item disabled">-->
              <!--<a href="#" class="page-link">Previous</a>-->
              </li>
              <?php
              // Establish database connection (assuming $conn is already defined)
              
              // Define the number of items per page
              $itemsPerPage = 5;

              // Query to get the total number of news items
              $sql = mysqli_query($conn, "SELECT COUNT(*) as count FROM news");
              $row = mysqli_fetch_assoc($sql);
              $count = $row['count'];

              // Calculate the total number of pages
              $totalPages = ceil($count / $itemsPerPage);

              for ($b = 1; $b <= $totalPages; $b++) {
                ?>
                <li class="page-item">
                  <a class="page-link" href="index.php?page=<?php echo $b; ?>"><?php echo $b; ?></a>
                </li>
                <?php
              }
              ?>
              <!--<li class="page-item disabled">-->
              <!--<a href="#" class="page-link">Next</a>-->
              </li>
            </ul>

          </div><!-- /.blog-main -->

          <aside class="col-md-4 blog-sidebar">
            <div class="p-3 mb-3 bg-light rounded">
              <h4 class="font-italic">About</h4>
              <p class="mb-0"><em>Real-time market updates,
                  <em>Your trusted trading news hub.
            </div>

            <div class="p-3">
              <h4 class="font-italic">Categories</h4>
              <hr>
              <ol class="list-unstyled mb-0">
                <?php
                include('db/connection.php');
                $query1 = mysqli_query($conn, "SELECT * FROM category");
                while ($row = mysqli_fetch_array($query1)) {
                  ?>
                  <li><a href="category_page.php?single=<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></a></li>
                  <?php
                }
                ?>
              </ol>
            </div>

            <!--<div class="p-3">
          <h4 class="font-italic">Archives</h4>
          <ol class="list-unstyled mb-0">
            <li><a href="#">March 2014</a></li>
            <li><a href="#">February 2014</a></li>
            <li><a href="#">January 2014</a></li>
            <li><a href="#">December 2013</a></li>
            <li><a href="#">November 2013</a></li>
            <li><a href="#">October 2013</a></li>
            <li><a href="#">September 2013</a></li>
            <li><a href="#">August 2013</a></li>
            <li><a href="#">July 2013</a></li>
            <li><a href="#">June 2013</a></li>
            <li><a href="#">May 2013</a></li>
            <li><a href="#">April 2013</a></li>
          </ol>
        </div>-->


            <div class="p-3">
              <h4 class="font-italic">Recent Posts</h4>
              <hr>
              <?php
              // Set API access key
              $queryString = http_build_query([
                'access_key' => '4b664ea7d4e804490095f14ba008ee57',
                'countries' => 'in',
                'categories' => 'business',
                'interval' => '1min',
                'limit'=> '10'
              ]);

              // API URL with query string
              $apiURL = sprintf('%s?%s', 'http://api.mediastack.com/v1/news', $queryString);

              // Initialize cURL
              $ch = curl_init();

              // Set URL and other appropriate options
              curl_setopt($ch, CURLOPT_URL, $apiURL);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

              // Execute and get response from API
              $api_response = curl_exec($ch);

              // Close cURL
              curl_close($ch);

              // Decode the JSON response into an associative array
              $response_array = json_decode($api_response, true);

              // Check if the response was successful
              if ($response_array && isset($response_array['data'])) {
                $articles = $response_array['data'];
              } else {
                // Handle the case when the API response is not as expected
                $articles = [];
              }
              ?>

              <h1>Live News</h1>
              <?php foreach ($articles as $article): ?>
                <div>
                  <h2>
                    <?php echo $article['title']; ?>
                  </h2>
                  <p>
                    <?php echo $article['description']; ?>
                  </p>
                  <a href="<?php echo $article['url']; ?>" target="_blank">Read More</a>
                </div>
                <hr>
              <?php endforeach; ?>






              <!--<div class="recent-post-container">
          <h4>Recent Posts</h4>
          <div class="recent-posts">

            <a class="post-img" href="">
              <img src=""alt=""/>
          </a>
          <div class="post-content">
            <h5><a href="single.php">hgcjcrdcg</a></h5>
            <span>
              <i class="fa fa-tags" aria-hidden="true"></i>
              <a href='news.php'>Html</a>
            </span>
            <span>
              <i class="fa fa-calender"aria-hidden="true"></i>
              1 nov, 2019
            </span>
            <a class="read-more" href="single.php">read more</a>
          </div>
          </div>-->


              <!--<div class="p-3">
                <h4 class="font-italic">Elsewhere</h4>
                <ol class="list-unstyled">
                  <li><a href="#">GitHub</a></li>
                  <li><a href="#">Twitter</a></li>
                  <li><a href="#">Facebook</a></li>
                </ol>
              </div>-->
          </aside><!-- /.blog-sidebar -->
        </div><!-- /.row -->
      </main><!-- /.container -->

      <footer class="blog-footer">
        <!--<p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a
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