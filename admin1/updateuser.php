<?php
require_once("../db/connection_mysqli.php");
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['adminidusername'])) {
       header("location: https://bit-miner.io/admin1");
}
$toupdate =  mysqli_real_escape_string($con,$_GET['username']);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['todo'])){
$toupdate =  mysqli_real_escape_string($con,$_GET['username']);
$ero =  mysqli_real_escape_string($con,$_POST['error']);
$act=mysqli_real_escape_string($con,$_POST['act']);
$username=mysqli_real_escape_string($con,$_POST['username']);
$ear=mysqli_real_escape_string($con,$_POST['earnings']);
$wal=mysqli_real_escape_string($con,$_POST['wal']);
$name=mysqli_real_escape_string($con,$_POST['fname']);
$lname = mysqli_real_escape_string($con,$_POST['lname']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
$ref=mysqli_real_escape_string($con,$_POST['refer']);
$address=mysqli_real_escape_string($con,$_POST['address']);
$country=mysqli_real_escape_string($con,$_POST['country']);
$package=mysqli_real_escape_string($con,$_POST['package']);
$bitaddress = mysqli_real_escape_string($con,$_POST['bitaddress']);
$check=1;
if($check==1){
$status = "OK";
$msg="";

if ( strlen($password) < 8 ){
$msg=$msg."Password Must Be More Than 8 Char Length.<BR>";
$status= "NOTOK";
}  

if ( strlen($mobile) >= 15 ){
$msg=$msg."Please Enter 10 Digits Mobile No.<BR>";
$status= "NOTOK";
}

if ( strlen($email) < 1 ){
$msg=$msg."Please Enter Your Email Id.<BR>";
$status= "NOTOK";}

if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
$msg=$msg."Email Id Not Valid, Please Enter The Correct Email Id .<BR>";
$status= "NOTOK";}

if ( $country == "" ){
$msg=$msg."Please Enter Your Country Name.<BR>";
$status= "NOTOK";
}  
}

if ($status=="OK"){

$query=mysqli_query($con,"UPDATE affiliateuser SET password='$password',fname='$name',lname='$lname',address='$address',email='$email',referedby='$ref',mobile='$mobile',country='$country',earning='$ear',tamount='$ear',wallet='$wal',pcktaken='$package',bitcoin='$bitaddress',active='$act' where username='$username'");

$errormsg= "<div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Success : </br></strong>User profile has been updated.</div>"; //printing error if found in validation
header("location: https://bit-miner.io/admin1/updateuser.php?username=$username");
}else{ 

  $errormsg= "<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."<br><input type='button' value='Retry' onClick='history.go(-1)'></div>"; 
                    //printing error if found in validation
                    header("location: https://bit-miner.io/admin1/updateuser.php?username=$username");
}
}
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>User Settings</title>
<link rel="shortcut icon" href="https://bit-miner.io/https://bit-miner.io/wp-content/uploads/2017/11/fevi-con-bitminer.png" />
<link rel="apple-touch-icon" href="https://bit-miner.io/https://bit-miner.io/wp-content/uploads/2017/11/fevi-con-bitminer.png" />
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
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

   
	   
	   ?> <b class="caret"></b> </a>
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
                <div class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb avatar pull-left m-r"> <img src="images/a0.jpg"> <i class="on md b-black"></i> </span> <span class="hidden-nav-xs clear"> <span class="block m-t-xs"> <strong class="font-bold text-lt"><?php
		  $sql="SELECT fname FROM  affiliateuser WHERE username='".$_SESSION['adminidusername']."'";
		  if ($result = mysqli_query($con, $sql)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        print $row[0];
    }

}

   
	   
	   ?></strong> <b class="caret"></b> </span> <span class="text-muted text-xs block">Art Director</span> </span> </a>
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
                <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div>
                <ul class="nav nav-main" data-ride="collapse">
                  <li> <a href="#" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Account</span> </a> 
				  <ul class="nav dk">
                      <li> <a href="dashboard.php" class="auto"><i class="i i-dot"></i> <span>Dashboard</span> </a> </li>
                      
                    </ul>
				  </li>
                  <li  class="active"> <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-lab icon"> </i> <span class="font-bold">Website Configuration</span> </a>
                    <ul class="nav dk">
                      <li> <a href="gensettings.php" class="auto"> <i class="i i-dot"></i> <span>General Settings</span> </a> </li>
					            <li> <a href="emailsettings.php" class="auto"> <i class="i i-dot"></i> <span>E-Mail Settings</span> </a> </li>
                      <li> <a href="pacsettings.php" class="auto"> <i class="i i-dot"></i> <span>Packages Settings</span> </a> </li>
                      
                    </ul>
                  </li>
                  
                  <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-grid2 icon"> </i> <span class="font-bold">Blog</span> </a>
                    <ul class="nav dk">
                      <li > <a href="notifications.php" class="auto"><i class="i i-dot"></i> <span>Post Notifications</span> </a> </li>
                      
                    </ul>
                  </li>
				  <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="fa fa-info-circle"> </i> <span class="font-bold">Analytics</span> </a>
                    <ul class="nav dk">
                      <li class="active"> <a href="users.php" class="auto"><i class="i i-dot"></i> <span>Users</span> </a> </li>
                      <li> <a href="withdrawals.php#nav" class="auto"><i class="i i-dot"></i> <span>Withdrawals</span> </a> </li>
                      <li> <a href="payments.php" class="auto"><i class="i i-dot"></i> <span>Paypal Payment Received </span> </a> </li>
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
          <section class="scrollable wrapper">
            <div class="row">
              
              <div class="col-sm-12">
                <section class="panel panel-success portlet-item">
                  <header class="panel-heading"> General Settings |  <a href='deleteuser.php?username=$username'>Delete User</a> </header>
                  <section class="panel panel-default">
                  <header class="panel-heading bg-light">
                     
                    <ul class="nav nav-tabs nav-justified">
                      <?php 
					 $query="SELECT * FROM  affiliateuser where username='$toupdate' "; 
 
 
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	
	$id="$row[Id]";
	$username="$row[username]";
	$pass="$row[password]";
	$address="$row[address]";
	$fname="$row[fname]";
  $lname= "$row[lname]";
	$email="$row[email]";
	$mobile="$row[mobile]";
	$active="$row[active]";
	$doj="$row[doj]";
	$country="$row[country]";
	$ear="$row[earning]";
  $wal="$row[wallet]";
	$ref="$row[referedby]";
	$pck="$row[pcktaken]";
	$lprofile="$row[launch]";
  $bname="$row[bankname]";
  $accnamee="$row[accountname]";
  $accnumber="$row[accountno]";
  $acctyppe="$row[accnttype]";
  $ifsc="$row[ifsccode]";
  $bitaddresss = "$row[bitcoin]";
  if($active==1)
	{
	$status="Active/Paid";
	}
	else if($active==0)
	{
	$status="UnActive/Unpaid";
	}
	else
	{
	$status="Unknown";
	}
	
	$qu="SELECT * FROM  packages where id = $pck"; 
 
 
 $re = mysqli_query($con,$qu);

