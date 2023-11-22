<?php
class controller {
    public function accueil(){
        (new vue)->accueil();
    }
    
    public function inscription() {
        if(isset($_POST['ok'])) {
            $mdp1 = (isset($_POST["password"]))?$_POST["password"]:"";
            $mdp2 = (isset($_POST["password2"]))?$_POST["password2"]:"";
            $email = (isset($_POST["email"]))?$_POST["email"]:"";
        } else {
            (new vue)->pageInscription();
        }
       
        
    }

    public function connexion(){}
}
?>