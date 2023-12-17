<?php
class periodeReserve {
    private $pdo;
    function __construct() {
        $this->pdo = getPDO();
    }

    public function creerPeriodeReserve($idPeriode, $dateDeb, $dateFin, $idUser){
        //l faudra check si x peut modifier y bien
        $sql = "INSERT INTO periodereserve (id_periodeDispo,dateDebut,dateFin,valide,id_locataire) VALUES ( :idPeriode , :dateDeb , :dateFin , 0 , :idUser )";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':idPeriode', $idPeriode , PDO::PARAM_INT);
        $req->bindParam(':dateDeb', $dateDeb , PDO::PARAM_STR);
        $req->bindParam(':dateFin', $dateFin , PDO::PARAM_STR);
        $req->bindParam(':idUser', $idUser , PDO::PARAM_STR);        
        return $req->execute();
    }

    public function annulePeriodeReserve($idPeriode){
        //l faudra check si x peut modifier y bien
        $sql = "DELETE FROM periodereserve WHERE id = :i";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id', $idPeriode , PDO::PARAM_INT);    
        return $req->execute();
    }

    public function getPeriodeReserveFromPeriodeDispo($idPeriode){
        $sql = "SELECT * FROM periodereserve WHERE id_periodeDispo = :id";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id', $idPeriode , PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function getPeriodeReserveFromLocataire($idUser){
        $sql = "SELECT * FROM periodereserve WHERE id_locataire = :id";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id', $idUser , PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC); 
    }



    /*
    TODO :
    reserve(dateDeb,dateFin,idUser,idPeriodeDispo)
    annuleReserve(id) ne pourrait être annulé que lorsque n'est pas validé
    getPeriodeReserveFromBien(idBien)
    getPeriodeReserveFromUser(idUser)

    */
}
?>