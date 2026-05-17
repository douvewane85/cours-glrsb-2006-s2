<?php 
namespace App\View;

use App\Entity\CategorieEntity;
use App\Entity\ProduitEntity;

final class AdminView
{
   
    private  function __construct()
    {
        echo "AdminView class instantiated.\n";
    }

    public static function saisirProduit(array $categories): ProduitEntity
    {
         $produit= new ProduitEntity();
         $code = readline("Enter Produit code: ");
         $nom = readline("Enter Produit name: ");
         $produit->setLibelle($nom);
         $produit->setCode($code);
         foreach ($categories as $key=> $categorie) {
                echo $key ."- ".$categorie->getNom()."\n";
         }
         $indexSelect=(int)readline("Selectionnez une categorie: ");
         $categorieSelect=$categories[$indexSelect];
         $produit->setCategorie($categorieSelect);
         return $produit;
    }

        public static function afficherProduits(array $produits): void
        {
            foreach ($produits as $produit) {
                echo $produit . "\n";
            }
        }

         public static function saisirCategory(): CategorieEntity
    {
        $categorie = new CategorieEntity();
         $code = readline("Enter category code: ");
         $nom = readline("Enter category name: ");
         $categorie->setNom($nom);
         $categorie->setCode($code);
         return $categorie;
    }

        public static function afficherCategories(array $categories): void
        {
            foreach ($categories as $categorie) {
                echo $categorie . "\n";
            }
        }
}