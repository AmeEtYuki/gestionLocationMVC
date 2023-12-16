<?php 
if($message==null){
            //on affiche le bien
            //var_dump($infos);
            ?>

          <div class="container">
              <div class="row">
                  <div class="col-6">
                  <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <?php
    for ($i=0; $i < count($photo); $i++ ) {
      if($i == 0) {
        ?>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <?php
      } else {
        ?>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$i?>" aria-label="Slide <?=$i+1?>"></button>
        <?php
      }
    }
    ?>
    
    <!--<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>-->
  </div>
  
  <div class="carousel-inner">
    <?php
    $i = 0; 
    foreach ($photo as $i => $l ) { ?>
    <div class="carousel-item <?=($i == 0)?"active":""?>">
      <img src="/images/<?=$l[1]?>" class="d-block w-100" alt="...">
    </div>
    <?php } ?>
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
              <!--<div class="col">
                3 of 3
              </div>-->
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