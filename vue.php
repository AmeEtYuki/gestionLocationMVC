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
    public function pageInscription($message = []) {
        $this->entete();
        if(count($message) != 0) {
            echo "<div class='errList'>";
            for($i = 0; count($message) > $i; $i++) {
                echo "<div class='errMsgLogIns'>".$message[$i]."</div><br>";
            }  
            echo "</div>";
        } 
        
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


    public function pageBien($infos, $message = null){
        if($message==null){
            //on affiche le bien
            
        } else {
            foreach($message as $error){
                //on echo dans un truc rouge warning
            }
        }
    }
}
?>