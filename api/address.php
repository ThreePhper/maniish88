<?php
include_once '../db/connection_pdo.php';
if ($_POST) {
    if (isset($_POST['type'])) {
        $type = $_POST['type'];
        $id = strip_tags($_POST['id']);
        $table = $col = '';
        if ($type == 'get_state') {
            $table = 'state';
            $col = 'country_id';
        } elseif ($type == 'get_city') {
            $table = 'city';
            $col = 'state_id';
        }

        $stmt = $con->prepare("SELECT * FROM $table WHERE $col=:id");
        $stmt->execute(array(':id' => $id));
        $count = $stmt->rowCount();
        $states = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($count) {
            echo json_encode($states);
        } else {
            echo null;
        }
    }
}