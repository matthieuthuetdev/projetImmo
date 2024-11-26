<?php
class Departements
{
    private $connection;
    private $result;
    public function __construct()
    {
        $this->connection = Database::getInstance();
    }
    public function searchAll(): array
    {
        $request = "SELECT id_dep, nom_dep FROM departements";
        $rq = $this->connection->prepare($request);
        $rq->execute();
        $this->result = $rq->fetchAll(PDO::FETCH_ASSOC);
        return $this->result;
    }
}
