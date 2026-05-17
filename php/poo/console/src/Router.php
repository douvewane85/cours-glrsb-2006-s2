<?php
namespace App;

use App\Controller\AdminController;

class Router
{
    private function __construct()
    {
     
    }

    public  static  function run():void
    {
        $controller=new AdminController();
        do {
            $choice=$controller->showMenu();
             
            switch ($choice) {
                case 1:
                     $controller->createCatgorie();
                    break;
                case 2:
                   $controller->showCategories();
                    break;

                    case 3:
                     $controller->createProduit();
                    break;
                case 4:
                     $controller->showProduits();
                    break;
                case 5:
                    echo "Exiting the application. Goodbye!\n";
                    return;
                default:
                    echo "Invalid choice. Please try again.\n";
            }
         
       }while (true);
     }
}
