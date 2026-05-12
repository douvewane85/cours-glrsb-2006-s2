<?php
namespace App;

use App\Service\CategorieService;
use App\View\AdminView;

class Application
{
    private function __construct()
    {
     
    }

    public  static  function run():void
    {
        do {
           echo"1-Ajouter une categorie\n";
           echo "2-Afficher les categories\n";
           echo "3-Quitter\n";
            $choice = readline("Enter your choice: ");
            switch ($choice) {
                case 1:
                    $categorie =AdminView::saisirCategory();
                    CategorieService::ajouterCategorie($categorie);
                    break;
                case 2:
                    echo "You chose to display categories.\n";
                    $categories = CategorieService::listerCategories();
                     AdminView::afficherCategories($categories);
                    break;
                case 3:
                    echo "Exiting the application. Goodbye!\n";
                    return;
                default:
                    echo "Invalid choice. Please try again.\n";
            }
         
       }while (true);
     }
}
