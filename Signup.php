<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php
if(isset($_POST["Submit"])){
	$Firstname=mysql_real_escape_string($_POST["Firstname"]);
	$Lastname=mysql_real_escape_string($_POST["Lastname"]);
	$Username = mysql_real_escape_string($_POST["Username"]);
	$Email = mysql_real_escape_string($_POST["Email"]);
	$Password = mysql_real_escape_string($_POST["Password"]);
	$ConfirmPassword = mysql_real_escape_string($_POST["ConfirmPassword"]);
	date_default_timezone_set("Europe/London");
	$Currenttime=time();
	$DateTime=strftime("%B/%d/%Y %H:%M:%S",$Currenttime);
	$Admin="Rup";
	if(empty($Username) || empty($Password) || empty($ConfirmPassword)){
		$_SESSION["ErrorMessage"]="All Fields must be filled out";
		Redirect_to("Signup.php");
		//header("Location:dashboard.php");
	}elseif(strlen($Password)<4){
		$_SESSION["ErrorMessage"]="Atleast 4 Characters For Password are required";
		Redirect_to("Signup.php");		
	}elseif($Password!==$ConfirmPassword){
		$_SESSION["ErrorMessage"]="Password and Confirm Password must be same";
		Redirect_to("Signup.php");		
	}else{
		global $ConnectingDB;
		$Password = hashword($Password,$salt);
		$Username = encrypt($Username,$key);
		//echo "<h1 style='color:white'>Password is : ".$Password."</h1>";
		$Query="INSERT INTO registration (datetime,firstname,lastname,username,email,password,addedby)
		VALUES('$DateTime','$Firstname','$Lastname','$Username','$Email','$Password','$Admin')";
		$Execute=mysql_query($Query);
		if($Execute){
			$_SESSION["SuccessMessage"]="SignUp Successfully";
			Redirect_to("Login.php");
		}else{
			$_SESSION["ErrorMessage"]="Signup Failed to Add";
			Redirect_to("Signup.php");
		}
		
	}
}

?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Sign Up</title>
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
	<div class="Line topspace"></div>
	
	<div class="container-fluid">
		<div class="row">
			
			<div class="col-sm-offset-2 col-sm-8 panel panel-default" style="margin-top: 20px; padding: 40px;">
				<div>
					<?php 
					echo Message();
					echo SuccessMessage();
					?>
				</div>
				
				<h2>Sign Up Ramro6</h2>
				
				<div>
				<form action="Signup.php" method="post">
					<fieldset>
						<div class="form-group" style="margin-left: -15px;">
						 <div class="col-md-6">
     					 <label for="Firstname">First name:</label>
     						 <input type="text" class="form-control" name="Firstname" id="Firstname" placeholder="First name" required>
   						 </div>
							
						 <div class="col-md-6 pull-right">
     					 <label for="Lastname">Last name:</label>
     						 <input type="text" class="form-control" name="Lastname" id="Lastname" placeholder="First name" required>
   						 </div>
						</div>
						<br><br><br><br>
						<div class="form-group">
							<label for="Username">User Name:</label>
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-user text-primary"></span>
								</span>
								<input class="form-control" type="text" name="Username" id="Username" placeholder="User Name">
							</div>
						</div><br>
						<div class="form-group">
							<label for="Email">Email:</label>
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-envelope text-primary"></span>
								</span>
								<input class="form-control" type="text" name="Email" id="Email" placeholder="Email">
							</div>
						</div><br>
						<div class="form-group">
							<label for="Password">Password:</label>
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock text-primary"></span>
								</span>
							<input class="form-control" type="Password" name="Password" id="Password" placeholder="Password">
							</div>
						</div><br>
						
						<div class="form-group">
							<label for="ConfirmPassword">Confirm Password:</label>
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock text-primary"></span>
								</span>
							<input class="form-control" type="Password" name="ConfirmPassword" id="ConfirmPassword" placeholder="Confirm Password">
							</div>
						</div><br>
				</div><br>
						<input class="btn btn-info btn-block" type="submit" name="Submit" value="Sign Up">
						<br><br>
					</fieldset>
				</form>
				</div>
				<div class="table-responsive">
							
				
				</div>
				
				
			</div><!-- Ending of Main Area--->
		
		</div><!-- Ending of Row--->
	
	</div><!-- Ending of Container-fluid-->
	
	
</body>
</html>
