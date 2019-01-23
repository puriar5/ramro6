<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php Confirm_Login(); ?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Review Dashboard</title>
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
				<div class="Topheader"><?php 
						$ClientId=ClientInfo(); 
						$ConnectingDB;
						$Clientexecute = mysql_query("SELECT firstname FROM registration WHERE id='$ClientId'");
						$Clientrow = mysql_fetch_row($Clientexecute);
						echo $Clientrow[0];
					?></div>
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
				<li class="active"><a href="Review.php"><span class="glyphicon glyphicon-comment"></span>&nbsp; Review</a></li>
				<li><a href="Gallery.php?Page=1"><span class="glyphicon glyphicon-equalizer"></span>&nbsp; Gallery</a></li>
				<li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
				</ul>
			</div><!-- Ending of Side Area--->
		<div class="col-sm-10">
				<div>
					<?php 
					echo Message();
					echo SuccessMessage();
					?>
				</div>
				<h1>Un-Approved Review</h1>
				
				<div class="table-respnsive">
					<table class="table table-striped table-hover">
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Date</th>
							<th>Comment</th>
							<th>Rating</th>
							<th>Business Name</th>
							<th>Approve</th>
							<th>Delete Comment</th>
						
						</tr>
						<?php 
							$ConnectingDB;
							$ClientId=ClientInfo();
							$Query="SELECT * FROM review WHERE status='OFF' AND user_business_id='$ClientId' ORDER BY datetime desc";
							$Execute=mysql_query($Query);
							$SrNo=0;
							while($DataRows=mysql_fetch_array($Execute)){
								$CommentId=$DataRows['id'];
								$DateTimeofReview=$DataRows['datetime'];
								$PersonName=$DataRows['name'];
								$Rating=$DataRows['rating'];
								$PersonComment=$DataRows['comment'];
								$BusinessId=$DataRows['business_id'];								
								$SrNo++;
								if(strlen($DateTimeofReview)>15){
									$DateTimeofReview = substr($DateTimeofReview,0,3)." ".substr($DateTimeofReview,11,4);
								}
						?>
						<tr>
							<td><?php echo htmlentities($SrNo); ?></td>
							<td style="color: #040A8A; font-weight: bold;"><?php echo htmlentities($PersonName); ?></td>
							<td><?php echo htmlentities($DateTimeofReview); ?></td>
							<td><?php echo htmlentities($PersonComment); ?></td>
							<td><?php echo $Rating; ?></td>
							<td><a href="CompanyFull.php?id=<?php echo $BusinessId; ?>" target="_blank">
								<?php 
								$BusinessNameQuery="SELECT name FROM business WHERE id='$BusinessId'";
								$Row=mysql_fetch_row(mysql_query($BusinessNameQuery));
								echo $Row[0];
								?></a></td>
							<td><a href="ApproveReview.php?id=<?php echo $CommentId; ?>">
								<span class="btn btn-success">Approve</span></a></td>
							<td><a href="DeleteReview.php?id=<?php echo $CommentId;?>">
								<span class="btn btn-danger">Delete</span></a></td>
							
						</tr>
					
					<?php }?>
					
					</table>
				</div>
				
				
				<h1>Approved Review</h1>
				
				<div class="table-respnsive">
					<table class="table table-striped table-hover">
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Date</th>
							<th>Comment</th>
							<th>Rating</th>
							<th>Business Name</th>
							<th>Revert Approve</th>
							<th>Delete Comment</th>
						
						</tr>
						<?php 
							$ConnectingDB;
							$ClientId=ClientInfo();
							$Query="SELECT * FROM review WHERE status='ON' AND user_business_id='$ClientId' ORDER BY datetime desc";
							$Execute=mysql_query($Query);
							$SrNo=0;
							while($DataRows=mysql_fetch_array($Execute)){
								$CommentId=$DataRows['id'];
								$DateTimeofReview=$DataRows['datetime'];
								$PersonName=$DataRows['name'];
								$Rating=$DataRows['rating'];
								$PersonComment=$DataRows['comment'];
								$BusinessId=$DataRows['business_id'];	
								$SrNo++;
									if(strlen($DateTimeofReview)>15){
									$DateTimeofReview = substr($DateTimeofReview,0,3)." ".substr($DateTimeofReview,11,4);
								}
								
						?>
						<tr>
							<td><?php echo htmlentities($SrNo); ?></td>
							<td style="color: #040A8A; font-weight: bold;"><?php echo htmlentities($PersonName); ?></td>
							<td><?php echo htmlentities($DateTimeofReview); ?></td>
							<td><?php echo htmlentities($PersonComment); ?></td>
							<td><?php echo htmlentities($Rating); ?></td>
							<td><a href="CompanyFull.php?id=<?php echo $BusinessId; ?>" target="_blank">
								<?php 
								$BusinessNameQuery="SELECT name FROM business WHERE id='$BusinessId'";
								$Row=mysql_fetch_row(mysql_query($BusinessNameQuery));
								echo $Row[0];
								?></a></td>
							<td><a href="DisApproveReview.php?id=<?php echo $CommentId ?>">
								<span class="btn btn-warning">Dis-Approve</span></a></td>
							<td><a href="DeleteReview.php?id=<?php echo $CommentId;?>">
								<span class="btn btn-danger">Delete</span></a></td>
							
						</tr>
					
					<?php }?>
					
					</table>
				</div>
				
				
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
