<?php 
require_once dirname(__DIR__)."/entity/Admin.php";
require_once dirname(__DIR__)."/entity/Compte.php";
require_once dirname(__DIR__)."/entity/Role.php";
class InfoConnexion{
    private string $login;
    private string $password;
    private Admin|null $admin;
    private ?Compte $compte;
    private ?Role $role;

    public function __construct(string $login,string $password,?Role $role=null)
    {
          $this->login=$login;
          $this->password=$password;
          $this->role=$role;
       
    }


    /**
     * Get the value of login
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * Set the value of login
     */
    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of admin
     */
    public function getAdmin(): ?Admin
    {
        return $this->admin;
    }

    /**
     * Set the value of admin
     */
    public function setAdmin(?Admin $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get the value of compte
     */
    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    /**
     * Set the value of compte
     */
    public function setCompte(?Compte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }

    /**
     * Get the value of role
     */
    public function getRole(): Role
    {
        return $this->role;
    }

    /**
     * Set the value of role
     */
    public function setRole(Role $role): self
    {
        $this->role = $role;

        return $this;
    }
}