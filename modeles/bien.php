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

    public function getInfoFromUser($idUser){
        $sql = "SELECT * FROM bien WHERE id_user = :id";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id', $idUser , PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);  
    }

    public function getIfUserOwnBien($idUser, $idBien){
        $sql = "SELECT * FROM bien WHERE id_user = :id AND id = :alexa";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id', $idUser , PDO::PARAM_INT);
        $req->bindParam(':alexa', $idBien , PDO::PARAM_INT);
        $req->execute();
        return (count($req->fetchAll(PDO::FETCH_ASSOC)) == 1);  
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
            $sql = "SELECT * FROM bien";
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
    //Pour un seul utilisateur particulier... 
    public function getMaxPagesProprio($user) {
        $sql = "CALL maxPagesProprio(5, :user);";
        $req = $this->pdo->prepare($sql);
        $req->execute(array(
            ":user"=>$user
        ));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res["nb"];  
    }
    public function getAllBiensProprio($page, $proprio) {
        $sql = "CALL paginationBienProprio( :page , 5, :proprio);";
        $req = $this->pdo->prepare($sql);
        //$req->bindParam(':page', $page , PDO::PARAM_INT);
        $req->execute(array(
            ":page"=>$page,
            ":proprio"=>$proprio
        ));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>