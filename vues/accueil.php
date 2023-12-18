<div class="d-flex flex-wrap align-items-center justify-content-around" >
        <?php
        //var_dump($lesBiens);
        foreach($lesBiens as $bien){
            $re=(new photo)->photoPresentBien($bien["id"]);
            $photoLien = (isset($re[0]))?$re[0]:NULL;
            ?>
            <div class="card" style="width: 18rem;">
                <img src="/images/<?=(isset($photoLien[1]))?$photoLien[1]:""?>" class="card-img-top">
                <div class="card-body">
                    <p class="card-text"><?php echo $bien["ville"]." - <i>".$bien["description"]."</i>"; ?></p>
                    <?php echo "<a href='/?action=showBien&idBien=".$bien["id"]."' class='btn btn-primary'>Consulter</a><br>"; ?>
                </div>
            </div>
        <?php } echo "</div>"; 
        
        ?>
        <nav class="container">
    <ul class="pagination d-flex justify-content-center">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($page == 1) ? "disabled" : "" ?>">
            <a href="./?page=<?= $page - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for($p = 1; $p <= $pages; $p++){ ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($page == $p) ? "active" : "" ?>">
                <a href="./?page=<?= $p ?>" class="page-link"><?= $p ?></a>
            </li>
        <?php } ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($page == $pages) ? "disabled" : "" ?>">
            <a href="./?page=<?= $page + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>