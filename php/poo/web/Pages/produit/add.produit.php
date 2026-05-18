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
              <div class="card">
                <div class="card-header">Enregistrer un Nouveau Produit</div>
                <div class="card-body ">
                     <form action="http://localhost:8000/produit/add" method="POST" class="">
                <div class="col ">
                    <div class="mb-3">
                        <label for="" class="form-label">Code</label>
                        <input
                            type="text"
                            name="code"
                            id=""
                            class="form-control"
                            placeholder=""
                            aria-describedby="helpId"
                        />
                        <small id="helpId" class="text-body-secondary"
                            >Help text</small
                        >
                    </div>
                </div>
                 <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Libelle</label>
                        <input
                            type="text"
                            name="libelle"
                            id=""
                         
                            class="form-control"
                            placeholder=""
                            aria-describedby="helpId"
                        />
                        <small id="helpId" class="text-body-secondary"
                            >Help text</small
                        >
                    </div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Categorie</label>
                    <select
                        class="form-select form-select-md"
                        name="categorieId"
                        id=""
                    >
                        <option selected value="0"> Select one</option>
                        <?php 
                         $categories=$viewData??[];
                        foreach ($categories as $key => $categorie):?>
                           <option value="<?php echo $categorie->getId()?> "><?php echo $categorie->getNom()?> </option>
                           <?php
                            endforeach
                        ?>
                    </select>
                </div>
                
                <div class="col">
                    <div class="mb-3">
                         <button
                            type="submit"
                            class="btn btn-dark"
                            style="margin-top: 30px;"
                         >
                            Enregistrer
                         </button>
                    </div>
                </div>
             </form>
               
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
