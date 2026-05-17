<?php 
namespace App\Service;

use App\Entity\ProduitEntity;
use App\Repositoty\ProduitRepository;

final class ProduitService
{
    private function __construct()
    {
        throw new \Exception('Not implemented');
    }

    public static  function  ajouterProduit(ProduitEntity $produit): bool
    {
       return ProduitRepository::insert($produit) > 0;
    } 
    
    public static function listerProduits(): array
    {
       return ProduitRepository::selectAll();
    }

  
    
}