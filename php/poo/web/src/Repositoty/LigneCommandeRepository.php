<?php
namespace App\Repositoty;

use App\Core\Repository;


    // \:represente le namespace global, ce qui signifie que nous utilisons la classe PDO de l'espace de noms global.
class LigneCommandeRepository extends Repository
{
           
    public function __construct()
    {
              parent::__construct();
              $this->tableName= "lignes_commandes";
             $this->classeName= "App\\Entity\\LigneCommande";
    }
    public  function insert(array $lignesCommande,int $commandeId): array
    {
       
           try {
                 $this->openConnexion();
                 $sql = "INSERT INTO " .  $this->tableName. " (produit_id,commande_id,prixReel,qteCmde ) VALUES (:produitId,:commandeId,:prixReel,:qteCmde )";
                 $stmt = $this->pdo->prepare($sql);
                 $this->pdo->beginTransaction();
                   $lastInsertIds=[];
               
                        foreach ($lignesCommande as $ligneCommande) {
                        
                            $stmt->execute([
                                ':produitId' =>$ligneCommande->getProduit()->getId(),
                                ':commandeId' =>$commandeId,
                                ':prixReel' =>$ligneCommande->getPrixReel(),
                                ':qteCmde' =>$ligneCommande->getQteCmde()
                                ]);
                            $lastInsertIds[]=[
                                "produitId"=>$ligneCommande->getProduit()->getId(),
                                'newQteStock'=>$ligneCommande->getProduit()->getQteStock() - $ligneCommande->getQteCmde(),
                                "ligneCmdeId"=>$this->pdo->lastInsertId()
                             ] ;
                        }
                    $this->pdo->commit();
                    $this->closeConnexion();
                    return $lastInsertIds;
                
             } catch (\PDOException $e) {
                if ($this->pdo->inTransaction()) {
                   $this->pdo->rollBack();
                }
             echo "Connection failed: " . $e->getMessage();
              return [];
           }
    }

  
    
}