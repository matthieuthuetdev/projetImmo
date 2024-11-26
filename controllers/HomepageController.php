<?php
class HomepageController
{

    public function __construct() {}
    public function displayHome(): void
    {
        $dep = new Departements();
        $data = $dep->searchAll();
        require "./vue/homepage.php";
    }
}
