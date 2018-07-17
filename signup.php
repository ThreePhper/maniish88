	<?php require('header.php'); ?>
<style>
#reg-form label,#signup_header,#reg-form input,#reg-form small,#signup_btn,#reg-form select,#results,#result{
font-family: 'Arsenal', sans-serif !important;
}
</style>

<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("z_db.php");
//session_start();

$sql="SELECT maintain FROM  settings WHERE sno=0";
		  if ($result = mysqli_query($con, $sql)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        $main= $row[0];
    }
	if($main==2 || $main==3)
	{
	print "
				<script language='javascript'>
					window.location = 'maintain.php';
				</script>
			";
	}

}

$_SERVER['REQUEST_METHOD'] == 'GET';

  $aff =  $_GET['aff'];
  $affs =  $_GET['aff'];


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['todo']))
{
// Collect the data from post method of form submission // 
$todo=mysqli_real_escape_string($con,$_POST['todo']);
$name=mysqli_real_escape_string($con,$_POST['fname']);
//$name = mysqli_real_escape_string($con,$_GET['aff']);
$username=mysqli_real_escape_string($con,$_POST['username']);
$userid=mysqli_real_escape_string($con,$_POST['username']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$password2=mysqli_real_escape_string($con,$_POST['password2']);

$email=mysqli_real_escape_string($con,$_POST['email']);

$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
$ref=mysqli_real_escape_string($con,$_POST['referral']);
$address=mysqli_real_escape_string($con,$_POST['address']);
$city=mysqli_real_escape_string($con,$_POST['city']);
$state=mysqli_real_escape_string($con,$_POST['state']);
$country=mysqli_real_escape_string($con,$_POST['country']);
$preference=mysqli_real_escape_string($con,$_POST['preference']);
$bitcoin=mysqli_real_escape_string($con,$_POST['bit']);

$status = "OK";
$msg="";
//validation starts
// if userid is less than 6 char then status is not ok
if(!isset($username) or strlen($username) <5){
$msg=$msg."User Name Should Contain Minimum 5 CHARACTERS.<BR>";
$status= "NOTOK";

}					

if(!ctype_alnum($username)){
$msg=$msg."User Name Should Contain Alphabatics & Numeric Chars Only. Not allow any Special Characters <BR>";
$status= "NOTOK";

}					


$rr=mysqli_query($con,"SELECT COUNT(*) FROM affiliateuser WHERE username = '$username'");
$r = mysqli_fetch_row($rr);
$nr = $r[0];
if($nr==1){
$msg=$msg."User Name Already Exists. Please Try Another One.<BR>";
$status= "NOTOK";
}				


if ( $preference=="" ){
$msg=$msg."Please Select The Preference.<BR>";
$status= "NOTOK";
}


if ( strlen($password) < 5 ){
$msg=$msg."Password Must Be More Than 8 Char Length.<BR>";
$status= "NOTOK";}	

if ( strlen($address) < 1 ){
$msg=$msg."Not Available<BR>";
}

$result = mysqli_query($con,"SELECT count(*) FROM  affiliateuser where username = '$ref'");
$row = mysqli_fetch_row($result);
$numrows = $row[0];
if ($numrows==0)
{
$msg=$msg."Sponsor/Referral Username Not Available<BR>";
$status= "NOTOK";
}

if ( strlen($mobile) > 15 ){
$msg=$msg."Please Enter Correct Mobile Number<BR>";
}

if ( strlen($email) < 1 ){
$msg=$msg."Please Enter Your Email Id.<BR>";
$status= "NOTOK";}
if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
$msg=$msg."Email Id Not Valid, Please Enter The Correct Email Id .<BR>";
$status= "NOTOK";}

if ( $password <> $password2 ){
$msg=$msg."Both Passwords Are Not Matching.<BR>";
$status= "NOTOK";}		


if ( $country == "" ){
$msg=$msg."Please Enter Your Country Name.<BR>";
$status= "NOTOK";}	

//Test if it is a shared client
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
  $ip=$_SERVER['HTTP_CLIENT_IP'];
//Is it a proxy address
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
  $ip=$_SERVER['REMOTE_ADDR'];
}
//The value of $ip at this point would look something like: "192.0.34.166"
$ip = ip2long($ip);
//The $ip would now look something like: 1073732954

$sqlquery="SELECT wlink FROM settings where sno=0"; //fetching website from databse
$rec2=mysqli_query($con,$sqlquery);
$row2 = mysqli_fetch_row($rec2);
$wlink=$row2[0]; //assigning website address

$sqlquery111="SELECT etext FROM emailtext where code='SIGNUP'"; //fetching website from databse
$rec2111=mysqli_query($con,$sqlquery111);
$row2111 = mysqli_fetch_row($rec2111);
$emailtext=$row2111[0]; //assigning email text for email

