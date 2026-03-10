<?php 
abstract class Figure{
    protected float $cote;
    private static int $nbreCote;

    protected function __construct(float $cote=0) {
        $this->cote = $cote;
    }

    public function setCote(float $cote) {
        $this->cote = $cote;
    }

    public static function getNombreCote(): int {
        return self::$nbreCote;
    }

     protected static function setNombreCote(int $nbreCote): void {
        self::$nbreCote = $nbreCote;    
    }


    public function getCote() {
        return $this->cote;
    }

      public function toChaine()
      {
        return "Carre: cote = " . $this->cote;
     }

    public abstract function surface();
    public abstract  function perimetre();
}