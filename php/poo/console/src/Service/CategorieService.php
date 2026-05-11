<?php 
namespace App\Service;

use App\Entity\CategorieEntity;

final class CategorieService
{
    private static array $categories = [];
    private function __construct()
    {
        throw new \Exception('Not implemented');
    }

    public static  function  addCategorie(CategorieEntity $categorie): void
    {
        self::$categories[] = $categorie;
    } 
    
    public static function getCategories(): array
    {
        return self::$categories;
    }

  
    
}