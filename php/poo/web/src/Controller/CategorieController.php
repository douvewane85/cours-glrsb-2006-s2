<?php 
namespace App\Controller;

use App\Core\Controller;
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
            $this->render("categorie/index.php",$categories);
       }



           public function createCategorie(){
              $code=$_POST['code'];
              $nom=$_POST['nom'];
              $categorie=new CategorieEntity();
              $categorie->setCode($code);
              $categorie->setNom($nom);
              $bool= CategorieService::ajouterCategorie($categorie);
             // header("location:http://localhost:8000/categorie/list");
             // exit;
             $this->redirectUrl("categorie/list");

          }

           
} 