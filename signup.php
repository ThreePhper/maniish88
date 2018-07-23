<?php
if (!isset($_SESSION)) {
    session_start();
}
require('header.php');
include_once("db/connection_mysqli.php");
?>
<link rel="stylesheet" href="css_live/intlTelInput.min.css" type="text/css">
<?php
//session_start();

$sql = "SELECT maintain FROM  settings WHERE sno=0";
if ($result = mysqli_query($con, $sql)) {
    $main = null;
    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        $main = $row[0];
    }
    if ($main == 2 || $main == 3) {
        print "
				<script language='javascript'>
					window.location = 'maintain.php';
				</script>
			";
    }

}

//Get countries list TODO: Caching
$sql = "SELECT * FROM  `country`";
if ($result = mysqli_query($con, $sql)) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $countries[] = $row;
    }

    $countriesHtml = '<option value="">--Select Country--</option>';
    foreach ($countries as $country) {
        $countriesHtml .= '<option country-id="' . $country['id'] . '" value="' . $country['name'] . '">' . $country['name'] . '</option>';
    }
}

/**
 * Generate unique
 * @return string
 */
function generateUserId($con)
{
    $random = rand(1, 99999);
    $userId = 'CH' . str_pad($random, 5, '0');

    $rr = mysqli_query($con, "SELECT COUNT(*) FROM affiliateuser WHERE `user_id` = '$userId'");
    $r = mysqli_fetch_row($rr);
    $nr = $r[0];
    if ($nr >= 1) {
        generateUserId($con);
    } else {
        return $userId;
    }

}

$_SERVER['REQUEST_METHOD'] == 'GET';

