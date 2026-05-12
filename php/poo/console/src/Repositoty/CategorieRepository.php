<?php
namespace App\Repositoty;
use App\Entity\CategorieEntity;

//Etablissement de la connexion
       /*
          Classe de connexion à la base de données
            - PDO (PHP Data Objects) : C'est une extension de PHP qui fournit 
              une interface pour accéder à différents SGBD. 
              Elle prend en charge plusieurs types de SGBD,
              y compris MySQL, PostgreSQL, SQLite, etc. 
              PDO offre une abstraction de la base de données, 
              ce qui signifie que vous pouvez changer de base de données sans modifier votre code.
            - MySQLi (MySQL Improved) : C'est une extension spécifique à MySQL

            -Choix PDO:
              - Abstraction de la base de données : PDO permet de changer de SGBD sans modifier le code, ce qui facilite la portabilité.
              - Sécurité : PDO prend en charge les requêtes préparées, ce qui aide à prévenir les attaques par injection SQL.
              - Fonctionnalités avancées : PDO offre des fonctionnalités avancées telles que les transactions, les curseurs, etc.

            -Utilisation de PDO pour se connecter à la base de données MySQL :
                a-Creer une instance de PDO en fournissant les informations de connexion 
                   (hôte, port, nom d'utilisateur, mot de passe, nom de la base de données).
                    => Genere une connection a la base de données .
                b-Executer la requete SQL:
                    - Utiliser la méthode exec() pour les requêtes qui ne retournent pas de résultats (INSERT, UPDATE, DELETE).
                    - Utiliser la méthode query() pour les requêtes qui retournent des résultats (SELECT).
                    - Utiliser les requêtes préparées pour les requêtes avec des paramètres afin d'améliorer la sécurité et les performances.
                c-Fermer la connexion : La connexion à la base de données est automatiquement 
                   fermée lorsque l'objet PDO est détruit, mais vous pouvez également la fermer 
                    explicitement en définissant l'objet PDO sur null. 
       
       */
    // \:represente le namespace global, ce qui signifie que nous utilisons la classe PDO de l'espace de noms global.
final class CategorieRepository
{
    private static string $tableName= "categories";
    private function __construct()
    {
        throw new \Exception('Not implemented');
    }

    public static function insert(CategorieEntity $categorie): int
    {
        $code = $categorie->getCode();
        $nom = $categorie->getNom();
        $sql = "INSERT INTO " . self::$tableName . " (nom, code) VALUES ('$nom', '$code')";
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
                 $categories = [];
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
              $categorie = new CategorieEntity();
              $categorie->setId($row->id);
              $categorie->setNom($row->nom);
              $categorie->setCode($row->code);
              $categories[] = $categorie;
             }

                return $categories;
           } catch (\PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
               return [];
           }
        
    }





   
}