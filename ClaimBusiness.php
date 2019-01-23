<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>

<?php
if(isset($_POST["Submit"])){
	$BusinessnameNew = mysql_real_escape_string($_POST["Businessname"]);
	$Address1New = mysql_real_escape_string($_POST["Address1"]);
	$Address2New = mysql_real_escape_string($_POST["Address2"]);
	$TownCityNew = mysql_real_escape_string($_POST["TownCity"]);
	$PostcodeNew = mysql_real_escape_string($_POST["Postcode"]);
	$PhoneNew = mysql_real_escape_string($_POST["Phone"]);
	$MobileNew = mysql_real_escape_string($_POST["Mobile"]);
	$WebsiteNew = mysql_real_escape_string($_POST["Website"]);
	$CategoryNew = mysql_real_escape_string($_POST["Category"]);
	$OverviewNew = mysql_real_escape_string($_POST["Overview"]);
	date_default_timezone_set("Europe/London");
	$Currenttime=time();
	$DateTime=strftime("%B/%d/%Y %H:%M:%S",$Currenttime);
	
	
	$ClaimId=$_GET['ClaimId'];
	
	$User_id=$_GET['UserId'];
	
	/*Upload Image to certain File*/
	$ImageNew=$_FILES["Image"]['name'];//Creating variable image taking input from form Image
	$Target="Upload/".basename($_FILES["Image"]['name']);//Creating variable target to upload image
	
	if(empty($BusinessnameNew) || empty($Address1New) || empty($PostcodeNew) || empty($CategoryNew)){
		$_SESSION["ErrorMessage"]="All Fields must be filled out";
		Redirect_to("ClaimBusiness.php?Edit=$ClaimId&UserId=$User_id");
		//header("Location:dashboard.php");
	}elseif(strlen($CategoryNew)>99){
		$_SESSION["ErrorMessage"]="Too Long Name for Category";
		Redirect_to("ClaimBusiness.php?Edit=$ClaimId&UserId=$User_id");		
	}
	else{
		global $ConnectingDB;
		
		$DeleteQuery=mysql_query("DELETE FROM business WHERE id=$ClaimId");
		
		$Query="INSERT INTO business (datetime,name,address1,address2,towncity,postcode,phone,mobile,website,businesstype,image,overview,user_id) VALUES('$DateTime','$BusinessnameNew','$Address1New','$Address2New','$TownCityNew','$PostcodeNew','$PhoneNew','$MobileNew','$WebsiteNew','$CategoryNew','$ImageNew','$OverviewNew','$User_id')";
		
		
		$Execute=mysql_query($Query);
		move_uploaded_file($_FILES["Image"][tmp_name],$Target); //Moving or copying image uploaded to target file location
		
		if($Execute){
			$_SESSION["SuccessMessage"]="Your Business Information Updated Successfully";
			Redirect_to("Login.php");
		}else{
			$_SESSION["ErrorMessage"]="Business Information Failed to Add";
			Redirect_to("ClaimBusiness.php?ClaimId=$ClaimId&UserId=$User_id");
		}
		
	}
}

