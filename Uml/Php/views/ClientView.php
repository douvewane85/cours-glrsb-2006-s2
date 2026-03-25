<?php 
require_once dirname(__DIR__)."/entity/InfoConnexion.php";
require_once dirname(__DIR__)."/entity/TypeOperation.php";
require_once dirname(__DIR__)."/services/CompteService.php";
require_once dirname(__DIR__)."/services/OperationService.php";
class ClientView{
     private static  array   $typesOperation=[TypeOperation::DEBIT,TypeOperation::VIREMENT];
     private function __construct()
     {
       
     }
     public static function  afficherMenuPrincipal(InfoConnexion $info):void 
     {
        $compte=$info->getCompte();
        do {
            echo "1-Consulter Solde \n";
            echo "2-Faire une  Operation \n";
            echo "3-Lister Operation  \n";
            echo "4-Lister Operation Par Type \n";
            echo "5-Quitter \n";

           $choix=readline("Entrer le choix ?");
           switch ($choix) {
            case '1':
                 $solde= $compte->afficheSolde();
                 echo "Le Solde du Compte :   $solde \n";
                break;
            case '2':
                  $operation=self::getTypeOperation();
                 do {
                    $montant=(float)readline("Entrer le montant cette operation ");
                 } while ($montant <= 0);
                 switch ($operation) {
                    case TypeOperation::DEBIT:
                        $operation= $compte->debiter($montant);
                         break;
                    case TypeOperation::VIREMENT:
                         do{
                               $numeroCompteVirement=readline("Entrer le numero du compte de Virement");
                               $compteVir=CompteService::getCompteByNumero($numeroCompteVirement);
                             
                         } while($compteVir==null || ($compteVir!=null && $compte->getNumero()==$compteVir->getNumero()) );
                         $operation= $compte->faireVirement($montant,$compteVir);
                         break;
                    default:
                         # code...
                         break;
                }
                    OperationService::addOperation($operation);

                 break;

                case '3': 
                    $operations=  $compte->getTabOperations();
                    self::afficheOperations($operations);
                    break;
               case '4': 
                      $typeOperation=self::getTypeOperation();
                      $operationsByType= $compte->getTabOperations($typeOperation);
                      self::afficheOperations($operations);
                    break;
            default:
                # code...
                break;
           }
        } while ( $choix!=5);
         
     }
     public static function getTypeOperation():TypeOperation
     {
           do {
               echo "0-Debit \n";
               echo "1-Virement \n";
               $typeOpIndex=readline("Selectonnez un index ?");
           } while ($typeOpIndex <0 || $typeOpIndex>=count(self::$typesOperation));
           return self::$typesOperation[$typeOpIndex];  
     }

     public static function afficheOperations(array $operations):void
     {
           foreach ($operations as  $operation) {
               echo $operation;
               echo "\n\n----------------------------\n\n";
           }
          
     }
}