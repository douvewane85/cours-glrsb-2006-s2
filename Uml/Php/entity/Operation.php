<?php 
require_once dirname(__DIR__)."/entity/Compte.php"; 
require_once dirname(__DIR__)."/entity/TypeOperation.php";
class Operation{
     private \DateTime $dateOperation;
     private float $montant;
     private Compte $compte;
     private TypeOperation $typeOperation;

     public function __construct(float $montant,Compte $compte,TypeOperation $typeOperation)
     {
        $this->montant=$montant;
        $this->compte=$compte;
        $this->typeOperation=$typeOperation;
        $this->dateOperation=new \DateTime();
     }

     /**
      * Get the value of dateOperation
      */
     public function getDateOperation(): \DateTime
     {
          return $this->dateOperation;
     }

     /**
      * Get the value of compte
      */
     public function getCompte(): Compte
     {
          return $this->compte;
     }

     /**
      * Set the value of compte
      */
     public function setCompte(Compte $compte): self
     {
          $this->compte = $compte;

          return $this;
     }

     /**
      * Get the value of montant
      */
     public function getMontant(): float
     {
          return $this->montant;
     }

     /**
      * Get the value of typeOperation
      */
     public function getTypeOperation(): TypeOperation
     {
          return $this->typeOperation;
     }
     public function __toString()
     {
        return "Date: ".$this->dateOperation->format('d-m-Y H:i:s')."\n Montant : ".$this->montant."\n Compte : ".$this->compte->getNumero()."\n Type : ".$this->typeOperation->value;
     }
}