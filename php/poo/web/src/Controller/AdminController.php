<?php 
namespace App\Controller;

use App\Service\CategorieService;

class AdminController{
  
       public function showCategories(){
            $categories = CategorieService::listerCategories();
            require_once dirname(dirname(__DIR__))."/Pages/categorie/index.php";
       }
}