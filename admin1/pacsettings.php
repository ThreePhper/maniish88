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
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>Packages Settings</title>
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

   
	   
	   ?></strong> <b class="caret"></b> </span> <span class="text-muted text-xs block">Admin</span> </span> </a>
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
                  
                  <li class="active" > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-lab icon"> </i> <span class="font-bold">Website Configuration</span> </a>
                    <ul class="nav dk">
                      <li > <a href="gensettings.php" class="auto"> <i class="i i-dot"></i> <span>General Settings</span> </a> </li>
					  <li> <a href="emailsettings.php" class="auto"> <i class="i i-dot"></i> <span>E-Mail Settings</span> </a> </li>
                      
                      
                      
                      <li class="active" > <a href="pacsettings.php" class="auto"> <i class="i i-dot"></i> <span>Packages Settings</span> </a> </li>
                      
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
          <section class="scrollable wrapper">
            <div class="row">
              
              <div class="col-sm-12">
                <section class="panel panel-success portlet-item">
                  <header class="panel-heading"> Packages Settings </header>
                  <section class="panel panel-default">
                  <header class="panel-heading bg-light">
                    <ul class="nav nav-tabs nav-justified">
                      <li class="active"><a href="#home" data-toggle="tab">Create Packages</a></li>
                      <li><a href="#profile" data-toggle="tab">Update Packages</a></li>
                      <li><a href="#messages" data-toggle="tab">Deactivate Packages</a></li>
                      
                    </ul>
                  </header>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
					  
					  
					  <div class="panel-body">
                    <form action="createpac.php" method="post">
                      <div class="form-group">
                        <label>Package Name</label>
                        <input type="text" class="form-control" placeholder="" name="pckname">
                      </div>
                      <div class="form-group">
                        <label>Package Details</label>
                        <input type="textarea" class="form-control" placeholder="" name="pckdetail">
                      </div>
					  
					  <div class="form-group">
                        <label>Package Price</label>
                        <input type="text" class="form-control" placeholder="" name="pckprice" >
                      </div>
					  <div class="form-group">
                        <label>Package Tax</label>
                        <input type="text" class="form-control" placeholder="" name="pcktax" >
                      </div>
					  <div class="form-group">
					  <label>
            Select Currency : <br/>
		  <select name="currency">
		  <?php $query="SELECT id,name,code FROM  currency"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$id="$row[id]";
	$curname="$row[name]";
	$curcode="$row[code]";
	
  print "<option value='$curcode'>$curname - $curcode </option>";
  
  }
  ?>
 
</select>
</label> 
<br/>
 <div class="form-group">
                        <label>Minimum Payout For User</label>
                        <input type="text" class="form-control" placeholder="" name="pckmpay" >
                      </div>
					  
					   <div class="form-group">
                        <label>Daily Bonus</label>
                        <input type="text" class="form-control" placeholder="" name="pcksbonus" >
                      </div>

<div class="form-group">
                        <label>Level 1</label>
                        <input type="text" class="form-control" placeholder="" name="lev1">
                      </div>
					  <div class="form-group">
                        <label>Level 2</label>
                        <input type="text" class="form-control" placeholder="" name="lev2">
                      </div>
					  <div class="form-group">
                        <label>Level 3</label>
                        <input type="text" class="form-control" placeholder="" name="lev3">
                      </div>
					  <div class="form-group">
                        <label>Level 4</label>
                        <input type="text" class="form-control" placeholder="" name="lev4">
                      </div>
					  <div class="form-group">
                        <label>Level 5</label>
                        <input type="text" class="form-control" placeholder="" name="lev5">
                      </div>
					  <div class="form-group">
                        <label>Level 6</label>
                        <input type="text" class="form-control" placeholder="" name="lev6">
                      </div>
					  <div class="form-group">
                        <label>Level 7</label>
                        <input type="text" class="form-control" placeholder="" name="lev7">
                      </div>
					  <div class="form-group">
                       <label>Level 8</label>
                        <input type="text" class="form-control" placeholder="" name="lev8">
                      </div>
					  <div class="form-group">
                        <label>Level 9</label>
                        <input type="text" class="form-control" placeholder="" name="lev9">
                      </div>
					  <div class="form-group">
                        <label>Level 10</label>
                        <input type="text" class="form-control" placeholder="" name="lev10">
                      </div>
					  <div class="form-group">
                        <label>Level 11</label>
                        <input type="text" class="form-control" placeholder="" name="lev11">
                      </div>
					  <div class="form-group">
                        <label>Level 12</label>
                        <input type="text" class="form-control" placeholder="" name="lev12">
                      </div>
					  <div class="form-group">
                        <label>Level 13</label>
                        <input type="text" class="form-control" placeholder="" name="lev13">
                      </div>
					  <div class="form-group">
                       <label>Level 14</label>
                        <input type="text" class="form-control" placeholder="" name="lev14">
                      </div>
					  <div class="form-group">
                        <label>Level 15</label>
                        <input type="text" class="form-control" placeholder="" name="lev15">
                      </div>
					  <div class="form-group">
                       <label>Level 16</label>
                        <input type="text" class="form-control" placeholder="" name="lev16">
                      </div>
					  <div class="form-group">
                       <label>Level 17</label>
                        <input type="text" class="form-control" placeholder="" name="lev17">
                      </div>
					  <div class="form-group">
                        <label>Level 18</label>
                        <input type="text" class="form-control" placeholder="" name="lev18">
                      </div>
					  <div class="form-group">
                       <label>Level 19</label>
                        <input type="text" class="form-control" placeholder="" name="lev19">
                      </div>
					  
					  <div class="form-group">
                       <label>Level 20</label>
                        <input type="text" class="form-control" placeholder="" name="lev20">
                      </div>
					  <div class="form-group">
                       <label>Renew Day(s)</label>
                        <input type="text" class="form-control" placeholder="" name="renewdays">
                      </div>
                      <div class="form-group">
                       <label>Turbo</label>
                        <input type="text" class="form-control" placeholder="" name="turbo">
                      </div>
                      <div class="form-group">
                       <label>Binary Income</label>
                        <input type="text" class="form-control" placeholder="" name="binary">
                      </div>
					  <div class="list-group-item">
		   
</div>

					  
					  
</div>
                      
                     <button type="submit" class="btn btn-lg btn-primary btn-block">I Have Filled And Checked All Details. Create Package For Me Now.</button>
                    </form>
                  </div>
					  
					  </div>
                      <div class="tab-pane" id="profile"><form action="updatepck.php" method="post">
                      <div class="form-group">
                        <label>
            Select Package To Update/Edit : 
		  <select name="upackage">
		  <?php $query="SELECT id,name,price,currency,tax FROM  packages"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
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
                      
                     <button type="submit" class="btn btn-lg btn-primary btn-block">I Have Filled And Checked All Details. Update/Edit This Package For Me Now.</button>
                    </form></div>
                      <div class="tab-pane" id="messages"><div class="list-group-item">
					  <form action="deletepackage.php" method="post">
		  <label>
            Select Package To Delete : 
		  <select name="packagedelid">
		  <?php $query="SELECT id,name,price,currency,tax FROM  packages where active=1"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
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
</label> 

</div>

<button type="submit" class="btn btn-lg btn-primary btn-block">I Know What I'm Doing, Deactivate This Package For Me. (You cannot delete package, it can only be deactivated)</button>
</form>
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