<?php
header( "refresh:2;url=users.php" );
require_once("../db/connection_mysqli.php");
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['adminidusername'])) {
        print "
				<script language='javascript'>
					window.location = 'index.php';
				</script>
			";
			
}
$todelete= mysqli_real_escape_string($con,$_GET["username"]);

$get = mysqli_query($con, "SELECT Id FROM affiliateuser WHERE username='$todelete'");
$row = mysqli_fetch_array($get);
$id = $row['Id'];

$result=mysqli_query($con,"DELETE FROM affiliateuser WHERE username='$todelete'");
$withdrawl = mysqli_query($con,"DELETE FROM transfer_summary WHERE user_id ='$id'");
$transfer = mysqli_query($con,"DELETE FROM withdrawal_summary WHERE user_id ='$id'");
if ($result)
{
print "<center>User deleted<br/>Redirecting in 2 seconds...</center>";
}
else
{
print "<center>Action could not be performed, check back again<br/>Redirecting in 2 seconds...</center>";
}

?>