<?php 
namespace App\Service;


use App\Entity\CommandeEntity;
use App\Repositoty\CommandeRepository;
use App\Repositoty\LigneCommandeRepository;
use App\Repositoty\ProduitRepository;

final class CommandeService
{
    private function __construct()
    {
        throw new \Exception('Not implemented');
    }

    public static function faireCommande(CommandeEntity $commande):bool
    {
        $numero=self::generateNumero();
     
        if ($numero==null) {
               return false ;
        }
           
        $commande->setNumero($numero);
        //Open Connexion 
        $commandeRepository=new CommandeRepository();
      
        $lastInsertIdCmde= $commandeRepository->insert($commande);
         // Ferme la connection
        if($lastInsertIdCmde!=0){
              //Open Connexion 
            $ligneCommandeReposotory=new LigneCommandeRepository();
            $lastInsertIds= $ligneCommandeReposotory->insert($commande->getLignesCmde(),$lastInsertIdCmde);
             // Ferme la connection
            if(empty($lastInsertIds)){
                //Insert Commande est success mais insert LigneCommande error
                 $commandeRepository->delete($lastInsertIdCmde);
                return false;
            }else{
                  //Insert Commande est success mais insert LigneCommande succes
                  $produitRepository=new ProduitRepository();
                  $nbreRowAffected=$produitRepository->updateStock($lastInsertIds);
                 if ($nbreRowAffected==0) {
                     $commandeRepository->delete($lastInsertIdCmde);    
                     return false;
                 }
            }
          }else{
              return false;
          }
         return true;
    }

    private static function generateNumero():?string {
          //repo: Select count(*) from commandes
             //$countCmde=0  retturn $numeroNext="COM_001";
      
         //$lastNumeroCmde="COM_010";
         //$nexNumeroCmdeInt=10
          $commandeRepository=new CommandeRepository();
          $lastNumeroCmde=$commandeRepository->selectLastNum();
          if( $lastNumeroCmde!=null){
          
               $nexNumeroCmdeInt=(int) substr($lastNumeroCmde,4);
               $numeroNext="COM_".str_pad( $nexNumeroCmdeInt+1,3,'0',STR_PAD_LEFT);
               return $numeroNext;
          }

          return "COM_001";
         
    }




}