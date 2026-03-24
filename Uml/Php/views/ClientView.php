<?php 
require_once dirname(__DIR__)."/entity/InfoConnexion.php";
class ClientView{
     private function __construct()
     {
       
     }
     public static function  afficherMenuPrincipal(InfoConnexion $info):void 
     {
       $compte=$info->getCompte();

        do {
            echo "1-Consulter Solde \n";
            echo "5-Quitter \n";

           $choix=readline("Entrer le choix ?");
           switch ($choix) {
            case '1':
                 $solde= $compte->afficheSolde();
                 echo "Le Solde du Compte :   $solde \n";
                break;
            
            default:
                # code...
                break;
           }
        } while ( $choix!=5);
         
     }
}