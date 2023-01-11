<?php
//wordt gebruikt voor ranking view
include "Database.php";

$db = new Database();

// if (isset($_POST['message']) && $_POST['message'] == "getAllProducts") {
    if ($db->dbConnect()) {
        $result = $db->getAllProducts("product");
        if ($result != false) {
            echo json_encode($result);
        } else echo "Helaas is de combinatie onjuist";
    } else echo "Geen connectie met database...";
// } else echo "Toegang geweigerd";

