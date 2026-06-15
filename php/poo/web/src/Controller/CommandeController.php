<?php 
namespace App\Controller;

use App\Core\Controller;
use App\Entity\ClientEntity;
use App\Entity\CommandeEntity;
use App\Entity\LigneCommande;
use App\Service\ClientService;
use App\Service\CommandeService;
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
                    //$_SESSION['commande']=new Commande();
                    $_SESSION['client']=new ClientEntity();
                    $_SESSION['panier']=[];
                    $_SESSION['total']=0;
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
                    //Transaction(ACID)
                       //-Atomicité (Atomicity)
                       //-Cohérence (Consistency)
                       //Isolation (Isolation)
                       //Durabilité (Durability)
                          //Tous Passe ==> COMMIT
                          //Une Erreur ==> RollBack (Effacer toutes les insersions deja effectuees)
                         //Commandes (insert ...)
                            $dateCommande=trim($_POST['dateCommande'])??'';
                            $etatCommande=trim($_POST['etat'])??'';
                            $total= $_SESSION['total'];
                         //Lignes de Commandes  (insert ...)
                            $panier= $_SESSION['panier'];
                          //client
                            $client= $_SESSION['client'];
                          //Validation
                             //Date est obligatoire et depasse pas la date du jour
                             //Etat est obligatoire est est (Paye,Impaye )
                             //Le panier contient au moins un produit
                      //Enregistrement de la commande 
                          $commande =new CommandeEntity(
                              $client, 
                              $dateCommande, 
                              $etatCommande,
                              $total,
                              $panier
                          );
                         // dd($commande);
                         $result= CommandeService::faireCommande($commande);
                         if ($result) {
                         
                              $_SESSION['statusFormClient']="disabled";
                              $_SESSION['statusFormCommande']="disabled";
                              //$_SESSION['commande']=new Commande();
                              $_SESSION['client']=new ClientEntity();
                              $_SESSION['panier']=[];
                              $_SESSION['total']=0;
                             
                         }else{
                           
                          }
                          $this->redirectUrl("commande/form");
                        # code...
                }elseif ($_POST['btnAction']=="ADD_PRODUIT_CMDE") {
                   
                //Validation du Panier de commande
                     //Le prix Reel et quantite cmde sont obligatoire
                     // prix Reel>= au prix du produit
                     // quantite cmde <= qteStock
                //Regle Gestion
                   //RG1: 
                       //Un produit es ajouter une seule fois dans le panier dans le cas d'un 2ieme ajout
                       //on met a jour le prix et la qtecmde

                  $produitId=trim($_POST['produitId']);
                  $qteCmde=trim($_POST['qte'])??'0';
                  $prixReel=trim($_POST['prix'])??'0';
                  $ligneCmde=new LigneCommande();
                  $ligneCmde->setPrixReel($prixReel);
                  $ligneCmde->setQteCmde( $qteCmde);
                  $produit=ProduitService::recupererProduitParId($produitId);
                  $ligneCmde->setProduit($produit);
                  $_SESSION['panier'][]= $ligneCmde;
                  $_SESSION['total']= $_SESSION['total']+ $ligneCmde->getMontant();
              
                }
                    $this->redirectUrl("commande/form");
           
            }

}