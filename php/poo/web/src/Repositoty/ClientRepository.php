<?php
namespace App\Repositoty;

use App\Core\Repository;
use App\Entity\ClientEntity;


 class ClientRepository extends Repository
{
    
    public function __construct()
    {
             parent::__construct();
             $this->tableName= "clients";
             $this->classeName= "App\\Entity\\ClientEntity";
    }

    public  function insert(ClientEntity $client): int
    {
           try {
              $this->openConnexion();
              $sql = "INSERT INTO " . $this->tableName . " (nomPrenom, telephone, adresse) VALUES (:nomPrenom,:telephone,:adresse)";
               $stm= $this->pdo->prepare( $sql);
               $stm->execute([
                  ":nomPrenom"=> $client->getNomPrenom(),
                  ":telephone"=>$client->getTelephone(),
                  ":adresse"=>$client->getAdresse(),
               ]);
               $this->closeConnexion();
                return $stm->rowCount();
             } catch (\PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
               return 0;
             } 
        
    }

    public function selectByTelephone(string $telephone): ?ClientEntity
    {
        try {
              $this->openConnexion();
            $sql = "SELECT * FROM " . $this->tableName . " WHERE telephone = :telephone";
             $stm = $this->pdo->prepare($sql);
             $stm->execute([":telephone" => $telephone]);
            $stm->setFetchMode(\PDO::FETCH_CLASS, $this->classeName);
            $this->closeConnexion();
            $result= $stm->fetch();
            return $result==false ? null : $result;
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }

  

   
}