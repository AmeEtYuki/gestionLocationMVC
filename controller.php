<?php
class controller {
    public function accueil(){
        (new vue)->accueil();
    }
    
    public function inscription() {
        if(isset($_POST['ok'])) {
            //protection anti champ null (postman)
            $mdp1 = (isset($_POST["password"]))?$_POST["password"]:"";
            $mdp2 = (isset($_POST["password2"]))?$_POST["password2"]:"";
            $email = (isset($_POST["email"]))?$_POST["email"]:"";
            $errors=[];
            if($mdp1 == "") {
                $errors[]="Champ mot de passe 1 vide.";
            }
            if($mdp2 == "") {
                $errors[]="Champ mot de passe 2 vide.";
            }
            if($email == "") {
                $errors[]="Champ email vide.";
            }
            if ($mdp1 != $mdp2) {
                $errors[]="Les deux mots de passes ne correspondent pas";
            }
            if ((new utilisateur)->utilisateurExiste($email)) {
                $errors[]="L'utilisateur existe déjà.";
            }
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

    public function connexion(){}

    public function deconnexion(){
        session_destroy();
        (new vue)->accueil();
    }

    public function showBien(){
        //get id du bien
        $errors=[];
        if(isset($_GET["idBien"])){
            if(is_numeric($_GET["idBien"])){
                $infos = (new bien)->getInfosBien($_GET["idBien"]);
                if($infos==false){
                    $errors[] = "Ce bien n'existe pas";
                    // 404 ?
                } else {
                    //on affiche tout
                    
                }

            } else {
                //redirect vers accueil ?
                $errors[] = "idBien n'est pas un nombre !";
            }  
        } else {
            //redirect vers accueil ?
            $errors[] = "Il y a une erreur sur votre lien, il manque la propriété idBien !";
        }
        var_dump($errors);
    }
}
?>