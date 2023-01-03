<?php
require "DatabaseConfig.php";

class Database
{
    public $connect;
    public $data;
    private $sql;
    protected $serverName;
    protected $username;
    protected $password;
    protected $databaseName;

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DatabaseConfig();
        $this->serverName = $dbc->serverName;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databaseName = $dbc->databaseName;
    }
    //database klaar maken
    function dbConnect()
    {
        $this->connect = mysqli_connect($this->serverName, $this->username, $this->password, $this->databaseName);
        return $this->connect;
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }

    function logIn($table, $username, $password)
    {
        $login = false;
        $username = $this->prepareData($username);
        $password = $this->prepareData($password);
        $this->sql = "select * from " . $table . " where gebruikersnaam = '" . $username . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $dbusername = $row["gebruikersnaam"];
            $dbpassword = $row["wachtwoord"];
            if ($dbusername == $username && password_verify($password, $dbpassword)) {
                $login = $row;
            }
        }
        return $login;
    }

    function signUp($table, $username, $email, $password)
    {
        //check of al gebruikersnaam bestaat in DB
        $this->sql = "select * from $table where gebruikersnaam = '$username' or email = '$email'";
        $result = mysqli_query($this->connect, $this->sql);
        if (mysqli_num_rows($result) >= 1) {
            return false;
        }

        $username = $this->prepareData($username);
        $email = $this->prepareData($email);
        $password = $this->prepareData($password);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $this->sql =
            "INSERT INTO " . $table . " (rol, gebruikersnaam, email, wachtwoord, stappen, punten, nieuws) VALUES 
            ('[ROLE_USER]','" . $username . "','" . $email . "','" . $password . "', 0, 0, 1)";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function showUsers()
    {
        $this->sql = "select * from gebruiker";
        $result = mysqli_query($this->connect, $this->sql);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($rows);
        return true;
    }

    function getUserInfo($table, $userId)
    {
        $result = false;
        $userId = $this->prepareData($userId);
        $this->sql = "select * from " . $table . " where gebruiker_ID = '" . $userId . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $result = $row;
            return $result;
        }
    }
    function getRankingInfo($table)
    {
        $result = false;
        $this->sql = "select gebruikersnaam, stappen from $table order by stappen DESC";
        $result = mysqli_query($this->connect, $this->sql);
        $rows = mysqli_fetch_all($result);
        if (mysqli_num_rows($result) != 0) {
            $result = $rows;
        }
        return $result;
    }
}
