<?php
namespace App\Repositoty;
use App\Entity\ProduitEntity;

final class ProduitRepository
{
    private static string $tableName= "produits";
    private function __construct()
    {
        throw new \Exception('Not implemented');
    }

    public static function insert(ProduitEntity $produit): int
    {
        $code = $produit->getCode();
        $libelle = $produit->getLibelle();
        $categorie_id=$produit->getCategorie()->getId();
        $sql = "INSERT INTO " . self::$tableName . " (libelle, code,categorie_id) VALUES ('$libelle', '$code',$categorie_id)";
       //Connexion  au SGBD et Selection de la base de données
         $hote= "127.0.0.1";
         $port= "8889";
         $userMysql= "root";
         $passwordMysql= "root";
         $bdName= "gestion_commerciale_glrsb_2026";
        
           try {
             //1-Conexion a la base de données
             $pdo = new \PDO("mysql:host=$hote;port=$port;dbname=$bdName", $userMysql, $passwordMysql);
             //2-Executer la requete SQL
             $result = $pdo->exec($sql);
             return $result;
           } catch (\PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
             return 0;
           }
        
    }

    public static function selectAll(): array
    {
            $sql = "SELECT * FROM " . self::$tableName;
            //Connexion  au SGBD et Selection de la base de données
            $hote= "127.0.0.1";
            $port= "8889";
            $userMysql= "root";
            $passwordMysql= "root";
            $bdName= "gestion_commerciale_glrsb_2026";
           try {
             //1-Conexion a la base de données
             $pdo = new \PDO("mysql:host=$hote;port=$port;dbname=$bdName", $userMysql, $passwordMysql);
             //2-Executer la requete SQL
                //stmt : represent le resultat de la requete SQL
                 $stmt = $pdo->query($sql);
                 $produits = [];
                 $stmt = $pdo->query($sql);
                 $stmt = $pdo->query($sql);
                 //fetch : permet de parcourir le $stmt 
                  //\PDO::FETCH_ASSOC : retourne les résultats sous forme de tableau associatif,
                     //chaque lige ['code'=>'CAT001','nom'=>'Informatique',id=>1] 
                  //\PDO::FETCH_NUM : retourne les résultats sous forme de tableau numérique,
                    //chaque ligne [0=>'CAT001',1=>'Informatique',2=>1]
                  //\PDO::FETCH_OBJ : retourne les résultats sous forme d'objets anonymes
                  //chaque ligne $row->code, $row->nom, $row->id
                  //\PDO::FETCH_BOTH : retourne les résultats à la fois sous forme de tableau associatif et numérique (par défaut).
                     //Chaque ligne ['code'=>'CAT001',1=>'Informatique',0=>'CAT001', 'nom'=>'Informatique',2=>1,'id'=>1]
             while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
               $produit = new ProduitEntity();
               $produit->setId($row->id);
               $produit->setLibelle($row->libelle);
               $produit->setCode($row->code);
               $produit->setCategorieId($row->categorie_id);
               $produits[] = $produit;
             }

                return $produits;
           } catch (\PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
               return [];
           }
        
    }





   
}