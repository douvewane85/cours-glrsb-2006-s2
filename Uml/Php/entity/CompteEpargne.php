<?php 
require_once dirname(__DIR__)."/entity/Compte.php";
require_once dirname(__DIR__)."/entity/TypeDeCompte.php";
 class CompteEpargne extends Compte{
       private float $tauxInteret;
       private const MONTANT_MAX= 500000;
       public function __construct(float $solde,string $numero,float $tauxInteret=0.05)
       {
          parent::__construct($solde,$numero);
          $this->type=TypeDeCompte::EPARGNE;
             $this->fraisFixe=500;
          $this->tauxInteret=$tauxInteret;
       }

         function  calculFrais(): float{
            if ($this->solde>self::MONTANT_MAX) {
                return   0;
            }else {
                return $this->fraisFixe;
            }
        }

            public function __toString(): string
            {
                  return parent::__toString() . "\n Taux Interet : $this->tauxInteret \n";
            }


            public function afficheSolde():float
             {
                 return   $this->solde+($this->solde*$this->tauxInteret);
             }


 }