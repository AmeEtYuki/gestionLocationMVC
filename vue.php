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
}
?>