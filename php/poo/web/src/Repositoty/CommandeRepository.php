<?php
namespace App\Repositoty;

use App\Core\Repository;
use App\Entity\CommandeEntity;

    // \:represente le namespace global, ce qui signifie que nous utilisons la classe PDO de l'espace de noms global.
class CommandeRepository extends Repository
{
           
    public function __construct()
    {
              parent::__construct();
              $this->tableName= "commandes";
             $this->classeName= "App\\Entity\\CommandeEntity";
    }
    /**
     * 
     * 
     *
     * @param CommandeEntity $commande
     * @return integer ( represente le last insert id)
     */
    public  function insert(CommandeEntity $commande): int
    {
        /* 
           insert into commandes(numero,date,client_id,montant , etat)
           values("COM_002",'2026-06-15',1,40000,"IMPAYE");
        */
           try {
                $this->openConnexion();
                 $sql = "INSERT INTO " .  $this->tableName. " (numero,date,client_id,montant,etat) VALUES (:numero,:date,:clientId,:montant,:etat)";
                 $stmt = $this->pdo->prepare($sql);
                 $stmt->execute([
                  ':numero' =>$commande->getNumero(),
                  ':date' =>$commande->getDateCmde() ,
                  ':clientId' =>$commande->getClient()->getId(), 
                  ':montant' =>$commande->getMontant(),
                  ':etat' =>$commande->getStatut()  
                 ]);
                 $lastInsertId=$this->pdo->lastInsertId();
                 $this->closeConnexion();
                 return $lastInsertId;
             } catch (\PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
             return 0;
           }
    }

       public  function delete(int $commandeId): int
       {
           try {
                 $this->openConnexion();
                  $sql = "delete from " .  $this->tableName. " where id=:commandeId";
                  $stmt = $this->pdo->prepare($sql);
                  $stmt->execute([
                   ':commandeId' =>$commandeId,
                  ]);
                 $this->closeConnexion();
                 return $stmt->rowCount();
             } catch (\PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
             return 0;
           }
     }
     /*
        select numero from commandes ORDER BY id DESC LIMIT 0,1;
      */
          public  function selectLastNum(): ?string
    {
           try {
                $this->openConnexion();
                  $sql = "select numero FROM  ". $this->tableName." ORDER BY id DESC LIMIT 0,1";
                  $stmt = $this->pdo->prepare($sql);
                  $stmt->setFetchMode(\PDO::FETCH_ASSOC);
                  $stmt->execute();
                  $this->closeConnexion();
                 $row =$stmt->fetch();
            
                 return $row!=false ? $row['numero']:null;
               } catch (\PDOException $e) {
                   echo "Connection failed: " . $e->getMessage();
                 return null;
              }
        
    } 
    
}