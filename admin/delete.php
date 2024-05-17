<?php
    include_once("includes/conn.php");
    include_once("includes/logged.php");
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        try{
            //general delete statement
            $sql = "DELETE FROM `".$_SESSION["table"]."` WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            //confirmation deletint alert in testimonials page
            $alert = "alert-success";
			$message = "Data Deleted Successfully.";
			//send variables through header to other pages using session
			session_start();
    		$_SESSION['user'] = "batman";
			$_SESSION['message'] = $message;
			$_SESSION['alert'] = $alert;
    		header("Location:".$_SESSION["page"]);
			die();
        }catch(PDOException $e){
            echo "Connection failed:  ".$e->getMessage();
        }
        
    }else{
        echo "Invalid Access";
    }
?>