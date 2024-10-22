<?php
session_start();
class Users
{
    private PDO $connection;
    public function __construct()
    {
        $this->connection = Database::getInstance();
    }
    public function signIn($_userName, $_password)
    {
        $request = "SELECT * FROM utilisateurs WHERE mail_utilisateur= :username";
        $rq = $this->connection->prepare($request);
        $rq->bindParam(":username", $_userName, PDO::PARAM_STR);
        $rq->execute();
        $result = $rq->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) == 1) {
            $succes = password_verify($_password, $result[0]["pass_utilisateur"]);
            if($succes){
                $_SESSION["mail"] = $result[0]["mail_utilisateur"];
                $_SESSION["id"] = $result[0]["id_utilisateur"];
    
            }
            return $succes
        } else {
            return false;
        }
    }
}
