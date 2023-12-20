<?php

function compteJour($reserve){
    //impossible avec le datetime
    $start = new DateTimeImmutable($reserve["dateDebut"]);
    $end = new DateTimeImmutable($reserve["dateFin"]);
    return ($start->diff($end))->format('%a'); // %a -> days
}

//il faut compter les jours, pour ensuite compter le prix
if(!empty($messages)){
    echo "<p>";
    foreach($messages as $m){
        echo $m."<br>"; // peut etre avoir un jolie balise
    }
    echo "</p>";
}
if(empty($periodeDispos)){
    echo"<h2>Vous n'avez rien reservé !!</h2>";
} else {
    
    echo"<h2>Vous avez reservé :</h2><br><ul><form method='POST'>";
    foreach($periodeDispos as $pd){
        foreach($periodeReserves as $pr){
            //il faut compter les jours mtn
            if($pr["id_periodeDispo"] == $pd["id"]){
                $cptJour = compteJour($pr);
                echo "<li><a href='?action=showBien&idBien=".$pd["id_bien"]."'>Voir le bien</a> : Réservé du ".$pr["dateDebut"]." au ".$pr["dateFin"]." soit ".$cptJour." jours pour un total de ".($cptJour*$pd["prixJour"])."€.<br>"; //pour le bien 
                //si periode reserve est valide alors :::
                if(!$pr["valide"]){
                    echo"❌ Votre réservation n'est pas encore validé par le propriétaire, vous pouvez encore annuler : <button name='annuleReservation' value='".$pr["id"]."' >Annuler</button>";
                } else {
                    echo "✅ Votre réservation a été validé par le propriétaire, vous ne pouvez plus l'annuler.";
                }

                echo "<br></li><br>";
            }
        }
        
    }
    echo"</ul></form>";
}

?>