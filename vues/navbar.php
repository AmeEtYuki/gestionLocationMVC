       
        
        <body class="d-flex flex-column min-vh-100">
          <?php include("css.html"); ?>                     
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
            <style>
              .lemenuquicasselescouilles {
                translate: -60px;
              }
            </style>
            <ul class="dropdown-menu lemenuquicasselescouilles">
                <?php 
                if(!isset($_SESSION['userID'])) { ?>
                <li><a class="dropdown-item" href="/?action=inscription">Inscription</a></li>
                <li><a class="dropdown-item" href="/?action=connexion">Connexion</a></li>
                <!--<li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                <?php } else {
                  $isHote = ($_SESSION['usrType'] == "Hote");
                  $isManager = ($_SESSION['usrType'] == "Hote");
                  $isManager = ($_SESSION['usrType'] == "Manager");
                            if ($isHote || $isManager) {
                              ?>
                        <!--<li><a class="dropdown-item" href="#">Mes favoris</a></li>-->
                        <li><a class="dropdown-item" href="?action=propreBien">Mes biens</a></li>
                    <?php 
                    } if ($isManager){
                      echo '<li><a class="dropdown-item" href="?action=gestionSite">Gestion</a></li>';
                    }
                    
                    ?>
                    <li><a class="dropdown-item" href="">Mes factures</a></li>
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