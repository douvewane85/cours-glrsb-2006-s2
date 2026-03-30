<?php 
require_once dirname(__DIR__)."/entity/Compte.php";
require_once dirname(__DIR__)."/entity/TypeDeCompte.php";
 class CompteCourant extends Compte{
       private int $decouvertAutorise;
       public function __construct(float $solde,string $numero,float $decouvertAutorise=0)
       {
          parent::__construct($solde,$numero);
          $this->type=TypeDeCompte::COURANT;
          $this->fraisFixe=1000;
          $this->decouvertAutorise=$decouvertAutorise *-1;
       }

      function  calculFrais(): float{
            if ($this->solde<0) {
                return   $this->fraisFixe+500;
            }else {
                return $this->fraisFixe;
            }
      }

      public function __toString(): string
      {
            return parent::__toString() . "\n Decouvert Autorise : $this->decouvertAutorise \n ";
      }

       public function debiter(float $montant): Operation|null
      {
          $frais=$this->calculFrais();
       /*
          Operation de debit est impossible lorsque le solde =-100000 et le decouvert autorise =100000 et le montant de debit =1000
          Test 1  :
            solde = 100 000
            decouvert autorise = 100 000
            montant de debit = 110 000
            frais = 1000
            montant total = 111 000
            solde - montant total = 100 000 - 111 000 = -11 000 > -100000 => Operation de debit est possible
            solde=solde - montant total = 100 000 - 111 000 = -11 000

       Test 2  :
            solde = -11 000
            decouvert autorise = 100 000
            montant de debit = 20 000
            frais = 1000
            montant total = 21 000
            solde - montant total = -11 000 - 21 000 = -32 000 > -100000 => Operation de debit est possible
            solde=solde - montant total = -32 000

      Test 3  :
            solde = -32 000
            decouvert autorise = 100 000
            montant de debit = 70 000
            frais = 1500
            montant total = 71 500
            solde - montant total = -32 000 - 71 500 = -103 500 < -100000 => Operation de debit est impossible
            solde=solde - montant total = -32 000
       */
             $montantTotal=$montant+$frais;
             if ($this->solde-$montantTotal<$this->decouvertAutorise) {
                 return null;
             }   
            $this->solde-=$montantTotal;
            $operation=  new Operation($montantTotal,$this,TypeOperation::DEBIT);
            $this->addOperation($operation);
            return $operation;
     }


 }