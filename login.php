<?php
require "Database.php";
$db = new Database();

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
// $username = "a";
// $password = "a";
    if($db->dbConnect()) {
        if($db->Login("gebruiker",$username, $password)) {
            echo "Welkom!";
        }else echo "Helaas is de combinatie onjuist";
    }else echo "Geen connectie met database...";
} else echo "Vul alles in aub";