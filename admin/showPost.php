<?php
    session_start();
    $_SESSION["page"]="showPost.php";
    $_SESSION["table"]="posts";
    $_SESSION["title"]="Rent Car Admin | Show Post";
	$managePageTitle="Manage Posts";
	$managePageSubTitle="Show Post";
    
    //check logging
    include_once("includes/logged.php");
    include_once("includes/conn.php");

    if(isset($_GET["id"])){
        $id = $_GET["id"];
		$status = true;
	}
    
    if(isset($status)){
		try{
			$sql = "SELECT * FROM `posts` WHERE id = ?";
			$stmt = $conn->prepare($sql);
			$stmt->execute([$id]);
			$result = $stmt->fetch();
			$title=$result["title"];
            $content=$result["content"];
		}catch(PDOException $e){
            $alert = "alert-danger";
            $message = $e->getMessage();
			//echo "Connection failed:  ".$e->getMessage();
		}
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
                    <!-- rentPostAdmin link -->
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
                                <h2>Title: <?php echo $title; ?></h2>
                                <br>
                                <h2>Content:</h2>
                                <p><?php echo $content; ?></p>
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

