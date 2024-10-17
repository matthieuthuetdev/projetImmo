<?php
require "./models/Database.php";
require "./models/Users.php.php";

Database::getInstance();

$users = new Users();
$mdp = password_hash("admin",PASSWORD_ARGON2I);
echo $mdp;
