<?php
$con = new mysqli("cloudhashing.uk", "dashboarddbuser", "zEA=j?j%,^gQ", "dash_board");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>