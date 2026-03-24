<?php 
require_once dirname(__DIR__)."/entity/TypeDeCompte.php"; 
abstract class Compte{
    protected float $solde;
    protected TypeDeCompte $type;
    protected function __construct(float $solde)
    {
        $this->solde=$solde;
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
}
