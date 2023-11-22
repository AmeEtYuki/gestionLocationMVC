<?php
class bien {
    private $pdo;
    function __construct() {
        $this->pdo = new \PDO("mysql:host=localhost;dbname=tpjson1;charset=utf8","root","");
    }

    function getInfosBien($IdBien){
        $sql = "SELECT * FROM bien WHERE id = :id";
        $req = $this->pdo->prepare($sql);
        $req->bindParam(':id', $idBien , PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);  
    }

    function getAllBiens($page){
        if($page == null){
            //show all
            $sql = "SELECT * FROM bien WHERE";
            $req = $this->pdo->prepare($sql);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);  
        }else {
            //pagination
            $sql = "SELECT * FROM bien LIMIT 5 OFFSET :offset;";
            $req = $this->pdo->prepare($sql);
            $offset = (($page*5)-5); //la page fois le nombre par page MOINS le nombre par page
            // Ex pour page = 1  :  sur la page 1 on veut les 5 premiers biens, or 1*5-5 donne un offset de 0, donc grâce au limite on aura les 5 premiers
            $req->bindParam(':offset', $offset , PDO::PARAM_INT);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);  
        }
    }
}
?>