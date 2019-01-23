<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>::Ramro6.com::</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>	
	-->
	<link rel="stylesheet" href="css/publicstyles.css">
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
				<a class="navbar-brand" href="Company.php">
					<span class="BrandName">Ramro6.com</span></a>
				<a class="navbar-brand" href="Clienthome.php">
					<span class="BrandName" style="color:#FFFFFF;">Ramro6 Business</span></a>
				</div>
				
		<div class="collapse navbar-collapse topmenu" id="collapse">
				
					<ul class="nav navbar-nav" style="float: right;">
						<li><a href="home.php">Home</a></li>
						<li><a href="#">Clam Business Requests</a></li>
						<li><a href="Signup.php">Sign In</a></li>
						<li><a href="Signup.php">Sign Up</a></li>
					</ul>
				
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
				
            </div>
		<div class="col-sm-2" style="margin-top: -5px;">
                <i class="fa fa-user-circle-o pull-left" style="font-size:40px;color:#515151"></i>
			
				<a href="Clienthome.php"><div class="Topheader">Login &raquo;</div></a>
            </div>
            
        </div>
	<div class="Line topspace"></div>
		
<div class="container-fluid"  style="background:url(images/Banner-bg.jpg) no-repeat center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;  height:70vh;" id="download"><!--Banner Container-->
				<div class="row">
				  <div class="col-sm-offset-3 col-sm-9" style="text-align:center; color:#FFFFFF;">
					<div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
						<br><br><br><br><br>
						<span class="BannerSlogan">Ramro6 The Biggest Nepalese Business Listing site in UK</span>
						<BR><BR>
								<form action="Company.php">
									<div id="custom-search-input">
										<div class="input-group col-md-12">
											<input type="text" name="Search" class="form-control input-lg" placeholder="Company Name, Driver or Restaurant" />
											<span class="input-group-btn" name="SearchButton">
												<button class="btn btn-info btn-lg" name="SearchButton">
													<i class="glyphicon glyphicon-search"></i>
												</button>
											</span>
										</div>
									</div>
								</form>
							</div>
				  </div>
					</div>
			
</div><!-- Ending of Banner Container-->

			<div class="container"><!--Main Body container-->
				<div class="row">
					<div class="col-sm-4 adscontainer">
						<br><div class="homeicon">
						<span class="glyphicon glyphicon-tags"></span>
						</div>
						<h4>Business Offers</h4><br>
			<p>Publish your offers so that customers will online and find your business</p>
					</div>
				
				<div class="col-sm-4 border border-primary adsmid">
						<br><div class="homeicon">
						<span class="glyphicon glyphicon-blackboard"></span>
						</div>
						<h4>Advertise Your Business For FREE</h4><br>
			<p>Claim your free business advertising on ramro6 Local to display your business phone number to customers searching in your area. Upgrade to an Enhanced Listing to unlock more.</p>
					<br><br><br><br>
				</div>
				
				<div class="col-sm-4 adscontainer">
						<br><div class="homeicon">
						<span class="glyphicon glyphicon-tags"></span>
						</div>
						<h4>Special Offers</h4><br>
			<p>Publish your offers so that customers will online and find your business</p>
				</div>
					
				</div>
			</div><!--End of Main Body container-->					
