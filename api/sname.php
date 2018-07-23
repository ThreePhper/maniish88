<?php
include_once '../db/connection_pdo.php';
if ($_POST) {
    $referral = strip_tags($_POST['referral']);

    $stmt = $con->prepare("SELECT email,fname,lname FROM affiliateuser WHERE BINARY user_id=:referral");
    $stmt->execute(array(':referral' => $referral));
    $count = $stmt->rowCount();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $email = $user['email'];
    $fname = $user['fname'];
    $lname = $user['lname'];

    if ($count > 0) {
        echo "<span style='color:green;'>" . $fname . ' ' . $lname . " (" . $email . ")</span>";
    } else {
        echo "<span style='color:brown;'>Sponsor ID does not exist</span>";
    }
}
?>