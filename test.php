<?php
require "Database.php";
$db = new Database();

    if($db->dbConnect()) {
        if($db->showUsers()) {
            echo "Welkom!";
        }else echo "Geen idee wat fout is gegaan";
    }else echo "Geen connectie met database...";
