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
        $prepare=$this->pdo->prepare("SELECT * FROM `user` WHERE `login` = :l");
        $prepare->execute(array(
            ":l"=>$email
        ));
        $res = $prepare->fetch();
        // 0 = ok 1 = mdp/user erroné 2 = il existe pas fréro.
        if(!(count($res) == 0)) {
            if(password_verify($password , $res["password"])) {
                $_SESSION['userID'] = $res['id'];
                $_SESSION['userName'] = $res['login'];
                $_SESSION['usrType'] = $res['type'];
                return 0;
                //userID    userName     usrTyp
                
            } else {
                return 1;
            }
        } else {
            return 2;
        }
    }

}