<?php

var_dump($periodeReserves);
var_dump($periodeDispos);
//il faut compter les jours, pour ensuite compter le prix
if(empty($periodeDispos)){
    echo"<h2>Vous n'avez rien reservé !! 🤮</h2>";
} else {
    echo"<h2>Vous avez reservé :</h2><br><ul>";
    foreach($periodeDispos as $pd){
        echo "<li> De ".$pd["dateDebut"]." à ".$pd["dateFin"]." soit X jours pour Y €";
        //si periode reserve est valide alors :::
        echo "<br></li>";
    }
    echo"</ul>";
}

?>