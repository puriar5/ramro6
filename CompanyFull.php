<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php
if(isset($_POST["Submit"])){
	$Name = mysql_real_escape_string($_POST["Name"]);
	$Rating = (int)mysql_real_escape_string($_POST["Rating"]);
	$Comment = mysql_real_escape_string($_POST["Comment"]);
	date_default_timezone_set("Europe/London");
	$Currenttime=time();
	//$DateTime=strftime("%Y-%m-%d %H:%M:%S",$Currenttime);
	//converting time into Year Month Day and Hour Minutes and Second
	$DateTime=strftime("%B/%d/%Y %H:%M:%S",$Currenttime);
	$BusinessId=$_GET["id"];
	
	
	$ConnectingDB;
	$UserQuery="SELECT user_id FROM business WHERE id='$BusinessId'";
	$ExecuteQuery=mysql_query($UserQuery);
	while ($DataRows=mysql_fetch_array($ExecuteQuery)){
		$Userid=$DataRows["user_id"];
		}
	
		if(empty($Name)||empty($Comment)){
			$_SESSION["ErrorMessage"]="All Fields are required";

		}elseif(strlen($Comment)>500){
			$_SESSION["ErrorMessage"]="Only 500 Characters are Allowed in Comment";

		}else{

			$Query="INSERT INTO review (datetime,name,rating,comment,status,business_id,user_business_id)
			VALUES('$DateTime','$Name','$Rating','$Comment','ON','$BusinessId','$Userid')";
			$Execute=mysql_query($Query);
			if($Execute){
				$_SESSION["SuccessMessage"]="Comment Submitted Successfully	";
				Redirect_to("CompanyFull.php?id={$BusinessId}");
			}else{
				$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again";
				Redirect_to("CompanyFull.php?id={$BusinessId}");
			}

		}
	
}

?>
<!doctype html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>
		<?php
		$BusinessId=$_GET["id"];
		$Title=mysql_fetch_row(mysql_query("SELECT name,businesstype from business WHERE id='$BusinessId'"));
		echo $Title[0]." || ".$Title[1];?>
	</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="css/lightbox.css" rel="stylesheet">
	<script src="js/lightbox.js"></script>
	<link rel="stylesheet" href="css/publicstyles.css">
	
</head>

