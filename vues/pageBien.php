<?php 
if($message==null){
            //on affiche le bien
            var_dump($infos);
            ?>

          <div class="container">
              <div class="row">
                  <div class="col-6">
                  <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://as1.ftcdn.net/v2/jpg/05/66/26/98/1000_F_566269813_8VisUzV5qqdN7nQ7De4FcVEVxnRuKh2E.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://t4.ftcdn.net/jpg/01/66/10/03/360_F_166100342_KbTGIRrnrlwGDZSXSMpH3zfn2dxyTKae.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://as1.ftcdn.net/v2/jpg/00/51/55/32/1000_F_51553287_9jm0S2CV13BvIsqvqiJCaJAxpX4TzjGy.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
            </div>

              <div class="col">
                2 of 3 (wider)
              </div>
              <div class="col">
                3 of 3
              </div>
            </div>
          </div>



            <?php
        } else {
            foreach($message as $error){
              ?>



              <?php
            }
        }
?>