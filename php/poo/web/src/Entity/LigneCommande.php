<?php
namespace App\Entity;



class LigneCommande
{
    private ?int $id=null;
    private ProduitEntity $produit;
    private float $prixReel;
    private int $qteCmde;


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
     * Get the value of produit
     */
    public function getProduit(): ProduitEntity
    {
        return $this->produit;
    }

    /**
     * Set the value of produit
     */
    public function setProduit(ProduitEntity $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get the value of prixReel
     */
    public function getPrixReel(): float
    {
        return $this->prixReel;
    }

      /**
     * Get the value of prixReel
     */
    public function getMontant(): float
    {
        return $this->prixReel*$this->qteCmde;
    }

    /**
     * Set the value of prixReel
     */
    public function setPrixReel(float $prixReel): self
    {
        $this->prixReel = $prixReel;

        return $this;
    }

    /**
     * Get the value of qteCmde
     */
    public function getQteCmde(): int
    {
        return $this->qteCmde;
    }

    /**
     * Set the value of qteCmde
     */
    public function setQteCmde(int $qteCmde): self
    {
        $this->qteCmde = $qteCmde;

        return $this;
    }
}