<?php
class controller {
    public function accueil(){
        (new vue)->accueil();
    }
    private function emptyString($string) {
        if($string != "") {
            return false;
        } else {
            return true;
        }
    }
    public function inscription() {
        if(isset($_POST['ok'])) {
            $mdp1 = (isset($_POST["password"]))?$_POST["password"]:"";
            $mdp2 = (isset($_POST["password2"]))?$_POST["password2"]:"";
            $email = (isset($_POST["email"]))?$_POST["email"]:"";
            $errors=[];
            if(emptyString($mdp1)) {
                $errors[]="Champ mot de passe 1 vide.";
            }
            if(emptyString($mdp2)) {
                $errors[]="Champ mot de passe 2 vide.";
            }
            if(emptyString($email)) {
                $errors[]="Champ email vide.";
            }
            if ($mdp1 != $mdp2) {
                $errors[]="Les deux mots de passes ne correspondent pas";
            }
            if(count($errors) == 0) {
                (new utilisateur)->inscriptionUtilisateur($email,$mdp1);
                (new vue)->accueil();
            } else {
                (new vue)->pageInscription($errors);
            }
            
            
        } else {
            (new vue)->pageInscription();
        }
       
        
    }

    public function connexion(){}
}
?>