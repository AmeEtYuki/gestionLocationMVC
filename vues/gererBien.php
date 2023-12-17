<div class="container">
<div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
<div class="row">
<?php
foreach ($periodesLibreBien as $sarahCroche) {
?>



<?php
}

?>
<script>
$(document).ready(function() {                
//direction :[datePluspeitte, dateplusgrande]
//disabled dates: toutes les periodes reservé, et les periodes entre les periodes dispo
//current_date: renseigne la date selectionnée. 
$('#datepickerrangestart-new').Zebra_DatePicker({
    pair: $('#datepickerrangeend'),
});
$('#datepickerrangeend-new').Zebra_DatePicker({
  direction:[1, '2012-09-12'],
});
//check before si c'est la bonne periode
})

</script>

<form method="POST" action="?action=gererBien" class="text-dark">
<input type="text"  name="datepickerrangestart" class="text-dark" id="datepickerrangestart">
<input type="text"  name="datepickerrangeend" class="text-dark" id="datepickerrangeend">
<input type="submit" value="Ajouter cette periode" name="ajouterUnePeriode">
</div>
</div>
</div>
</form>
<?php


?>