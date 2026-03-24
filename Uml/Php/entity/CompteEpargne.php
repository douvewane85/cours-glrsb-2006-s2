<?php 
require_once dirname(__DIR__)."/entity/Compte.php";
require_once dirname(__DIR__)."/entity/TypeDeCompte.php";
 class CompteEpargne extends Compte{
       public function __construct(float $solde)
       {
          parent::__construct($solde);
          $this->type=TypeDeCompte::EPARGNE;
       }


 }