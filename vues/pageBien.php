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
    <span class="visually-hidden">Précèdent</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Suivant</span>
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
        <br>
        
            <?php
           
            if(isset($_SESSION['userID'])){
              function parseRangeDate($dateFirst, $dateEnd){
                //$date should be something like '2012-08-01'
                //pour les periodes reserve
                $splitedFirst = explode("-", $dateFirst);
                $splitedEnd = explode("-", $dateEnd);
                $range = $splitedFirst[2]."-".$splitedEnd[2]." ".$splitedFirst[1]."-".$splitedEnd[1]." ".$splitedFirst[0]."-".$splitedEnd[0];
                //returns '01-02 08-08 2012-2012'
                return $range;
              }


              

              echo parseRangeDate('2012-08-01', '2012-08-02');

              if(!empty($periodeDispo)){
                /*
                $script = '<script> $(document).ready(function() { 
                        direction: [';
                
                        foreach($periodeDispo as $pd){

                        }
                        
                        
                        echo '],
                        disabled_dates: ["01-02 08-08 2012-2012", "08-12 08-08 2012-2012"],
                        pair: $("#datepickerrangeend")
                    });
                  
                  
                  
                  ';
                echo '</script>';
                    */
                ?>
                <script>
            
                  //on disable les dates re'serv, on disable toute les dates, on allow les dates des periodes,  on met en direction 1
                  //      enabled_dates: ['08-12 8 2012']
                  // ,'01-02 08-08 2012-2012', '08-12 08-08 2012-2012' 
                  
                  $(document).ready(function() {

                    
                    //direction :[datePluspeitte, dateplusgrande]
                    //disabled dates: toutes les periodes reservé, et les periodes entre les periodes dispo
                    $('#datepickerrangestart').Zebra_DatePicker({
                        direction: ['2012-08-01','2012-09-12'],
                        pair: $('#datepickerrangeend'),
                        enabled_dates: ["01-08 08 2012"],
                        disabled_dates: ['* * *']
                    });

                    $('#datepickerrangeend').Zebra_DatePicker({
                      direction:[1, '2012-09-12'],
                        disabled_dates: ['01-04 08 2012']
                    });
                    //check before si c'est la bonne periode
                  
                  })

                </script>
                <form method="POST">
                  <input type="text"  name="datepickerrangestart" id="datepickerrangestart">
                  <input type="text"  name="datepickerrangeend" id="datepickerrangeend">
                  <button>Réserver</button>
                </form>
                
                <?php
              } else {
                echo "Y A RIEN BARREZ VOUS!";
              }


            
            }
            
            var_dump($periodeDispo);
            var_dump($periodeReserve);
        } else {
            foreach($message as $error){
              ?>



              <?php
            }
        }
?>