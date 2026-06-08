 <?php require_once(dirname(__DIR__)) ."/layout/header.partial.php"?>
    <body style="background-color: whitesmoke;">
        <header>
                 <?php require_once(dirname(__DIR__)) ."/layout/nav.partial.php"?>
        </header>
        <main>
           <div class="container mt-5 pt-5 shadow p-3 mb-5 bg-body rounded">
              <div class="card">
                <div class="card-header">Enregistrer un Nouveau Produit</div>
                <div class="card-body ">
            <?php 
                  
                $errors=$viewData['errors'] ??[] ;
                $old=$viewData['old'] ?? []; 
             
            ?>
            <form action="<?php echo WEBROOT; ?>/produit/add" method="POST" class="">
                <div class="col ">
                    <div class="mb-3">
                        <label for="" class="form-label">Code</label>
                        <input
                            type="text"
                            name="code"
                            value="<?php  echo isset($errors['code']) ? '' :$old['code']??'' ?>"
                            id=""
                            class="form-control <?php  echo isset($errors['code'])?'is-invalid':''; ?>"
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
                        <label for="" class="form-label">Libelle</label>
                        <input
                            type="text"
                            name="libelle"
                            id=""
                            value="<?php  echo isset($errors['libelle']) ? '' :$old['libelle']??'' ?>"
                            class="form-control  <?php  echo isset($errors['libelle'])?'is-invalid':''; ?>"
                            placeholder=""
                            aria-describedby="helpId"
                        />
                        <small id="helpId" class="invalid-feedback"
                            ><?php echo $errors['libelle']??''; ?></small
                         >
                    </div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Categorie</label>
                    <select
                        class="form-select form-select-md <?php  echo isset($errors['categorieId'])?'is-invalid':''; ?>"
                        name="categorieId"
                        id=""
                    >
                        <option  value="0"> Choisir une categorie </option>
                        <?php 
                         $categories=$viewData['categories']??[];
                        foreach ($categories as $key => $categorie):?>
                           <option <?php  echo isset($errors['categorieId']) ? '' :($old['categorieId']==$categorie->getId()?'selected':'') ?>  value="<?php echo $categorie->getId()?> "><?php echo $categorie->getNom()?> </option>
                           <?php
                            endforeach
                        ?>
                    </select>
                    <small id="helpId" class="invalid-feedback"
                            ><?php echo $errors['categorieId']??''; ?></small
                        >
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
            <?php require_once(dirname(__DIR__)) ."/layout/footer.partial.php"?>
    </body>
</html>
