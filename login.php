<?php
include_once("z_db.php");
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
$msg=$msg."username or password is incorrect<BR>";
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
					window.location = 'user/dashboard.php?page=dashboard%location=index.php';
				</script>"; 
}

}



else{
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>The username and password you entered did not match our records. Please double-check and try again.</br></strong></div>"; //printing error if found in validation
				
}} 
else {
        
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."</div>"; //printing error if found in validation
				
	 
}
}


?>
<?php require_once 'header.php';?>	
<div class="container-fluid no-left-right-padding"  id="login_backgroud">
	<div class="login-page" style="">
		<div class="login">
			<div class="form well"  style="">
			<p style="" id="login_header">Login</p>
				<?php 
					if($_SERVER['REQUEST_METHOD'] == 'POST' && ($errormsg!=""))
					{
					print $errormsg;
					}
				?>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
					<div class="form-group signp-group">
							<label>Username*</label>
							<div class="input-group">
								
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text"  class="form-control input-box" placeholder="" name="username" required>
							</div>
					</div>
					<div class="form-group signp-group">
							<label>Password*</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control input-box" name="password" placeholder="" required>
							</div>
					</div>
					<div class="form-group checkbox i-checks" id="keep_div">
						<input id="radio1" name="remember" ng-model="vm.customerCreate.Position" value="Left" type="checkbox" tabindex="5" data-validationtype="required" ng-disabled="vm.maindischeck" class="ng-valid ng-not-empty ng-dirty ng-touched"/>
						<label for="radio1">Keep me signed in</label>
							
					</div>	
					<div class="login-btn-div form-group">
						<button type="submit" class="btn btn-success btn-s-xs" style="" id="log-btn">Sign in</button>
					</div>
						
					<div class="form-group" id="f_c_div">
						<a href="forgotpassword.php">Forgot your password?</a>/ <a href="signup.php">Create New Account</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require_once 'footer.php';?>