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