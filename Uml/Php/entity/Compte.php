<?php 
require_once dirname(__DIR__)."/entity/TypeDeCompte.php"; 
require_once dirname(__DIR__)."/entity/Operation.php"; 
require_once dirname(__DIR__)."/entity/TypeOperation.php";
 class Compte{
    protected float $solde;
    protected string $numero;
    protected TypeDeCompte $type;
    protected array $tabOperations=[];
    protected function __construct(float $solde,string $numero)
    {
        $this->solde=$solde;
        $this->numero=$numero;
        
    }

    public function afficheSolde():float
    {
        return   $this->solde;
    }

    /**
     * Get the value of type
     */
    public function getType(): TypeDeCompte
    {
        return $this->type;
    }
    public function crediter(float $montant): Operation
    {
       $this->solde+=$montant;
       $operation= new Operation($montant,$this,TypeOperation::CREDIT);
       $this->addOperation($operation);
       return $operation;
    }

     public function faireVirement(float $montant,Compte $compteVirement): Operation
     {
        $this->debiter($montant);
        $compteVirement->crediter($montant);
        $operation= new Operation($montant,$this,TypeOperation::VIREMENT);
        $this->addOperation($operation);
       return $operation;
     }

     public function debiter(float $montant): Operation
    {
       $this->solde-=$montant;
       $operation=  new Operation($montant,$this,TypeOperation::DEBIT);
        $this->addOperation($operation);
       return $operation;
    }


    /**
     * Get the value of numero
     */
    public function getNumero(): string
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     */
    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of tabOperations
     */
    public function getTabOperations(?TypeOperation $typeOperation=null): array
    {
         if ($typeOperation!=null) {
              $tabOperationByType=[];
             foreach ($this->tabOperations as  $operation) {
                if ($operation->getTypeOperation()==$typeOperation) {
                   $tabOperationByType[]=$operation;
                }
               
             }
             return  $tabOperationByType;
         }
        return $this->tabOperations;
    }

    

     public function addOperation(Operation $operation): void
     {
        $this->tabOperations[]=$operation;
     }
}
