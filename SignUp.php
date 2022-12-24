<?php
require "Database.php";
$db = new Database();

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repeatPassword']) && isset($_POST['email'])){
   $username = $_POST['username'];
    $password = $_POST['password'];
    $repeat = $_POST['repeatPassword'];
    $email = $_POST['email'];
// $username = 'username';
//     $password = 'password';
//     $repeat = 'password';
//     $email = 'fluks@gmail.com';
    if ($password == $repeat){
        if($db->dbConnect()) {
            if($db->signUp("gebruiker",$username, $email, $password)) {
                echo "Success!";
            }else echo "gebruikersnaam wordt al gebruikt"; //kan ook DB fout zijn (niet waarschijnlijk)
        }else echo "Geen connectie met database...";
    } else echo "wachtwoord is niet hetzelfde!";
} else echo "Vul alles in aub";