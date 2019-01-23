<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Companies Info</title>
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
				
		<div class="collapse navbar-collapse topmenu" id="collapse" style="float: right;">
				
					<ul class="nav navbar-nav">
						<li><a href="home.php">Home</a></li>
						<li><a href="#">Clam Business Requests</a></li>
						<li><a href="login.php">Sign In</a></li>
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
		<div class="col-sm-2" style="margin-top: -5px;">
                <i class="fa fa-user-circle-o pull-left" style="font-size:40px;color:#515151"></i>
			
				<a href="Clienthome.php"><div class="Topheader">Login &raquo;</div></a>
            </div>
            
        </div>
	<div class="Line topspace"></div>
		<div class=container-fluid>
			<div class="col-sm-offset-1 col-sm-7">
				<br>
				<p class="lead"><a href="Company.php"><span class="glyphicon glyphicon-home"></span></a>
					<?php
						$ConnectingDB;
						if(isset($_GET["SearchButton"])){
							$Current=$_GET["Search"];
							echo " > ".$Current;
						}elseif(isset($_GET["Category"])){
							$Current=$_GET["Category"];
							echo " > ".$Current;
						}elseif(isset($_GET["Location"])){
							$Current=$_GET["Location"];
							echo " > ".$Current;
						}else{
							echo "";
						}
					?>
				</p>
			</div>
			<div class="col-sm-5"></div>
		</div>

	<div class="container-fluid">
		
		<div class="row"><!--Main Row Container with Companies -->
			
			<div class="col-sm-offset-1 col-sm-7"><!--Left Container of companies-->
				<?php
				global $ConnectingDB;
				$Page=1;
				$ShowFrom =0;
				if($Page==0 || $Page<0){
					$ShowFrom =0;
				}
				
				if(isset($_GET["Page"])){
					$Page = $_GET["Page"];
					$ShowFrom = ($Page*5)-5;
				}
				
				
				if(isset($_GET["SearchButton"])){
					$Search = $_GET["Search"];
					$url="Company.php?Search=".urlencode($Search);
					$ViewQuery="SELECT * FROM business WHERE datetime LIKE '%$Search%' OR name LIKE '%$Search%' 
								OR businesstype LIKE '%$Search%' OR overview LIKE '%$Search%' 
								OR towncity LIKE '%$Search%' ORDER BY datetime desc LIMIT $ShowFrom,5";
				}
				//Query When Category Link Click from side bar
				elseif(isset($_GET["Category"])){
					$Category=$_GET["Category"];
					$url="Company.php?Category=".urlencode($Category);
					$ViewQuery="SELECT * FROM business
								WHERE businesstype='$Category'
								ORDER BY datetime desc LIMIT $ShowFrom,5";
				}
				//Query When Location Link Click from side bar 
				elseif(isset($_GET["Location"])){
					$Location=$_GET["Location"];
					$url="Company.php?Location=".urlencode($Location);
					$ViewQuery="SELECT * FROM business
								WHERE towncity='$Location'
								ORDER BY datetime desc LIMIT $ShowFrom,5";
				}
				else{
					$url="Company.php";
					$ViewQuery="SELECT * FROM business ORDER BY datetime desc LIMIT $ShowFrom,5";
				}	
				
				// The Default Query for Blog.php Page
				//else{					
				//	$ViewQuery="SELECT * FROM business ORDER BY datetime desc";		
				//}
				$Execute=mysql_query($ViewQuery);
				while($DataRows=mysql_fetch_array($Execute)){
					$BusinessId=$DataRows["id"];
					$DateTime=$DataRows["datetime"];
					$Businessname=$DataRows["name"];
					$Address1=$DataRows["address1"];
					$Address2=$DataRows["address2"];
					$Towncity=$DataRows["towncity"];
					$Postcode=$DataRows["postcode"];
					$Phone=$DataRows["phone"];
					$Mobile=$DataRows["mobile"];
					$Website=$DataRows["website"];
					$Businesstype=$DataRows["businesstype"];
					$Image=$DataRows["image"];
					$Overview=$DataRows["overview"];
					$User_id=$DataRows["user_id"];
				?>
				<div class="maprup">
				<?php 
					$gmap =$Address1." ".$Address2.", ".$Towncity.", ".$Postcode;
					
echo '<iframe frameborder="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $gmap)) . '&z=14&output=embed" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>';
				?>
    </div>
				<a href="CompanyFull.php?id=<?php echo $BusinessId;?>" style="text-decoration: none; color: black;">
				<div class="blogpost thumbnail" style="border: none;">
					<div class="row">
						<div class="col-sm-3">
							<br>	
						<img class="img-responsive img-rounded companyImgHome" src="Upload/<?php echo $Image;?>"><br>
							<button type="button" class="btn btn-warning  btn-block">
								<span style="color: white; font-weight: bold;"><span class="glyphicon glyphicon-phone"></span> &nbsp;Mobile</span>
							</button>
							<button type="button" class="btn btn-warning  btn-block">
								<span style="color: white; font-weight: bold;"><span class="glyphicon glyphicon-globe"></span> &nbsp;Website</span>
							</button><br>
						</div>
						<div class="col-sm-7" style="line-height: 24px;">
								<div class="caption">
									<h1 id="heading"><?php echo htmlentities($Businessname);?></h1>
									<span class="companybusiness"><?php echo htmlentities($Businesstype);?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<span class="fa fa-clock-o" style="color: #5cb85c;"></span>&nbsp;<span style="color: #5cb85c;">Opening times</span>
									<br>
										<div class="row">
											<div class="col-xs-6" style="line-height: 16px;">
												<span class="glyphicon glyphicon-map-marker"></span>
												<?php echo $Address1." ".$Address2.
												"<br>".$Postcode." <b>".$Towncity."</b><br>";								
												?>
											</div>
											<div class="col-xs-6">
												<?php echo "<i class='fa fa-phone'></i>".$Phone;  ?>
											</div>
										</div>
				
						<p class="post">
						<?php
					if(strlen($Overview)>250){
						$Overview=substr($Overview,0,250);
					}
					echo $Overview.' . . . ';?>  
						<a href="CompanyFull.php?id=<?php echo $BusinessId;?>#info">
					Read more
					</a></p>
					</div>
						
						</div>	
					<div class="col-sm-2 vertical-divider">
						
						<a href="CompanyFull.php?id=<?php echo $BusinessId;?>" style="color: #fedb00; text-decoration: none;">
										<?php 
							
							$RateQuery= "SELECT AVG(review.rating) AS rating FROM review 
													   WHERE business_id='$BusinessId'";
							$Avgrate=mysql_fetch_array(mysql_query($RateQuery));
					
							$CountRateQuery= "SELECT COUNT(review.rating) AS rating FROM review 
													   WHERE business_id='$BusinessId'";
							$Norate=mysql_fetch_array(mysql_query($CountRateQuery));
							$Averagerate=round($Avgrate[0]);
							if($Averagerate==0){
								$output="<span style='color: #adadad;'>";
								$output.="<span class='glyphicon glyphicon-star'></span>";
								$output.="<span class='glyphicon glyphicon-star'></span>";
								$output.="<span class='glyphicon glyphicon-star'></span>";
								$output.="<span class='glyphicon glyphicon-star'></span>";
								$output.="<span class='glyphicon glyphicon-star'></span>";
								$output.="<br><h4>No Rating</h4>";
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
								
								echo "<br><span style='color: black;'>".round($Avgrate[0],2)."</span>";
								echo " <span style='font-size:14px; color: black;'>(".$Norate[0]." rating)"."</span><br>";
							}	
					?></a>
						<a href="CompanyFull.php?id=<?php echo $BusinessId;?>#writereview" style="text-decoration: none;">
						<span class="review">Write a review</span></a>
						<br>
						<br>
						<br>
						<br>
						<a href="CompanyFull.php?id=<?php echo $BusinessId;?>" style="position:absolute; text-decoration: none; margin-left: -10px;"><span class="btn btn-warning btn-block">More Information</span></a>
					</div>
					
				</div>
				
					</div>
				</a>
			<hr color="#e1e1e1">
				
				<?php }?>
				
				<!--Pagination -->
				<nav>	
					<ul class="pagination pull-left pagination-lg">
				<!--Creating Backward Button-->
		<?php 
			if($Page>1){
				if(isset($_GET['SearchButton']) || isset($_GET['Category']) || isset($_GET['Location']) ){
		?>
					<li><a href="<?php echo $url; ?>&Page=<?php echo $Page-1; ?>">&laquo;</a></li>
					<?php }
							else{?>
						<li><a href="<?php echo $url; ?>?Page=<?php echo $Page-1; ?>">&laquo;</a></li>
					<?php }}?>
			
				<?php 
				global $ConnectingDB;
				
				if(isset($_GET["SearchButton"])){
					$Search = $_GET["Search"];
					$QueryPagination="SELECT COUNT(*) FROM business 
							    WHERE datetime LIKE '%$Search%'
								OR name LIKE '%$Search%' OR businesstype LIKE '%$Search%'
								OR overview LIKE '%$Search%' ORDER BY datetime desc";
				}
				//Query When Category Link Click from side bar
				elseif(isset($_GET["Category"])){
					$Category=$_GET["Category"];
					$QueryPagination="SELECT COUNT(*) FROM business
								WHERE businesstype='$Category'
								ORDER BY datetime desc";
				}
				//Query When Location Link Click from side bar 
				elseif(isset($_GET["Location"])){
					$Location=$_GET["Location"];
					$QueryPagination="SELECT COUNT(*) FROM business
								WHERE towncity='$Location'
								ORDER BY datetime desc";
				}
						
				else{
					$QueryPagination="SELECT COUNT(*) FROM business";	
				}
						
				$ExecutePagination = mysql_query($QueryPagination);
				$RowPagination = mysql_fetch_array($ExecutePagination);
				$Totalcompany=array_shift($RowPagination);
				//echo $TotalPosts;
				$PostPagination = $Totalcompany/5;				
				$PostPagination = ceil($PostPagination);				
				//echo $PostPagination;				
				for($i=1;$i<=$PostPagination;$i++){
					if(isset($Page)){
						if($i==$Page){
				?>
							<li class="active"><a href="Company.php?Page=<?php echo $i; ?>"><?php echo $i;?></a></li>
				<?php 
					}else{
						if(isset($_GET['Category'])){
								$url=$url."&Page=".urlencode($i);
				?>			<li><a href="<?php echo $url;?>"><?php echo $i;?></a></li>
				
						<?php }elseif(isset($_GET['Location'])){
									$url=$url."&Page=".urlencode($i);
						?>	
									<li><a href="<?php echo $url; ?>"><?php echo $i;?></a></li>
						
							<?php }elseif(isset($_GET['SearchButton'])){
										$url=$url."&Page=".urlencode($i)
											 ."&SearchButton=";
							?>		
									<li><a href="<?php echo $url; ?>"><?php echo $i;?></a></li>
								<?php }else{
								?>				<li><a href="Company.php?Page=<?php echo $i;?>"><?php echo $i;?></a></li>
								<?php }?>
				<?php
							}

					} 
				}
				?>
				<!--Creating Forward Button-->
				<?php
					if(isset($Page)){
						if($Page+1<=$PostPagination){
							if(isset($_GET['SearchButton']) || isset($_GET['Category']) || isset($_GET['Location']) ){
				?>
						<li><a href="<?php echo $url; ?>&Page=<?php echo $Page+1?>">&raquo;</a></li>
				<?php		}else{?>
						<li><a href="<?php echo $url; ?>?Page=<?php echo $Page+1?>">&raquo;</a></li>
				<?php 
								}
						} 
					} 
				?>
					</ul>
				</nav> <!--End of Pagination-->
				
				
			</div><!--End of Left Container Area-->
		
		<div class="col-sm-3"><!--Right Container-->
			<div class="panel panel-default">
					<div class="panel-heading" style="margin-left: -1px;">
						<h3>
						Search Filter
					</h3>

					</div>
					<div class="panel-body overviewDetail">
						<h4>Business With:</h4>
						<label class="custom-checkbox">
							<input type="hidden" name="Website" value="False" />
							<input class="custom-checkbox-input" name="Website" value="True" type="checkbox">
							<span class="custom-checkbox-text">Website</span>
						</label>
						<label class="custom-checkbox">
							<input type="hidden" name="Email" value="False" />
							<input class="custom-checkbox-input" name="Email" value="True" type="checkbox">
							<span class="custom-checkbox-text">Email</span>
						</label>
						<label class="custom-checkbox">
							<input type="hidden" name="OpeningTimes" value="False" />
							<input class="custom-checkbox-input" name="OpeningTimes" value="True" type="checkbox">
							<span class="custom-checkbox-text">Opening Times</span>
						</label>
						<label class="custom-checkbox">
							<input type="hidden" name="Reviews" value="False" />
							<input class="custom-checkbox-input" name="Reviews" value="True" type="checkbox">
							<span class="custom-checkbox-text">Reviews</span>
						</label>
						<br>
						<h4>Categories:</h4>
					<?php 
						global $ConnectingDB;
						
						$ViewQuery = "SELECT * FROM category ORDER BY datetime DESC";
						$Execute=mysql_query($ViewQuery);
						while($DataRows=mysql_fetch_array($Execute)){
							$Id=$DataRows["id"];
							$DateTime=$DataRows["datetime"];
							$CategoryName=$DataRows["name"];
					?>
					<table>
					<tr>
						<td><a href="Company.php?Category=<?php echo $CategoryName;?>"><?php echo $CategoryName; ?></a></td>
					</tr>
					</table>
						
						<?php } ?>
						
						<h4>Location:</h4>
					<?php 
						global $ConnectingDB;
						$Execute=mysql_query("SELECT DISTINCT towncity FROM business ORDER BY towncity ASC");		
						while($DataRows=mysql_fetch_array($Execute)){
							$Location=$DataRows["towncity"];
					?>
					<table>
					<tr>
						<td><a href="Company.php?Location=<?php echo $Location;?>"><?php echo $Location; ?></a></td>
					</tr>
					</table>
						
						<?php } ?>
					</div>
					<div class="panel-footer"></div>
				
				
			</div>
		<a href="Signup.php" style="text-decoration: none;">	
			<img src="images/ramro-ads-listing.png" class="img-responsive" width="100%" height="30"/>
		</a>
		<br><br>
		<div class="panel panel-default">
							<div class="panel-heading" style="margin-left: -1px;">
								<h2 class="panel-title">
								Didn't find your Business Here?
							</h2>
							
							</div>
							<div class="panel-body overviewDetail" style="text-align: center;">
								<p>Help the Community grow by adding the Business Information.</p>
								<a href="Login.php" style="text-decoration: none;">
								<button type="button" class="btn btn-warning btn-lg" style="background-color: #cd004d; border: #cd004d;">
								<span style="color: white; font-weight: bold;">Add A Business</span
							</button>
								</a>
								<br>

							</div>
							<div class="panel-footer"></div>
						</div>
		</div><!--End of Right Container-->
		
		</div><!--End of main row container-->
	</div><!-- Ending of Container-->
	
<div><!--Footer-->
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