<?php
require "./models/Database.php";
class Users
{
    private PDO $connection;
    public function __construct()
    {
        $this->connection = Database::getInstance();
    }
    public function signIn($input){
        
    }
}
