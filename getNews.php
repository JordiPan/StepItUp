<?php
require "Database.php";
$db = new Database();

    if($db->dbConnect()) {
        if($db->getNews("nieuws")) {
            echo json_encode($result);
        }else echo "Geen idee wat fout is gegaan";
    }else echo "Geen connectie met database...";
