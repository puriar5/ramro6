<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php Confirm_Login(); ?>
<?php
if(isset($_POST['btn_upload'])){
   
	$ConnectingDB;
	$ClientId=ClientInfo();
	
	/*Upload Image to certain File*/
	$Image=$_FILES["Image"]['name'];//Creating variable image taking input from form Image
	$Target="Upload/User/".basename($_FILES["Image"]['name']);//Creating variable target to upload image
	
	move_uploaded_file($_FILES["Image"][tmp_name],$Target);//Moving or copying image uploaded to target file location
	
	$Query="UPDATE registration SET image='$Image'
			WHERE id = '$ClientId'";
	$Execute=mysql_query($Query);
	if($Execute){
			$_SESSION["SuccessMessage"]="Images Uploaded Successfully";
			Redirect_to("UploadUserImage.php");
		}else{
			$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again";
			Redirect_to("UploadUserImage.php");
		}
	
}
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Upload Images</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>	
	-->
	<link rel="stylesheet" href="css/adminstyles.css">
</head>

<body>
	
	<div class="container-fluid"> <!--Main Container-->
		<div class="row">
		
		<div class="col-sm-10">
				<h1>Upload Your Image</h1>
				<div>
					<?php 
					echo Message();
					echo SuccessMessage();
					?>
				</div>
				<div>
					
					<form action="UploadUserImage.php" method="post" enctype="multipart/form-data">
						<fieldset> 
							<div class="form-group">
							<label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
							<input type="file" class="form-control" name="Image" id="imageselect">
							</div>
							<div class="invalid-feedback">
							Maximum upload file size:2MB</div>

							<input class="btn btn-success"  type="submit" name="btn_upload" value="Upload">
						</fieldset>	
						</form>
						
				
				</div>
					<h2>Uploaded Images</h2>
		<?php 
			$ConnectingDB;
			$ClientId=ClientInfo();
			$UserImage=mysql_fetch_row(mysql_query("SELECT image FROM registration WHERE id='$ClientId'"));
			if($UserImage[0]==null){
				$UserImage[0]="User.png";
			}
			
		?>
	<img src="Upload/User/<?php echo $UserImage[0];?>" width="170" height="80%" class="img-responsive img-thumbnail"/>
					
					<br><br>
		<button class="btn btn-warning" onclick=" closePopupWindow();">Close
					</button>
					<script>
					function closePopupWindow(){
					   window.opener.location.reload();
					   window.close();
					}
					</script>
		</div> <!--End of Rows-->
	</div><!--End of Main Container-->

</body>
</html>
