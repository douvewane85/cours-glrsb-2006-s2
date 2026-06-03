<?php
namespace App\Entity;
class ClientEntity
{
    private ?int $id=null;
    private ?string $nomPrenom=null;
    private ?string $telephone=null;
    private ?string $adresse=null;
    public function __construct()
    {
     
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
     * Get the value of nomPrenom
     */
    public function getNomPrenom(): ?string
    {
        return $this->nomPrenom;
    }

    /**
     * Set the value of nomPrenom
     */
    public function setNomPrenom(string $nomPrenom): self
    {
        $this->nomPrenom = $nomPrenom;

        return $this;
    }

    /**
     * Get the value of telephone
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     */
    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of adresse
     */
    public function getAdresse():? string
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     */
    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }
}