<?php
require "Database.php";
$db = new Database();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $username = "dd";
    // $password = "dd";
    if ($db->dbConnect()) {
        $result = $db->Login("gebruiker", $username, $password);
        if ($result != false) {
            echo json_encode($result);
        } else echo "Helaas is de combinatie onjuist";
    } else echo "Geen connectie met database...";
} else echo "Vul alles in aub";
