<?php 
require_once dirname(__DIR__)."/entity/Compte.php";
require_once dirname(__DIR__)."/entity/TypeDeCompte.php";
 class ComptePro extends Compte{
      private string $nomEntreprise;
      private float $creditEntreprise;

       private const MONTANT_MAX= 1000000;
       private const TAUX= 0.01;

       public function __construct(float $solde,string $numero,string $nomEntreprise="",float $creditEntreprise=0)
       {
          parent::__construct($solde,$numero);
          $this->type=TypeDeCompte::PRO;
          $this->fraisFixe=500;
          $this->nomEntreprise=$nomEntreprise;
          $this->creditEntreprise=$creditEntreprise * -1;
       }

            function  calculFrais(): float{
                  if ($this->solde>self::MONTANT_MAX) {
                  return  $this->fraisFixe + $this->solde*self::TAUX;
                  }else {
                  return $this->fraisFixe;
                  }
            }
            
             public function __toString(): string
             {
                  return parent::__toString() . "\n Nom Entreprise : $this->nomEntreprise \n Credit Entreprise : $this->creditEntreprise \n ";
             }

             public function debiter(float $montant): Operation|null
           {
             $frais=$this->calculFrais();
             $montantTotal=$montant+$frais;
             if ($this->solde-$montantTotal<$this->creditEntreprise) {
                 return null;
             }   
             $this->solde-=$montantTotal;
             $operation=  new Operation($montantTotal,$this,TypeOperation::DEBIT);
             $this->addOperation($operation);
             return $operation;
           }

 }