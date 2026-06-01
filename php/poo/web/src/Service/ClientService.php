<?php 
namespace App\Service;

use App\Entity\ClientEntity;
use App\Repositoty\ClientRepository;

final class ClientService
{
    private function __construct()
    {
        throw new \Exception('Not implemented');
    }
    public static  function  ajouterClient(ClientEntity $client): bool
    {
          $clientRepository=new ClientRepository();
         return  $clientRepository->insert($client) > 0;
    } 
    public static function rechercherClientParTel(string $telephone): ?ClientEntity
    {
          $clientRepository=new ClientRepository();
          return  $clientRepository->selectByTelephone($telephone);
    }
   

  
    
}