<?php 
require_once dirname(__DIR__)."/entity/TypeDeCompte.php"; 
require_once dirname(__DIR__)."/entity/Operation.php"; 
require_once dirname(__DIR__)."/entity/TypeOperation.php";
 abstract class Compte{
    protected float $solde;
    protected string $numero;
    protected TypeDeCompte $type;
    protected array $tabOperations=[];
    protected int $fraisFixe;
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
           $frais=$this->calculFrais();
           $montantTotal=$montant-$frais;
           $this->solde+=$montantTotal;
  
           $operation= new Operation($montant,$this,TypeOperation::CREDIT);
           $this->addOperation($operation);
           return $operation;
    }

     public function faireVirement(float $montant,Compte $compteVirement): array|null
     {
        $operationDebit = $this->debiter($montant);
         if ($operationDebit == null) {
             return null;
         }
        $operationCredit = $compteVirement->crediter($montant);
        $operationVirement= new Operation($montant,$compteVirement,TypeOperation::VIREMENT);
        $this->addOperation($operationVirement);
       return [$operationDebit, $operationCredit,$operationVirement];
     }

     public function debiter(float $montant): Operation|null
    {
       $frais=$this->calculFrais();
       $montantTotal=$montant+$frais;
       if ($montantTotal>$this->solde) {
          return null;
       }
        $this->solde-=$montantTotal;
        $operation=  new Operation($montantTotal,$this,TypeOperation::DEBIT);
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


     public function __toString(): string
     {
         return "Numero Compte : $this->numero \n Solde : $this->solde \n Type de Compte : ".$this->type->value."\n Frais Fixe : $this->fraisFixe";
     }
    abstract function  calculFrais(): float;
}
