
 <?php require_once(dirname(__DIR__)) ."/layout/header.partial.php"?>
    <body style="background-color: whitesmoke;">
        <header>
                 <?php require_once(dirname(__DIR__)) ."/layout/nav.partial.php"?>
        </header>
        <main>
           <div class="container mt-2 pt-5 ">
              <div class="card">
                <div class="card-header">Enregistrer une Nouvelle Commande</div>
                <div class="card-body ">
            <?php 
                  
                $errors=$viewData['errors'] ??[] ;
                $old=$viewData['old'] ?? []; 
            ?>
             <div class=" row  gap-2 ">
                 
                <div class="col-4 shadow p-3 mb-5 bg-body rounded">
                    
                          <h3>Recherche Client</h3>
                      
                                <form action="<?php echo WEBROOT; ?>/commande/search" method="POST"  class="d-flex gap-2">
                                   
                                      <div class="col ">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Telephone</label>
                                                <input
                                                    type="text"
                                                    name="telephone"
                                                    value=""
                                                    id=""
                                                    class="form-control "
                                                    placeholder=""
                                                    aria-describedby="helpId"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                                <div class="mb-3">
                                                        <button
                                                                type="submit"
                                                                class="btn btn-block btn-dark  w-100"
                                                                style="margin-top: 30px;"
                                                            >
                                                                Rechercher
                                                            </button>
                                                  </div>
                                        </div>
                                       
                                </form>
                      
                       
                     <h3>Informations clients</h3>
                      <form action="<?php echo WEBROOT; ?>/commande/create-client" method="POST" class="">
                        <?php 
                            // afficher le fieldset si le client n'existe pas dans la base de données
                            // sinon le masquer
                            $client=$_SESSION['client'];
                            ?>
                         <fieldset <?php echo $_SESSION['statusFormClient']; ?> class="w-100  gap-2">     
                            <div class="col ">
                                <div class="mb-3">
                                    <label for="" class="form-label">Telephone</label>
                                    <input
                                        type="text"
                                        name="telephone"
                                        value="<?php echo $client->getTelephone()==null ? '' : $client->getTelephone(); ?>"
                                        id=""
                                        class="form-control "
                                        placeholder=""
                                        aria-describedby="helpId"
                                    />
                                    <small id="helpId" class="invalid-feedback"
                                        ></small
                                    >
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nom et Prenom</label>
                                    <input
                                        type="text"
                                        name="nomPrenom"
                                        id=""
                                        value="<?php echo $client->getNomPrenom()==null ? '' : $client->getNomPrenom(); ?>"
                                        class="form-control  "
                                        placeholder=""
                                        aria-describedby="helpId"
                                    />
                                    <small id="helpId" class="invalid-feedback"
                                        ></small
                                    >
                                </div>
                            </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Adresse</label>
                                        <textarea
                                             rows="4"
                                            name="adresse"
                                            id=""
                                           
                                            class="form-control text-align-start "
                                            placeholder=""
                                            aria-describedby="helpId"
                                        >
                                         <?php echo $client->getAdresse()==null ? '' : trim($client->getAdresse()); ?>
                                        </textarea>
                                        <small id="helpId" class="invalid-feedback"
                                            ></small
                                        >
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <button
                                                type="submit"
                                                class="btn btn-block btn-dark  w-100"
                                            
                                            >
                                                Enregistrer
                                            </button>
                                        </div>
                                    </div>
                            </fieldset>
                     </form>
                </div>

              <div class="col shadow p-3 mb-5 bg-body rounded">
                     <h3>Informations de la Commande</h3>
           
                      
                
                             <form action="<?php echo WEBROOT; ?>/commande/add-commande" method="POST" class=" ">
                                <fieldset  <?php echo $_SESSION['statusFormCommande']; ?>  class="w-100  gap-2">  
                                 <div class="row gap-3">
                                    <div class="col-md-5 mb-3">
                                        <label for="" class="form-label">Date Commande</label>
                                        <input
                                            type="date"
                                            name="dateCommande"
                                            value="<?php  echo isset($errors['dateCommande']) ? '' :$old['dateCommande']??'' ?>"
                                            id=""
                                            class="form-control <?php  echo isset($errors['dateCommande'])?'is-invalid':''; ?>"
                                            placeholder=""
                                            aria-describedby="helpId"
                                        />
                                        <small id="helpId" class="invalid-feedback"
                                            ><?php echo $errors['dateCommande']??''; ?></small
                                        >
                                    </div>
                                    <div class="col-md-5 mb-3">
                                            <label for="" class="form-label">Etat Commande</label>
                                            <select
                                                class="form-select form-select-md <?php  echo isset($errors['etat'])?'is-invalid':''; ?>"
                                                name="etat"
                                                id=""
                                            >
                                                <option selected value="IMPAYE">Impaye</option>
                                                <option value="PAYE">Paye</option>
                                            </select>
                                            <small id="helpId" class="invalid-feedback"
                                                ><?php echo $errors['etat']??''; ?></small
                                            >
                                    </div>
                                 </div>
                              
                                <div class="row gap-2">
                                    
                                      <div class="col-md-5 mb-3">
                                            <label for="" class="form-label">Produit Commande</label>
                                            <select
                                                class="form-select form-select-md <?php  echo isset($errors['produit'])?'is-invalid':''; ?>"
                                                name="produitId"
                                                id=""
                                            >
                                             <option selected value="0">Choisir un produit</option>
                                            <?php 
                                                $viewData=$viewData['produits']??[];
                                                foreach ($viewData as $key => $produit):
                                            ?> 
                                                <option selected value="<?php echo $produit->getId();?>"><?php echo $produit;?></option>
                                            <?php endforeach ?>
                                            </select>
                                            <small id="helpId" class="invalid-feedback"
                                                ><?php echo $errors['produit']??''; ?></small
                                            >
                                    </div>
                                        <div class="col-2">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Qte </label>
                                                    <input
                                                        type="text"
                                                        name="qte"
                                                        id=""
                                                        value="<?php  echo isset($errors['qte']) ? '' :$old['qte']??'' ?>"
                                                        class="form-control  <?php  echo isset($errors['qte'])?'is-invalid':''; ?>"
                                                        placeholder=""
                                                        aria-describedby="helpId"
                                                    />
                                                    <small id="helpId" class="invalid-feedback"
                                                        ><?php echo $errors['qte']??''; ?></small
                                                    >
                                                </div>
                                    </div>
                                    <div class="col-2">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Prix</label>
                                                    <input
                                                        type="text"
                                                        name="prix"
                                                        id=""
                                                        value="<?php  echo isset($errors['prix']) ? '' :$old['prix']??'' ?>"
                                                        class="form-control  <?php  echo isset($errors['prix'])?'is-invalid':''; ?>"
                                                        placeholder=""
                                                        aria-describedby="helpId"
                                                    />
                                                    <small id="helpId" class="invalid-feedback"
                                                        ><?php echo $errors['prix']??''; ?></small
                                                    >
                                                </div>
                                    </div>

                                    <div class="col-2">
                                                <div class="mb-3">
                                                    <button
                                                            type="submit"
                                                            class="btn btn-block btn-dark  w-100"
                                                            style="margin-top: 30px;"
                                                                  name="btnAction"
                                                                  value="ADD_PRODUIT_CMDE"
                                                        >
                                                            Ajouter
                                                        </button>
                                             </div>
                                      </div>
                                 </div>
                           

                            <div class="row">
                                    <div class="col">
                                        <div   class="table-responsive">
                                            <table   class="table table-light">
                                                    <thead>
                                                        <tr>
                                                            <th>Produit</th>
                                                            <th>Qte</th>
                                                            <th>Prix</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                           $panier=$_SESSION['panier'];
                                                           foreach ($panier as $key => $ligneCommande):
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $ligneCommande->getProduit()->getLibelle()?> </td>
                                                            <td><?php echo $ligneCommande->getQteCmde() ?></td>
                                                            <td><?php echo $ligneCommande->getPrixReel()  ?> </td>
                                                             <td><?php echo $ligneCommande->getMontant() ?></td>
                                                        </tr>
                                                        <?php 
                                                          endforeach
                                                        ?>
                                                        
                                                    </tbody>

                                            </table>
                                        </div>
                                    </div>
                            </div>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="text-end">Total Commande : <?php echo $_SESSION['total']; ?>  CFA</h4>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                
                                                <button
                                                        type="submit"
                                                        class="btn btn-block btn-dark  w-100"
                                                         name="btnAction"
                                                         value="ADD_CMDE"
                                                    >
                                                        Enregistrer la Commande
                                                    </button>
                                    
                                    </div>
                                </div>

                        

                     </fieldset>
                 </form>    
           </div>
                       
           </div> 
           
        </main>
         <?php require_once(dirname(__DIR__)) ."/layout/footer.partial.php"?>
    </body>
</html>
