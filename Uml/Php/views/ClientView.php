<?php 
require_once dirname(__DIR__)."/entity/InfoConnexion.php";
class ClientView{
     private function __construct()
    {
       
    }
     public static function  afficherMenuPrincipal(InfoConnexion $info):void 
     {
           echo "Menu Client";
     }
}