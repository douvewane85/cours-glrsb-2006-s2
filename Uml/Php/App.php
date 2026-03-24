<?php 

require_once __DIR__."/entity/InfoConnexion.php";
require_once __DIR__."/entity/Role.php";
require_once __DIR__."/services/ConnexionService.php";
require_once __DIR__."/views/AdminView.php";
require_once __DIR__."/views/AuthentificationView.php";
require_once __DIR__."/views/ClientView.php";
class App{
    private function __construct()
    {
       
    }
    public static function   main():void {
          ConnexionService::initialize();
          do {
             $info=AuthentificationView::sasieInfoConnexion();
             $info= ConnexionService::seConnecter($info->getLogin(),$info->getPassword());
             if ($info==null) {
              echo "Login ou mot de passe incorrect\n";
             }
          } while ($info==null);
         
         
      
              if ($info->getRole()==Role::CLIENT) {
                  ClientView::afficherMenuPrincipal($info);
              }else{
                  AdminView::afficherMenuPrincipal($info);
              }
       

    }


}
 App::main();