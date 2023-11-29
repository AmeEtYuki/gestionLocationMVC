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
            if($this->emptyString($mdp1)) {
                $errors[]="Champ mot de passe 1 vide.";
            }
            //var_dump($errors);
            if($this->emptyString($mdp2)) {
                $errors[]="Champ mot de passe 2 vide.";
            }
            if($this->emptyString($email)) {
                $errors[]="Champ email vide.";
            }
            if ($mdp1 != $mdp2) {
                $errors[]="Les deux mots de passes ne correspondent pas";
            }
            if ((new utilisateur)->utilisateurExiste($email)) {
                $errors[]="L'utilisateur existe déjà.";
            }
            $longueur_minimale = 12;
            $caractere_special_minimum = 1;
            $chiffres_minimum = 2;
            $majuscules_minimum = 3;

            if (!(
                strlen($mdp) >= $longueur_minimale &&
                preg_match('/[^\w\d]/', $mdp) >= $caractere_special_minimum &&
                preg_match_all('/\d/', $mdp) >= $chiffres_minimum &&
                preg_match_all('/[A-Z]/', $mdp) >= $majuscules_minimum
            )) {$errors[]="Erreurs, le mot de passe ne corresponds pas au critères minimums.";}
            //var_dump($errors);
            if(count($errors) == 0) {
                if((new utilisateur)->inscriptionUtilisateur($email,$mdp1) == "ok") {
                    (new vue)->accueil();
                } else {
                    $errors[]="Une erreur semble être survenue de nôtre côté. Veuillez nous exuser de la gêne occasionné.";
                    (new vue)->pageInscription($errors);
                }
            } else {
                (new vue)->pageInscription($errors);
            }
            
            
        } else {
            (new vue)->pageInscription();
        }
       
        
    }

    public function connexion(){
        if(isset($_POST["ok"])) {
            $mdp = (isset($_POST["motdepasse"]))?$_POST["motdepasse"]:"";
            $login = (isset($_POST["login"]))?$_POST["login"]:"";
            $errors=[];
            if($login == "") { $errors[] = "Champ nom d'utilisateur / email vide.";  }
            if($mdp == "") { $errors[]="Champ mot de passe vide"; }
            
            (new utilisateur)->


        }
            
    }
}
?>