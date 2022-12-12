<?php
require "Database.php";
$db = new Database();

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repeatPassword'])){
   $username = $_POST['username'];
    $password = $_POST['password'];
    $repeat = $_POST['repeatPassword'];
    if ($password == $repeat){
        if($db->dbConnect()) {
            if($db->signUp("gebruiker",$username, $password)) {
                echo "Success!";
            }else echo "gebruikersnaam wordt al gebruikt"; //kan ook DB fout zijn (niet waarschijnlijk)
        }else echo "Geen connectie met database...";
    } else echo "wachtwoord is niet hetzelfde!";
} else echo "Vul alles in aub";