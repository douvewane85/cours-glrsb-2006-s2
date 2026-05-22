<?php
namespace App\Repositoty;

use App\Core\Repository;
use App\Entity\ProduitEntity;

 class ProduitRepository extends Repository
{
    
    public function __construct()
    {
             parent::__construct();
             $this->tableName= "produits";
             $this->classeName= "App\\Entity\\ProduitEntity";
    }

    public  function insert(ProduitEntity $produit): int
    {
       
           try {
              $sql = "INSERT INTO " . $this->tableName . " (libelle, code,categorie_id) VALUES (:libelle,:code,:categorieId)";
              $stm= $this->pdo->prepare( $sql);
               $stm->execute([
                  ":libelle"=> $produit->getCode(),
                  ":code"=>$produit->getLibelle(),
                  ":categorieId"=>$produit->getCategorie()->getId(),
               ]);
               $this->closeConnexion();
             return $stm->rowCount();
             } catch (\PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
             return 0;
             }
        
    }

   
   
}