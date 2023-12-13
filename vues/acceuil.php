ICI PEUT ETRE PRESENTATION DU PROJET
        <div class="d-flex flex-wrap align-items-center justify-content-center" >
        <?php
        //var_dump($lesBiens);
        foreach($lesBiens as $bien){
            
            ?>
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top">
                <div class="card-body">
                    <p class="card-text"><?php $bien["description"] ?></p>
                    <?php echo "<a href='/?action=showBien&idBien=".$bien["id"]."' class='btn btn-primary'>Consulter</a><br>"; ?>
                </div>
            </div>
        <?php } echo "</div>"; ?>