
  <nav class="navbar navbar-expand-sm navbar-light bg-dark">
                     <div class="container-fluid">
                         <a class="navbar-brand text-white" href="#">Gestion Stock</a>
                         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                             aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                             <span class="navbar-toggler-icon"></span>
                         </button>
                         <div class="collapse navbar-collapse" id="navbarID">
                             <div class="navbar-nav">
                                 <a class="nav-link active text-white"  aria-current="page" href="<?php echo WEBROOT; ?>/categorie/index">Categories</a>
                                 
                             </div>

                              <div class="navbar-nav">
                                 <a class="nav-link active  text-white" aria-current="page" href="<?php echo WEBROOT; ?>/produit/list">Produits</a>
                                 
                             </div>
                             <?php if($_SESSION['user']->getRole()=='GESTIONNAIRE'): ?>
                               <div class="navbar-nav">
                                 <a class="nav-link active  text-white" aria-current="page" href="<?php echo WEBROOT; ?>/commande/form">Nouvelle Commande</a>
                               </div>
                            <?php endif ?>


                         </div>
                         
                     </div>
                       <div class="collapse navbar-collapse float-end mr-1" >
                                <a class="nav-link active  text-white" aria-current="page" href="<?php echo WEBROOT; ?>/auth/logout">Deconnexion</a>
                       </div>
   </nav>