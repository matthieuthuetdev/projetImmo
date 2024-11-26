<?php
class SignInController
{

    public function __construct() {}
    public function display(): void
    {
        require "./vue/acces_membre.php";
    }
}
