<?php
require_once("../db/connection_mysqli.php");
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
  header("location: https://bit-miner.io/login.php");
}
?>

      <?php 

     
 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['amount']))
{

$tamount = mysqli_real_escape_string($con,$_POST['amount']);
$pay_user_name = mysqli_real_escape_string($con,$_POST['referral']);
$wda = mysqli_real_escape_string($con,$_POST['wda']);
$password = mysqli_real_escape_string($con,$_POST['password']);


//if(isset($todo) and $todo=="post"){

$status = "OK";
$msg="";
//validation starts
if ( $tamount < $wda ){
$msg=$msg."Please enter amount lessthan your wallet<BR>";
$status= "NOTOK";
}

$sql="SELECT * FROM affiliateuser WHERE username='$pay_user_name'";
$result=mysqli_query($con, $sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $username and $password, table row must be 1 row
if ($count!==1) {
 $msg=$msg." " .$username. " This user is not existing<BR>";
  $status= "NOTOK";  
}

$count = mysqli_fetch_array($result);
$pay_wallet = "$count[wallet]";
$pay_wallet = $pay_wallet + $wda;
$pay_earn = "$count[earning]";
$pay_earn = $pay_earn + $wda;

//echo $pay_earn;

  $query="SELECT Id, username, password, wallet, earning FROM  affiliateuser where username = '".$_SESSION['username']."'";
 
 //fetching details for user
 $result = mysqli_query($con,$query);



$row = mysqli_fetch_array($result);
 $opassword = "$row[password]";
 $user_id = "$row[Id]";
 $user_wallet = "$row[wallet]";
 $user_wallet = $user_wallet - $wda;
 $user_earn = "$row[earning]";

//echo $opassword;

if ($opassword !== $password){
$msg=$msg."Please enter correct password<BR>";
$status= "NOTOK";

}

$transfer_id = mt_rand(100000,999999);

if ($status=="OK"){

$query=mysqli_query($con,"insert into transfer_summary(user_id, transfer_id, pay_user_name, transfer_amount, t_date) values('$user_id', '$transfer_id', '$pay_user_name','$wda',CURDATE())");

$update_pay = "UPDATE affiliateuser SET wallet = '$pay_wallet', earning = '$pay_earn' WHERE username = '".$pay_user_name."'";
$update_pay = mysqli_query($con, $update_pay);

$update_det_pay = "UPDATE affiliateuser SET wallet = '$user_wallet' WHERE username = '".$_SESSION['username']."'";
$update_det_pay = mysqli_query($con, $update_det_pay);

$errormsg = "<div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Success : </br></strong>Your Fund Transfer has been Successfuly Done! Our Team will process your request.</div>";


}else{ 
$errormsg= "<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg." Or We are unable to process your request</div>"; //printing error if found in validation
        
   
}
}
 ?>
  
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<link rel="shortcut icon" href="https://bit-miner.io/https://bit-miner.io/wp-content/uploads/2017/11/fevi-con-bitminer.png" />
<link rel="apple-touch-icon" href="https://bit-miner.io/https://bit-miner.io/wp-content/uploads/2017/11/fevi-con-bitminer.png" />
<title>Fund Transfer</title>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{    
  $("#referral").keyup(function()
  {   
    var referral = $(this).val(); 
    
    if(referral.length > 3)
    {   
      $("#results").html('checking...');
      
      /*$.post("username-check.php", $("#reg-form").serialize())
        .done(function(data){
        $("#result").html(data);
      });*/
      
      $.ajax({
        
        type : 'POST',
        url  : 'sname-check.php',
        data : $(this).serialize(),
        success : function(data)
              {
                   $("#results").html(data);
                }
        });
        return false;
      
    }
    else
    {
      $("#results").html('');
    }
  });
  
});
</script>
</head>
<body class="">
<section class="vbox">
  <header class="bg-primary header header-md navbar navbar-fixed-top-xs box-shadow">
    <div class="navbar-header aside-md dk"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="dashboard.php" class="navbar-brand"><img src="images/logo.png" class="m-r-sm">
    <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div>
  
    
    <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
      
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="images/a0.jpg"> </span> <?php
      $sql="SELECT fname FROM  affiliateuser WHERE username='".$_SESSION['username']."'";
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
          <li> <a href="notifications.php">Notifications </a> </li>
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
          <footer class="footer hidden-xs no-padder text-center-nav-xs"> <a href="logout.php" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs"> <i class="i i-logout"></i> </a> <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a> </footer>
        </section>
      </aside>
      <!-- /.aside -->
      <section id="content">
        <header class="header b-b b-light hidden-print bg-white"></header>
          <section class="vbox">
      <br>
      <br>  
          <?php 
                $query="SELECT * FROM  affiliateuser WHERE username='".$_SESSION['username']."'"; 
                $result = mysqli_query($con,$query);

                $row = mysqli_fetch_array($result);
                  $wallet = "$row[wallet]";
                  
                $query121="SELECT * FROM  settings"; 
                $result121 = mysqli_query($con,$query121);
                  $i=0;
                while($row121 = mysqli_fetch_array($result121)){
                  $wlink="$row121[wlink]";
                }
                $pathu="/signup.php?aff=";       
                ?>  
          <div class="col-sm-8">
                <section class="panel panel-default">
                  <section class="scrollable">
                  <?php 
                      if($_SERVER['REQUEST_METHOD'] == 'POST' && ($errormsg!=""))
                      {
                      print $errormsg;
                      }
                      ?>
                            <header class="panel-heading font-bold"> Fund Transfer</header>
                            <div class="panel-body">
                              <form id="reg-form" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?> method="post">
                    <input type="hidden" name="todo" value="post">
                                <div class="form-group">
                                  <label>Balance :</label>
                                  <select data-required="true" class="form-control m-t" name="amount" required>
                                      <option value="<?php print $wallet ?>"><?php print "My Wallet " .$wallet. " $" ?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                  <label>Receiver's Login Name :</label>
                                  <input type="text" id="referral" name="referral" class="form-control" placeholder="">
                                  <span id="results"></span>
                                </div>
                                <div class="form-group">
                                  <label>Amount : </label>
                                  <input type="number " name="wda" class="form-control cla" placeholder="" required>
                                </div>
                                <div class="form-group">
                                  <label>Password : </label>
                                  <input type="password" name="password" class="form-control" placeholder="" required>
                                </div> 
                                <div class="form-group text-right">                     
                                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                              </div>
                              </form>
                            </div>
                          </section>
                        </section>
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
<script src="js/app.plugin.js"></script>

<script type="text/javascript">
$('.cla').keypress(function(e) {
    var a = [];
    var k = e.which;
    
    for (i = 48; i < 58; i++)
        a.push(i);
    
    if (!(a.indexOf(k)>=0))
        e.preventDefault();
});
</script>

</body>
</html>