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
                 <nav class="navbar navbar-expand-sm navbar-light bg-primary">
                     <div class="container-fluid">
                         <a class="navbar-brand" href="#">Gestion Stock</a>
                         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                             aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                             <span class="navbar-toggler-icon"></span>
                         </button>
                         <div class="collapse navbar-collapse" id="navbarID">
                             <div class="navbar-nav">
                                 <a class="nav-link active text-white"  aria-current="page" href="#">Categories</a>
                                 
                             </div>

                              <div class="navbar-nav">
                                 <a class="nav-link active  text-white" aria-current="page" href="#">Produits</a>
                                 
                             </div>
                         </div>
                     </div>
                 </nav>
        </header>
        <main>
        <div class="container pt-5">
             <form class="d-flex gap-3 shadow p-3 mb-5 bg-body rounded">
                <div class="col ">
                    <div class="mb-3">
                        <label for="" class="form-label">Code</label>
                        <input
                            type="text"
                            name=""
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
                        <label for="" class="form-label">Nom</label>
                        <input
                            type="text"
                            name=""
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
                         <button
                            type="submit"
                            class="btn btn-primary "
                            style="margin-top: 30px;"
                         >
                            Enregistrer
                         </button>
                    </div>
                </div>
             </form>
             
              <div class="card">
                <div class="card-header">Liste des Categories</div>
                <div class="card-body ">
                    <div
                        class="table-responsive"
                    >
                        <table
                            class="table table-primary"
                        >
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Nom</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 $categories=$categories??[];
                                 foreach ($categories as  $categorie):
                                ?>
                                <tr class="">
                                    <td scope="row"><?php echo  $categorie->getId() ?></td>
                                    <td><?php echo  $categorie->getCode() ?></td>
                                    <td><?php echo  $categorie->getNom() ?></td>
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
