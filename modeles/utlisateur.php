<?php
class utilisateur {
    private $pdo;
    function __construct() {
        $this->pdo = getPDO();
    }
    public function utilisateurExiste($email) {
        $prepare = $this->pdo->prepare("SELECT COUNT(*) WHERE email=:email");
        $prepare->execute(array(
            ":email"=>$email
        ));
    }
    public function inscriptionUtilisateur($email, $password) {
        
    }
    
}