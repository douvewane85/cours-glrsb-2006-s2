<?php 
namespace App\View;

use App\Entity\CategorieEntity;

final class AdminView
{
   
    private  function __construct()
    {
        echo "AdminView class instantiated.\n";
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