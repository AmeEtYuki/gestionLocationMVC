<?php
if ($message == null) {

?>

  <div class="container">
    <div class="row">
      <div class="col-6">
        <div id="carouselExampleIndicators" class="carousel slide">
          <div class="carousel-indicators">
            <?php
            for ($i = 0; $i < count($photo); $i++) {
              if ($i == 0) {
            ?>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <?php
              } else {
              ?>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i ?>" aria-label="Slide <?= $i + 1 ?>"></button>
            <?php
              }
            }
            ?>

            <!--<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>-->
          </div>

          <div class="carousel-inner">
            <?php
            $i = 0;
            foreach ($photo as $i => $l) { ?>
              <div class="carousel-item <?= ($i == 0) ? "active" : "" ?>">
                <img src="/images/<?= $l[1] ?>" class="d-block w-100" alt="...">
              </div>
            <?php } ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précèdent</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
          </button>
        </div>
      </div>

      <div class="col">
        <?php

        if (isset($_SESSION['userID'])) {
          function parseRangeDate($date)
          {
            //$date should be something like '2012-08-01'
            //pour les periodes reserve
            $splitedFirst = explode("-", $date);
            $range = $splitedFirst[2] . " " . $splitedFirst[1] .  " " . $splitedFirst[0];
            //returns '01 08 2012'
            return $range;
          }


          //il faut récuperer chaque jour libre afin de pouvoir les afficher dans le Zebra
          $dateBonne = array();
          foreach ($periodeDispo as $pd) {
            $pdDateDeb = new DateTime($pd["dateDebut"]);
            $pdDateFin = new DateTime($pd["dateFin"]);
            $pdReserve = array();
            //tableau 2d car periodeDispo>plusieurs>plusieurs reserve
            //les periodeReserve de periodeDispo
            foreach ($periodeReserve as $pdres) {
              foreach ($pdres as $pr) {
                if ($pr["id_periodeDispo"] == $pd["id"]) {
                  $pdReserve[] = array('dateDeb' => new DateTime($pr["dateDebut"]), 'dateFin' => new DateTime($pr["dateFin"]));
                }
              }
            }

            //on cherche mtn CHAQUE JOUR pouvant être reservé, donc il faut tout vérifier 🫠😭
            while ($pdDateDeb <= $pdDateFin) {
              //pour ça on fait chaque jour entre les deux et on guette si c'est déjà reservé ou pas
              $sexy = true;
              //on check toute resevration
              foreach ($pdReserve as $res) {
                //si la date, se situe BETWEEN la reservation, alors c'est reservé
                if ($pdDateDeb >= $res["dateDeb"] && $pdDateDeb <= $res["dateFin"]) {
                  $sexy = false;
                  break;
                }
              }
              if ($sexy) {
                $dateBonne[] = $pdDateDeb->format("Y-m-d");
              }
              $pdDateDeb->modify("+1 day");
            }
          }
          if (count($dateBonne) > 1) {
            $enabled = "[";
            //mtn il faut créer le string
            $i = 0;
            foreach ($dateBonne as $date) {
              if ($i == (count($dateBonne) - 1)) {
                //pour le dernier
                $enabled .= "'" . parseRangeDate($date) . "'";
              } else {
                $enabled .= "'" . parseRangeDate($date) . "', ";
              }
              $i++;
            }
            $enabled .= "]";
            $direction1 = "direction: ['" . min($dateBonne) . "', '" . max($dateBonne) . "'],";
            $direction2 = "direction: [1, '" . max($dateBonne) . "']";



            echo '<script>$(document).ready(function() {$("#datepickerrangestart").Zebra_DatePicker({
              pair: $("#datepickerrangeend"),
              disabled_dates: ["* * *"],
              enabled_dates:' . $enabled . ',' . $direction1 . ' });

              $("#datepickerrangeend").Zebra_DatePicker({ ' . $direction2 . ', disabled_dates:["* * *"], enabled_dates:' . $enabled . ' });

              })</script>';
        ?>

            <form method="POST">
              <input type="text" name="datepickerrangestart" id="datepickerrangestart">
              <input type="text" name="datepickerrangeend" id="datepickerrangeend"><br>
              <button name="reserve">Réserver</button>
            </form>

        <?php


          } else {
            echo "Ce bien n'a pas de période libre pour vous 😊.";
          }
        } else {
          echo "Connectez vous pour pouvoir réserver! 🤨";
        }
        ?>
        <hr>

        <?php
        echo $bien["rue"].", ".$bien["ville"]." - ".$bien["cp"]." <a href='https://www.google.fr/maps/search/".$bien["ville"]."+".$bien["rue"]."+".$bien["cp"]."' >Voir sur maps</a>";

        echo"<hr><p>".$bien["description"]."<br>📆Bati en ".$bien["anneeConstru"].".</p>";
        if($pieces != false){
          $surface = 0;
          $string = "<ul>";
          foreach($pieces as $piece){
            $surface += $piece["surface"];
            $string .= "<li>";
            $string .= $piece["libelle"]." de ".$piece["surface"]."m²<ul>";
            
            foreach($equipements as $equ){
              if($equ["id_piece"]==$piece["id"]){
                $string .= "<li>".$equ["libelle"]."</li>";
              }
            }
            $string .= "</ul></li>";
          }
          $string .= "</ul>";
          echo "<hr>".count($pieces)." pièces, pour ".$surface." m² de surface habitable.";
          echo "<br>".$string;
          
        } else {
          echo "Aussi fou que ça puisse paraitre, ce bien n'a pas de pièces !! 🤔";
        }
        
        ?>
      </div>


    </div>
  </div>


  <?php



} else {
  foreach ($message as $error) {
    echo $error;
  ?>



<?php
  }
}
?>