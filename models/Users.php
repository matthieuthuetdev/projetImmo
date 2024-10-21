<?php
class Users
{
    private PDO $connection;
    public function __construct()
    {
        $this->connection = Database::getInstance();
    }
    public function signIn($_userName, $_password)
    {
        $request = "SELECT * FROM utilisateurs WHERE nom_utilisateur= :username AND pass_utilisateur= :password";
        $rq = $this->connection->prepare($request);
        $rq->bindParam(":username", $_userName, PDO::PARAM_STR);
        $rq->bindParam(":password", $_password, PDO::PARAM_STR);
        if ($rq->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
