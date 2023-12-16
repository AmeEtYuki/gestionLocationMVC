<?php
class periodeReserve {
    private $pdo;
    function __construct() {
        $this->pdo = getPDO();
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