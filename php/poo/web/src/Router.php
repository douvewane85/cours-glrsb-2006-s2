<?php
namespace App;

use App\Controller\CategorieController;
use App\Controller\ProduitController;

class Router
{
    private function __construct()
    {
     
    }

    public  static  function run():void
    {
              $cagorieCtrl=new CategorieController();
              $produitCtrl=new ProduitController();
            
              /*
                $_SERVER: recuperer toutes les informations du server
                 -REQUEST_URI:recupere l'uri de la requete
              */
              $uri=$_SERVER['REQUEST_URI'];
              switch ($uri) {
                case '/categorie/index':
                   $cagorieCtrl->showCategories();
                    break;
                 case '/produit/list':
                   $produitCtrl->showProduits();
                    break;
                  case '/produit/form':
                   $produitCtrl->loadForm();
                    break;
                 case '/categorie/add':
                   $cagorieCtrl->createCategorie();
                    break;
                case '/produit/add':
                   $produitCtrl->createProduit();
                    break;
                default:
                    $cagorieCtrl->showCategories();
                    break;
              }
              
    }
}
