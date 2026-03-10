<?php 
class Carre {
    private float $cote;
    private static int $nbreCote;

    public function __construct(float $cote=0) {
        $this->cote = $cote;
        self::$nbreCote = 4;
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

    public function surface() {
        return pow($this->cote, 2);
    }

    public function perimetre() {
        return self::$nbreCote * $this->cote;
    }

    public function toChaine()
    {
        return "Carre: cote = " . $this->cote;
    }
}