<?php
//wordt gebruikt voor ranking view
include "Database.php";

$db = new Database();

if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];
    if ($db->dbConnect()) {
        $result = $db->getPurchases($userId);
        if ($result != false) {
            echo json_encode($result);
        } else echo "nothing found";
    } else echo "Geen connectie met database...";
} else echo "Toegang geweigerd";

