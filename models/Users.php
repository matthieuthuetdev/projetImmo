<?php
class Users
{
    private PDO $connection;
    public function __construct()
    {
        $this->connection = Database::getInstance();
    }
    public function signIn(string $_userName, string $_password): array
    {
        $request = "SELECT * FROM utilisateurs WHERE mail_utilisateur= :username";
        $rq = $this->connection->prepare($request);
        $rq->bindParam(":username", $_userName, PDO::PARAM_STR);
        $rq->execute();
        $result = $rq->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) == 1) {
            $succes = password_verify($_password, $result[0]["pass_utilisateur"]);
            if ($succes) {
                return $result[0];
            } else {
                return [];
            }
        } else {
            return [];
        }
    }
}
