
<?php
class equipement {
    private $pdo;
    function __construct() {
        $this->pdo = getPDO();
    }

    public function getEquipementsBien($idBien){
        $sql = "SELECT equipement.libelle,equipement.id_piece FROM `equipement` INNER JOIN piece ON equipement.id_piece=piece.id INNER JOIN bien ON piece.id_bien = bien.id WHERE bien.id = :id ;";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id', $idBien , PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC); 
    }

}



?>