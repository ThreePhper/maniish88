<?php
include_once 'db/connection_pdo.php';
if ($_POST) {
    $email = strip_tags($_POST['email']);

    $stmt = $con->prepare("SELECT email,fname,lname FROM affiliateuser WHERE email=:email");
    $stmt->execute(array(':email' => $email));
    $count = $stmt->rowCount();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($count) {
        echo ("<span style='color:red;'>The Email ID has already registered! Please use another!</span>");
    } else {
        echo ("");
    }
}
?>