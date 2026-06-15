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
               $this->openConnexion();
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

     public  function updateStock(array $produits): int
    {
      //UPDATE produits set  `qteStock`=`qteStock` - 10 where id=1;
           try {
               $this->openConnexion();
                $this->pdo->beginTransaction();
                $sql = "UPDATE " . $this->tableName . "  set `qteStock`=:newQteStock where id=:produitId";
                  $stm= $this->pdo->prepare( $sql);
                 $nbreRowAffected=0;
               foreach ($produits as  $produit) {
                   $stm->execute([
                     ":newQteStock"=> $produit['newQteStock'],
                     ":produitId"=>$produit['produitId'],
                 ]);
                  $nbreRowAffected=$stm->rowCount();
               }
                 $this->pdo->commit();
               $this->closeConnexion();
               return $nbreRowAffected;
             } catch (\PDOException $e) {
                if ($this->pdo->inTransaction()) {
                   $this->pdo->rollBack();
                }
             echo "Connection failed: " . $e->getMessage();
             return 0;
             }
        
    }

  

   
}