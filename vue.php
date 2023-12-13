<?php
class vue {
    private function entete(){
        //header
        include("./vues/navbar.php");
    }

    private function pied(){
        //footer
        //fixed-bottom
        ?> 
<div class="container mt-auto">
  <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
    <div class="col mb-3">
      <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <p class="text-body-secondary">AimelRex & AmeEtYuki©2023</p>
    </div>

    <div class="col mb-3">

    </div>

    <div class="col mb-3">
      <h5>FAQ</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Comment reserver</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Afficher son bien</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Payement (loueur)</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Payement (vendeur)</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Gestion du compte</a></li>
      </ul>
    </div>

    <div class="col mb-3">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
      </ul>
    </div>

    <div class="col mb-3">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
      </ul>
    </div>
  </footer>
</div>
    </body>
        <?php
    }

    public function accueil($lesBiens){
        //accueil
        $this->entete();
        ?>
        ICI PEUT ETRE PRESENTATION DU PROJET
        <div class="d-flex flex-wrap align-items-center justify-content-center" >
        <?php
        //var_dump($lesBiens);
        foreach($lesBiens as $bien){
            
            ?>
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top">
                <div class="card-body">
                    <p class="card-text"><?php $bien["description"] ?></p>
                    <?php echo "<a href='/?action=showBien&idBien=".$bien["id"]."' class='btn btn-primary'>Consulter</a><br>"; ?>
                </div>
            </div>
            
            <?php
        }
        echo"</div>";
        $this->pied();
    }

    public function erreur404(){
        //404
        $this->entete();
        ?>
        ERREUR 404
        <?php
        $this->pied();
    }

    public function pageInscription($message = []) {
        $this->entete();
        
        ?>
        <style>
            .btn-login {
                font-size: 0.9rem;
                letter-spacing: 0.05rem;
                padding: 0.75rem 1rem;
            }

            .btn-google {
                color: white !important;
                background-color: #ea4335;
            }

            .btn-facebook {
                color: white !important;
                background-color: #3b5998;
            }
            .separetoimerde {
                margin-top:500px;
            }
            
        </style>
        <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Connexion</h5>
            <form action="?action=inscription" method="POST">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="login" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Nom d'utilisateur*</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="mot de passe">
                <label for="floatingPassword">Mot de passe*</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password2" id="floatingPassword" placeholder="mot de passe (confirmation)">
                <label for="floatingPassword">Mot de passe (confirmez)*</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="Nom" placeholder="Marie-Jean">
                <label for="floatingInput">Nom</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="Prenom" placeholder="LeStylo">
                <label for="floatingInput">Prenom</label>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck" name="cgu">
                <label class="form-check-label" for="rememberPasswordCheck">
                    J'accepte les CGU
                </label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="ok">
                    S'inscrire
                  </button>
              </div>
              <?php
              if(count($message) != 0) {
                    echo '<hr class="my-4">';
                    for($i = 0; count($message) > $i; $i++) {
                        echo "<div class='alert alert-danger' role='alert'>".$message[$i]."</div>";
                    }  
                    
                    } 
                    ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
        <?php
        $this->pied();
    }


    public function pageBien($infos, $message = null){
        $this->entete();
        include("./vues/pageBien.php");
        $this->pied();
    }

    public function pageConnexion($message = []) {
        $this->entete();
        ?>
                <style>
            .btn-login {
                font-size: 0.9rem;
                letter-spacing: 0.05rem;
                padding: 0.75rem 1rem;
            }

            .btn-google {
                color: white !important;
                background-color: #ea4335;
            }

            .btn-facebook {
                color: white !important;
                background-color: #3b5998;
            }
        </style>
        <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Connexion</h5>
            <form action="?action=connexion" method="POST">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="login" placeholder="name@example.com">
                <label for="floatingInput">Nom d'utilisateur</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="motdepasse" placeholder="Password">
                <label for="floatingPassword">Mot de passe</label>
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                <label class="form-check-label" for="rememberPasswordCheck">
                    Se souvenir de moi via un cookie.
                </label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="ok">
                    Se connecter
                  </button>
              </div>
              <?php
              if(count($message) != 0) {
                    echo '<hr class="my-4">';
                    for($i = 0; count($message) > $i; $i++) {
                        echo "<div class='alert alert-danger' role='alert'>".$message[$i]."</div>";
                    }

                    }
                    ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  $this->pied();
    }
} 
?>