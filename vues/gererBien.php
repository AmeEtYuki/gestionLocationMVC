<div class="container">
<div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
<div class="row">
<?php
foreach ($periodesLibreBien as $sarahCroche) {
?>
<script>
$(document).ready(function() {                
//direction :[datePluspeitte, dateplusgrande]
//disabled dates: toutes les periodes reservé, et les periodes entre les periodes dispo
//current_date: renseigne la date selectionnée. 
$('#datepickerrangestart-<?=$sarahCroche["id"]?>').Zebra_DatePicker({
    pair: $('#datepickerrangeend-<?=$sarahCroche["id"]?>'),
});
$('#datepickerrangeend-<?=$sarahCroche["id"]?>').Zebra_DatePicker({
  direction:[1, '2012-09-12'],
});
//check before si c'est la bonne periode
})
</script>
<form method="POST" action="?action=gererBien">
<input type="number" name="bid" value="<?= $idBien ?>" style="display:none;">
<input type="text"  disabled name="datepickerrangestart-<?=$sarahCroche['id']?>" class="text-dark" id="datepickerrangestart-<?=$sarahCroche['id']?>" value="<?=$sarahCroche["dateDebut"]?>"> AU 
<input type="text" disabled name="datepickerrangeend-<?=$sarahCroche['id']?>" class="text-dark" id="datepickerrangeend-<?=$sarahCroche['id']?>" value="<?=$sarahCroche["dateFin"]?>">
<input type="submit" value="Supprimer" name="delete">
</form>
<?php
}

?>
<script>
$(document).ready(function() {                
//direction :[datePluspeitte, dateplusgrande]
//disabled dates: toutes les periodes reservé, et les periodes entre les periodes dispo
//current_date: renseigne la date selectionnée. 
$('#datepickerrangestart-new').Zebra_DatePicker({
    pair: $('#datepickerrangeend-new'),
});
$('#datepickerrangeend-new').Zebra_DatePicker({
  direction:[1, '2012-09-12'],
});
//check before si c'est la bonne periode
})

</script>

<form method="POST" action="?action=gererBien" class="text-dark">
<input type="text"  name="datepickerrangestart" class="text-dark" id="datepickerrangestart-new"> AU
<input type="text"  name="datepickerrangeend" class="text-dark" id="datepickerrangeend-new">
<input type="submit" value="Ajouter cette periode" name="ajouterUnePeriode">

</form>
</div>
</div>
</div>
<?php


?>