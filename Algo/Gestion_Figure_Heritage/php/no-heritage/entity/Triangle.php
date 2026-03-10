<?php
class Triangle {
    private float $base;
    private float $hauteur;
    private float $cote;
    private static int $nbreCote ;


    public function __construct(float $base=0, float $hauteur=0, float $cote=0) {
        $this->base = $base;
        $this->hauteur = $hauteur;
        $this->cote = $cote;
        self::$nbreCote = 3;
    }

    public function setBase(float $base) {
        $this->base = $base;
    }
    public function setHauteur(float $hauteur) {
        $this->hauteur = $hauteur;
    }
    public function setCote(float $cote) {
        $this->cote = $cote;
    }
    public static function getNombreCote() {
        return self::$nbreCote;
    }
    public function getCote() {
        return $this->cote;
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
        return "Triangle: base = " . $this->base . ", hauteur = " . $this->hauteur . ", cote = " . $this->cote;
    }


}