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
           //require_once dirname(dirname(__DIR__))."/Pages/produit/list.produit.php";
            $this->render("produit/list.produit.php",$produits);
       }

          public function loadForm(){
           
          //  require_once dirname(dirname(__DIR__))."/Pages/produit/add.produit.php";
            $categories = CategorieService::listerCategories();
            $this->render("produit/add.produit.php",$categories);
          }

           public function createProduit(){
              $code=$_POST['code'];
              $libelle=$_POST['libelle'];
              $categorieId=$_POST['categorieId'];
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