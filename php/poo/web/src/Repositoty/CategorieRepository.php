<?php
namespace App\Repositoty;

use App\Core\Repository;
use App\Entity\CategorieEntity;


    // \:represente le namespace global, ce qui signifie que nous utilisons la classe PDO de l'espace de noms global.
class CategorieRepository extends Repository
{
           
    public function __construct()
    {
              parent::__construct();
              $this->tableName= "categories";
             $this->classeName= "App\\Entity\\CategorieEntity";
    }
    public  function insert(CategorieEntity $categorie): int
    {
           try {
                 $sql = "INSERT INTO " .  $this->tableName. " (nom, code) VALUES (:nom, :code)";
                 $stmt = $this->pdo->prepare($sql);
                 $stmt->execute([
                  ':nom' =>$categorie->getNom(),
                  ':code' =>$categorie->getCode() 
                 ]);
                 $this->closeConnexion();
                 return $stmt->rowCount();
             } catch (\PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
             return 0;
           }
    }

  
    
}