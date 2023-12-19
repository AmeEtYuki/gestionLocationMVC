<?php

var_dump($periodeReserves);
var_dump($periodeDispos);
//il faut compter les jours, pour ensuite compter le prix
if(empty($periodeDispos)){
    echo"<h2>Vous n'avez rien reservé !! 🤮</h2>";
} else {
    echo"<h2>Vous avez reservé :</h2><br><ul>";
    foreach($periodeDispos as $pd){
        foreach($periodeReserves as $pr){
            //il faut compter les jours mtn
            if($pr["id_periodeDispo"] == $pd["id"]){
                echo "<li>De ".$pr["dateDebut"]." à ".$pr["dateFin"]." soit X jours pour Y €. <a href='?action=showBien&idBien=".$pd["id_bien"]."' >Voir le bien</a>"; //pour le bien 
                //si periode reserve est valide alors :::
                echo "<br></li>";
            }
        }
        
    }
    echo"</ul>";
}

?>