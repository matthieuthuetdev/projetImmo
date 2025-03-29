<?php
class UserController
{

    public function __construct() {}
    public function signIn(): void
    {
        require "./vue/acces_membre.php";
    }
    public function signOut(){
        session_destroy();
    }
}
