<?php
require "Database.php";
$db = new Database();

if (isset($_POST['userId']) && isset($_POST['cartArrayString']) && isset($_POST['newPointBalance'])) {
    $userId = $_POST['userId'];

    $cartArrayString = $_POST['cartArrayString'];
    $cartArray = json_decode($cartArrayString, true);

    $newPointBalance = $_POST['newPointBalance'];

    if ($db->dbConnect()) {
        if ($db->checkout($userId, $cartArray, $newPointBalance)) {
            echo "Success!";
        } else echo "Er is iets mis gegaan"; //kan ook DB fout zijn (niet waarschijnlijk)
    } else echo "Geen connectie met database...";
} else echo "Er is iets mis gegaan";
