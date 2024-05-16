<?php
    //check logging
    session_start();
    $_SESSION["page"]="posts.php";
    $_SESSION["table"]="posts";
    $_SESSION["title"]="Rent Car Admin | Posts";
    $managePageTitle="Manage Posts";
	  $managePageSubTitle="List of Posts";

    //update and insert alert
    if(isset($_SESSION["user"])){
      $message = $_SESSION["message"];
      $alert = $_SESSION["alert"];
    }

    include_once("includes/logged.php");
    //database connection
    include_once("includes/conn.php");
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

<!DOCTYPE html>
<html lang="en">
  <head>
        <?php include_once("includes/headtags.php"); ?>
  </head>

  <body class="nav-md">
    <!-- alert section -->
    <?php include_once("includes/alert.php"); ?>

    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            <?php include_once("includes/menuprofilequickinfo.php"); ?>
            <!-- rentCarAdmin link -->
            <!-- menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php include_once("includes/sidebarmenu.php"); ?>
					  <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <?php include_once("includes/menufooterbuttons.php"); ?>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <?php include_once("includes/topnavigation.php"); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <!-- Manage Posts & search bar -->
					  <?php include_once("includes/manage&search.php"); ?>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <!-- List of Posts & buttons -->
								  <?php include_once("includes/title&buttons.php"); ?>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Content</th>
                          <th>Show</th>
                          <?php
                            // Check if the user role is set in the session
                            if (isset($_SESSION['userRole']) && $_SESSION['userRole'] === "admin") {
                          ?>
                          <th>Edit</th>
                          <th>Delete</th>
                          <?php } ?>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                          foreach($stmt->fetchAll() as $row){
                            $id=$row["id"];
                            $title=$row["title"];
                            $content=$row["content"];
                        ?>
                        <tr>
                          <td><?php echo $title; ?></td>
                          <td><?php echo $content; ?></td>
                          <td><a href="showPost.php?id=<?php echo $id;?>"><img src="./images/show.png" alt="Edit"></a></td>
                          <?php if (isset($_SESSION['userRole']) && $_SESSION['userRole'] === "admin") { ?>
                            <td><a href="editPost.php?id=<?php echo $id;?>"><img src="./images/edit.png" alt="Edit"></a></td>
                            <td><a href="delete.php?id=<?php echo $id;?>" onclick="return confirm('Are you sure you want to delete?')"><img src="./images/delete.png" alt="Delete"></a></td>
                          <?php } ?>
                        </tr>
                        <?php } ?>      
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include_once("includes/footer.php"); ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- links -->
    <?php include_once("includes/links.php"); ?>

  </body>
</html>