/* if(!($package==""))
{
$sqlquery11="SELECT validity FROM packages where id = $package"; //fetching no of days validity from package table from databse
$rec211=mysqli_query($con,$sqlquery11);
$row211 = mysqli_fetch_row($rec211);
$noofdays=$row211[0]; //assigning website address
$cur=date("Y-m-d");
$expiry=date('Y-m-d', strtotime($cur. '+ '.$noofdays.'days'));
$sbonus=0;
} */

$noofdays=155; //assigning website address
$cur=date("Y-m-d");
$expiry=date('Y-m-d', strtotime($cur. '+ '.$noofdays.'days'));

$sbonus=0;
$active=0;
$lname=mysqli_real_escape_string($con,$_POST['lname']);
//echo $lname;
$bitcoin=mysqli_real_escape_string($con,$_POST['bit']);
//echo $bitcoin;
$preference=mysqli_real_escape_string($con,$_POST['preference']);
//echo $preference;  
$get_date = mysqli_query($con, "SELECT left_date,right_date FROM affiliateuser WHERE username = '".$ref."'");
  $rowd = mysqli_fetch_array($get_date);
  $left = $rowd[left_date];
  $right = $rowd[right_date];

  if($preference == "Left"){

    if($left == '0000-00-00'){
        $up_left = mysqli_query($con, "UPDATE affiliateuser SET left_date = NOW() WHERE username = '".$ref."'");
    }

  }

  if($preference == "Right"){

    if($right == '0000-00-00'){
      $up_right = mysqli_query($con, "UPDATE affiliateuser SET right_date = NOW() WHERE username = '".$ref."'");
    }
  }

