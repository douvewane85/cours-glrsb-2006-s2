<?php 
require_once dirname(__DIR__)."/entity/Compte.php";
require_once dirname(__DIR__)."/entity/TypeDeCompte.php";
 class ComptePro extends Compte{
       public function __construct(float $solde,string $numero)
       {
          parent::__construct($solde,$numero);
          $this->type=TypeDeCompte::PRO;
       }

 }