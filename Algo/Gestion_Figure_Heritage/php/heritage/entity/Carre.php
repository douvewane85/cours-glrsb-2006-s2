<?php 
require_once __DIR__ . '/entity/Figure.php';
class Carre extends Figure {
  

    public function __construct(float $cote=0) {
        parent::__construct($cote);
        Figure::setNombreCote(4);
    }


    public function surface() {
        return pow($this->cote, 2);
    }

    public function perimetre() {
        return self::$nbreCote * $this->cote;
    }

    public function toChaine()
    {
        return parent::toChaine() . ", surface = " . $this->surface() . ", perimetre = " . $this->perimetre();
    }
}