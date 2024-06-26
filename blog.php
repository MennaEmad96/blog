<?php
    //database connection
    include_once("admin/includes/conn.php");

    session_start();
    $_SESSION["page"]="blog.php";
    $_SESSION["title"]="CarRental &mdash; Free Website Template by Colorlib";

    try{
        $sql = "SELECT * FROM `posts`";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }catch(PDOException $e){
      $message = "Connection failed:  ".$e->getMessage();;
      $alert = "alert-danger";  
      //echo "Connection failed:  ".$e->getMessage();
    }
?>

<!doctype html>
<html lang="en">

  <head>
    <?php include_once("includes/headTags.php"); ?>
  </head>

  <body>

    
    <div class="site-wrap" id="home-section">

      <!-- top section nav -->
      <?php include_once("includes/topNav.php"); ?>
      
      <div class="hero inner-page" style="background-image: url('images/hero_1_a.jpg');">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro">
                <h1><strong>Blog</strong></h1>
                <div class="custom-breadcrumbs"><a href="index.php">Home</a> <span class="mx-2">/</span> <strong>Blog</strong></div>
              </div>

            </div>
          </div>
        </div>
      </div>

    

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <?php
            foreach($stmt->fetchAll() as $row){
              $id=$row["id"];
              $title=$row["title"];
              $content=$row["content"];
          ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <div class="post-entry-1-contents">
                <h2><?php echo $title; ?></h2>
                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2"></span></span>
                <p><?php echo $content; ?></p>
              </div>
            </div>
          </div>
          <?php } ?> 
        </div>

        <div class="row">
          <div class="col-5">
            <div class="custom-pagination">
              <a href="#">1</a>
              <span>2</span>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="site-section bg-primary py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 mb-4 mb-md-0">
            <h2 class="mb-0 text-white">What are you waiting for?</h2>
            <p class="mb-0 opa-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
          </div>
          <div class="col-lg-5 text-md-right">
            <a href="#" class="btn btn-primary btn-white">Rent a car now</a>
          </div>
        </div>
      </div>
    </div>

      
      <!-- footer start -->
      <?php include_once("includes/footer.php"); ?>
      <!-- footer end -->
    </div>

    <!-- links -->
    <?php include_once("includes/links.php"); ?>

  </body>

</html>

