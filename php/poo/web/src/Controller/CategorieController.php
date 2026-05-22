<?php 
namespace App\Controller;

use App\Core\Controller;
use App\Core\Validator;
use App\Entity\CategorieEntity;

use App\Service\CategorieService;


class CategorieController extends Controller{

        
        public function __construct()
        {
          return parent::__construct();
        }
   
  
       public function showCategories(){
            $categories = CategorieService::listerCategories();
            //require_once dirname(dirname(__DIR__))."/Pages/categorie/index.php";
            $this->render("categorie/index.php",[
                           "data" =>$categories
                          ]);
       }
      public function createCategorie(){
                      $code=trim($_POST['code']??'');
                      $nom=trim($_POST['nom']??'');
                      //Valider les donnees 
                       Validator::isEmpty($code,"code","Le code est obligatoire");
                       Validator::isEmpty($nom,"nom","Le nom est obligatoire");
                       if(!Validator::validated()){
                         $categories = CategorieService::listerCategories();
                         //require_once dirname(dirname(__DIR__))."/Pages/categorie/index.php";
                          $this->render("categorie/index.php",[
                           "data" =>$categories,
                           "errors"=>Validator::getErrors(),
                           "old"=>$_POST
                          ]);
                         return;
                       }
                       //$errors=Validator::validated($_POST,["code":"required|unique","nom":"required"])

                           $categorie=new CategorieEntity();
                          $categorie->setCode($code);
                          $categorie->setNom($nom);
                          $bool= CategorieService::ajouterCategorie($categorie);

                        // header("location:http://localhost:8000/categorie/list");
                        // exit;
                        $this->redirectUrl("categorie/list");
            

          }

           
} 