<body>
	<!--Top Navigation with ramro6 and ramro6 business link-->
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

				<div class="collapse navbar-collapse" id="collapse">
				<!-- Add something to hide when mobile verson-->
				</div>
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
			<form action="Company.php">
				<div id="custom-search-input">
					<div class="input-group col-md-12">
						<input type="text" name="Search" class="form-control input-lg" placeholder="Company Name, Driver or Restaurant"/>
						<span class="input-group-btn" name="SearchButton">
								<button class="btn btn-info btn-lg" name="SearchButton">
									<i class="glyphicon glyphicon-search"></i>
								</button>
							</span>
					
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm-2" style="margin-top: -5px;">
			<i class="fa fa-user-circle-o pull-left" style="font-size:40px;color:#515151"></i>

			<a href="Login.php">
				<div class="Topheader">
					Login &raquo;</div>
			</a>
		</div>

	</div>
	
	<div class="Line topspace"></div>

	<div class="container-fluid"><!--Main Container Fluid with All Body Contain-->

		<div class="row">
			<!--Main Row Container with Companies -->

			<div class="col-sm-offset-1 col-sm-10">
				<!--Left Container of companies-->
				<br><br>
				<div>
					<?php 
					echo Message();
					echo SuccessMessage();
					?>
				</div>
				<div class="blog-header">
					<p class="lead"><a href="Company.php">&laquo; Back to Result</a>
					</p>
				</div>
				<?php
				global $ConnectingDB;
				// Query When Search Button is Active
				if ( isset( $_GET[ "SearchButton" ] ) ) {
					$Search = $_GET[ "Search" ];
					$ViewQuery = "SELECT * FROM business 
							    WHERE datetime LIKE '%$Search%'
								OR name LIKE '%$Search%' OR businesstype LIKE '%$Search%'
								OR overview LIKE '%$Search%' ORDER BY datetime desc";
				}
				//Query When Category Link Click from side bar
				elseif ( isset( $_GET[ "Category" ] ) ) {
						$Category = $_GET[ "Category" ];
						$ViewQuery = "SELECT * FROM business
								WHERE businesstype='$Category'
								ORDER BY datetime desc";
					}
					// The Default Query for Blog.php Page
				else {
					$CompanyIdFromUrl = $_GET[ "id" ];
					$ViewQuery = "SELECT * FROM business WHERE id='$CompanyIdFromUrl' 
								ORDER BY datetime desc";
				}
				$Execute = mysql_query( $ViewQuery );
				while ( $DataRows = mysql_fetch_array( $Execute ) ) {
					$BusinessId = $DataRows[ "id" ];
					$DateTime = $DataRows[ "datetime" ];
					$Businessname = $DataRows[ "name" ];
					$Address1 = $DataRows[ "address1" ];
					$Address2 = $DataRows[ "address2" ];
					$Towncity = $DataRows[ "towncity" ];
					$Postcode = $DataRows[ "postcode" ];
					$Phone = $DataRows[ "phone" ];
					$Mobile = $DataRows[ "mobile" ];
					$Website = $DataRows[ "website" ];
					$Businesstype = $DataRows[ "businesstype" ];
					$Image = $DataRows[ "image" ];
					$Overview = $DataRows[ "overview" ];
					$User_id = $DataRows[ "user_id" ];
					?>

				<div class="row" style="margin: 0; padding: 0;">
					<!--Row Banner With Company info and googlemap-->
					<div class="col-sm-7 BannerCompanyInfo">
						<div class="row">
							<div class="col-sm-3" style="margin-left: 20px;">
								<br>
								<img class="img-responsive img-rounded companyImg" src="Upload/<?php echo $Image;?>"><br> Established Business in
								<?php echo $Businesstype;?> since
								<?php 
							if(strlen($DateTime)>15){
									$DateTime = substr($DateTime,0,3)." ".substr($DateTime,11,4);
								}
							echo $DateTime;
							?>

							</div>
							<div class="col-sm-8" style="margin: 0; padding: 0; line-height: 30px;">
								<div class="caption">
									<h1 id="headingmain">
										<?php echo htmlentities($Businessname);?>
									</h1>
									<span class="companybusiness" style="font-size: 18px;">
										<?php echo htmlentities($Businesstype);?>
									</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<span class="fa fa-clock-o" style="color: #5cb85c;"></span>&nbsp;<span style="color: #5cb85c;">Opening times</span>
									<br>
									<div class="row">
										<div class="col-xs-12">
											<span class="glyphicon glyphicon-map-marker"></span>
											<?php echo $Address1." ".$Address2.
												" ".$Postcode." <b>".$Towncity."</b><br>";								
												?>
										</div>
										<div class="col-xs-12">
											<?php echo "<i class='fa fa-phone'></i> ".$Phone;  ?>
										</div>
										<div class="col-xs-12">
											<span style="color: white; font-weight: bold;"><span class="glyphicon glyphicon-globe"></span> &nbsp;
											<?php echo $Website;?>
											</span>
										</div>
									</div>

									<div>
										<a href="#review" style="color: #fedb00; text-decoration: none;">
										<?php 
							$ConnectionDB;
							$BusinessIdForReview = $_GET['id'];
							$RateQuery= "SELECT AVG(review.rating) AS rating FROM review 
													   WHERE business_id='$BusinessIdForReview'";
							$Avgrate=mysql_fetch_array(mysql_query($RateQuery));
					
							$CountRateQuery= "SELECT COUNT(review.rating) AS rating FROM review 
													   WHERE business_id='$BusinessIdForReview'";
							$Norate=mysql_fetch_array(mysql_query($CountRateQuery));
							$Averagerate=round($Avgrate[0]);
							if($Averagerate==0){
								$output="<span style='color: #adadad;'>";
								$output.="<span class='glyphicon glyphicon-star'></span>";
								$output.="<span class='glyphicon glyphicon-star'></span>";
								$output.="<span class='glyphicon glyphicon-star'></span>";
								$output.="<span class='glyphicon glyphicon-star'></span>";
								$output.="<span class='glyphicon glyphicon-star'></span>";
								$output.="</span>";
								echo $output;
									
							}else{
								$output="";
								for($i=0;$i<$Averagerate;$i++){
									$output.="<span class='glyphicon glyphicon-star'></span>";
								}
								echo $output;
								$output="";
								if($Averagerate>0 && $Averagerate<5){
									for($i=0;$i<(5-$Averagerate); $i++){
										$output.="<span class='glyphicon glyphicon-star'></span>";
									}
								}
								echo "<span style='color: #adadad;'>".$output."</span>";
								
								echo " <span style='color: white;'>".round($Avgrate[0],2)."</span>";
								
								
							}
								
								
					?>
										</a><a href="#writereview" style="text-decoration: none;">Write a review</a></span>
									</div>
									<br>
									<button type="button" class="btn btn-warning btn-lg" style="background-color: #cd004d; border: #cd004d;">
								<span style="color: white; font-weight: bold;"><span class="glyphicon glyphicon-phone"></span> &nbsp;Mobile</span>
							</button>
								
									<button type="button" class="btn btn-warning btn-lg" style="background-color: #cd004d; border: #cd004d;">
								<span style="color: white; font-weight: bold;"><span class="glyphicon glyphicon-envelope"></span> &nbsp;Email</span>
							</button>
									<br>
								</div>

							</div>


						</div>
					</div>
					<div class="col-sm-5" style="margin: 0; padding: 0;">
		<div class="maprup" style=" height: 300px;">
		<?php 
	$gmap =$Address1." ".$Address2.", ".$Towncity.", ".$Postcode;
echo '<iframe frameborder="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $gmap)) . '&z=14&output=embed" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>';
?></div>
					</div>
				</div>
				<!--End of banner row--->
				<hr color="#e1e1e1">
				<div class="row">
					<div class="col-sm-3">
						<p class="lead"><a href="Company.php">Home > </a>
							<a href="Company.php?Category=<?php echo $Businesstype;?>">
								<?php echo $Businesstype; ?>
							</a>
						</p>
					</div>
					<div class="col-sm-offset-5 col-sm-4">
						<!--These buttons are created by frinmash.blogspot.com,frinton madtha-->
						<div style="float: right;">
							<!-- Facebook --><a href="https://www.facebook.com/sharer.php?u=https://frinmash.blogspot.com" target="_blank"><img class="share-buttons" src="https://4.bp.blogspot.com/-raFYZvIFUV0/UwNI2ek6i3I/AAAAAAAAGSA/zs-kwq0q58E/s1600/facebook.png" alt="Facebook" /></a>
							<!-- Twitter --><a href="https://twitter.com/share?url=https://frinmash.blogspot.com&text=Simple Share Buttons" target="_blank"><img class="share-buttons" src="https://4.bp.blogspot.com/--ISQEurz3aE/UwNI4hDaQMI/AAAAAAAAGS4/ZAgmPiM9Xpk/s1600/twitter.png" alt="Twitter" /></a>
							<!-- Google+ --><a href="https://plus.google.com/share?url=https://frinmash.blogspot.com" target="_blank"><img class="share-buttons"   src="https://2.bp.blogspot.com/-9ijXNtKTaSk/UwNI3ANT4MI/AAAAAAAAGSY/Tu4kE8x9SnI/s1600/google.png" alt="Google" /></a>
						</div>


					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-8">
						<div>
							<h1 class="headerDetail">About Our Business</h1>
							<a name="info" style="text-decoration: none; color: black;"> </a>
							<h2 class="headerDetailDesc">
								<?php echo htmlentities($Businessname);?>
							</h2>
							<p class="overviewDetail">
								
								<?php echo nl2br($Overview); ?>
							</p>
							<bR>
							<bR>
							<bR>
							<bR>
						</div>
						<hr color="#e1e1e1">
				<div>
					<div style="min-height: 100px;"><!--Gallery Div-->
						<h1 class="headerDetail">Gallery</h1>
						<?php 
							$ConnectingDB;
							$ViewQuery="SELECT * FROM gallery WHERE 
										business_id='$BusinessId' 
										ORDER BY ID desc;";
							$Execute=mysql_query($ViewQuery);
							while($DataRows=mysql_fetch_array($Execute)){
								$Galleryid=$DataRows["id"];
								$Uploadfilename=$DataRows["filename"];
								$Uploadpath=$DataRows["uploadedon"];
						?>
					<a href="<?php echo $Uploadpath;?>" data-lightbox="example-set">
					<img src="<?php echo $Uploadpath;?>" width="170" height="80%" class="img-responsive img-thumbnail"/>
					</a>

						<?php }?>

					</div>
						<hr color="#e1e1e1">
						<div>
							
							<h1 class="headerDetail"><a name="review" style="text-decoration: none; color: black;">Review</a></h1>
							<?php 
					$ConnectionDB;
					$BusinessIdForReview = $_GET['id'];
					$ExtractingCommentsQuery= "SELECT * FROM review 
											   WHERE business_id='$BusinessIdForReview'
											   AND status='ON'";
					$Execute=mysql_query($ExtractingCommentsQuery);
					while($DataRows=mysql_fetch_array($Execute)){
						$Reviewname=$DataRows["name"];
						$Reviewrating=$DataRows["rating"];
						$ReviewComment=$DataRows["comment"];
						
					
			  	?>
				<div class="CommentBlock">
					<p class="Comment-info">
						<i class="fa fa-user-circle-o pull-left" style="font-size:20px;color:#515151"></i>
						<?php echo $Reviewname; ?>
					</p>
					
					<p class="comment"><?php echo nl2br($ReviewComment); ?></p>
					
				</div>
					<br>
					
					<?php }?>
				<span class="FieldInfo"><strong>
					<a name="writereview" style="text-decoration: none; color: black;">Share Your Thoughts about This Business</a></strong></span>	
				<form action="CompanyFull.php?id=<?php echo $BusinessId; ?>" method="post" enctype="multipart/form-data">
					<fieldset>
						<div class="form-group">
							<label for="Name"><span class="FieldInfo">Name:</span></label>
							<input class="form-control" type="text" name="Name" id="Name" placeholder="Name">
						</div>
		<div class="form-group"><!--Star Review -->
			<label for="Rate"><span class="FieldInfo">Rate:</span></label>
			<div class="ratingstar">
				<input type="radio" name="Rating" id="star1" value="5">
				<label for="star1"></label>
				<input type="radio" name="Rating" id="star2" value="4">
				<label for="star2"></label>
				<input type="radio" name="Rating" id="star3" value="3">
				<label for="star3"></label>
				<input type="radio" name="Rating" id="star4" value="2">
				<label for="star4"></label>
				<input type="radio" name="Rating" id="star5" value="1">
				<label for="star5"></label>
			</div>
		</div>
						<br><br><br><br>
							
						
						<div class="form-group">
							<label for="commentarea"><span class="FieldInfo">Comment:</span></label>
							<textarea class="form-control" name="Comment" id="commentarea" rows="7"></textarea>
						</div><br>
						
						<input class="btn btn-primary" type="submit" name="Submit" value="Submit">
						<br><br>
					</fieldset>
				</form>
							
						
						</div>
						<br>
						<hr color="#e1e1e1">
						<div>
							<h1 class="headerDetail">Similar Business</h1>
							<?php
							$ConnectingDB;
							$ViewQueryBlogs = "SELECT * FROM business WHERE businesstype='$Businesstype' && id!='$BusinessId' ORDER BY datetime desc LIMIT 0,5";
							$Result = mysql_query( $ViewQueryBlogs );
							while ( $DataRows = mysql_fetch_array( $Result ) ) {
								$SBussId = $DataRows[ "id" ];
								$SBussDateTime = $DataRows[ "datetime" ];
								$SBussname = $DataRows[ "name" ];
								$SBussAddress1 = $DataRows[ "address1" ];
								$SBussAddress2 = $DataRows[ "address2" ];
								$SBussTowncity = $DataRows[ "towncity" ];
								$SBussPostcode = $DataRows[ "postcode" ];
								$SBussPhone = $DataRows[ "phone" ];
								$SBussMobile = $DataRows[ "mobile" ];
								$SBussWebsite = $DataRows[ "website" ];
								$SBusstype = $DataRows[ "businesstype" ];
								$SBussImage = $DataRows[ "image" ];
								$SBussOverview = $DataRows[ "overview" ];

								if ( strlen( $SBussname ) > 11 ) {
									$SBussname = substr( $SBussname, 0, 14 );
								}
								?>
							<a href="CompanyFull.php?id=<?php echo $SBussId; ?>">
								<div class="col-sm-4">
									<img style="margin: 0 20px 0 0;" class="img-responsive img-thumbnail pull-left" src="Upload/<?php echo $SBussImage; ?>" width="120" height="70"/>
									<b>
										<?php echo htmlentities($SBussname); ?>
									</b>
									<p class="description" style="font-weight: normal;">
										<?php echo htmlentities("$SBussTowncity") ?><br>
										<span style="color: #fedb00;">
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										</span>
										<span>5.0</span><br><br>
									</p>

								</div>
							</a>
							<?php }	?>

						</div>

					</div>

								</div>
					<div class="col-sm-offset-1 col-sm-3">
						<div class="panel panel-default">
							<div class="panel-heading" style="margin-left: -1px;">
								<h2 class="panel-title">
								<span class="fa fa-clock-o"></span>&nbsp;
								Opening Times
							</h2>
							
							</div>
							<div class="panel-body overviewDetail">
								<table width="100%">
									<tr>
										<td>Sunday</td>
										<td>06:00 – 23:00</td>
									</tr>
									<tr>
										<td>Monday</td>
										<td>06:00 – 23:00</td>
									</tr>
									<tr>
										<td>Tuesday</td>
										<td>06:00 – 23:00</td>
									</tr>
									<tr>
										<td>Wednesday</td>
										<td>06:00 – 23:00</td>
									</tr>
									<tr>
										<td>Thursday</td>
										<td>06:00 – 23:00</td>
									</tr>
									<tr>
										<td>Friday</td>
										<td>06:00 – 23:00</td>
									</tr>
									<tr>
										<td>Saturday</td>
										<td>06:00 – 23:00</td>
									</tr>
								</table>
							</div>
							<div class="panel-footer"></div>
						</div>
						<br><br>
						<div class="panel panel-default">
							<div class="panel-heading" style="margin-left: -1px;">
								<h2 class="panel-title">
								Review Summary
							</h2>
							
							</div>
							<div class="panel-body overviewDetail ratingmain">
					<?php 
							$ConnectionDB;
							$BusinessIdForReview = $_GET['id'];
							$RateQuery= "SELECT AVG(review.rating) AS rating FROM review 
													   WHERE business_id='$BusinessIdForReview'";
							$Avgrate=mysql_fetch_array(mysql_query($RateQuery));
					
							$CountRateQuery= "SELECT COUNT(review.rating) AS rating FROM review 
													   WHERE business_id='$BusinessIdForReview'";
							$Norate=mysql_fetch_array(mysql_query($CountRateQuery));
							$Averagerate=round($Avgrate[0]);
							if($Averagerate==0){
								$output="<div style='color: #adadad;'>";
								$output.="<span class='glyphicon glyphicon-star'></span>";
								$output.="<span class='glyphicon glyphicon-star'></span>";
								$output.="<span class='glyphicon glyphicon-star'></span>";
								$output.="<span class='glyphicon glyphicon-star'></span>";
								$output.="<span class='glyphicon glyphicon-star'></span>";
								$output.="<br><h4>No Rating</h4>";
								$output.="</div>";
								echo $output;
									
							}else{
								$output="";
								for($i=0;$i<$Averagerate;$i++){
									$output.="<span class='glyphicon glyphicon-star'></span>";
								}
								echo $output;
								$output="";
								if($Averagerate>0 && $Averagerate<5){
									for($i=0;$i<(5-$Averagerate); $i++){
										$output.="<span class='glyphicon glyphicon-star'></span>";
									}
								}
								echo "<span style='color: #adadad;'>".$output."</span>";
								
								echo " <span style='color: black;'>".round($Avgrate[0],2)."</span><br>";
								echo "<span style='font-size:16px; color: black;'>".$Norate[0]." people reviewed"."</span><br><br>";
								
							}
								
								
					?>
								 <br>
								
								<button type="button" class="btn btn-warning" style="width: 140px; background-color: #cd004d; border: #cd004d;">
									<a href="#writereview" style="text-decoration: none; font-weight: bold; color: white;">Write Review</a>
							</button>
							
								<button type="button" class="btn btn-warning" style="width: 140px; background-color: #cd004d; border: #cd004d;">
								<a href="#review" style="text-decoration: none; color: white; font-weight: bold;">Read Review</a>
							</button>
								<br>

							</div>
							<div class="panel-footer"></div>
						</div>
						<br><br>
						<div class="panel panel-default">
							<div class="panel-heading" style="margin-left: -1px;">
								<h2 class="panel-title">
								Is this your Business?
							</h2>
							
							</div>
							<div class="panel-body overviewDetail" style="text-align: center;">
								<p>By claiming this business you can update and control company information</p>
								<a href="CreateAccount.php?ClaimId=<?php echo $BusinessId;?>" style="text-decoration: none;">
								<button type="button" class="btn btn-warning btn-lg" style="background-color: #cd004d; border: #cd004d;">
								<span style="color: white; font-weight: bold;">Claim Your Business</span
							</button>
									</a>
								<br>

							</div>
							<div class="panel-footer"></div>
						</div>
					</div>

				</div>


				<?php }?>

			</div>
			<!--End of Container Area col 10: Whole Body-->



		</div>
		<!--End of main row container-->
	</div>
	<!-- Ending of Container-->

	<div>
		<!--Footer-->
		<hr>
		<div id="footer">
			<p>
				Theme By | Rup Rai | &copy; 2019 ---All Right Reserved.
			</p>

			<p>
				The best any easy way to get information about Nepalese Business in United Kingdom. All Copyrights <br>&trade; <a style="text-decoration: none; cursor: pointer; font-weight: bold;" href="#">ruprai.com</a> &trade; Mycompany
				<hr>
			</p>
			</a>
		</div>
		<div class="Line topspace"></div>
	</div>
</body>

</html>