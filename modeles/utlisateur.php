<?php
class utilisateur {
    private $pdo;
    function __construct() {
        $this->pdo = getPDO();
    }
    public function utilisateurExiste($email) {

    }
    public function inscriptionUtilisateur($email, $password) {
    }
}