 <?php require_once(dirname(__DIR__)) ."/layout/header.partial.php"?>

    <body style="background-color: whitesmoke;">
        <header>
                 <?php require_once(dirname(__DIR__)) ."/layout/nav.partial.php"?>
        </header>
        <main>
           <div class="container mt-5 pt-5 shadow p-3 mb-5 bg-body rounded">
               <div class="my-2 d-flex ">
                <a
                 name=""
                 id=""
                 class="col-1 btn btn-outline-dark  ms-auto"
                 href="<?php echo WEBROOT; ?>/produit/form"
                 role="button"
                >Nouveau</a
               >
            </div>
               
              <div class="card">
                <div class="card-header">Liste des Produits</div>
                <div class="card-body ">
                    <div
                        class="table-responsive"
                    >
                        <table
                            class="table table-light"
                        >
                            <thead>
                                <tr>
                                   
                                    <th scope="col">Code</th>
                                    <th scope="col">LIBELLE</th>
                                     <th scope="col">PRIX</th>
                                     <th scope="col">QUANTITE STOCK</th>
                                     <th scope="col">MONTANT STOCK</th>
                                     <th scope="col">CATEGORIE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 $viewData=$viewData['produits']??[];
                                 foreach ($viewData as $key => $produit):
                                ?>
                                <tr class="">
                                       <td><?php echo  $produit->getCode()?> </td>
                                       <td><?php echo  $produit->getLibelle()?></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td><?php echo  $produit->getCategorie()->getNom()?></td>
                                </tr>
                                <?php 
                                  endforeach
                                ?>
                               
                               
                            </tbody>
                        </table>
                    </div>
                    
                </div>
               
              </div>
           </div>  

        </main>
            <?php require_once(dirname(__DIR__)) ."/layout/footer.partial.php"?>
    </body>
</html>
