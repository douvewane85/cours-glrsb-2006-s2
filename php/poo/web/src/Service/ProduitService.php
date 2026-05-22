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
         $produitRepository=new ProduitRepository();
         return  $produitRepository->insert($produit) > 0;
    } 
    
    public static function listerProduits(): array
    {
         $produitRepository=new ProduitRepository();
        return  $produitRepository->selectAll();
    }

  
    
}