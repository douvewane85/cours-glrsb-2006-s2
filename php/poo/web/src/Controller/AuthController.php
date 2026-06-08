<?php 
namespace App\Controller;

use App\Core\Controller;
use App\Core\Validator;
use App\Service\UserService;

class AuthController extends Controller{

        
        public function __construct()
        {
          return parent::__construct();
        }
   
    public function login():void{
        $errors=[];
        if($_SERVER["REQUEST_METHOD"]=="POST"){
          $login=trim($_POST['login'])??'';
          $passwordClair=trim($_POST['password'])??'';
          //Seconnecter =Authentification + Autorisation
          //1-Authentification 
            $userConnect=  UserService::seConnecter($login);
            $passwordCrypter= $passwordClair;
            if ($userConnect!=null && $userConnect->getPassword()== $passwordCrypter ) {
                  //2- Autorisation
                    $_SESSION['user']=$userConnect;
                    $this->redirectUrl('categorie/index');
              exit;
            }else{
              $errors['error_connection']="Login ou password incorrect";
            }
        }

        $this-> render("auth/form.login.php",[
            "errors"=>$errors
        ]);

    }

    public function logout():void{
           unset($_SESSION['user']);
           session_destroy();
          $this->redirectUrl('auth/login');
    }

           
} 