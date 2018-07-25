<?php
require_once("../db/connection_mysqli.php");
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['adminidusername'])) {
        header("location: https://bit-miner.io/admin1");
}
$user = 'admin';
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");

$id = $_GET['id'];
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && isset($_POST['todo'])){
  $done = mysqli_real_escape_string($con, $_POST['done']);
  $msg = mysqli_real_escape_string($con, $_POST['message']);
  $id = mysqli_real_escape_string($con, $_POST['id_r']);
  $from_r = mysqli_real_escape_string($con, $_POST['from_r']);
  $ins = mysqli_query($con, "INSERT INTO rly_ticket(ticket_no, mssg, date_r, from_r, time_r) VALUES('$id', '$msg', NOW(), '$from_r','$timestamp')");
  $up = mysqli_query($con, "UPDATE support_tick SET last_date = NOW(), status = '$done' WHERE id = '".$id."'");
  header('Location: https://bit-miner.io/admin1/view.php/?id='.$id.'');

  }
  $query="SELECT id,fname,email,doj,active,username,address,pcktaken FROM  affiliateuser where username = '".$_SESSION['username']."'"; 
 
 //fetching details for user
 $result = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>Tickets - Bit Miner - Admin</title>
<link rel="shortcut icon" href="https://bit-miner.io/https://bit-miner.io/wp-content/uploads/2017/11/fevi-con-bitminer.png" />
<link rel="apple-touch-icon" href="https://bit-miner.io/https://bit-miner.io/wp-content/uploads/2017/11/fevi-con-bitminer.png" />
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="../css/app.v1.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
<style type="text/css">
  .chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
 background: #fff; 
}
</style>
</head>
<body class="">
<section class="vbox">
  <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
    <div class="navbar-header aside-md dk"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="dashboard.php" class="navbar-brand"><img src="../images/logo.png" class="m-r-sm">Concourse</a> <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div>    
    <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="../images/a0.jpg"> </span> 
      <?php
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
          <li> <a href="https://bit-miner.io/admin1/profile.php">Profile</a> </li>
          <li class="divider"></li>
          <li> <a href="https://bit-miner.io/admin1/logout.php">Logout</a> </li>
        </ul>
      </li>
    </ul>
  </header>
    <section class="hbox stretch">
      <!-- .aside -->
      <aside class="bg-black aside-md hidden-print" id="nav">
        <section class="vbox">
          <section class="w-f scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-color="#333333">
              <div class="clearfix wrapper dk nav-user hidden-xs">
                <div class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb avatar pull-left m-r"> <img src="../images/a0.jpg"> <i class="on md b-black"></i> </span> <span class="hidden-nav-xs clear"> <span class="block m-t-xs"> <strong class="font-bold text-lt">
                <?php
                    $sql="SELECT fname FROM  affiliateuser WHERE username='".$_SESSION['adminidusername']."'";
                    if ($result = mysqli_query($con, $sql)) {
                      /* fetch associative array */
                      while ($row = mysqli_fetch_row($result)) {
                          print $row[0];
                      }
                    }
                  ?>
                </strong> <b class="caret"></b> </span> <span class="text-muted text-xs block">Art Director</span> </span> </a>
                  <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <span class="arrow top hidden-nav-xs"></span>
                    <li> <a href="https://bit-miner.io/admin1/profile.php">Profile</a> </li>
                    <li class="divider"></li>
                    <li> <a href="https://bit-miner.io/admin1/logout.php">Logout</a> </li>
                  </ul>
                </div>
              </div>
              <!-- nav -->
              <nav class="nav-primary hidden-xs">
                <ul class="nav nav-main" data-ride="collapse">
                  <li> <a href="#" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Account</span> </a> 
          <ul class="nav dk">
                      <li> <a href="https://bit-miner.io/admin1/dashboard.php" class="auto"><i class="i i-dot"></i> <span>Dashboard</span> </a> </li>
                      
                    </ul>
          </li>
                  
                  <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-lab icon"> </i> <span class="font-bold">Website Configuration</span> </a>
                    <ul class="nav dk">
                      <li > <a href="https://bit-miner.io/admin1/gensettings.php" class="auto"> <i class="i i-dot"></i> <span>General Settings</span> </a> </li>
            <li> <a href="https://bit-miner.io/admin1/emailsettings.php" class="auto"> <i class="i i-dot"></i> <span>E-Mail Settings</span> </a> </li>
                      
                      
                      
                      <li > <a href="https://bit-miner.io/admin1/pacsettings.php" class="auto"> <i class="i i-dot"></i> <span>Packages Settings</span> </a> </li>
                      
                    </ul>
                  </li>
                  
                  <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-grid2 icon"> </i> <span class="font-bold">Blog</span> </a>
                    <ul class="nav dk">
                      <li > <a href="https://bit-miner.io/admin1/notifications.php" class="auto"><i class="i i-dot"></i> <span>Post Notifications</span> </a> </li>
                      
                    </ul>
                  </li>
          <li class="active"  > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="fa fa-info-circle"> </i> <span class="font-bold">Analytics</span> </a>
                    <ul class="nav dk">
                      <li > <a href="https://bit-miner.io/admin1/users.php" class="auto"><i class="i i-dot"></i> <span>Users</span> </a> </li>
                      <li > <a href="https://bit-miner.io/admin1/payments.php" class="auto"><i class="i i-dot"></i> <span>Paypal Payment Received </span> </a> </li>
            <li > <a href="https://bit-miner.io/admin1/paymentscod.php" class="auto"><i class="i i-dot"></i> <span>C.O.D Orders </span> </a> </li>
            <li > <a href="https://bit-miner.io/admin1/payrequest.php" class="auto"><i class="i i-dot"></i> <span>User's Payment Requests </span> </a> </li>
            <li class="active" > <a href="https://bit-miner.io/admin1/renewpaymentscod.php" class="auto"><i class="i i-dot"></i> <span>Account Renew Requests </span> </a> </li>
                    </ul>
                  </li>
                  <li><a href="https://bit-miner.io/admin1/tickets.php"><i class="i i-images icon"></i><span class="font-bold">All Tickets</span></a></li>
          
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
          <?php 
            $get = mysqli_query($con, "SELECT * FROM support_tick WHERE id = '".$id."'");
            $row = mysqli_fetch_array($get);
          ?>
          <section class="scrollable wrapper">
            <div class="row">
              <section class="wrapper">
            <div class="row">
              <div class="col-sm-12" style="margin-top: 10px;">
                <section class="panel panel-success portlet-item">
                  <header class="panel-heading"> VIEW/REPLY TICKET</header>
                    <table class="table">
                      <tr>
                          <th class="tgrid-top-heading-th">Ticket No.
                          </th>
                          <th colspan="3" class="grid-top-heading-th">
                              <span id="lblTNo" style="color: #FFA358;"><?php echo $row['ticket_no'];?></span>
                              <input type="hidden" value="40972" id="hffortmid" />
                          </th>
                      </tr>
                      <tr>
                          <td class="td1 font-bold" style="width: 15%;">Created Date
                          </td>
                          <td class="td2" style="width: 35%">
                              <span id="lbldate"><?php echo $row['create_date'];?></span>
                          </td>
                          <td class="td1 font-bold" style="width: 15%">Last Updated
                          </td>
                          <td class="td2" style="width: 35%">
                              <span id="lbllastup"><?php echo $row['last_date'];?></span>
                          </td>
                      </tr>
                      <tr>
                          <td class="td1 font-bold">Category
                          </td>
                          <td class="td2">
                              <span id="lblCat"><?php echo $row['category'];?></span>
                          </td>
                          <td class="td1 font-bold">Status
                          </td>
                          <td class="td2">
                              <span id="lblStatus"><?php if($row['status'] == 0){
                                echo "Pending";
                                }else{
                                  echo 'Solved';
                                  }?></span>
                              
                          </td>
                      </tr>
                      <tr class="support-req-fulllength-td">
                          <td class="td1 font-bold">Subject
                          </td>
                          <td id="tdSub" class="td2">
                              <span id="lblSub"><?php echo $row['sub'];?></span>
                          </td>

                          <td id="tdforattachments" colspan="2" class="td1 font-bold attachment-border">

                          </td>
                      </tr>
                      <tr style="border-bottom: 5px solid #fff !important;" class="support-req-fulllength-td">
                          <td class="td1 font-bold" style="vertical-align: top;">Message
                          </td>
                          <td class="td2" colspan="3" style="vertical-align: top;">
                              <span id="lblOMsg"><?php echo $row['msg'];?></span>
                          </td>
                      </tr>
                  </table>
                </section>               
              </div>
            </div>
            <div class="wrapper">
              <div class="row">
                <div class="">
                  <div class="panel-body">
                    <ul class="chat">
                      <?php
                        $rply = "SELECT * FROM rly_ticket WHERE ticket_no = '".$id."'";
                        $rly = mysqli_query($con, $rply);
                        while ($rows = mysqli_fetch_array($rly)) {
                         $admin = $rows[from_r];
                            # code...
                            if($admin == "Admin"){
                                $admins == "Support"; 
                                echo '<li class="left clearfix"><span class="chat-img pull-left">
                                  <img src="https://bit-miner.io/support.png" width="68" height="68" alt="User Avatar" class="img-circle" />
                                  </span>
                                      <div class="chat-body clearfix">
                                          <div class="header">
                                             <strong class="primary-font">Support</strong> <small class="pull-right text-muted">
                                                  <i class="fa fa-clock-o" aria-hidden="true"></i> '.$rows[time_r].'</small>
                                          </div>
                                          <p>'.$rows[mssg].'</p>
                                      </div>
                                  </li>';
                              }else{

                                echo '<li class="left clearfix"><span class="chat-img pull-left">
                                  <img src="https://bit-miner.io/user.png" width="68" height="68" alt="User Avatar" class="img-circle" />
                                  </span>
                                      <div class="chat-body clearfix">
                                          <div class="header">
                                             <strong class="primary-font">'.$rows[from_r].'</strong> <small class="pull-right text-muted">
                                                  <i class="fa fa-clock-o" aria-hidden="true"></i> '.$rows[time_r].'</small>
                                          </div>
                                          <p>'.$rows[mssg].'</p>
                                      </div>
                                  </li>';
                              }
                          }
                      ?>
                      </ul>
                </div>
                </div>
              </div>
            </div>
            <br>
            <br>
            <div class="wrapper">
              <div class="row">
                <div class="">
                  <div class="panel-body">
                  <p>Post a Reply</p>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="todo" value="post"> 
                     <input type="hidden" name="id_r" value="<?php echo $row['id'];?>">
                     <input type="hidden" name="from_r" value="Admin"> 
                    <div class="form-group">            
                      <label>Message*</label>
                      <textarea rows="6" cols="80" class="form-control" name="message" placeholder="" required="required"></textarea>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" name="done" value="1" class="form-check-input">
                        Issue Resolved
                      </label>
                    </div>
                    <div class="form-group">
                    <input type="submit" name="submit" value="Reply">
                    </div>
                  </form>
                </div>
                </div>
              </div>
            </div>
          </section>
            </div>
          </section>
        </section>
        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> 
        </section>
    </section>
  </section>
<!-- Bootstrap -->
<!-- App -->
<script src="../js/app.v1.js"></script>
<script src="../js/jquery.ui.touch-punch.min.js"></script>
<script src="../js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="../js/app.plugin.js"></script>
</body>
</html>