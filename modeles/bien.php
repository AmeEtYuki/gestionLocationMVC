<?php
class bien {
    private $pdo;
    function __construct() {
        $this->pdo = getPDO();
    }

    public function getInfosBien($idBien){
        $sql = "SELECT * FROM bien WHERE id = :id";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id', $idBien , PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);  
    }

    public function getNombrePieceETSurfaceBien($idBien){
        $sql = "CALL getNombrePieceETSurface( :id )";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id', $idBien , PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);  
    }

    public function getAllBiens($page){
        if($page == null){
            //show all
            $sql = "SELECT * FROM bien WHERE";
            $req = $this->pdo->prepare($sql);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);  
        }else {
            //pagination
            // Ex pour page = 1 et 5 éléments par page :  sur la page 1 on veut les 5 premiers biens, or 1*5-5 donne un offset de 0, donc grâce au LIMIT on aura les 5 premiers
            $sql = "CALL paginationBien( :page , 5);";
            $req = $this->pdo->prepare($sql);
            $req->bindParam(':page', $page , PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);  
        }
    }

    public function getMaxPages(){
        $sql = "CALL maxPages(5);";
        $req = $this->pdo->prepare($sql);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res["nb"];  
    }
}
?>