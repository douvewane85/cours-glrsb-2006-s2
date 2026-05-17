<?php
namespace App\Entity;

use App\Repositoty\CategorieRepository;

class ProduitEntity
{
    private int $id;
    private string $libelle;
    private string $code;

    //Initialiser a la rcuperation d'une requete select
    private int|null $categorieId=null;

    //ManyToOne
    //Modele POO
    private ?CategorieEntity $categorie=null;
    
    public function __construct()
    {
   
    }

    public function __toString(): string
    {
        $nomCategorie= $this->getCategorie()!=null?$this->categorie->getNom() :"";
        return "Id:$this->id, Libelle :$this->libelle, Code:$this->code, Categorie: ". $nomCategorie;
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
     * Get the value of libelle
     */
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     */
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of categorie
     */
    public function getCategorie(): ?CategorieEntity
    {
        if($this->categorie==null && $this->categorieId!=null ){
           $this->categorie=CategorieRepository::selectById($this->categorieId);
        }
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     */
    public function setCategorie(CategorieEntity $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get the value of categorieId
     */
    public function getCategorieId(): ?int
    {
        return $this->categorieId;
    }

    /**
     * Set the value of categorieId
     */
    public function setCategorieId(?int $categorieId): self
    {
        $this->categorieId = $categorieId;

        return $this;
    }
}