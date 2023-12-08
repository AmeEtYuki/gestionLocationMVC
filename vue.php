<?php
class vue {
    private function entete(){
        //header
        ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <body class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ImmoMVC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?action=showBien">Voir les locations</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Chercher</a>
        </li>
      </ul>
      <li class="nav-item dropdown navbar-nav">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?=(isset($_SESSION['userID']))?$_SESSION['userName']:"Compte"?>
            </a>
            <ul class="dropdown-menu">
                <?php 
                if(!isset($_SESSION['userID'])) { ?>
                <li><a class="dropdown-item" href="/?action=inscription">Inscription</a></li>
                <li><a class="dropdown-item" href="/?action=connexion">Connexion</a></li>
                <!--<li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                <?php } else {
                            if ($_SESSION['usrType'] == "Locataire") {
                              ?>
                        <!--<li><a class="dropdown-item" href="#">Mes favoris</a></li>-->
                        <li><a class="dropdown-item" href="">Mes factures</a></li>
                        
                    <?php 
                    }
                    ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="?action=deconnexion">Deconnexion</a></li>
                    <?php 
                  } 
                  ?>
            </ul>
        </li>
      <form class="d-flex" role="search">
      </form>
    </div>
  </div>
</nav>
        <?php
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
        if($message==null){
            //on affiche le bien
            var_dump($infos);
        } else {
            foreach($message as $error){
                //on echo dans un truc rouge warning
            }
        }
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