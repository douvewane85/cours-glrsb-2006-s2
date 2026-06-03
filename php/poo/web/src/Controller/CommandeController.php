<?php 
namespace App\Controller;

use App\Core\Controller;
use App\Entity\ClientEntity;
use App\Entity\LigneCommande;
use App\Service\ClientService;
use App\Service\ProduitService;

class CommandeController extends Controller{

        public function __construct()
        {
          return parent::__construct();
        }
   
       public function loadForm(){
             //Au chargement de la page
              if (!isset($_SESSION['statusFormClient'])) {
                    $_SESSION['statusFormClient']="disabled";
                    $_SESSION['statusFormCommande']="disabled";
                    $_SESSION['client']=new ClientEntity();
                    $_SESSION['panier']=[];
              }
                $produits=ProduitService::listerProduits();
                $this->render("commande/add.commande.php",[
                      "produits"=>$produits
               ]);
       }

       public function searchClient(){
             $telephone=$_POST['telephone'] ?? "";
             $client= ClientService::rechercherClientParTel($telephone);
             if($client!=null){
                  $_SESSION['client']=$client;
                  $_SESSION['statusFormClient']="disabled";
                  $_SESSION['statusFormCommande']="";
                  $this->redirectUrl("commande/form");
             }else{
                  $_SESSION['statusFormClient']="";
                    $_SESSION['statusFormCommande']="disabled";   
                  $client=new ClientEntity();
                  $client->setTelephone($telephone);
                  $_SESSION['client']=$client;
                  $this->redirectUrl("commande/form");
             }
       }

        public function createClient(){
       
            $telephone= trim($_POST['telephone']) ?? "";
            $nomPrenom= trim($_POST['nomPrenom']) ?? "";
            $adresse=  trim($_POST['adresse']) ?? "";
            //Validation
                $client=new ClientEntity();
              
                $client->setTelephone($telephone);
                $client->setNomPrenom($nomPrenom);
                $client->setAdresse($adresse);
                $result=ClientService::ajouterClient($client);
                if ($result) {
                    $_SESSION['client']=$client; 
                    $_SESSION['statusFormClient']="disabled"; 
                    $_SESSION['statusFormCommande']="";   
                }
                
                $this->redirectUrl("commande/form");


        }

            public function  addCommande(){
                if ($_POST['btnAction']=="ADD_CMDE") {
      
                
                        # code...
                }elseif ($_POST['btnAction']=="ADD_PRODUIT_CMDE") {
                   
                //Validation
                  //Prix

                  $produitId=trim($_POST['produitId']);
                  $qteCmde=trim($_POST['qte'])??'0';
                  $prixReel=trim($_POST['prix'])??'0';
                  $ligneCmde=new LigneCommande();
                  $ligneCmde->setPrixReel($prixReel);
                  $ligneCmde->setQteCmde( $qteCmde);
                  $produit=ProduitService::recupererProduitParId($produitId);
                  $ligneCmde->setProduit($produit);
                  $_SESSION['panier'][]= $ligneCmde;

              
                }
                    $this->redirectUrl("commande/form");
           
            }

}