?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Claim Business</title>
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
              
            </div>
            
        </div>
	<div class="Line topspace"></div>
	<div class="container"> <!--Main Container-->
		<div class="row">
		<div class="col panel panel-default" style="padding: 40px;">
		<div>
			<?php 
			echo Message();
			echo SuccessMessage();
			?>
		</div>
			<?php 
				$SearchQueryParameter = $_GET["ClaimId"];
				$UserIdFromURL=$_GET["UserId"];
				$ActualOwnerId=mysql_fetch_row(mysql_query("SELECT user_id FROM business WHERE id='$SearchQueryParameter'"));
				if($ActualOwnerId[0] == 2 || $ActualOwnerId[0] == 3 || $ActualOwnerId[0] == 4){
			?>
				<h2>Edit Business Information</h2>
				<div>
					<?php 
						$SearchQueryParameter=$_GET['ClaimId'];
						$ConnectingDB;
						$Query = "SELECT * FROM business WHERE id='$SearchQueryParameter'";
						$ExecuteQuery=mysql_query($Query);
						while($DataRows=mysql_fetch_array($ExecuteQuery)){
							$Businessname = $DataRows['name'];
							$Address1 = $DataRows['address1'];
							$Address2 = $DataRows['address2'];
							$TownCity = $DataRows['towncity'];
							$Postcode = $DataRows['postcode'];
							$Phone = $DataRows['phone'];
							$Mobile = $DataRows['mobile'];
							$Website = $DataRows['website'];
							$Category = $DataRows['businesstype'];
							$Image=$DataRows['image'];
							$Overview = $DataRows['overview'];
						}
					
					?>
				<form action="ClaimBusiness.php?ClaimId=<?php echo $SearchQueryParameter;?>&UserId=<?php echo $UserIdFromURL;?>" method="post" enctype="multipart/form-data">
					<fieldset>
						<div class="form-group">
							<label for="Businessname"><span class="FieldInfo">Business Name:</span></label>
							<input value="<?php echo $Businessname;?>" class="form-control" type="text" name="Businessname" id="Businessname" placeholder="Business Name">
						</div>
						<div class="form-group">
							<label for="Businessaddress"><span class="FieldInfo">Business Address:</span></label><br>
							<label for="Address1"><span class="FieldInfo">Address Line 1:</span></label>
							<input value="<?php echo $Address1;?>"  class="form-control" type="text" name="Address1" id="Address1" placeholder="Business Address Line 1">
						</div>
						<div class="form-group">
							<label for="Address2"><span class="FieldInfo">Address Line 2:</span></label>
							<input value="<?php echo $Address2;?>" class="form-control" type="text" name="Address2" id="Address2" placeholder="Business Address Line 2">
						</div>
						<div class="form-row" style="margin-left: -15px;">
    			 			<div class="form-group col-md-6">
							<label for="TownCity"><span class="FieldInfo">Town or City:</span></label>
      						<input value="<?php echo $TownCity;?>"  type="text" class="form-control" name="TownCity" id="TownCity" placeholder="Town or City">
    						</div>
							<div class="form-group col-md-6">
							<label for="Postcode"><span class="FieldInfo">Postcode:</span></label>
      						<input value="<?php echo $Postcode;?>"  type="text" class="form-control" name="Postcode" id="Postcode" placeholder="Postcode">
    						</div>
						</div>
						<div class="form-group">
							<label for="Phone"><span class="FieldInfo">Phone:</span></label>
							<input value="<?php echo $Phone;?>"  class="form-control" type="text" name="Phone" id="Phone" placeholder="Business Phone Number">
						</div>
						<div class="form-group">
							<label for="Mobile"><span class="FieldInfo">Mobile:</span></label>
							<input value="<?php echo $Mobile;?>"  class="form-control" type="text" name="Mobile" id="Mobile" placeholder="Mobile Number">
						</div>
						<div class="form-group">
							<label for="Website"><span class="FieldInfo">Website:</span></label>
							<input value="<?php echo $Website;?>"  class="form-control" type="text" name="Website" id="Website" placeholder="Website">
						</div>
						<div class="form-group">
							<span class="FieldInfo">Existing Category:</span>
							<?php echo $Category."<br>"; ?> 
							<label for=categoryselect><span class="FieldInfo">Business Type:</span></label>
							<select class="form-control" id="categoryselect" name="Category">
								
								<?php 
									global $ConnectingDB;
									$ViewQuery = "SELECT * FROM category ORDER BY datetime DESC";
									$Execute=mysql_query($ViewQuery);
									while($DataRows=mysql_fetch_array($Execute)){
										$Id=$DataRows["id"];
										$CategoryName=$DataRows["name"];	
								?>
								<option><?php echo $CategoryName; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<span class="FieldInfo">Existing Image:</span>
							<img src="Upload/<?php echo $Image; ?>" width="180" height="100">
							<br>
							<label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
							<input type="file" class="form-control" name="Image" id="imageselect">
						</div><br>
						<div class="form-group">
							<label for="Overview"><span class="FieldInfo">Business Overview:</span></label>
							<textarea class="form-control" name="Overview" id="Overviewarea" placeholder="Provide Some Information About Your Business" rows="5"><?php echo $Overview;?></textarea>
						</div>
						<input class="btn btn-success btn-block" type="submit" name="Submit" value="Claim Your Business">
						<br><br>
					</fieldset>
				</form>
					
					
				</div>
			<?php 
				}else{
					echo "Already Claimed Business Please Contact Administrator";
				}
			?>
				
				
				
			</div>
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
