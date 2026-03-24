<?php 
require_once dirname(__DIR__)."/entity/InfoConnexion.php";
class AuthentificationView{
     private function __construct()
    {
       
    }
     public static function  sasieInfoConnexion( ):InfoConnexion 
     {
        $login=readLine("Entrer le Login: ");
        $password=readLine("Entrer le Password: ");
        $info =new InfoConnexion($login,$password);
        return $info;
        
     }
}