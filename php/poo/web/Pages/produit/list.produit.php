<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

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
                 href="http://localhost:8000/produit/form"
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
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
