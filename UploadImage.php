<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php Confirm_Login(); ?>
<?php
if(isset($_POST['btn_upload'])){
   
	$ConnectingDB;
	$BusinessId=$_GET["Upload"];
	$ClientId=ClientInfo();
	
    for($i = 0; $i < count($_FILES['file_img']['name']); $i++)
	{
		$filetmp = $_FILES["file_img"]["tmp_name"][$i];
		$filename = $_FILES["file_img"]["name"][$i];
		$filetype = $_FILES["file_img"]["type"][$i];
		$filepath = "Upload/Gallery/".$filename;
	
	move_uploaded_file($filetmp,$filepath);
	
	$sql = "INSERT INTO gallery (filename,uploadedon,type,business_id,user_business_id) VALUES ('$filename','$filepath','$filetype','$BusinessId','$ClientId')";
	$result = mysql_query($sql);
	}
	if($result){
			$_SESSION["SuccessMessage"]="Images Uploaded Successfully";
			Redirect_to("UploadImage.php?Upload={$BusinessId}");
		}else{
			$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again";
			Redirect_to("UploadImage.php?Upload={$BusinessId}");
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
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
					<span class="sr-only">Toggle Navigation</span>				
					<span class="icon-bar"></span>				
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div>
				<a class="navbar-brand" href="Company.php">
					<span class="BrandName">Ramro6.com</span></a>
				<a class="navbar-brand" href="Clienthome.php">
					<span class="BrandName" style="color:#FFFFFF;">Ramro6 Business</span></a>

			</div>
			
			<div class="collapse navbar-collapse" id="collapse"></div>
		</div>
			
		</div>
	</nav>
	<!--Brand and Search Container-->
	<div class="container">
            <div class="col-sm-2">
                <a href="Home.php">
                <img src="images/ramro-logo.jpg" width="100" height="50" class="img-responsive BrandImage">
				</a>
            </div>
            <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11" style="margin: -10px 0 20px -30px;">
				<form action="Dashboard.php">
					<div id="custom-search-input">
						<div class="input-group col-md-12">
							<input type="text" name="Search" class="form-control input-lg" placeholder="Company Name, Driver or Restaurant" />
							<span class="input-group-btn">
								<button class="btn btn-info btn-lg" type="button" name="SearchButton">
									<i class="glyphicon glyphicon-search"></i>
								</button>
							</span>
						</div>
					</div>
				</form>
            </div>
		<div class="col-sm-2" style="margin-top: -5px;">
                <i class="fa fa-user-circle-o pull-left" style="font-size:40px;color:#515151"></i>
				<div class="Topheader">Admin</div>
            </div>
            
        </div>
	<div class="Line topspace"></div>
	<div class="container-fluid"> <!--Main Container-->
		<div class="row">
		<div class="col-sm-2">
				<br><br>
				<ul id="Side_Menu" class="nav nav-pills nav-stacked">
				<li><a href="dashboard.php"><span class="glyphicon glyphicon-th"></span>&nbsp; Dashboard</a></li>
				<li><a href="Business.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp; Business Info</a></li>
				<li><a href="Categories.php"><span class="glyphicon glyphicon-tags"></span>&nbsp; Categories</a></li>
				<li><a href="Account.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Account Setting</a></li>
				<li><a href="Review.php"><span class="glyphicon glyphicon-comment"></span>&nbsp; Review</a></li>
				<li><a href="Gallery.php"><span class="glyphicon glyphicon-equalizer"></span>&nbsp; Gallery</a></li>		
				<li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
				</ul>
			</div><!-- Ending of Side Area--->
		<div class="col-sm-10">
				<h1>Upload Multiple Images</h1>
				<div>
					<?php 
					echo Message();
					echo SuccessMessage();
					?>
				</div>
				<div>
					<?php
							$BusinessIdFromUrl = $_GET[ "Upload" ];
					?>
					<form action="UploadImage.php?Upload=<?php echo $BusinessIdFromUrl ;?>" method="post" enctype="multipart/form-data">
						<fieldset>
						<div class="form-group">
						<label for="categoryname"><span class="FieldInfo">
							Select Image Files to Upload:
							</span></label>
							<div class="row">
								<div class="col-sm-3">
									 <input class="form-control" type="file" name="file_img[]" multiple>
								</div>
								<div class="col-sm-6">
									<input class="btn btn-success"  type="submit" name="btn_upload" value="Upload">
								</div>
								<div class="col-sm-3"></div>
							</div>
						</form>
						</div>
				
				</div>
					<h2>Uploaded Images</h2>
		<?php 
			$ConnectingDB;
			$ClientId=ClientInfo();
			$ViewQuery="SELECT * FROM gallery WHERE 
						business_id='$BusinessIdFromUrl' AND
						user_business_id = '$ClientId' 
						ORDER BY ID desc;";
			$Execute=mysql_query($ViewQuery);
			while($DataRows=mysql_fetch_array($Execute)){
				$Galleryid=$DataRows["id"];
				$Uploadfilename=$DataRows["filename"];
				$Uploadpath=$DataRows["uploadedon"];
		?>
					<img src="<?php echo $Uploadpath;?>" width="170" height="80%" class="img-responsive img-thumbnail"/>
					<?php }?>
		</div> <!--End of Rows-->
	</div><!--End of Main Container-->
<div><!--Footer-->
<hr>
	<div id="footer">
		<p>
		Theme By | Rup Rai | &copy; 2019 ---All Right Reserved.
		</p>
		
		<p>
		This site is only used for Study Purpose ruprai.com have all the rights. No one is allow to cpoies other than <br>&trade; <a style="text-decoration: none; cursor: pointer; font-weight: bold;" href="#">ruprai.com</a> &trade; Mycompany
			<hr>
		</p>
		</a>
	</div>
	<div class="Line topspace"></div>
</div>
</body>
</html>
