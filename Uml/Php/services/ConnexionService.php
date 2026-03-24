<?php 
require_once dirname(__DIR__)."/entity/InfoConnexion.php";
require_once dirname(__DIR__)."/entity/Role.php";
class ConnexionService{

  
  private static array $infosConnexion=[];
private function __construct()
{
   
}
   
    public static function seConnecter(string $login,string $password): ?InfoConnexion{
        foreach (self::$infosConnexion as $info) {
            if ($login==$info->getLogin() && $password==$info->getPassword()) {
                return $info;
            }
        }
           return null;
    }

    public  static function  initialize():void{
         self::$infosConnexion[]= new InfoConnexion("client","client",Role::CLIENT);
         self::$infosConnexion[]= new InfoConnexion("admin","admin",Role::ADMIN);
    }
}