<?php 
namespace App\Controller;

use App\Service\CategorieService;
use App\Service\ProduitService;
use App\View\AdminView;

class AdminController{

       public function createCatgorie(){
                  $categorie =AdminView::saisirCategory();
                 CategorieService::ajouterCategorie($categorie);
       }

       public function createProduit(){
            $categories = CategorieService::listerCategories();
            $produit =AdminView::saisirProduit($categories);
            ProduitService::ajouterProduit($produit);
       }


       public function showCategories(){
                   echo "You chose to display categories.\n";
                    $categories = CategorieService::listerCategories();
                     AdminView::afficherCategories($categories);
       }

        public function showProduits(){
                    echo "You chose to display categories.\n";
                    $produits=ProduitService::listerProduits();
                    AdminView::afficherProduits($produits);
       }

         public function showMenu():string{
         echo"1-Ajouter une categorie\n";
           echo "2-Afficher les categories\n";
            echo"3-Ajouter un Produit\n";
           echo "4-Afficher les Produits\n";
           echo "5-Quitter\n";
          return  readline("Enter your choice: ");

       }




}