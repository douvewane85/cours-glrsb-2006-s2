<?php 
namespace App\Controller;

use App\Core\Controller;
use App\Service\ClientService;

class CommandeController extends Controller{

        public function __construct()
        {
          return parent::__construct();
        }
   
       public function loadForm(){
               $this->render("commande/add.commande.php");
       }

       public function searchClient(){
             $telephone=$_POST['telephone'] ?? "";
             $client= ClientService::rechercherClientParTel($telephone);
             if($client!=null){
                  $_SESSION['client']=$client;
                  $_SESSION['statusFormClient']="disabled";
                  $this->redirectUrl("commande/form");
             }else{
                  $_SESSION['statusFormClient']="";
           
                  $_SESSION['client']=null;
                 $this->redirectUrl("commande/form");
             }
       }

}