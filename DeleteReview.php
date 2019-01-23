<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php
	if(isset($_GET['id'])){
		$IdFromURL = $_GET["id"];
		$ConnectingDB;
		$Query= "DELETE FROM review WHERE id=$IdFromURL";
		$Execute = mysql_query($Query);
		if($Execute){
			$_SESSION["SuccessMessage"]="Review Deleted Successfully";
			Redirect_to("Review.php");
		}else{
			$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again!";
			Redirect_to("Review.php");
		}
	}

?>