while($r = mysqli_fetch_array($re))
{
	$pckid="$r[id]";
	$pckname="$r[name]";
	$pckprice="$r[price]";
	$pcktax="$r[tax]";
	$pckcur="$r[currency]";
	$pcksbonus="$r[sbonus]";
  }
	$total=$pckprice+$pcktax;
 
					  
		}			  

    $pr = $pckprice . " " . $pckcur;
    ?>  
                    </ul>
                  </header>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
					  
					  <?php    

           
                      if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status=!""))
                      {
                      echo $errormsg;
                      }
                      ?>
					  <div class="panel-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
                    <input type="hidden" name="todo" value="post">
					 <input type="hidden" value="<?php print $upid ?>" name="pckmainid">
					<div class="form-group">
                        <label>User Active Status | 0 means unactive and 1 means active</label>
                        <input type="text" value="<?php print $active ?>" class="form-control" placeholder="" name="act">
                      </div>
					  <div class="form-group">
                        <label>User Name</label>
                        <input type="text" value="<?php print $toupdate ?>" class="form-control" placeholder="" name="us" disabled>
                      </div>
					  
                       
                        <input type="hidden" value="<?php print $toupdate ?>" class="form-control" placeholder="" name="username">
                      
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" value="<?php print $fname; ?>" class="form-control" placeholder="" name="fname">
                      </div>

                       <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" value="<?php print $lname;?>" class="form-control" placeholder="" name="lname">
                      </div>

                      <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" value="<?php print $mobile ?>" class="form-control" placeholder="" name="mobile" >
                      </div>

                      <div class="form-group">
                        <label>User Email</label>
                        <input type="text" value="<?php print $email ?>" class="form-control" placeholder="" name="email" >
                      </div>
					           <div class="form-group">
                        <label>Address</label>
                        <input type="textarea" value="<?php print $address ?>" class="form-control" placeholder="" name="address">
                      </div>
                      <div class="form-group">
                        <label>Username Password</label>
                        <input type="textarea" value="<?php print $pass ?>" class="form-control" placeholder="" name="password">
                      </div>

						          <div class="form-group">
                        <label>Country</label>
                        <input type="text" value="<?php print $country ?>" class="form-control" placeholder="" name="country" >
                      </div>
					  
					           <div class="form-group">
                        <label>Earnings</label>
                        <input type="text" value="<?php print $ear ?>" class="form-control" placeholder="" name="earnings" >
                      </div>
                       <div class="form-group">
                        <label>Wallet</label>
                        <input type="text" value="<?php print $wal ?>" class="form-control" placeholder="" name="wal" >
                      </div>
					  
					           <div class="form-group">
                        <label>Referred By</label>
                        <input type="text" value="<?php print $ref ?>" class="form-control" placeholder="" name="refer" >
                      </div>
                      <div class="form-group">
                        <label>Bitcoin Address</label>
                        <input type="text" value="<?php print $bitaddresss ?>" class="form-control" placeholder="" name="bitaddress" >
                      </div>
			               <div class="form-group">
                        <label>Package Taken</label>
                        <input type="text" value="<?php print $pckname . " - " . $pr ?>" class="form-control" placeholder="" name="pck" disabled >
                      </div>
					           <div class="form-group">
                        <label>Select Package To Update/Edit : 
                          <select name="package">
                          <option value=''>Select</option>
                  		  <?php 
                          $query="SELECT id,name,price,currency,tax FROM  packages where active=1";                   
                           $result = mysqli_query($con,$query);

                          while($row = mysqli_fetch_array($result)){
                          	$id="$row[id]";
                          	$pname="$row[name]";
                          	$pprice="$row[price]";
                          	$pcur="$row[currency]";
                          	$ptax="$row[tax]";
                            $total=$pprice+$ptax;
                            print "<option value='$id'>$pname | Price - $pcur $total </option>";
                          }
                    ?>
                  </select>
                  </div>
                  <br />
                  <b>Update Bank Details In Case You Want Payment Via Bank Account. </b>
                  <br />
                 <br />
                  <div class="form-group">
                        <label>Account Type</label>
                      <select name='acctype' required>
                          <option>Select</option>
                          <option value="Savings" <?php if ($acctyppe=='Savings') { echo "SELECTED"; } ?>>Savings</option>
                          <option value="Current" <?php if ($acctyppe=='Current') { echo "SELECTED"; } ?>>Current</option>
                        </select>


                      </div>
                      <div class="form-group">
                        <label>Account Number</label>
                        <input type="text" value="<?php print $accnumber ?>" class="form-control" placeholder="" name="accno">
                      </div>
          
                      <div class="form-group">
                        <label>Account Name</label>
                        <input type="text" value="<?php print $accnamee ?>" class="form-control" placeholder="" name="accname">
                      </div>
                      <div class="form-group">
                        <label>Bank Name</label>
                        <input type="text" value="<?php print $bname ?>" class="form-control" placeholder="" name="bankname">
                      </div>
            
                      <div class="form-group">
                        <label>IFSC Code</label>
                        <input type="text" value="<?php print $ifsc ?>" class="form-control" placeholder="" name="ifsccode">
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