$aff = isset($_GET['aff']) ? $_GET['aff'] : null;
$affs = isset($_GET['aff']) ? $_GET['aff'] : null;


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['todo'])) {
    // Collect the data from post method of form submission //
    $todo = mysqli_real_escape_string($con, $_POST['todo']);
    $name = mysqli_real_escape_string($con, $_POST['fname']);
    //$name = mysqli_real_escape_string($con,$_GET['aff']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $password2 = mysqli_real_escape_string($con, $_POST['password2']);

    $email = mysqli_real_escape_string($con, $_POST['email']);

    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $ref = mysqli_real_escape_string($con, $_POST['referral']);
    $address = isset($_POST['address']) ? mysqli_real_escape_string($con, $_POST['address']) : '';
    $city = isset($_POST['city']) ? mysqli_real_escape_string($con, $_POST['city']) : '';
    $state = isset($_POST['state']) ? mysqli_real_escape_string($con, $_POST['state']) : '';
    $zipcode = isset($_POST['zipcode']) ? mysqli_real_escape_string($con, $_POST['zipcode']) : '';
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $preference = isset($_POST['preference']) ? mysqli_real_escape_string($con, $_POST['preference']) : '';
    $bitcoin = isset($_POST['bit']) ? mysqli_real_escape_string($con, $_POST['bit']) : '';

    $status = "OK";
    $msg = "";
    //validation starts
    // if email is less than 6 char then status is not ok
    if (!isset($email) or strlen($email) < 5) {
        $msg = $msg . "Email Should Contain Minimum 5 CHARACTERS.<BR>";
        $status = "NOTOK";

    }


    $rr = mysqli_query($con, "SELECT COUNT(*) FROM affiliateuser WHERE `email` = '$email'");
    $r = mysqli_fetch_row($rr);
    $nr = $r[0];
    if ($nr == 1) {
        $msg = $msg . "Email ID Already Exists. Please Try Another One.<BR>";
        $status = "NOTOK";
    }


    if ($preference == "") {
        $msg = $msg . "Please Select The Preference.<BR>";
        $status = "NOTOK";
    }


    if (strlen($password) < 5) {
        $msg = $msg . "Password Must Be More Than 8 Char Length.<BR>";
        $status = "NOTOK";
    }

    if (strlen($address) < 1) {
        $msg = $msg . "Not Available<BR>";
    }

    //TODO: Fix this bug.
    $result = mysqli_query($con, "SELECT count(*) FROM  affiliateuser where `user_id` = '$ref'");
    $row = mysqli_fetch_row($result);
    $numrows = $row[0];
    if ($numrows == 0) {
        $msg = $msg . "Sponsor/Referral ID Not Available<BR>";
        $status = "NOTOK";
    }

    if (strlen($mobile) > 15) {
        $msg = $msg . "Please Enter Correct Mobile Number<BR>";
    }

    if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
        $msg = $msg . "Email Id Not Valid, Please Enter The Correct Email Id .<BR>";
        $status = "NOTOK";
    }

    if ($password <> $password2) {
        $msg = $msg . "Both Passwords Are Not Matching.<BR>";
        $status = "NOTOK";
    }


    if ($country == "") {
        $msg = $msg . "Please Enter Your Country Name.<BR>";
        $status = "NOTOK";
    }

    //Test if it is a shared client
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
        //Is it a proxy address
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    //The value of $ip at this point would look something like: "192.0.34.166"
    $ip = ip2long($ip);
    //The $ip would now look something like: 1073732954

    $sqlquery = "SELECT wlink FROM settings where sno=0"; //fetching website from databse
    $rec2 = mysqli_query($con, $sqlquery);
    $row2 = mysqli_fetch_row($rec2);
    $wlink = $row2[0]; //assigning website address

    $sqlquery111 = "SELECT etext FROM emailtext where code='SIGNUP'"; //fetching website from databse
    $rec2111 = mysqli_query($con, $sqlquery111);
    if ($rec2111) {
        $row2111 = mysqli_fetch_row($rec2111);
    }
    $emailtext = isset($row2111[0]) ? $row2111[0] : ''; //assigning email text for email

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

    $noofdays = 155; //assigning website address
    $cur = date("Y-m-d");
    $expiry = date('Y-m-d', strtotime($cur . '+ ' . $noofdays . 'days'));

    $sbonus = 0;
    $active = 1;
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    //echo $lname;
    $bitcoin = isset($_POST['bit']) ? mysqli_real_escape_string($con, $_POST['bit']) : '';
    //echo $bitcoin;
    $preference = isset($_POST['preference']) ? mysqli_real_escape_string($con, $_POST['preference']) : '';
    //echo $preference;
    $get_date = mysqli_query($con, "SELECT left_date,right_date FROM affiliateuser WHERE `user_id` = '" . $ref . "'");
    $rowd = mysqli_fetch_array($get_date);
    $left = $rowd['left_date'];
    $right = $rowd['right_date'];

    if ($preference == "Left") {

        if ($left == '0000-00-00') {
            $up_left = mysqli_query($con, "UPDATE affiliateuser SET left_date = NOW() WHERE `user_id` = '" . $ref . "'");
        }

    }

    if ($preference == "Right") {

        if ($right == '0000-00-00') {
            $up_right = mysqli_query($con, "UPDATE affiliateuser SET right_date = NOW() WHERE `user_id` = '" . $ref . "'");
        }
    }

    if ($status == "OK") {
        $scode = rand(1111111111, 9999999999); //generating random code, this will act as signup key
        $userId = generateUserId($con);
        $result = mysqli_query($con, "insert into affiliateuser(password,fname,lname,address,email,referedby,preference,bitcoin,ipaddress,mobile,doj,city,state,country,signupcode,tamount,expiry,active,user_id,zipcode) values('$password','$name','$lname','$address','$email','$ref','$preference','$bitcoin','$ip','$mobile','$cur','$city','$state','$country','$scode','$sbonus','$expiry','$active','$userId','$zipcode')");

        $query = mysqli_query($con, "SELECT * FROM affiliateuser WHERE `email` = '$email'");
        $currentUser = mysqli_fetch_assoc($query);

        $_SESSION['paypalidsession'] = $currentUser['user_id'];
        // More headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <no-reply@bit-miner.io>' . "\r\n";
        $to = $email;
        $subject = "Thank You For Creating An Account";
        $message = '
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
                                  <p style="margin:0px;">Dear <span style="font-weight:600">' . $name . ' ' . $lname . ',</span></p>
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
                                   Account ID: CH' . str_pad($currentUser['id'], 10, '0') . '
                                    <br>
                                   Registered Email: ' . $email . '
                  <br>
                                   Your Password: ' . $password . '
                  <br>
                  </p>
                  <p style="color:#222222;">
                  Please use your user ID and password to login your account. Feel free to contact our customer support to get resolution of any issues related to bit-miner.
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
        mail($to, $subject, $message, $headers);
        $errormsg = "<div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Your account has been successfully registered.
                    </br></strong></div>";

    } else {
        $errormsg = "<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>" . $msg . "</div>"; //printing error if found in validation

    }

}
?>


