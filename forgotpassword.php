<?php
require_once 'header.php';
include_once("db/connection_mysqli.php");

$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['femail'])) {
    $email = mysqli_real_escape_string($con, $_POST['femail']);
    $status = 1;
    if ($status == 1) {

        $status = "OK";
        //checking constraints
        if (strlen($email) < 1) {
            $msg = $msg . "Please enter your Account ID.<BR>";
            $status = "NOTOK";
        }

        if (strlen($email) != 7) {
            $msg = $msg . "Account ID is not valid .<BR>";
            $status = "NOTOK";
        }


        $result = mysqli_query($con, "SELECT count(*) FROM  affiliateuser where `user_id` = '$email'");
        $row = mysqli_fetch_row($result);
        $numrows = $row[0];

        if (($numrows) == 0) {
            $msg = $msg . "Your account not found or your account is inactive. Please contact your administrator.<BR>";
            $status = "NOTOK";
        }

        $sqlquery = "SELECT wlink FROM settings where sno=0"; //fetching website from databse
        $rec2 = mysqli_query($con, $sqlquery);
        $row2 = mysqli_fetch_row($rec2);
        $wlink = $row2[0]; //assigning website address
    }

    $get_pass = mysqli_query($con, "SELECT * FROM affiliateuser WHERE `user_id` = '" . $email . "'");
    $get_pass = mysqli_fetch_assoc($get_pass);
    $pass = $get_pass['password'];
    $userId = $get_pass['user_id'];
    $fname = $get_pass['fname'];
    $lname = $get_pass['lname'];
    echo $gmail = $get_pass['email'];

    if ($status == "OK") {

        $to = $gmail;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <no-reply@bit-miner.io>' . "\r\n";
        $subject = "Password Request";
        $message .= '<style type="text/css">
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
</table>
</td>
    </tr>
  </tbody>
</table>
        </div>
        
        <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                          <tr>
                            <td align="left">
                              <div class="contentEditableContainer contentTextEditable">
                                <div class="contentEditable" align="left">
                                  <p>Dear <span style="font-weight:600">' . $fname . ' ' . $lname . ',</span></p>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td align="left">
                              <div class="contentEditableContainer contentTextEditable">
                                <div class="contentEditable" align="left">
                                  <p style="color:#222222; margin:0px">
                                    We have processed your request for password retrieval. Your account details are mentioned below: 
                  </p>
                  <p  style="color:#222222;font-weight:bold;">
                                   Account ID: ' . $userId . '
                                    <br>
                                   Your Password: ' . $pass . '
                  <br>
                  </p>
                  <a href="https://bit-miner.io/login.php">Login</a>
                  <p style="color:#222222;">
                 Kindly reset the password after you login to your account. 
                 <br>
                 <br>
                 Please keep them safe. 
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
                                   For any further queries/assistance, kindly mail us at <a href="mailto:support@bit-miner.io" style="color:#15c" target="_blank" >support@bit-miner.io</a>

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
  <a href="http://bit-miner.io" target="_blank" style="font-weight:bold;">bit-miner.io</a></  p>

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
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>Your password has been sent to your registered mail id. Please check your junk or spam folder if you do not find in your inbox.</div>";
    } else {
        $errormsg = "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Account ID is not valid.</div>";
    }
//updating status if validation passes

} else {
    $errormsg = "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>$msg</div>"; //priting error if found in validation
}
?>
    <div class="container-fluid no-left-right-padding" id="login_backgroud">
        <div class="login-page signup-page" style="">
            <div class="login ">
                <div class="form-forget-passord well" style="">
                    <p style="" id="login_header">Forget Password</p>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($status !== "")) {
                        print $errormsg;
                    }
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>"
                          method="post">
                        <div class="form-group forget-pass-div">
                            <label>Email ID*</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="text" class="form-control input-box" placeholder="" name="femail" required>
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <input type="password" class="form-control input-box" name="password" placeholder="* Password" required>
                        </div>
                        <div class="checkbox i-checks">
                            <input type="checkbox" name="remember">Keep me signed in

                        </div>-->
                        <div class="login-btn-div">
                            <button type="submit" class="btn btn-success btn-s-xs" style="" id="log-btn">Submit</button>
                        </div>

                        <!--<div class="col-xs-12">
                            <p class="text-muted text-center">
                                <small>Dont have an account?
                                    <a href="signup.php" id="sign_up_text">Signup</a>
                                </small>
                            </p>
                            <p class="text-muted text-center">
                                <small>Forgot Password?
                                    <a href="forgotpassword.php" id="forget_pass_text">Click Here</a>
                                </small>
                            </p>
                        </div>-->
                    </form>


                </div>

            </div>
        </div>
    </div>

<?php
require_once 'footer.php';
?>