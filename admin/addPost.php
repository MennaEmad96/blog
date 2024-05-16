<?php
    session_start();
    $_SESSION["page"]="addPost.php";
    $_SESSION["table"]="posts";
    $_SESSION["title"]="Rent Post Admin | Add Post";
	$managePageTitle="Manage Posts";
	$managePageSubTitle="Add Post";
    
    //check logging
    include_once("includes/logged.php");
    include_once("includes/conn.php");

	//<input value="" />
	$titleVal="";
	$contentVal="";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
		$title = $_POST["title"];
		$content = $_POST["content"];
		try{
			$sql = "INSERT INTO `posts`(`title`, `content`) VALUES (?, ?)";
			$stmt = $conn->prepare($sql);
			$stmt->execute([$title, $content]);
			//action=login.php-->
			//preferring this way to check from several steps before moving to login page
			$_SESSION['user'] = "batman";
			$_SESSION['message'] = "Data Added Successfully.";
			$_SESSION['alert'] = "alert-success";
			header("Location: posts.php");
			die();
		}catch(PDOException $e){
			$message = $e->getMessage();
			$alert = "alert-danger";
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
								<!-- Add Post & buttons -->
								<?php include_once("includes/title&buttons.php"); ?>
								<div class="x_content">
									<br />
									<form action="" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="title" required="required" class="form-control" name="title" value="<?php echo $titleVal; ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea id="content" name="content" required="required" class="form-control"><?php echo $contentVal !== "" ? $contentVal : "Content"; ?></textarea>
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="posts.php"><button class="btn btn-primary" type="button">Cancel</button></a>
												<button type="submit" class="btn btn-success">Add</button>
											</div>
										</div>
									</form>
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
