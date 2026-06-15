<?php
namespace App\Entity;



class CommandeEntity
{
     private ?int $id=null;
     private ClientEntity $client;
     private string $numero;
     private string  $dateCmde;
     private string $statut;
     private float  $montant;
     private array  $lignesCmde=[];

     public function __construct(ClientEntity $client,string  $dateCmde, string $statut,float  $montant,array  $lignesCmde)
     {
        $this->client=$client;
        $this->dateCmde=$dateCmde;
        $this->statut=$statut;
        $this->montant=$montant;
        $this->lignesCmde=$lignesCmde;
        
     }

     /**
      * Get the value of id
      */
     public function getId(): ?int
     {
          return $this->id;
     }

     /**
      * Set the value of id
      */
     public function setId(?int $id): self
     {
          $this->id = $id;

          return $this;
     }

     /**
      * Get the value of client
      */
     public function getClient(): ClientEntity
     {
          return $this->client;
     }

     /**
      * Set the value of client
      */
     public function setClient(ClientEntity $client): self
     {
          $this->client = $client;

          return $this;
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
      * Get the value of dateCmde
      */
     public function getDateCmde(): string
     {
          return $this->dateCmde;
     }

     /**
      * Set the value of dateCmde
      */
     public function setDateCmde(string $dateCmde): self
     {
          $this->dateCmde = $dateCmde;

          return $this;
     }

     /**
      * Get the value of statut
      */
     public function getStatut(): string
     {
          return $this->statut;
     }

     /**
      * Set the value of statut
      */
     public function setStatut(string $statut): self
     {
          $this->statut = $statut;

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
      * Set the value of montant
      */
     public function setMontant(float $montant): self
     {
          $this->montant = $montant;

          return $this;
     }

     /**
      * Get the value of lignesCmde
      */
     public function getLignesCmde(): array
     {
          return $this->lignesCmde;
     }

     /**
      * Set the value of lignesCmde
      */
     public function addLignesCmde(LigneCommande $lignesCmde): self
     {
          $this->lignesCmde[] = $lignesCmde;

          return $this;
     }
}