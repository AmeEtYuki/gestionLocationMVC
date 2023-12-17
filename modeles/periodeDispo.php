<?php
class periodeDispo {
    private $pdo;
    function __construct() {
        $this->pdo = getPDO();
    }


    public function getPeriodeDispoFromBien($idBien){
        $sql = "SELECT * FROM periodeDispo WHERE id_bien = :id";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id', $idBien , PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function creerPeriodeDispo($idBien, $dateDeb, $dateFin, $prix){
        //l faudra check si x peut modifier y bien
        $sql = "INSERT INTO periodeDispo (id_bien,dateDebut,dateFin,prixJour) VALUES ( :idBien , :dateDeb , :dateFin , :prix )";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':idBien', $idBien , PDO::PARAM_INT);
        $req->bindParam(':dateDeb', $dateDeb , PDO::PARAM_STR);
        $req->bindParam(':dateFin', $dateFin , PDO::PARAM_STR);
        $req->bindParam(':prix', $prix , PDO::PARAM_STR);        
        return $req->execute();
    }

    public function deletePeriodeDispo($id){
        //l faudra check si x peut modifier y bien
        $sql = "DELETE FROM periodeDispo WHERE id = :id";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id', $id , PDO::PARAM_INT);   
        return $req->execute();
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