if ($status=="OK") 
{
$scode=rand(1111111111,9999999999); //generating random code, this will act as signup key
$query=mysqli_query($con,"insert into affiliateuser(username,password,fname,lname,address,email,referedby,preference,bitcoin,ipaddress,mobile,doj,city,state,country,signupcode,tamount,pcktaken,expiry,active) values('$username','$password','$name','$lname','$address','$email','$ref','$preference','$bitcoin','$ip','$mobile','$cur','$city','$state','$country','$scode','$sbonus','$package','$expiry','$active')");
  


$_SESSION['paypalidsession'] = $userid;
// More headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <no-reply@bit-miner.io>' . "\r\n";
$to=$email;
$subject="Thank You For Creating An Account";
$message= '
<style type="text/css">
      body {
       padding-top: 0 !important;
       padding-bottom: 0 !important;
       padding-top: 0 !important;
       padding-bottom: 0 !important;
       margin:0 !important;
       width: 100% !important;
       -webkit-text-size-adjust: 100% !important;
       -ms-text-size-adjust: 100% !important;
       -webkit-font-smoothing: antialiased !important;
     }
     .tableContent img {
       border: 0 !important;
       display: block !important;
       outline: none !important;
     }
     a{
      color:#382F2E;
    }

    p, h1{
      color:#382F2E;
      margin:0;
    }
 p{
      text-align:left;
      color:#999999;
      font-size:14px;
      font-weight:normal;
      line-height:19px;
    }

    a.link1{
      color:#382F2E;
    }
    a.link2{
      font-size:16px;
      text-decoration:none;
      color:#ffffff;
    }

    h2{
      text-align:left;
       color:#222222; 
       font-size:19px;
      font-weight:normal;
    }
    div,p,ul,h1{
      margin:0;
    }

    .bgBody{
      background: #ffffff;
    }
    .bgItem{
      background: #ffffff;
    }
  
@media only screen and (max-width:480px)
    
{
    
table[class="MainContainer"], td[class="cell"] 
  {
    width: 100% !important;
    height:auto !important; 
  }
td[class="specbundle"] 
  {
    width:100% !important;
    float:left !important;
    font-size:13px !important;
    line-height:17px !important;
    display:block !important;
    padding-bottom:15px !important;
  }
    
td[class="spechide"] 
  {
    display:none !important;
  }
      img[class="banner"] 
  {
            width: 100% !important;
            height: auto !important;
  }
    td[class="left_pad"] 
  {`
      padding-left:15px !important;
      padding-right:15px !important;
  }
     
}
  
@media only screen and (max-width:540px) 

{
    
table[class="MainContainer"], td[class="cell"] 
  {
    width: 100% !important;
    height:auto !important; 
  }
td[class="specbundle"] 
  {
    width:100% !important;
    float:left !important;
    font-size:13px !important;
    line-height:17px !important;
    display:block !important;
    padding-bottom:15px !important;
  }
    
td[class="spechide"] 
  {
    display:none !important;
  }
      img[class="banner"] 
  {
            width: 100% !important;
            height: auto !important;
  }
  .font {
    font-size:18px !important;
    line-height:22px !important;
    
    }
    .font1 {
    font-size:18px !important;
    line-height:22px !important;
    
    }
}

    </style>
<script type="colorScheme" class="swatch active">
{
    "name":"Default",
    "bgBody":"ffffff",
    "link":"382F2E",
    "color":"999999",
    "bgItem":"ffffff",
    "title":"222222"
}
</script>
<table bgcolor="#ffffff" width="100%" border="0" cellspacing="0" cellpadding="0" class="tableContent" align="center"  style="font-family:Georgia, Arial,serif;">
  <tbody>
  <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" border="1"  class="MainContainer">
  <tbody>
  
    
    <tr>
      <td>
    <div style="background:#f5f5f5;width:450px;margin:0 auto;padding:20px 20px 1px 20px;">
    <table width="100%" border="0" cellspacing="0"  bgcolor="#ffffff" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="40">&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="20" class="spechide"></td>
    </tr>
    <tr>
      <td class="movableContentContainer " valign="top">
        <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" align="left" class="specbundle"><div class="contentEditableContainer contentTextEditable">
                                <div class="contentEditable">
                                  <p style="text-align:center;margin:0;font-family:Georgia,Time,sans-serif;font-size:26px;color:#222222;"><span class="specbundle2"><span class="font1">Welcome</span></span></p>
                                </div>
                              </div></td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>
        </div>
        
        <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                          <tr><td height="20"></td></tr>
                          <tr>
                            <td align="left">
                              <div class="contentEditableContainer contentTextEditable">
                                <div class="contentEditable" align="left">
                                  <p style="margin:0px;">Dear <span style="font-weight:600">'.$name.' '. $lname.',</span></p>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td align="left">
                              <div class="contentEditableContainer contentTextEditable">
                                <div class="contentEditable" align="left">
                                  <p style="color:#222222;">
                                    Your account has been successfully created and verified with us. 
                  </p>
                  <p  style="color:#222222;font-weight:bold;">
                                   Your account information:
                                    <br>  
                                   Username: '.$username.'
                                    <br>
                  Registered Email: '.$email.'
                  <br>
                                   Your Password: '.$password.'
                  <br>
                  </p>
                  <p style="color:#222222;">
                  Please use your username and password to login your account. Feel free to contact our customer support to get resolution of any issues related to bit-miner.
                  <br>
                  <br>
                                    <br>
                  Happy Earnings!

                                  </p>
                                </div>
                              </div>
                            </td>
                          </tr>
    <tr>
      <td  style="border-bottom:1px solid #DDDDDD;"></td>
    </tr>
    <br>
                          <tr>
                            <td align="left">
                              <div class="contentEditableContainer contentTextEditable">
                                <div class="contentEditable" align="left">
                                  <p style="color:#222222;">
                                    Need Support?
                                    <br>  
                                    <br>
                                   If you have any issues, we will happy to help you. You can contact us on <a href="mailto:support@bit-miner.io" style="color:#15c" target="_blank" >support@bit-miner.io</a>

                                  </p>
                                </div>
                              </div>
                            </td>
                          </tr>
                          
                        </table>
        </div>
        <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
    <tr>
      <td height="10">
    </tr>
    <tr>
      <td  style="border-bottom:1px solid #DDDDDD;"></td>
    </tr>
    <tr><td height="16"></td></tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" class="specbundle"><div class="contentEditableContainer contentTextEditable">
                                    </div></td>
      <td valign="top" width="100" class="specbundle">&nbsp;</td>
      <td valign="top" width="100" class="specbundle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="30">
                                    <div class="contentEditableContainer contentFacebookEditable">
                                      <div class="contentEditable">
                                        <a target="_blank" href="https://www.facebook.com/bit.miner.17"><img src="http://bit-miner.io/images/fb.png" width="25" height="25" alt="facebook icon" data-default="placeholder" data-max-width="30" data-customIcon="true"></a>
                                      </div>
                                    </div>
                                  </td>
      <td valign="top" width="5">&nbsp;</td>
      <td valign="top" width="30">
                                    <div class="contentEditableContainer contentTwitterEditable">
                                      <div class="contentEditable">
                                        <a target="_blank" href="https://twitter.com/admin_btc"><img src="http://bit-miner.io/images/tw.png" width="25" height="25" alt="twitter icon" data-default="placeholder" data-max-width="30" data-customIcon="true"></a>
                                      </div>
                                    </div>
                                  </td>
                  
                  <td valign="top" width="5">&nbsp;</td>
      <td valign="top" width="30">
                                    <div class="contentEditableContainer contentTwitterEditable">
                                      <div class="contentEditable">
                                        <a target="_blank" href="https://in.linkedin.com/"><img src="http://bit-miner.io/images/lin.png" width="25" height="25"  alt="twitter icon" data-default="placeholder" data-max-width="30" data-customIcon="true"></a>
                                      </div>
                                    </div>
                                  </td>
                  <td valign="top" width="5">&nbsp;</td>
      <td valign="top" width="30">
                                    <div class="contentEditableContainer contentTwitterEditable">
                                      <div class="contentEditable">
                                        <a target="_blank" href="https://www.instagram.com/_admin_btc/"><img src="http://bit-miner.io/images/ins.png" width="25" height="25" alt="twitter icon" data-default="placeholder" data-max-width="30" data-customIcon="true"></a>
                                      </div>
                                    </div>
                                  </td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  <tr><td height="15" colspan="3" align="center">
  
   </td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
    
  </tbody>
          </table>

        </div>
        
        <!-- =============================== footer ====================================== -->
      
      </td>
    </tr>
  </tbody>
</table>
</td>
      <td valign="top" width="40">&nbsp;</td>
    </tr>
  </tbody>
</table>
<p style="font-family:Georgia;font-size:14px;text-align:center;margin-bottom:-4px!important;">©2017 All Rights Reserved | 
  <a href="http://bit-miner.io" target="_blank" style="font-weight:bold;">bit-miner.io</a></p>

</div>
</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>';
mail($to,$subject,$message,$headers);
$errormsg = "<div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Your account has been successfully registered.
</br></strong></div>";

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
<!--
<script>
$("#name").keypress(function (e) {
        if (e.which != 8 && e.which < 48 || (e.which > 57 && e.which < 65) || (e.which > 90 && e.which < 97) || e.which > 122) {
             return false;
        }
    })

</script>
-->


<!--<script type="text/javascript">
        function blockSpecialChar(e) {
            var k = e.keyCode;

           return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8   || (k >= 48 && k <= 57));
        }
    </script>-->
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>


  



<script type="text/javascript">
$(document).ready(function()
{    
  $("#name").keyup(function()
  {   
    var name = $(this).val(); 
    
    if(name.length > 3)
    {   
      $("#result").html('checking...');
      
      /*$.post("username-check.php", $("#reg-form").serialize())
        .done(function(data){
        $("#result").html(data);
      });*/
      
      $.ajax({
        
        type : 'POST',
        url  : 'username-check.php',
        data : $(this).serialize(),
        success : function(data)
              {
                   $("#result").html(data);
                }
        });
        return false;
      
    }
    else
    {
      $("#result").html('');
    }
  });
  
});
</script>
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




<link rel="stylesheet" href="css_live/page_style.css" type="text/css" />
<link rel="stylesheet" href="build/css/intlTelInput.css">

<div class="container-fluid no-left-right-padding"  id="login_backgroud">
	<div class="signup-page" style="">
		<div class="login">
			<div class="form-signup well col-xs-12"  style="">				
				<p style="" id="signup_header">Sign Up</p>
				<?php 
					if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status!==""))
					{
					print $errormsg;
					}
				?>
		<form id="reg-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post" data-validate="parsley">
			<input type="hidden" name="todo" value="post">
					<div class="">
							<div class="form-group col-xs-12 signp-group no-left-right-padding">
							<label>Sponsor Name*</label>
							 <div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
                <?php
                  $affs = $_GET['aff'];
                  
                ?>
								<input type="text" id="referral" class="form-control input-box" data-required="true" name="referral" value="<?php if($_SERVER['REQUEST_METHOD'] == 'GET'){
                    echo  $aff =  $_GET['aff']; }?>" <?php if(!empty($affs)){
                    echo  "readonly"; }?> >
							</div>
							 <span id="results" style="margin-top: 0px !important;display: block;"></span> 
							 </div>
						<div class="form-group col-xs-12 signp-group no-left-right-padding" id="left_right_pos">
			             <!-- <div class="col-xs-2 no-left-right-padding" id="placement_position_div">
			                <label style="">Placement Position :</label>
			              </div>-->
			              <div class="col-xs-4" id="first_radio_div">

			                <!--<input id="radio1" name="preference" ng-model="vm.customerCreate.Position" value="Left" type="checkbox" tabindex="5" data-validationtype="required" ng-disabled="vm.maindischeck" class="ng-valid ng-not-empty ng-dirty ng-touched">
							&nbsp;<span>LEFT</span>-->
<input id="radio1" name="preference" ng-model="vm.customerCreate.Position" value="Left" type="checkbox" tabindex="5" data-validationtype="required" ng-disabled="vm.maindischeck" class="ng-valid ng-not-empty ng-dirty ng-touched"/>
  <label for="radio1">LEFT</label>
			              </div>
			              <div class="col-xs-4" id="second_radio_div">
			               <!-- <input id="radio2" name="preference" type="checkbox" value="Right" ng-model="vm.customerCreate.Position" tabindex="6" ng-disabled="vm.maindischeck" class="ng-valid ng-not-empty ng-dirty ng-valid-parse ng-touched">
							&nbsp;<span>RIGHT</span>-->
<input id="radio2" name="preference" type="checkbox" value="Right" ng-model="vm.customerCreate.Position" tabindex="6" ng-disabled="vm.maindischeck" class="ng-valid ng-not-empty ng-dirty ng-valid-parse ng-touched"/>
  <label for="radio2">RIGHT</label>
			              </div>
			            </div>
						
             
				
						<div class="form-group col-xs-12 signp-group no-left-right-padding">
							<label>Username*</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control input-box" data-required="true" name="username" id="name" value=""  required>
							</div>
              <span id="result" style="margin-top: 0px !important;display: block;"></span>
						</div>
						<div class="col-xs-12 no-left-right-padding">
							<div class="col-sm-6 col-xs-12 no-right-padding form-group  signp-group" id="first_name_div">
								<label>First Name*</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
									<input type="text" class="form-control input-box" data-required="true" name="fname"  required>    
								</div>
							</div>
							<div class="col-sm-6 col-xs-12 no-left-padding form-group  signp-group" id="last_name_div">
								<label>Last Name*</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
								<input type="text" class="form-control input-box" data-required="true" name="lname"  required>  
								</div>
							</div>
						</div>
						<div class="form-group col-xs-12 signp-group no-left-right-padding">
								<label>Email*</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" class="form-control input-box" data-type="email" data-required="true" name="email"  required>
							</div>
						</div>
						<div class="form-group col-xs-12 signp-group no-left-right-padding">
							<label>Mobile No.*</label>
							<div class="col-lg-12 col-md-12 col-sm-12 no-left-right-padding" id="mob_div">
								
								<input id="phone" type="tel"  placeholder="" class="form-control input-box" data-type="phone"  data-required="true" name="mobile" required>
							</div>
						</div>
						<div class="form-group col-xs-12 signp-group no-left-right-padding">
							<label>Country*</label>
							<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-flag"></i></span>
							
							<select data-required="true" class="form-control nopadding input-box" name="country" required>
								<option value="">--Select Country--</option>
								<option value="Afganistan">Afghanistan</option>
								<option value="Albania">Albania</option>
								<option value="Algeria">Algeria</option>
								<option value="American Samoa">American Samoa</option>
								<option value="Andorra">Andorra</option>
								<option value="Angola">Angola</option>
								<option value="Anguilla">Anguilla</option>
								<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option>
								<option value="Aruba">Aruba</option>
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Azerbaijan">Azerbaijan</option>
								<option value="Bahamas">Bahamas</option>
								<option value="Bahrain">Bahrain</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Barbados">Barbados</option>
								<option value="Belarus">Belarus</option>
								<option value="Belgium">Belgium</option>
								<option value="Belize">Belize</option>
								<option value="Benin">Benin</option>
								<option value="Bermuda">Bermuda</option>
								<option value="Bhutan">Bhutan</option>
								<option value="Bolivia">Bolivia</option>
								<option value="Bonaire">Bonaire</option>
								<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
								<option value="Botswana">Botswana</option>
								<option value="Brazil">Brazil</option>
								<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
								<option value="Brunei">Brunei</option>
								<option value="Bulgaria">Bulgaria</option>
								<option value="Burkina Faso">Burkina Faso</option>
								<option value="Burundi">Burundi</option>
								<option value="Cambodia">Cambodia</option>
								<option value="Cameroon">Cameroon</option>
								<option value="Canada">Canada</option>
								<option value="Canary Islands">Canary Islands</option>
								<option value="Cape Verde">Cape Verde</option>
								<option value="Cayman Islands">Cayman Islands</option>
								<option value="Central African Republic">Central African Republic</option>
								<option value="Chad">Chad</option>
								<option value="Channel Islands">Channel Islands</option>
								<option value="Chile">Chile</option>
								<option value="China">China</option>
								<option value="Christmas Island">Christmas Island</option>
								<option value="Cocos Island">Cocos Island</option>
								<option value="Colombia">Colombia</option>
								<option value="Comoros">Comoros</option>
								<option value="Congo">Congo</option>
								<option value="Cook Islands">Cook Islands</option>
								<option value="Costa Rica">Costa Rica</option>
								<option value="Cote DIvoire">Cote D'Ivoire</option>
								<option value="Croatia">Croatia</option>
								<option value="Cuba">Cuba</option>
								<option value="Curaco">Curacao</option>
								<option value="Cyprus">Cyprus</option>
								<option value="Czech Republic">Czech Republic</option>
								<option value="Denmark">Denmark</option>
								<option value="Djibouti">Djibouti</option>
								<option value="Dominica">Dominica</option>
								<option value="Dominican Republic">Dominican Republic</option>
								<option value="East Timor">East Timor</option>
								<option value="Ecuador">Ecuador</option>
								<option value="Egypt">Egypt</option>
								<option value="El Salvador">El Salvador</option>
								<option value="Equatorial Guinea">Equatorial Guinea</option>
								<option value="Eritrea">Eritrea</option>
								<option value="Estonia">Estonia</option>
								<option value="Ethiopia">Ethiopia</option>
								<option value="Falkland Islands">Falkland Islands</option>
								<option value="Faroe Islands">Faroe Islands</option>
								<option value="Fiji">Fiji</option>
								<option value="Finland">Finland</option>
								<option value="France">France</option>
								<option value="French Guiana">French Guiana</option>
								<option value="French Polynesia">French Polynesia</option>
								<option value="French Southern Ter">French Southern Ter</option>
								<option value="Gabon">Gabon</option>
								<option value="Gambia">Gambia</option>
								<option value="Georgia">Georgia</option>
								<option value="Germany">Germany</option>
								<option value="Ghana">Ghana</option>
								<option value="Gibraltar">Gibraltar</option>
								<option value="Great Britain">Great Britain</option>
								<option value="Greece">Greece</option>
								<option value="Greenland">Greenland</option>
								<option value="Grenada">Grenada</option>
								<option value="Guadeloupe">Guadeloupe</option>
								<option value="Guam">Guam</option>
								<option value="Guatemala">Guatemala</option>
								<option value="Guinea">Guinea</option>
								<option value="Guyana">Guyana</option>
								<option value="Haiti">Haiti</option>
								<option value="Hawaii">Hawaii</option>
								<option value="Honduras">Honduras</option>
								<option value="Hong Kong">Hong Kong</option>
								<option value="Hungary">Hungary</option>
								<option value="Iceland">Iceland</option>
								<option value="India">India</option>
								<option value="Indonesia">Indonesia</option>
								<option value="Iran">Iran</option>
								<option value="Iraq">Iraq</option>
								<option value="Ireland">Ireland</option>
								<option value="Isle of Man">Isle of Man</option>
								<option value="Israel">Israel</option>
								<option value="Italy">Italy</option>
								<option value="Jamaica">Jamaica</option>
								<option value="Japan">Japan</option>
								<option value="Jordan">Jordan</option>
								<option value="Kazakhstan">Kazakhstan</option>
								<option value="Kenya">Kenya</option>
								<option value="Kiribati">Kiribati</option>
								<option value="Korea North">Korea North</option>
								<option value="Korea Sout">Korea South</option>
								<option value="Kuwait">Kuwait</option>
								<option value="Kyrgyzstan">Kyrgyzstan</option>
								<option value="Laos">Laos</option>
								<option value="Latvia">Latvia</option>
								<option value="Lebanon">Lebanon</option>
								<option value="Lesotho">Lesotho</option>
								<option value="Liberia">Liberia</option>
								<option value="Libya">Libya</option>
								<option value="Liechtenstein">Liechtenstein</option>
								<option value="Lithuania">Lithuania</option>
								<option value="Luxembourg">Luxembourg</option>
								<option value="Macau">Macau</option>
								<option value="Macedonia">Macedonia</option>
								<option value="Madagascar">Madagascar</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Malawi">Malawi</option>
								<option value="Maldives">Maldives</option>
								<option value="Mali">Mali</option>
								<option value="Malta">Malta</option>
								<option value="Marshall Islands">Marshall Islands</option>
								<option value="Martinique">Martinique</option>
								<option value="Mauritania">Mauritania</option>
								<option value="Mauritius">Mauritius</option>
								<option value="Mayotte">Mayotte</option>
								<option value="Mexico">Mexico</option>
								<option value="Midway Islands">Midway Islands</option>
								<option value="Moldova">Moldova</option>
								<option value="Monaco">Monaco</option>
								<option value="Mongolia">Mongolia</option>
								<option value="Montserrat">Montserrat</option>
								<option value="Morocco">Morocco</option>
								<option value="Mozambique">Mozambique</option>
								<option value="Myanmar">Myanmar</option>
								<option value="Nambia">Nambia</option>
								<option value="Nauru">Nauru</option>
								<option value="Nepal">Nepal</option>
								<option value="Netherland Antilles">Netherland Antilles</option>
								<option value="Netherlands">Netherlands (Holland, Europe)</option>
								<option value="Nevis">Nevis</option>
								<option value="New Caledonia">New Caledonia</option>
								<option value="New Zealand">New Zealand</option>
								<option value="Nicaragua">Nicaragua</option>
								<option value="Niger">Niger</option>
								<option value="Nigeria">Nigeria</option>
								<option value="Niue">Niue</option>
								<option value="Norfolk Island">Norfolk Island</option>
								<option value="Norway">Norway</option>
								<option value="Oman">Oman</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Palau Island">Palau Island</option>
								<option value="Palestine">Palestine</option>
								<option value="Panama">Panama</option>
								<option value="Papua New Guinea">Papua New Guinea</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Peru">Peru</option>
								<option value="Phillipines">Philippines</option>
								<option value="Pitcairn Island">Pitcairn Island</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option>
								<option value="Puerto Rico">Puerto Rico</option>
								<option value="Qatar">Qatar</option>
								<option value="Republic of Montenegro">Republic of Montenegro</option>
								<option value="Republic of Serbia">Republic of Serbia</option>
								<option value="Reunion">Reunion</option>
								<option value="Romania">Romania</option>
								<option value="Russia">Russia</option>
								<option value="Rwanda">Rwanda</option>
								<option value="St Barthelemy">St Barthelemy</option>
								<option value="St Eustatius">St Eustatius</option>
								<option value="St Helena">St Helena</option>
								<option value="St Kitts-Nevis">St Kitts-Nevis</option>
								<option value="St Lucia">St Lucia</option>
								<option value="St Maarten">St Maarten</option>
								<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
								<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
								<option value="Saipan">Saipan</option>
								<option value="Samoa">Samoa</option>
								<option value="Samoa American">Samoa American</option>
								<option value="San Marino">San Marino</option>
								<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Senegal">Senegal</option>
								<option value="Serbia">Serbia</option>
								<option value="Seychelles">Seychelles</option>
								<option value="Sierra Leone">Sierra Leone</option>
								<option value="Singapore">Singapore</option>
								<option value="Slovakia">Slovakia</option>
								<option value="Slovenia">Slovenia</option>
								<option value="Solomon Islands">Solomon Islands</option>
								<option value="Somalia">Somalia</option>
								<option value="South Africa">South Africa</option>
								<option value="Spain">Spain</option>
								<option value="Sri Lanka">Sri Lanka</option>
								<option value="Sudan">Sudan</option>
								<option value="Suriname">Suriname</option>
								<option value="Swaziland">Swaziland</option>
								<option value="Sweden">Sweden</option>
								<option value="Switzerland">Switzerland</option>
								<option value="Syria">Syria</option>
								<option value="Tahiti">Tahiti</option>
								<option value="Taiwan">Taiwan</option>
								<option value="Tajikistan">Tajikistan</option>
								<option value="Tanzania">Tanzania</option>
								<option value="Thailand">Thailand</option>
								<option value="Togo">Togo</option>
								<option value="Tokelau">Tokelau</option>
								<option value="Tonga">Tonga</option>
								<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
								<option value="Tunisia">Tunisia</option>
								<option value="Turkey">Turkey</option>
								<option value="Turkmenistan">Turkmenistan</option>
								<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
								<option value="Tuvalu">Tuvalu</option>
								<option value="Uganda">Uganda</option>
								<option value="Ukraine">Ukraine</option>
								<option value="United Arab Erimates">United Arab Emirates</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="United States of America">United States of America</option>
								<option value="Uraguay">Uruguay</option>
								<option value="Uzbekistan">Uzbekistan</option>
								<option value="Vanuatu">Vanuatu</option>
								<option value="Vatican City State">Vatican City State</option>
								<option value="Venezuela">Venezuela</option>
								<option value="Vietnam">Vietnam</option>
								<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
								<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
								<option value="Wake Island">Wake Island</option>
								<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
								<option value="Yemen">Yemen</option>
								<option value="Zaire">Zaire</option>
								<option value="Zambia">Zambia</option>
								<option value="Zimbabwe">Zimbabwe</option>
							</select>
							</div>
						</div>
						</div>
						<?php 
							if(isset($_GET["aff"])){
							$aff=mysqli_real_escape_string($con,$_GET["aff"]);
							$_SESSION['aff'] = $aff;
							}		
						?>
						
						
						<!--<div class="form-group col-xs-12 signp-group no-left-right-padding">
							<label>Address (Optional)</label>
							 <div class="input-group">
								<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
								<input type="text" class="form-control input-box" data-required="true" name="bit" value="" (Optional)">
							</div>                      
						</div>-->
						<div class="form-group col-xs-12 signp-group no-left-right-padding">
							<label>Password*</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control input-box" data-required="true" id="pwd"  name="password" required> 
<span class="input-group-addon" id="eye_sym"><i class="fa fa-eye"></i></span>
							</div>
						</div>
						<div class="form-group col-xs-12 signp-group no-left-right-padding">
							<label>Confirm Password*</label>
							 <div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control input-box" data-equalto="#pwd" data-required="true" name="password2"  required>     
							</div>
						</div>   
					
					<div class="col-xs-12 signp-group no-left-right-padding" id="terms_n_cond_in_reg">
						
					<div class="col-xs-12 no-left-right-padding" >

				
                                               <input id="box1" type="checkbox"  data-required="true" required/>
                                               <label for="box1"><span>I agree to the <a href="terms-condition.php" class="text-info">Terms of Service</a></span></label>
							
					</div>
					</div>
					<div class="col-xs-12 no-left-right-padding lter">
							<button type="submit" class="btn btn-s-xs" id="signup_btn">Register</button>
						</div>
						<div class="col-xs-12" >
							<p class="text-muted text-center">
								<small>Already have an account? 
									<a href="login.php" id="sign_up_text">Sign in</a>
								</small>
							</p>
							<p class="text-muted text-center">
								<small>Forgot Password?
								<a href="forgotpassword.php" id="forget_pass_text">Click Here</a>
								</small>
							</p>
						</div>
						</div>
						
					</form>
				</div>
			
			</div>
		</div>
	</div>	
	<script>
$('#phone').keyup(function(){
//alert();

//var str = "Hello world!";



var phone=$('#phone').val();
//alert(phone);
var res = phone.substring(0, 3);
//alert(res)
var length=phone.length;
//alert(length);
if(res=='+91')
{
//alert('india');
$('#phone').attr('maxlength','13');
}
else{

$('#phone').removeAttr('maxlength');

}
});

$('#radio1').click(function(){
//alert();
if($('#radio1').is(':checked'))
{
//alert();
$('#radio2').prop('checked' , false);
}
});


$('#radio2').click(function(){
//alert();
if($('#radio2').is(':checked'))
{
//alert();
$('#radio1').prop('checked' , false);
}
});


$('#eye_sym').click(function(){
//alert();
var attr=$(this).prev().attr('type');
//alert(attr);
if(attr=='password')
{
$('#pwd').attr('type','text');

$('#eye_sym').children('i').removeClass('fa-lock');
$('#eye_sym').children('i').addClass('fa-eye-slash');
}
if(attr=='text')
{
$('#pwd').attr('type','password');
$('#eye_sym').children('i').removeClass('fa-eye-slash');
$('#eye_sym').children('i').addClass('fa-lock');
}
});



</script>



<?php require('footer.php'); ?>
		
		
	
	
	





  <script src="build/js/intlTelInput.js"></script>
  <script>
    $("#phone").intlTelInput({
       allowDropdown: true,
      autoHideDialCode: true,
      autoPlaceholder: "",
       dropdownContainer: "body",
       //excludeCountries: ["us"],
       formatOnDisplay: false,
      geoIpLookup: function(callback) {
         $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
           var countryCode = (resp && resp.country) ? resp.country : "";
          callback(countryCode);
         });
      },
       hiddenInput: "full_number",
       initialCountry: "",
       nationalMode: false,
       //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
       placeholderNumberType: "",
       preferredCountries: ['in', 'jp'],
       separateDialCode: false,
      utilsScript: "build/js/utils.js"
    });
  </script>
<!-- mfn_hook_bottom --><!-- mfn_hook_bottom -->	
<!-- wp_footer() -->
<!--Start of Tawk.to Script (0.3.2)-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{};

					Tawk_API.visitor = {
					    name  : " ",
					    email : ""
					};
				var Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/598adc4a1b1bed47ceb03bb1/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script (0.3.2)--><script type='text/javascript' src='wp-includess/js/jquery/ui/core.mine899.js?ver=1.11.4'></script>
<script type='text/javascript' src='wp-includess/js/jquery/ui/widget.mine899.js?ver=1.11.4'></script>
<script type='text/javascript' src='wp-includess/js/jquery/ui/mouse.mine899.js?ver=1.11.4'></script>
<script type='text/javascript' src='wp-includess/js/jquery/ui/sortable.mine899.js?ver=1.11.4'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wpcf7 = {"apiSettings":{"root":"https:\/\/bit-miner.io\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"},"recaptcha":{"messages":{"empty":"Please verify that you are not a robot."}}};
/* ]]> */
</script>