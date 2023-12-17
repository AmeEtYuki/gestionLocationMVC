<?php
class photo {
    private $pdo;
    function __construct() {
        $this->pdo = getPDO();
    }
    function photoPresentBien($idb) {
        $prepare = $this->pdo->prepare("SELECT * FROM photo WHERE id_bien = :id");
        $prepare->execute(array(
            ":id"=>$idb
        ));
        return $prepare->fetchAll(); 
    }
    function getAllPhotoPieceBien($piece) {
        $prepare = $this->pdo->prepare("SELECT * FROM photo WHERE id_piece = :piece");
        $prepare->execute(array(
            ":piece"=>$piece
        ));
        return $prepare->fetchAll();
    }
}
?>