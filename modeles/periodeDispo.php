<?php
class periodeDispo {
    private $pdo;
    function __construct() {
        $this->pdo = getPDO();
    }


    public function getPeriodeDispoFromBien($idBien){
        $sql = "SELECT * FROM periodedispo WHERE id_bien = :id";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id', $idBien , PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function creerPeriodeDispo($dateDeb, $dateFin, $idBien){
        //l faudra check si x peut modifier y bien
    }

    /*
    TODO :
    creerPeriode(dateDeb,dateFin,idUser,idBien) // il faut check s'il n'y a pas déjà une période pour ce bien à ces dates
    supprimerReserve(id) ne pourrait être annulé que lors qu'il n'y a pas de periode reserve
    getPeriodeDispoFromBien(idBien) 
    getPeriodeDispoFromUser(idUser)en fait pas besoin, on get les, bienfromuser then on get les periode des bien
    
    */
}
?>