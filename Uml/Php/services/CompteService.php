<?php 
require_once dirname(__DIR__)."/entity/Compte.php"; 
require_once dirname(__DIR__)."/entity/CompteCourant.php";
require_once dirname(__DIR__)."/entity/CompteEpargne.php";
require_once dirname(__DIR__)."/entity/ComptePro.php";
class CompteService{
    private  static array $comptes=[];
  private function __construct()
  {
    throw new \Exception('Not implemented');
  }

public  static function getCompteByNumero(string $numero): ?Compte{
  
    foreach (self::$comptes as $compte) {
       if ($compte->getNumero()==$numero) {
          return $compte;
       }
    }
   return null;
}

 public  static function  initialize():void{
         self::$comptes[]= new CompteCourant(100000,"CPT001",100000);
         self::$comptes[]= new CompteEpargne(100000,"CPT002");
         self::$comptes[]= new ComptePro(100000,"CPT003");

    }
}