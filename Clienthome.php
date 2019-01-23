<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php Confirm_Login(); ?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Client Home Page</title>
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
		<?php
			$ConnectionDB;
					$ClientId=ClientInfo();
					$Query= "SELECT * FROM registration WHERE id='$ClientId'";
					$Execute=mysql_query($Query);
					while($DataRows=mysql_fetch_array($Execute)){
						$Id=$DataRows['id'];
						$Datetime=$DataRows['datetime'];
						$Username=decrypt($DataRows['username'],$key);
						$Firstname=$DataRows['firstname'];
						$Lastname=$DataRows['lastname'];
						$Email=$DataRows['email'];
						$Addedby=$DataRows['addedby'];
						$image=$DataRows['image'];
						if(strlen($Datetime)>15){
							$Datetime = substr($Datetime,0,3)." ".substr($Datetime,11,4);
					}
					
					$NoOfBusiness=mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM business WHERE user_id='$ClientId'"));
					$NoOfReview=mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM review WHERE user_business_id='$ClientId'"));
					if($NoOfBusiness[0]==null){
						$NoOfBusiness[0]=0;
					}
					if($NoOfReview[0]==null){
						$NoOfReview[0]=0;
					}
				?>
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			
				<pre><h3 class="lead">User:</h3><?php echo $Firstname." ".$Lastname; ?></span></pre>
				
				<pre><a href="Dashboard.php"><h3 class="lead">Number Of Business Registered:</h3><?php echo $NoOfBusiness[0]; ?></span></a></pre>
				
				<pre><a href="Review.php"><h3 class="lead">Number Of Business Reviewed:</h3><?php echo $NoOfReview[0]; ?></span></a></pre>
				<pre><a href="Logout.php"><h3 class="lead"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</h3></a></pre>
			
	</div>
<div id="main">
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
				<form action="Clienthome.php">
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
			<span style="cursor:pointer" onclick="openNav()"><div class="Topheader"><?php echo $Firstname;?></div></span>
			
			<script><!---Side Nav Menu-->
				function openNav() {
				  	document.getElementById("mySidenav").style.width = "400px";
				  	document.getElementById("main").style.marginRight = "400px";
				  	document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
				}
				function closeNav() {
					document.getElementById("mySidenav").style.width = "0";
					document.getElementById("main").style.marginRight= "0";
					document.body.style.backgroundColor = "white";
				}
			</script>
	 <script>
         function myPopup(myURL, title, myWidth, myHeight) {
            var left = (screen.width - myWidth) / 2;
            var top = (screen.height - myHeight) / 4;
            var myWindow = window.open(myURL, title, 'titlebar=0, toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
         }
      </script>
            </div>
        </div>
	<div class="Line topspace"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8" id="Bannerbg">
				<div class="col-sm-offset-4 col-sm-3">
					<br><br><br><br><br><br><br>
					<div class="upload">
					<button class="btn btn-default btn-sm" onclick=" myPopup ('UploadUserImage.php', 'web', 350, 450);">
						<span class="glyphicon glyphicon-cloud-upload"></span>
					</button>
					</div>
					<?php 
						if($image==null){
							$image="user.png";
						}
					?>
	<img alt="Upload Your Image" src="Upload/User/<?php echo $image;?>" class="img-responsive img-circle img-thumbnail imageicon">
					<?php echo $Username;?><br>
					Since: <?php echo $Datetime;?><br>
					<?php }?>
				</div>			
			</div>
		</div><!-- Ending of Row--->
	
		
		<div class="row">
			<hr>
				<div style="text-align: center;">
					<h1>Welcome to Ramro6.com </h1>
					<p class="lead">The One and only Nepalese Business Listing Site in UK</p>
					
				</div>
		</div>
	</div><!-- Ending of Container-->
	<hr>
	<div>
		<div class="container">
			<div class="row" style="margin: 10px 0 10px 25px;">
				<div class="col-sm-2 block01">
					<br><br><br><br><br><br>
					<br><br><br><br><br><br>
					<a href="Dashboard.php" style="text-decoration: none;">
						<div class="BlockContain">
							&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-th"></span>&nbsp; Dashboard
						</div>
					</a>
				</div>
				<div class="col-sm-2  block02" >
					<br><br><br><br><br><br>
					<br><br><br><br><br><br>
					<a href="Categories.php"  style="text-decoration: none;">
						<div class="BlockContain" style="width: 250px;">
							&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-tags"></span>&nbsp; Categories
						</div>
					</a>
				</div>
				<div class="col-sm-2 block03">
					<br><br><br><br><br><br>
					<br><br><br><br><br><br>
					<a href="Business.php"  style="text-decoration: none;">
						<div class="BlockContain" style="margin-left: 0px;">
							&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-list-alt"></span>&nbsp; Business
						</div>
					</a>
				</div>
				<div class="col-sm-2 block04">
					<br><br><br><br><br><br>
					<br><br><br><br><br><br>
					<a href="Account.php"  style="text-decoration: none;">
						<div class="BlockContain" style="width: 250px;">
							&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span>&nbsp; Account
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
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
</div>
</body>
</html>
