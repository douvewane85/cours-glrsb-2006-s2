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


     public  function selectById(int $id): CategorieEntity|null
    {
           try {
                  $sql = "SELECT * FROM  ". $this->tableName." c  where c.id=:id ";
                  $stmt = $this->pdo->prepare($sql);
                  $stmt->execute([":id"=>$id]);
                  $stmt->setFetchMode(\PDO::FETCH_CLASS, CategorieEntity::class);
                  $this->closeConnexion();
                  return $stmt->fetch();
               } catch (\PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
               return null;
              }
        
    } 
}