<br>
	<div class="businesshome">
		<div class="container">
			<h3>Popular Nepalese Business</h3>
			<div class="row"><!--Row Popular Business Categories-->
				<div class="col-md-2">
					<a href="Company.php?Category=off-licence" style="text-decoration: none; color: black;">
					<img src="images/nepalese-offlicence.JPG" class="img-responsive img-thumbnail" width="100%" height="50%">
					<div class="ads-brief">Off Licence</div><br>
					</a>
				</div>
				<div class="col-md-2">
					<a href="Company.php?Category=Mo:Mo Distributor" style="text-decoration: none; color: black;">
					<img src="images/momo-distributor.png" class="img-responsive img-thumbnail" width="100%" height="50%">
					<div class="ads-brief">Mo:Mo distributor</div><br>
					</a>
				</div>
				<div class="col-md-2">
					<a href="Company.php?Category=Taxi" style="text-decoration: none; color: black;">
					<img src="images/taxi.png" class="img-responsive img-thumbnail" width="100%" height="50%">
					<div class="ads-brief">Taxi</div><br>
					</a>
				</div>
				<div class="col-md-2">
					<a href="Company.php?Category=Gold Shop" style="text-decoration: none; color: black;">
					<img src="images/gold-shop.png" class="img-responsive img-thumbnail" width="100%" height="50%">
					<div class="ads-brief">Gold Shop</div><br>
					</a>
				</div>
				<div class="col-md-2">
					<a href="Company.php?Category=Restaurant" style="text-decoration: none; color: black;">
					<img src="images/nepalese-restaurant.png" class="img-responsive img-thumbnail" width="100%" height="50%">
					<div class="ads-brief">Nepalese Restaurant</div><br>
					</a>
				</div>
				<div class="col-md-2">
					<a href="Company.php?Category=Driving Instructor" style="text-decoration: none; color: black;">
					<img src="images/driving-instructor.png" class="img-responsive img-thumbnail" width="100%" height="50%">
					<div class="ads-brief">Driving Instructor</div><br>
					</a>
				</div>
			</div><!--End of Popular Business Row-->
			<hr>
			
			<div class="row">
				<h3>Popular Location</h3>
				<div class="col-sm-3">
				<?php 
						global $ConnectingDB;
						$Execute=mysql_query("SELECT DISTINCT towncity FROM business ORDER BY towncity ASC");		
						while($DataRows=mysql_fetch_array($Execute)){
							$Location=$DataRows["towncity"];
					?>
					<table class="tablelocation">
					<tr>
						<td><a href="Company.php?Location=<?php echo $Location;?>" style="text-decoration: none;">
							<span class="location"><?php echo $Location; ?></span></a></td>
					</tr>
					</table>
						
						<?php } ?>
				</div>
				<div class="col-sm-3">
				<?php 
						global $ConnectingDB;
						$Execute=mysql_query("SELECT DISTINCT towncity FROM business ORDER BY towncity ASC");		
						while($DataRows=mysql_fetch_array($Execute)){
							$Location=$DataRows["towncity"];
					?>
					<table class="tablelocation">
					<tr>
						<td><a href="Company.php?Location=<?php echo $Location;?>" style="text-decoration: none;">
							<span class="location"><?php echo $Location; ?></span></a></td>
					</tr>
					</table>
						
						<?php } ?>
				</div>
				<div class="col-sm-3">
				<?php 
						global $ConnectingDB;
						$Execute=mysql_query("SELECT DISTINCT towncity FROM business ORDER BY towncity ASC");		
						while($DataRows=mysql_fetch_array($Execute)){
							$Location=$DataRows["towncity"];
					?>
					<table class="tablelocation">
					<tr>
						<td><a href="Company.php?Location=<?php echo $Location;?>" style="text-decoration: none;">
							<span class="location"><?php echo $Location; ?></span></a></td>
					</tr>
					</table>
						
						<?php } ?>
				</div>
				<div class="col-sm-3">
				<?php 
						global $ConnectingDB;
						$Execute=mysql_query("SELECT DISTINCT towncity FROM business ORDER BY towncity ASC");		
						while($DataRows=mysql_fetch_array($Execute)){
							$Location=$DataRows["towncity"];
					?>
					<table class="tablelocation">
					<tr>
						<td><a href="Company.php?Location=<?php echo $Location;?>" style="text-decoration: none;">
							<span class="location"><?php echo $Location; ?></span></a></td>
					</tr>
					</table>
						
						<?php } ?>
				</div>
				
				
			</div><!--End of Popular Location Row-->
		<br><br>
		
		</div>
	</div>

<div class="container">
	<div class="row"><!--Row Featured Business-->
		<h3>Featured Business</h3>
		<br>
			<?php
				
				$ConnectingDB;
				$Execute=mysql_query("SELECT * FROM business ORDER BY RAND() LIMIT 0,4");
			
				while($DataRows=mysql_fetch_array($Execute)){
					$Businessid=$DataRows["id"];
					$Businessname=$DataRows["name"];
					$Address=$DataRows["address1"]." ".$DataRows["address2"]." ".$DataRows["towncity"];
					$Image=$DataRows["image"];
					
					if(strlen($Businessname)>32){
						$Businessname = substr($Businessname,0,32);
					}
			?>
			
		<div class="col-md-3">
			<a href="CompanyFull.php?id=<?php echo $Businessid;?>" style="text-decoration: none; color: black;">
				<div class="well" style="background:url(Upload/<?php echo $Image;?>) no-repeat center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; width: 100%; height:40vh;">
					<div class="descfeature">
						<h3><?php echo $Businessname;?></h3>
					<?php echo $Address;?><br>
					</div>
				<br>
				</div>
			</a>
		</div>
				<?php } ?>
			</div><!--End of Popular Business Row-->
					
</div>

<div class="container-fluid"><!--Footer-->
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