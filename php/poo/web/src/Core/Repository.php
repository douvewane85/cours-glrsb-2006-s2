<?php
namespace App\Core;
abstract class Repository{
     protected \PDO|null $pdo=null ;
     protected  string $tableName;
     protected  string $classeName;
     //NomClasse::class  ==> \NameSpace\NomClasse
     //Exemple : Repository::class =>App\Core\Repository
    protected function __construct()
    {
         $this->openConnexion();
    }
     protected function openConnexion():void{
         $hote= "127.0.0.1";
         $port= "8889";
         $userMysql= "root";
         $passwordMysql= "root";
         $bdName= "gestion_commerciale_glrsb_2026";
           try {
             //1-Conexion a la base de données
                if($this->pdo==null){
                  $this->pdo = new \PDO("mysql:host=$hote;port=$port;dbname=$bdName", $userMysql, $passwordMysql);
                }
              
           } catch (\PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
             
           } 
     }
      protected function closeConnexion(){
             $this->pdo=null;
      }

       public  function selectAll(): array
       {
           try {
                  $sql = "SELECT * FROM " . $this->tableName;
                  $stm= $this->pdo->prepare($sql);
                  $stm->execute();
                  $this->closeConnexion();
                   return    $stm->fetchAll(\PDO::FETCH_CLASS,$this->classeName);
             } catch (\PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                   return [];
              }  
     }

     
}