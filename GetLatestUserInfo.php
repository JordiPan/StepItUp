<?php
include "Database.php";

$db = new Database();

if (isset($_POST['user_ID'])) {
    $userId = $_POST['user_ID'];
    // $userId = 1;
    // $password = "dd";
    if ($db->dbConnect()) {
        $result = $db->getUserInfo("gebruiker", $userId);
        if ($result != false) {
            echo json_encode($result);
        } else echo "Helaas is de combinatie onjuist";
    } else echo "Geen connectie met database...";
} else echo "Geen gebruiker??";
