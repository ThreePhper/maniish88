<?php
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

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['todoemail']))
{

$suemail=mysqli_real_escape_string($con,$_POST['signuptextarea']);
$fpemail=mysqli_real_escape_string($con,$_POST['forgottextarea']);


$status = "OK";
$msg="";

if ( $suemail=="" ){
$msg=$msg."Email content can not be empty.<BR>";
$status= "NOTOK";}

if ( $fpemail=="" ){
$msg=$msg."Email content can not be empty.<BR>";
$status= "NOTOK";}	

if ($status=="OK") 
{
$query1=mysqli_query($con,"update emailtext set etext='$suemail' where code='SIGNUP'");
$query2=mysqli_query($con,"update emailtext set etext='$fpemail' where code='FORGOTPASSWORD'");
$errormsg= "
<div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Bingo!</br></strong>Your email settings Have Been Updated.</div>"; //printing error if found in validation

}

else
{ 
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
<link rel="shortcut icon" href="https://bit-miner.io/https://bit-miner.io/wp-content/uploads/2017/11/fevi-con-bitminer.png" />
<link rel="apple-touch-icon" href="https://bit-miner.io/https://bit-miner.io/wp-content/uploads/2017/11/fevi-con-bitminer.png" />
<title>Email Configuration</title>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->        
</head>
<body class="">
<section class="vbox">
  <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
    <div class="navbar-header aside-md dk"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="dashboard.php" class="navbar-brand"><img src="images/logo.png" class="m-r-sm">Concourse</a> <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div>
  
    
    <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
      
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="images/a0.jpg"> </span> <?php
		  $sql="SELECT fname FROM  affiliateuser WHERE username='".$_SESSION['adminidusername']."'";
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
          <li class="divider"></li>
          <li> <a href="logout.php">Logout</a> </li>
        </ul>
      </li>
    </ul>
  </header>
  <section>
    <section class="hbox stretch">
      <!-- .aside -->
      <aside class="bg-black aside-md hidden-print" id="nav">
        <section class="vbox">
          <section class="w-f scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-color="#333333">
              <div class="clearfix wrapper dk nav-user hidden-xs">
                <div class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb avatar pull-left m-r"> <img src="images/a0.jpg"> <i class="on md b-black"></i> </span> <span class="hidden-nav-xs clear"> <span class="block m-t-xs"> <strong class="font-bold text-lt">
                  <?php
                		  $sql="SELECT fname FROM  affiliateuser WHERE username='".$_SESSION['adminidusername']."'";
                		  if ($result = mysqli_query($con, $sql)) {

                    /* fetch associative array */
                    while ($row = mysqli_fetch_row($result)) {
                        print $row[0];
                    }
                }	   
	             ?>
        </strong> <b class="caret"></b> </span> <span class="text-muted text-xs block">Admin</span> </span> </a>
                  <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <span class="arrow top hidden-nav-xs"></span>
                    <li> <a href="profile.php">Profile</a> </li>
                    <li class="divider"></li>
                    <li> <a href="logout.php">Logout</a> </li>
                  </ul>
                </div>
              </div>
              <!-- nav -->
              <nav class="nav-primary hidden-xs">
                <ul class="nav nav-main" data-ride="collapse">
                  <li> <a href="#" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Account</span> </a> 
				  <ul class="nav dk">
                      <li> <a href="dashboard.php" class="auto"><i class="i i-dot"></i> <span>Dashboard</span> </a> </li>
                      
                    </ul>
				  </li>
                  <li  class="active"> <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-lab icon"> </i> <span class="font-bold">Website Configuration</span> </a>
                    <ul class="nav dk">
                      <li> <a href="gensettings.php" class="auto"> <i class="i i-dot"></i> <span>General Settings</span> </a> </li>
					  <li  class="active"> <a href="emailsettings.php" class="auto"> <i class="i i-dot"></i> <span>Email Settings</span> </a> </li>                      
                      <li > <a href="pacsettings.php" class="auto"> <i class="i i-dot"></i> <span>Packages Settings</span> </a> </li>                      
                    </ul>
                  </li>                  
                  <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-grid2 icon"> </i> <span class="font-bold">Blog</span> </a>
                    <ul class="nav dk">
                      <li > <a href="notifications.php" class="auto"><i class="i i-dot"></i> <span>Post Notifications</span> </a> </li>                      
                    </ul>
                  </li>
				  <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="fa fa-info-circle"> </i> <span class="font-bold">Analytics</span> </a>
                    <ul class="nav dk">
                      <li > <a href="users.php" class="auto"><i class="i i-dot"></i> <span>Users</span> </a> </li>
                      <li class=""> <a href="withdrawals.php#nav" class="auto"><i class="i i-dot"></i> <span>Withdrawals</span> </a> </li>
                      <li > <a href="payments.php" class="auto"><i class="i i-dot"></i> <span>Paypal Payment Received </span> </a> </li>
					  <li > <a href="paymentscod.php" class="auto"><i class="i i-dot"></i> <span>C.O.D Orders </span> </a> </li>
					  <li > <a href="payrequest.php" class="auto"><i class="i i-dot"></i> <span>User's Payment Requests </span> </a> </li>
					  <li > <a href="renewpaymentscod.php" class="auto"><i class="i i-dot"></i> <span>Account Renew Requests </span> </a> </li>
                    </ul>
                  </li>				  
                </ul>
                <div class="line dk hidden-nav-xs"></div>
              </nav>
              <!-- / nav -->
            </div>
          </section>
          <footer class="footer hidden-xs no-padder text-center-nav-xs"> <a href="logout.php" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs"> <i class="i i-logout"></i> </a> <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a> </footer>
        </section>
      </aside>
      <!-- /.aside -->
      <section id="content">
        <section class="vbox">
          <header class="header bg-white b-b b-light">
          </header>
          <section class="scrollable">
            <div class="row">
              
              <div class="col-sm-12">
                <section class="panel panel-success portlet-item">
                  <header class="panel-heading"> Email Settings </header>
                  <section class="panel panel-default">
                  <header class="panel-heading bg-light">
                    <ul class="nav nav-tabs nav-justified">
                
                      <?php
                        $query="SELECT * FROM  emailtext WHERE code='SIGNUP'"; 
                        $result = mysqli_query($con,$query);
                        $i=0;
                        while($row = mysqli_fetch_array($result))
                        {                        	
                        	$signupetext="$row[etext]";
                        }	
                      ?>  
                    </ul>
                  </header>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
					  
					  
					  <div class="panel-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
                      <input type="hidden" name="todoemail" value="post">
					    <?php 
						if($_SERVER['REQUEST_METHOD'] == 'POST' && ($errormsg!=""))
						{
						print $errormsg;
						}
						?>
					  <div class="form-group">
                            <label>Sign Up</label>
                            <textarea class="form-control" rows="6" data-minwords="6" data-required="true" placeholder="Type your message" name="signuptextarea"><?php print $signupetext;?></textarea>
                          </div>
						   <?php 
					  
					  $query="SELECT * FROM  emailtext WHERE code='FORGOTPASSWORD'"; 
 
 
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	
	$forgottext="$row[etext]";
	
	}
					  
					  ?>  
						   <div class="line line-dashed b-b line-lg pull-in"></div>
						  <div class="form-group">
                            <label>Forgot Password Request</label>
                            <textarea class="form-control" rows="6" data-minwords="6" data-required="true" placeholder="Type your message" name=forgottextarea><?php print $forgottext;?></textarea>
                          </div>
					 
					  
					  
					  
</div>
                      
                     <button type="submit" class="btn btn-lg btn-primary btn-block">I Have Filled And Checked All Details. Update/Edit Details For Me Now.</button>
                    </form>
                  </div>
					  
					  </div>
                      
                      
                      
                    </div>
                  </div>
                </section>
                </section>
                
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