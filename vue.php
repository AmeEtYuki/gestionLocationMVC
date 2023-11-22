<?php
class vue{
    private function entete(){
        //header
        ?>
        header
        <?php
    }

    private function pied(){
        //footer
        ?> 
        footer
        <?php
    }

    public function accueil(){
        //accueil
        $this->entete();
        ?>
        ACCUEIL
        <?php
        $this->pied();
    }

    public function erreur404(){
        //404
        $this->entete();
        ?>
        ERREUR 404
        <?php
        $this->pied();
    }
    public function pageInscription($message = null) {
        $this->entete();
        ?>
        
        <form action="index.php?action=inscription" method="post">
            <input type="email" name="" id="">
            <input type="password" name="password" id="" placeholder="Votre mot de passe">
            <input type="password" name="password2" id="" placeholder="Confirmez votre mot de passe">
            <input type="submit" value="">
        </form>

        <?php
        $this->pied();
    }
}
?>