<?php
class vue {
    private function entete(){
        //header
        include("./vues/navbar.php");
    }

    private function pied(){
        //footer
        //fixed-bottom
        include("./vues/footer.php");
    }

    public function accueil($lesBiens, $page, $pages){
        //accueil
        $this->entete();
        include("./vues/accueil.php");

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
        include("./vues/pageInscription.php")
        ?>

        <?php
        $this->pied();
    }


    public function pageBien($bien, $photo, $periodeDispo, $periodeReserve, $pieces, $equipements, $message = null){
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
    function gererBiens($idBien,$periodesLibreBien) {
      $this->entete();
      include("./vues/gererBien.php");
      $this->pied();
    }
    function voirPropreBiens($lesBiens, $page, $pages) {
      $this->entete();
      include("./vues/mesBiens.php");
      $this->pied();
    }
} 
?>