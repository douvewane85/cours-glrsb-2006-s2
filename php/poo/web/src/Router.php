<?php
namespace App;

use App\Controller\AuthController;
use App\Controller\CategorieController;
use App\Controller\CommandeController;
use App\Controller\ProduitController;

class Router
{
    private function __construct()
    {
     
    }

    /*
       $routes= [
          "/categorie/index" => [CategorieController::class,"showCategories"],
          "/produit/list" => [ProduitController::class,"showProduits"],
          "/produit/form" => [ProduitController::class,"loadForm"],
          "/categorie/add" => [CategorieController::class,"createCategorie"],
          "/produit/add" => [ProduitController::class,"createProduit"],
       ];
       resolve($uri):
    */
    public  static  function run():void
    {
              $cagorieCtrl=new CategorieController();
              $produitCtrl=new ProduitController();
              $cmdeCtrl=new CommandeController();
              $authCtrl=new AuthController();
            
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
               case '/commande/form':
                     $cmdeCtrl->loadForm();
                     break;
               case '/commande/search':
                     $cmdeCtrl->searchClient();
                     break;
                case '/commande/create-client':
                     $cmdeCtrl->createClient();
                     break;
                  case '/commande/add-commande':
                     $cmdeCtrl->addCommande();
                     break;

                  case '/auth/login':
                     $authCtrl->login();
                     break;
                   
                   case '/auth/logout':
                     $authCtrl->logout();
                     break;
                default:
                    $authCtrl->login();
                    break;
              }
              
    }
}
