<?php 
namespace App\Controller;

use App\Core\Controller;
use App\Entity\CategorieEntity;
use App\Entity\ProduitEntity;
use App\Service\CategorieService;
use App\Service\ProduitService;

class ProduitController extends Controller{

   
        public function __construct()
        {
          return parent::__construct();
        }
  
       public function showProduits(){
             $produits=ProduitService::listerProduits();
         
            $this->render("produit/list.produit.php",[
                 "produits"=>$produits
              ]);
       }

          public function loadForm(){
           
          //  require_once dirname(dirname(__DIR__))."/Pages/produit/add.produit.php";
            $categories = CategorieService::listerCategories();
            $this->render("produit/add.produit.php",[
               "categories" =>$categories,
            ]);
          }

           public function createProduit(){
                 $code=trim($_POST['code']??'');
                 $libelle=trim($_POST['libelle']??'');
                 $categorieId=$_POST['categorieId']??'0';
                $errors=[];
                 
                   if (empty($code)) {
                    $errors['code']= "Le code est obligatoire";
                   }
                  
                //R1:nom es obligatoire et unique

                   if (empty($libelle)) {
                    $errors['libelle']=  "Le Libelle est obligatoire";
                   }

                    if ($categorieId=="0") {
                       $errors['categorieId']=  "Veuillez selectionner un categorie";
                   }

                   if(count($errors)!=0){
                          $categories = CategorieService::listerCategories();
                          $this->render("produit/add.produit.php",[
                               "categories" =>$categories,
                                "errors"=>$errors,
                               "old"=>$_POST
                          ]);
                          return;
                     }



              $produit=new ProduitEntity();
               $produit->setCode( $code);
               $produit->setLibelle($libelle);
                 $categorie =new CategorieEntity();
                 $categorie->setId($categorieId);
               $produit->setCategorie($categorie);
              $bool= ProduitService::ajouterProduit($produit);
              //header("location:http://localhost:8000/produit/list");
              //exit;
                 $this->redirectUrl("produit/list");

          }
} 