<?php 
require_once __DIR__ . '/entity/Carre.php';
require_once __DIR__ . '/entity/Triangle.php';
class App {
    private function __construct()
    {
      
    }
    public static function main() {
        $nbreCarre = 0;
        $nbreTriangle = 0;
        $carres = [];
        $triangles = [];
       do {
            echo "Menu:\n";
            echo "1. Enregistrer un Figure\n";
            echo "2. Lister les Figures\n";
            echo "3. Liste des Figures par type\n";
            echo "4. Quitter\n";
            $choice = readline("Choisissez une option: ");

            switch ($choice) {
                case '1':
                 echo "Selectionner type de Figure\n";
                 echo "1-Carre\n";
                 echo "2-Triangle\n";
                 $type = readline("Choisissez un type: ");
                    if ($type == '1') {
                            echo "Entrer le cote du carre\n";   
                            $cote = readline("Cote: "); 
                            $nbreCarre = $nbreCarre + 1;
                            $carres[$nbreCarre] = new Carre();
                            $carres[$nbreCarre]->setCote($cote);
                    }elseif ($type == '2') {
                            echo "Entrer le cote du Triangle";
                            $cote = readline("Cote: ");
                            echo "Entrer la base du Triangle";
                            $base = readline("Base: ");
                            echo "Entrer la hauteur du Triangle";  
                            $hauteur = readline("Hauteur: ");
                            $nbreTriangle = $nbreCarre + 1;
                            $triangles[$nbreTriangle] = new Triangle($cote, $base, $hauteur);

                    }
                    
                    break;
                case '2':
                    echo "Liste des Carres:\n";
                    if (isset($carres)) {
                        foreach ($carres as $carre) {
                            echo $carre->toChaine() . "\n";
                        }
                    } else {
                        echo "Aucun carre enregistré.\n";
                    }
                    echo "Liste des Triangles:\n";
                    if (isset($triangles)) {
                        foreach ($triangles as $triangle) {
                            echo $triangle->toChaine() . "\n";
                        }
                    } else {
                        echo "Aucun triangle enregistré.\n";
                    }
                    break;
                case '3':
                    echo "Selectionner type de Figure\n";
                    echo "1-Carre\n";
                    echo "2-Triangle\n";
                    $type = readline("Choisissez un type: ");
                    if ($type == '1') {
                        echo "Liste des Carres:\n";
                        if (isset($carres)) {
                            foreach ($carres as $carre) {
                                echo $carre->toChaine() . "\n";
                            }
                        } else {
                            echo "Aucun carre enregistré.\n";
                        }
                    } elseif ($type == '2') {
                        echo "Liste des Triangles:\n";              if (isset($triangles)) {
                            foreach ($triangles as $triangle) {
                                echo $triangle->toChaine() . "\n";
                            }
                        } else {
                            echo "Aucun triangle enregistré.\n";
                        }
                    }
                    break;
                case '4':
                    echo "Au revoir!\n";
                    exit(0);
                default:
                    echo "Option invalide. Veuillez réessayer.\n";
            }
        } while (true);
    }
}

App::main();