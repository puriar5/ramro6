<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php
if(isset($_POST["Submit"])){
	$Username = mysql_real_escape_string($_POST["Username"]);
	$Password = mysql_real_escape_string($_POST["Password"]);
	if(empty($Username) || empty($Password)){
		$_SESSION["ErrorMessage"]="All Fields must be filled out";
		Redirect_to("Login.php");
		//header("Location:dashboard.php");
	}
	else{
			$Found_Account=Login_Attempt($Username,$Password);
			
			$_SESSION["Username"]=$Found_Account;
			if($Found_Account){
				//$_SESSION["SuccessMessage"]="Welcome {$_SESSION["Username"]}";
				$_SESSION["ClientInfo"]="{$_SESSION["Username"]}";
				Redirect_to("Clienthome.php");
			}else{
				$_SESSION["ErrorMessage"]="Invalid Username or Password";
				Redirect_to("Login.php");
			}
				
		}
}

?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login</title>
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
	<br><br>
	<div class="container-fluid">
		<div class="row">
			
			<div class="col-sm-offset-2 col-sm-3 panel panel-default" style="padding: 40px;">
				<div>
					<?php 
					echo Message();
					echo SuccessMessage();
					?>
				</div>
				
				<h2>Sign In With Your Existing Account</h2>
				
			<form action="Login.php" method="post">
					<fieldset>
						<div class="form-group">
							<label for="Username"><span class="FieldInfo">User Name:</span></label>
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-user text-primary"></span>
								</span>
								<input class="form-control" type="text" name="Username" id="Username" placeholder="User Name">
							</div>
						</div><br>
						<div class="form-group">
							<label for="Password"><span class="FieldInfo">Password:</span></label>
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock text-primary"></span>
								</span>
							<input class="form-control" type="Password" name="Password" id="Password" placeholder="Password">
							</div>
						</div><br>
						<div class="row">
							<div class="col-sm-12">
								<input class="btn btn-info btn-block btn-lg" type="submit" name="Submit" value="Login">
							</div>
						</div>
						<br>
						<br><br>
						<br>
						<div class="row">
							<div class="col-sm-12 creatAccount">
								Don't Have Account
							<a href="Signup.php" style="text-decoration: none;"><button type="button" class="btn btn-outline-secondary btn-block btn-lg">Create Your Account</button></a> 
							</div>
						</div>
						<br><br>
					</fieldset>
				</form>
				
				
			</div><!-- Ending of Main Area--->
			
			<div class="col-sm-4" id="loginbg">
				<bR>Ramro6<bR><br>
				Your complete marketing platform.<br>
Thousands of people use our Business Listing every day to skyrocket their business online.
			
			</div>
		
		</div><!-- Ending of Row--->
	
	</div><!-- Ending of Container-fluid-->
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
