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
        <a href="/?action=inscription">Page inscription</a>
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
        <?=($message != null)?$message."<br>":"";?>
        <form action="index.php?action=inscription" method="post">
            <input type="email" name="" id=""><br>
            <input type="password" name="password" id="" placeholder="Votre mot de passe"><br>
            <input type="password" name="password2" id="" placeholder="Confirmez votre mot de passe"><br>
            <input type="submit" value="" name="ok"><br>
        </form>
        <?php
        $this->pied();
    }
}
?>