<div class="container-fluid no-left-right-padding" id="login_backgroud">
    <div class="signup-page" style="">
        <div class="login">
            <div class="form-signup well col-xs-12" style="">
                <p style="" id="signup_header">Sign Up</p>
                <div id="messages">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($status !== "")) {
                        print $errormsg;
                    }
                    ?>
                </div>
                <form id="reg-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>"
                      method="post" data-validate="parsley">
                    <input type="hidden" name="todo" value="post">
                    <div class="">
                        <div class="form-group col-xs-12 signp-group no-left-right-padding">
                            <label>Sponsor ID*</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" id="referral" class="form-control input-box" data-required="true"
                                       name="referral" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                    echo $aff;
                                } ?>" <?php if (!empty($affs)) {
                                    echo "readonly";
                                } ?> >
                            </div>
                            <span id="results" style="margin-top: 0px !important;display: block;"></span>
                        </div>
                        <div class="form-group col-xs-12 signp-group no-left-right-padding" id="left_right_pos">
                            <div class="col-xs-4" id="first_radio_div">
                                <input id="radio1" name="preference" ng-model="vm.customerCreate.Position" value="Left"
                                       type="checkbox" tabindex="5" data-validationtype="required"
                                       ng-disabled="vm.maindischeck" class="ng-valid ng-not-empty ng-dirty ng-touched"/>
                                <label for="radio1">LEFT</label>
                            </div>
                            <div class="col-xs-4" id="second_radio_div">
                                <input id="radio2" name="preference" type="checkbox" value="Right"
                                       ng-model="vm.customerCreate.Position" tabindex="6" ng-disabled="vm.maindischeck"
                                       class="ng-valid ng-not-empty ng-dirty ng-valid-parse ng-touched"/>
                                <label for="radio2">RIGHT</label>
                            </div>
                        </div>
                        <div class="col-xs-12 no-left-right-padding">
                            <div class="col-sm-6 col-xs-12 no-right-padding form-group  signp-group"
                                 id="first_name_div">
                                <label>First Name*</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                    <input type="text" class="form-control input-box" data-required="true" name="fname"
                                           required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12 no-left-padding form-group  signp-group" id="last_name_div">
                                <label>Last Name*</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                    <input type="text" class="form-control input-box" data-required="true" name="lname"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 signp-group no-left-right-padding">
                            <label>Email ID*</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control input-box" data-type="email"
                                       data-required="true" name="email" required>
                            </div>
                            <span id="email-error" style="margin-top: 0px !important;display: block;"></span>
                        </div>
                        <div class="form-group col-xs-12 signp-group no-left-right-padding">
                            <label>Mobile No.*</label>
                            <div class="col-lg-12 col-md-12 col-sm-12 no-left-right-padding" id="mob_div">

                                <input id="phone" type="tel" placeholder="" class="form-control input-box"
                                       data-type="phone" data-required="true" name="mobile" required>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 signp-group no-left-right-padding">
                            <label>Country*</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-flag"></i></span>

                                <select data-required="true" class="form-control nopadding input-box" name="country"
                                        required>
                                    <?= $countriesHtml ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-12 signp-group no-left-right-padding">
                            <label>Province/State*</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-industry"></i></span>

                                <select data-required="true" disabled="disabled" class="form-control nopadding input-box" name="state"
                                        required>
                                    <option value="">--Select State--</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-8 signp-group">
                                <label>City*</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-square"></i></span>

                                    <select data-required="true" disabled="disabled" class="form-control nopadding input-box" name="city"
                                            required>
                                        <option value="">--Select City--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-xs-4 signp-group no-right-padding">
                                <label>PIN Code*</label>
                                <div class="input-group">
