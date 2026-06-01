 <?php require_once(dirname(__DIR__)) ."/layout/header.partial.php"?>

    <body style="background-color: whitesmoke;">
        <header>
              <?php require_once(dirname(__DIR__)) ."/layout/nav.partial.php"?>
        </header>
        <main>
        <div class="container pt-5">
            <?php 
                  
                $errors=$viewData['errors'] ??[] ;
                $old=$viewData['old'] ?? [];
                 
             
            ?>
             <form action="http://localhost:8000/categorie/add" method="POST" class="d-flex gap-3 shadow p-3 mb-5 bg-body rounded">
                <div class="col ">
                    <div class="mb-3">
                        <label for="" class="form-label">Code</label>
                        <input
                            type="text"
                            name="code"
                            id=""
                            value="<?php  echo isset($errors['code']) ? '' :$old['code']??'' ?>"
                            class="form-control  <?php  echo isset($errors['code'])?'is-invalid':''; ?>"
                            placeholder=""
                            aria-describedby="helpId"
                        />
                        <small id="helpId" class="invalid-feedback"
                            ><?php echo $errors['code']??''; ?></small
                        >
                    </div>
                </div>
                 <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Nom</label>
                        <input
                            type="text"
                            name="nom"
                            id=""
                            value="<?php echo isset($errors['nom'])? '' :$old['nom']??''; ?>"
                            class="form-control   <?php  echo isset($errors['nom'])? 'is-invalid' :''; ?>"
                            placeholder=""
                            aria-describedby="helpId"
                        />
                        <small id="helpId" class="invalid-feedback"
                            ><?php echo $errors['nom']??''; ?></small
                        >
                    </div>
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

             
             
              <div class="card">
                <div class="card-header">Liste des Categories</div>
                <div class="card-body ">
                    <div
                        class="table-responsive"
                    >
                        <table
                            class="table table-light"
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
                                 $viewData=$viewData['data']??[];
                                 foreach ($viewData as  $categorie):
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
          <?php require_once(dirname(__DIR__)) ."/layout/footer.partial.php"?>
    </body>
</html>
