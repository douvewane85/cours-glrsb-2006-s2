<?php
require_once __DIR__ . '/entity/Figure.php';
class Triangle extends Figure{
    private float $base;
    private float $hauteur;



    public function __construct(float $base=0, float $hauteur=0, float $cote=0) {
        parent::__construct($cote);
        $this->base = $base;
        $this->hauteur = $hauteur;
        Figure::setNombreCote(3);
    }

    public function setBase(float $base) {
        $this->base = $base;
    }
    public function setHauteur(float $hauteur) {
        $this->hauteur = $hauteur;
    }

    
 
    public function getBase() {
        return $this->base;
    }

    public function getHauteur() {
        return $this->hauteur;
    }

    public function surface() {
        return 0.5 * $this->base * $this->hauteur;
    }
    public function perimetre() {
        return self::$nbreCote * $this->cote; // Assuming it's an isosceles triangle
    }

    public function toChaine()
    {
        return parent::toChaine() . ", base = " . $this->base . ", hauteur = " . $this->hauteur . ", surface = " . $this->surface() . ", perimetre = " . $this->perimetre();
    }


}