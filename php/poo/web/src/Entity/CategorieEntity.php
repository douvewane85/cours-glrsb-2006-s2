<?php
namespace App\Entity;
class CategorieEntity
{
    private int $id;
    private string $nom;
    private string $code;
    //OneToMany
    private array $produits;

    public function __construct()
    {
     
    }

    public function __toString(): string
    {
        return "Id:$this->id, Nom:$this->nom, Code:$this->code";
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of code
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Set the value of code
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of produits
     */
    public function getProduits(): array
    {
        return $this->produits;
    }

    public function addProduit(ProduitEntity $produit){
        $this->produits[]=$produit;
    }
}