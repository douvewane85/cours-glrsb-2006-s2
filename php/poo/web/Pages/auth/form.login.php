 <?php require_once(dirname(__DIR__)) ."/layout/header.partial.php"?>
    <body style="background-color: whitesmoke;">
        <header>
            
        </header>
        <main>
           <div class="container mt-5 pt-5 shadow p-3 mb-5 bg-body rounded w-50">
              <div class="card">
                <div class="card-body ">
            <?php 
                  
                $errors=$viewData['errors'] ??[] ;
    
            ?>
            <form action="<?php echo WEBROOT; ?>/auth/login" method="POST" class="">
                <?php if(isset($errors['error_connection'])): ?>
                    <div
                        class="alert alert-danger"
                        role="alert"
                    >
                        <?php echo $errors['error_connection'] ?>
                    </div>
                <?php endif ?>

                <div class="col ">
                    <div class="mb-3">
                        <label for="" class="form-label">Login</label>
                        <input
                            type="text"
                            name="login"
                            value=""
                            id=""
                            class="form-control "
                            placeholder=""
                            aria-describedby="helpId"
                        />
                       
                    </div>
                </div>
                 <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input
                            type="password"
                            name="password"
                            id=""
                            value=""
                            class="form-control "
                            placeholder=""
                            aria-describedby="helpId"
                        />
                        
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                         <button
                            type="submit"
                            class="btn btn-dark"
                            style="margin-top: 30px;"
                         >
                            Se Connecter
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
