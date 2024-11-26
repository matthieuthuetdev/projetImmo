<?php
class EstateController
{
    private ?int  $userId;
    public function __construct($_userId = null)
    {
        $this->userId = $_userId;
    }
    public function displayRealEstate(): void
    {
        $estate = new RealEstate();
        $data = $estate->listeRealEstat($this->userId);

        require "./vue/listEstate.php";
    }
}
