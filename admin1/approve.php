<?php
require_once("../db/connection_mysqli.php");
header( "refresh:1;url=withdrawals.php" );
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
$tran_id= mysqli_real_escape_string($con,$_GET["transaction_id"]);
$approve = "Approved";
$app = "UPDATE withdrawal_summary SET status = '$approve' WHERE transaction_id = '".$tran_id."'";
$appr = mysqli_query($con, $app);
