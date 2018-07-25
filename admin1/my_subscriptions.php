<?php
	require_once("../db/connection_mysqli.php");
	// Inialize session
	session_start();
	// Check, if username session is NOT set then this page will jump to login page
	$username = $_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("location: https://bit-miner.io/login.php");
	}

	$status = "OK";
	$errormsg="";
	
	$package = mysqli_real_escape_string($con,$_GET["package"]);

	$query = "SELECT sbonus FROM packages WHERE id = $package";
	$query = mysqli_query($con,$query);
	$result = mysqli_fetch_array($query);
	$bonus = $result[sbonus];
	//echo $bonus;
	
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
	<meta charset="utf-8" />
	<title>Package Deposit</title>
	<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
	<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>
<body class="">
	<section class="vbox">
		<header class="bg-primary header header-md navbar navbar-fixed-top-xs box-shadow">
			<div class="navbar-header aside-md dk"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="dashboard.php" class="navbar-brand"><img src="images/logo.png" class="m-r-sm"></a><a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div>
			<ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
				<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="images/a0.jpg"> </span> 
				<?php
					$sql="SELECT fname FROM  affiliateuser WHERE username='".$_SESSION['username']."'";
					if ($result = mysqli_query($con, $sql)) {
						/* fetch associative array */
						while ($row = mysqli_fetch_row($result)) {
							print $row[0];
						}
					}
				?> 
					<b class="caret"></b> </a>
					<ul class="dropdown-menu animated fadeInRight">
						<span class="arrow top"></span>
						<li> <a href="profile.php">Profile</a> </li>
						<li> <a href="notifications.php"> Notifications </a> </li>
						<li> <a href="contact.php">Help</a> </li>
						<li class="divider"></li>
						<li> <a href="logout.php">Logout</a> </li>
					</ul>
				</li>
			</ul>
	  </header>
		<section>
			<section class="hbox stretch">
				<!-- .aside -->
				<aside class="bg-light aside-md hidden-print" id="nav">
					<section class="vbox">
						<section class="w-f scrollable">
							<div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-color="#333333">
								<div class="clearfix wrapper dk nav-user hidden-xs">
								<div class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb avatar pull-left m-r"> <img src="images/a0.jpg"> <i class="on md b-black"></i> </span> <span class="hidden-nav-xs clear"> <span class="block m-t-xs"> <strong class="font-bold text-lt"><?php
								$sql="SELECT fname,country, username FROM  affiliateuser WHERE username='".$_SESSION['username']."'";
								if ($result = mysqli_query($con, $sql)) {
									/* fetch associative array */
									while ($row = mysqli_fetch_row($result)) {
										print $row[0];
										$coun=$row[1];
										$username=$row[2];
										 $sql2="SELECT name FROM packages WHERE id=$pcktaken";
										 if ($result2 = mysqli_query($con, $sql2)) {
										  while ($row2 = mysqli_fetch_row($result2)) {
										 
										 $pkname=$row2[0];
										 }
										 }
									}

								}
								?>
								</strong> <b class="caret"></b> </span> <span class="text-muted text-xs block"><?php print "$username"; ?></span> </span> </a>
								  <ul class="dropdown-menu animated fadeInRight m-t-xs">
									<span class="arrow top hidden-nav-xs"></span>

									<li> <a href="profile.php">Profile</a> </li>
									<li> <a href="notifications.php"> Notifications </a> </li>
									<li> <a href="contact.php">Help</a> </li>
									<li class="divider"></li>
									<li> <a href="logout.php">Logout</a> </li>
								  </ul>
								</div>
							  </div>
							  <!-- nav -->
							  <?php include_once('dashboard_nav.php');?>
							  <!-- / nav -->
							</div>
						</section>
					</section>
				</aside>
			  <!-- /.aside -->
			<section id="content">
				<section class="vbox">
					<header class="header bg-white b-b b-light">
            <p><strong>Your Subscriptions is Succsefully created</strong></p>
          </header>
          <section class="scrollable wrapper">
            <div class="row">
              
				<div class="col-sm-12 portlet">
					<?php 
						if($_SERVER['REQUEST_METHOD'] == 'POST' && ($errormsg!="")){
							print $errormsg;
						}
					?>
					<section class="panel panel-success portlet-item">
						<section class="panel panel-default">
						<header class="panel-heading bg-light">
							<ul class="nav nav-tabs nav-justified">
							<?php 
								$query="SELECT * FROM  affiliateuser JOIN packages ON affiliateuser.pcktaken = packages.id WHERE username='".$_SESSION['username']."'"; 
								$result = mysqli_query($con,$query);
								$i=0;
								while($row = mysqli_fetch_array($result))
								{
									$name="$row[fname]";
									$lname="$row[lname]";
									$add="$row[address]";
									$contry="$row[country]";
									$email="$row[email]";
									$mobile="$row[mobile]";
									$package="$row[package]";
									$payby= "$row[paytype]";
									$pname="$row[name]";
									$price="$row[price]";
									$currency="$row[currency]";
									$details="$row[details]";
									$sbonus="$row[sbonus]";
								}
								
								$query121="SELECT * FROM  settings"; 
								$result121 = mysqli_query($con,$query121);
									$i=0;
								while($row121 = mysqli_fetch_array($result121)){
									$wlink="$row121[wlink]";
								}
								$pathu="/User/signup.php?aff=";	
									
								?>  
							</ul>
						</header>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6 col-md-offset-3">
										<table class="table table-bordered">
										  <thead>
											<tr>
											  <th>Plan</th>
											  <th>Details</th>
											  <th>Pay By</th>
											</tr>
										  </thead>
										  <tbody>
											<tr>
											  <td><?php echo $pname;?></td>
											  <td><?php echo $details." - ".$price." $";?></td>
											  <td><?php echo $payby;?></td>
											</tr>
										  </tbody>
										</table>										
									</div>
									<div class="col-md-4">
									</div>
									<div class="col-md-4">
										<div class="text-center">
										<?php 

											$pay_by = "Bitcoin";
											if($payby == $pay_by){
											echo "<div class='text-center'><b>3NNPBanSkd1QV6Q93wDJuSUYrkKU4iEwx4</b></div>";
											echo "<div class='text-center'><img src='https://bit-miner.io/barcode.jpeg' class='img-thumbnail'>";
											}
										?>	
										</div>
									</div>
									<div class="col-md-4">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<p>&nbsp;</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
									</div>
									<div class="col-md-4">
										<p class="text-center">Your transaction will be activated within a few hours after successful transfer.</p>
									</div>
									<div class="col-md-4">
									</div>
								</div>
							</div>

						</section>
					</section>
				</div>
			</div>
            </div>
          </section>
        </section>
        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
    </section>
  </section>
</section>
<!-- Bootstrap -->
<!-- App -->
<script src="js/app.v1.js"></script>
<script src="js/jquery.ui.touch-punch.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="js/app.plugin.js"></script>
</body>
</html>