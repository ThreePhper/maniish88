<?php
require_once("../db/connection_mysqli.php");
$sql="SELECT maintain FROM  settings WHERE sno=0";
		  if ($result = mysqli_query($con, $sql)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        $main= $row[0];
    }
	if($main==1 || $main==3)
	{
	print "
				<script language='javascript'>
					window.location = 'maintain.php';
				</script>
			";
	}

}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']))
{
$status = "OK"; //initial status
$msg="";
	$username=mysqli_real_escape_string($con,$_POST['username']); //fetching details through post method
     $password = mysqli_real_escape_string($con,$_POST['password']);

if ( strlen($username) < 4 ){
$msg=$msg."Username must be more than 5 char legth<BR>";
$status= "NOTOK";}

if ( strlen($password) < 6 ){ //checking if password is greater then 8 or not
$msg=$msg."Password must be more than 5 char legth<BR>";
$status= "NOTOK";}

if($status=="OK"){

// Retrieve username and password from database according to user's input, preventing sql injection
$query ="SELECT * FROM affiliateuser WHERE (username = '" . mysqli_real_escape_string($con,$_POST['username']) . "') AND (password = '" . mysqli_real_escape_string($con,$_POST['password']) . "') AND (active = '" . mysqli_real_escape_string($con,"1") . "') AND (level = '" . mysqli_real_escape_string($con,"2") . "')";
if ($stmt = mysqli_prepare($con, $query)) {

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* store result */
    mysqli_stmt_store_result($stmt);

    $num=mysqli_stmt_num_rows($stmt);

    /* close statement */
    mysqli_stmt_close($stmt);
}
//mysqli_close($con);
// Check username and password match

if (($num) == 1) {

$sqlquery11="SELECT expiry FROM affiliateuser where username = '$username'"; //fetching expiry date of username from table
$rec211=mysqli_query($con,$sqlquery11);
$row211 = mysqli_fetch_row($rec211);
$expirydate=$row211[0]; //assigning expiry date

$curdate=date("Y-m-d");
if($curdate > $expirydate)
{
	$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>Hello User, Your Account Has Been Deactivated, As Your Account Is Expired. Please Check Below To Renew Your Account.</div>"; //printing error if found in validation
				
   $statusflag= "NOTOK";
}
else{

session_start();
        // Set username session variable
        $_SESSION['username'] = $username;
		
        // Jump to secured page
		print "
				<script language='javascript'>
					window.location = 'dashboard.php?page=dashboard%location=index.php';
				</script>"; 
}

}



else{
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>Username And Password Does Not Match Or Your Account Is Inactive.</div>"; //printing error if found in validation
				
}} 
else {
        
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."</div>"; //printing error if found in validation
				
	 
}
}


?>

<!DOCTYPE html>
<html lang="en" class="app">
<head>
	<meta charset="utf-8" />
	<title>MLM</title>
	<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
	<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
	<style type="text/css">
	html {
	background: #efefef
	}

	</style>
</head>
<body>
<nav class="navbar navbar-inverse" style="border-radius: 0px; margin-bottom: 0px;">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Now we accept : ﾉナtcoin</a>
		</div>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		</ul>
	</div>
</nav>
<nav class="navbar navbar-default" style="margin-bottom: 0px; background-color: white; border-bottom:1px solid black;">
	<div class="container">
		<div class="navbar-header" style="height: 100px;  margin-top:10px;">
			<img src="logo/logo.gif" alt="Mountain View">
		</div>
		<ul class="nav navbar-nav" style="float: right; margin-top:10px;">
			<li><a href="#">Home</a></li>
			<li><a href="#">About Us</a></li>
			<li><a href="#">Affiate Progam</a></li>
			<li><a href="#">Home it Works</a></li>
			<li><a href="#">Faq</a></li>
			<li><a href="#">Contact Us</a></li>
		</ul>
	</div>
</nav>
<div class="row">
	<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
		<div class="col-md-4">
		</div>
		<div class="col-md-4 xxs">
			<div class="container aside-xl">
				<section class="m-b-lg">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
					<div class="list-group">
					<?php 
						if($_SERVER['REQUEST_METHOD'] == 'POST' && ($errormsg!=""))
						{
						print $errormsg;
						}
					?>
						<label>Username or Email*</label>
						<div class="list-group-item">
						<input type="text" placeholder="Username" class="form-control no-border" name="username" required>
						</div>
						<br />
						<label>Password*</label>
						<div class="list-group-item">
						<input type="password" placeholder="Password" class="form-control no-border" name="password" required>
						</div>
					</div>
						<button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
						<div class="text-center m-t m-b"><a href="forgotpassword.php"><small>Forgot password?</small></a></div>
						<div class="line line-dashed"></div>
						<p class="text-center m-t m-b"><a href="#"><small>Don't Have Account?</small></a></p>
						<a href="signup.php" class="btn btn-lg btn-warning btn-block">Create an account</a>
					</form>
				</section>
			</div>
		</div>
		<div class="col-md-4">
		</div>
	</section>
</div>
<div class="row">
	<div class="col-md-12">
	</div>
</div>
<!-- footer -->
<footer id="footer" class="footer_cla">
	<div class="text-center padder">
	<p>
	<small style="color:#ffffff;">
		<?php $query="SELECT footer from settings where sno=0"; 
			$result = mysqli_query($con,$query);

			while($row = mysqli_fetch_array($result))
			{
			$footer="$row[footer]";
			print $footer;
			}
		?>
	</small> </p>
  </div>
</footer>
<!-- / footer -->
<!-- Bootstrap -->
<!-- App -->
<script src="js/app.v1.js"></script>
<script src="js/app.plugin.js"></script>
</body>
</html>