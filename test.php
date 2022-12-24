<?php
require "Database.php";
$db = new Database();

    if($db->dbConnect()) {
        if($db->logIn("gebruiker",$username, $password)) {
            echo "Welkom!";
        }else echo "Helaas is de combinatie onjuist";
    }else echo "Geen connectie met database...";
