<?php
class vue{
    private function entete(){
        //header
        ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ImmoVacancyMax</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Acceuil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Voir les locations</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Chercher</a>
        </li>
      </ul>
      <li class="nav-item dropdown navbar-nav">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?=(isset($_SESSION['userID']))?$_SESSION['userName']:"Compte"?>)
            </a>
            <ul class="dropdown-menu">
                <?php if(!isset($_SESSION['userID'])) { ?>
                <li><a class="dropdown-item" href="#">Inscription</a></li>
                <li><a class="dropdown-item" href="#">Connexion</a></li>
                <!--<li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                <?php } else if ($_SESSION['usrTyp'] == 1){ ?>
                        <li><a class="dropdown-item" href="#">Mes favoris</a></li>
                        <li><a class="dropdown-item" href="#">Mes factures</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Deconnexion</a></li>
                    <?php } ?>
                    
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
        ?> 
        footer
        <?php
    }

    public function accueil(){
        //accueil
        $this->entete();
        ?>
        ACCUEIL
        <a href="/?action=inscription">Page inscription</a>
        <?php
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
        
        if(count($message) != 0) {
            echo "<div class='errList'>";
            for($i = 0; count($message) > $i; $i++) {
                echo "<div class='errMsgLogIns'>".$message[$i]."</div><br>";
            }  
            echo "</div>";
        } 
        
        ?>
        <form action="index.php?action=inscription" method="post">
            <input type="text" name="login" id="" placeholder="utilisateur"><br>
            <input type="password" name="password" id="" placeholder="Votre mot de passe"><br>
            <input type="password" name="password2" id="" placeholder="Confirmez votre mot de passe"><br>
            <input type="text" name="Nom" id="" placeholder="Votre nom">
            <input type="text" name="Prenom" id="" placeholder="Votre prenom"><br>
            <input type="submit" value="" name="ok" placeholer=""><br>
        </form>
        <?php
        $this->pied();
    }


    public function pageBien($infos, $message = null){
        if($message==null){
            //on affiche le bien

        } else {
            foreach($message as $error){
                //on echo dans un truc rouge warning
            }
        }
    }
}
?>