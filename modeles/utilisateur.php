<?php
class utilisateur {
    private $pdo;
    function __construct() {
        $this->pdo = getPDO();
    }
    public function utilisateurExiste($email) {
        $prepare = $this->pdo->prepare("SELECT COUNT(*) FROM user WHERE `login`=:email");
        $prepare->execute(array(
            ":email"=>$email
        ));
        $res = $prepare->fetch();
        return (count($res) == 0);
    }
    public function inscriptionUtilisateur($email, $password, $nom, $prenom) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $prepare = $this->pdo->prepare("INSERT INTO `user` (`id`, `login`, `password`, `nom`, `prenom`, `type`) 
        VALUES (NULL, :email , :pssword, :nom, :prenom, 'Locataire'); ");
        return $prepare->execute(
            array(
                ":email"=>$email,
                ":pssword"=>$hash,
                ":nom"=>$nom,
                ":prenom"=>$prenom
            )
            );
    }
    public function connexion($email, $password) {
        //$prepare=$this->pdo->prepare("")
    }

}