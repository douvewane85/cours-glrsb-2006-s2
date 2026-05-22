<?php 
namespace App\Service;

use App\Entity\CategorieEntity;
use App\Repositoty\CategorieRepository;

final class CategorieService
{
    private function __construct()
    {
        throw new \Exception('Not implemented');
    }
    public static  function  ajouterCategorie(CategorieEntity $categorie): bool
    {
          $cateRepository=new CategorieRepository();
         return  $cateRepository->insert($categorie) > 0;
    } 
    public static function listerCategories(): array
    {
          $cateRepository=new CategorieRepository();
          return $cateRepository->selectAll();
    }

  
    
}