<!--                                    <span class="input-group-addon"><i class="fa fa-flag"></i></span>-->
                                    <input data-required="true" class="form-control input-box" name="zipcode"
                                            required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET["aff"])) {
                        $aff = mysqli_real_escape_string($con, $_GET["aff"]);
                        $_SESSION['aff'] = $aff;
                    }
                    ?>
                    <div class="form-group col-xs-12 signp-group no-left-right-padding">
                        <label>Password*</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control input-box" data-required="true" id="pwd"
                                   name="password" required>
                            <span class="input-group-addon" id="eye_sym"><i class="fa fa-eye"></i></span>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 signp-group no-left-right-padding">
                        <label>Confirm Password*</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control input-box" data-equalto="#pwd"
                                   data-required="true" name="password2" required>
                        </div>
                    </div>

                    <div class="col-xs-12 signp-group no-left-right-padding" id="terms_n_cond_in_reg">
                        <div class="col-xs-12 no-left-right-padding">
                            <input id="box1" type="checkbox" data-required="true" required/>
                            <label for="box1"><span>I agree to the <a href="terms-condition.php" class="text-info">Terms of Service</a></span></label>
                        </div>
                    </div>
                    <div class="col-xs-12 no-left-right-padding lter">
                        <button type="submit" class="btn btn-s-xs" disabled="disabled" id="signup_btn">Register</button>
                    </div>
                    <div class="col-xs-12">
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
<?php require('footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        var referral = $("#referral");
        var firstname = $('input[name="fname"]');
        var lastname = $('input[name="lname"]');
        var phone = $("#phone");
        var left = $('#radio1');
        var right = $('#radio2');
        var country = $('select[name="country"]');
        var state = $('select[name="state"]');
        var city = $('select[name="city"]');
        var zipcode = $('input[name="zipcode"]');
        var email = $("input[name='email']");
        var password = $("input[name='password']");
        var confirmPassword = $("input[name='password2']");
        var term = $("#box1");

        function validateForm() {
            var referalValid = referral.parent().parent().hasClass('has-success');
            var firstnameValid = firstname.val().length > 2;
            var lastnameValid = lastname.val().length > 2;
            var phoneValid = phone.parent().parent().hasClass('has-success');
            var radioValid = left.is(':checked') || right.is(':checked');
            var countryValid = country.val() != '';
            var stateValid = state.val() != '';
            var cityValid = city.val() != '';
            var zipcodeValid = zipcode.val().length > 2;
            var emailValid = email.parent().parent().hasClass('has-success');
            var passwordValid = password.parent().parent().hasClass('has-success');
            var confirmPasswordValid = confirmPassword.parent().parent().hasClass('has-success');
            var termValid = term.is(':checked');
            
            if (referalValid && firstnameValid && lastnameValid && phoneValid && radioValid && countryValid && termValid &&
                stateValid && cityValid && zipcodeValid && emailValid && passwordValid && confirmPasswordValid) {
                $('#signup_btn').removeAttr('disabled');
            } else {
                $('#signup_btn').attr('disabled', 'disabled');
            }
        }

        function validEmail(v) {
            var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
            return pattern.test(v);
        }

        /** INPUT VALIDATION **/
        firstname.keyup(function () {
            validateForm();
        });
        lastname.keyup(function () {
            validateForm();
        });
        city.change(function () {
            validateForm();
        });
        zipcode.keyup(function () {
            validateForm();
        });
        term.click(function () {
            validateForm();
        });
        referral.keyup(function () {
            referral.parent().parent().removeClass('has-error').removeClass('has-success');
            if (referral.val().length > 3) {
                $("#results").html('checking...');
                $.ajax({
                    type: 'POST',
                    url: 'api/sname.php',
                    data: $(this).serialize(),
                    success: function (data) {
                        $("#results").html(data);
                        if (data == "<span style='color:brown;'>Sponsor ID does not exist</span>") {
                            referral.parent().parent().removeClass('has-error').removeClass('has-success').addClass('has-error');
                        } else {
                            referral.parent().parent().removeClass('has-error').removeClass('has-success').addClass('has-success');
                        }
                    }
                });
                validateForm();
                return false;
            }
            else {
                $("#results").html('');
                referral.parent().parent().removeClass('has-error').removeClass('has-success').addClass('has-error');
                validateForm();
            }
        });
        email.keyup(function () {
            email.parent().parent().removeClass('has-error').removeClass('has-success');
            $("#email-error").html(null);

            if (email.val().length > 3 && validEmail(email.val())) {
                $.ajax({
                    type: 'POST',
                    url: 'api/email.php',
                    data: $(this).serialize(),
                    success: function (data) {
                        if (data.trim() !== "") {
                            $("#email-error").html(data);
                            email.parent().parent().removeClass('has-error').removeClass('has-success').addClass('has-error');
                        } else {
                            $("#email-error").html(null);
                            email.parent().parent().removeClass('has-error').removeClass('has-success').addClass('has-success');
                        }
                    }
                });

                validateForm();
                return false;
            }
            email.parent().parent().removeClass('has-error').removeClass('has-success').addClass('has-error');
            validateForm();
        });
        phone.keyup(function () {
            var phoneNo = phone.val();
            var res = phoneNo.substring(0, 3);
            var number = phoneNo.substring(2);
            var length = phoneNo.length;

            if (number.match(/^[0-9]+$/) == null) {
                phone.val(res);
                phone.parent().parent().removeClass('has-error').removeClass('has-success').addClass('has-error');
            } else {
                phone.parent().parent().removeClass('has-error').removeClass('has-success')
                if (res == '+91') {
                    $('#phone').attr('maxlength', '13');
                    if (length != 13) {
                        phone.parent().parent().removeClass('has-error').removeClass('has-success').addClass('has-error');
                    } else {
                        phone.parent().parent().removeClass('has-error').removeClass('has-success').addClass('has-success');
                    }
                } else {
                    $('#phone').removeAttr('maxlength');
                    if (length > 3) {
                        phone.parent().parent().removeClass('has-error').removeClass('has-success').addClass('has-success');
                    } else {
                        phone.parent().parent().removeClass('has-error').removeClass('has-success').addClass('has-error');
                    }
                }
            }
            validateForm();
        });
        password.keyup(function () {
            password.parent().parent().removeClass('has-error').removeClass('has-success');
            if (password.val().length < 5) {
                password.parent().parent().removeClass('has-error').removeClass('has-success').addClass('has-error');
            } else {
                password.parent().parent().removeClass('has-error').removeClass('has-success').addClass('has-success');
            }
            validateForm();
        });
        confirmPassword.keyup(function () {
            confirmPassword.parent().parent().removeClass('has-error').removeClass('has-success');
            if (confirmPassword.val().length >= 5 && confirmPassword.val() == password.val()) {
                confirmPassword.parent().parent().removeClass('has-error').removeClass('has-success').addClass('has-success');
            } else {
                confirmPassword.parent().parent().removeClass('has-error').removeClass('has-success').addClass('has-error');
            }
            validateForm();
        });

        $('#radio1').click(function () {
            if ($('#radio1').is(':checked')) {
                $('#radio2').prop('checked', false);
            }
            validateForm();
        });


        $('#radio2').click(function () {
            if ($('#radio2').is(':checked')) {
                $('#radio1').prop('checked', false);
            }
            validateForm();
        });

        /** State, city autofill **/
        country.change(function (e, v) {
            var countryId = $('option:selected', this).attr('country-id');
            state.attr('disabled', 'disabled').children('option:not(:first)').remove();
            city.attr('disabled', 'disabled').children('option:not(:first)').remove();
            $.ajax({
                type: 'POST',
                url: 'api/address.php',
                data: {id: countryId, type: 'get_state'},
                success: function (data) {
                    data = JSON.parse(data);
                    $.each(data, function (k, v) {
                        state.append($("<option></option>")
                            .attr("value", v.name)
                            .attr("state-id", v.id)
                            .text(v.name));
                    });
                    state.removeAttr('disabled');

                    validateForm();
                }
            });
            validateForm();
            return false;
        });
        state.change(function (e, v) {
            var stateId = $('option:selected', this).attr('state-id');
            city.attr('disabled', 'disabled').children('option:not(:first)').remove();
            $.ajax({
                type: 'POST',
                url: 'api/address.php',
                data: {id: stateId, type: 'get_city'},
                success: function (data) {
                    data = JSON.parse(data);
                    $.each(data, function (k, v) {
                        city.append($("<option></option>")
                            .attr("value", v.name)
                            .text(v.name));
                    });
                    city.removeAttr('disabled');

                    validateForm();
                }
            });
            validateForm();
            return false;
        });
    });
</script>
<script type="text/javascript" src="js_live/intlTelInput.min.js"></script>
<script>
    $(function () {
        $("#phone").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "",
            dropdownContainer: "body",
            formatOnDisplay: false,
            hiddenInput: "full_number",
            initialCountry: "in",
            nationalMode: false,
            placeholderNumberType: "",
            preferredCountries: ['in', 'jp'],
            separateDialCode: false,
            utilsScript: "build/js/utils.js"
        });


        $('#eye_sym').click(function () {
            var attr = $(this).prev().attr('type');
            if (attr == 'password') {
                $('#pwd').attr('type', 'text');

                $('#eye_sym').children('i').removeClass('fa-lock');
                $('#eye_sym').children('i').addClass('fa-eye-slash');
            }
            if (attr == 'text') {
                $('#pwd').attr('type', 'password');
                $('#eye_sym').children('i').removeClass('fa-eye-slash');
                $('#eye_sym').children('i').addClass('fa-lock');
            }
        });
    });
</script>
<!--Start of Tawk.to Script (0.3.2)-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {};

    Tawk_API.visitor = {
        name: " ",
        email: ""
    };
    var Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/598adc4a1b1bed47ceb03bb1/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script (0.3.2)-->
</script>