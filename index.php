<?php
session_start();

require("vue.php");
require("controller.php");

if(isset($_GET["action"])){
    switch ($_GET["action"]) {
        case 'accueil':
            #page d'accueil
            (new controller)->accueil();
            break;
        case 'inscription':
            #page d'inscription
            (new controller)->inscription();
            break;
        case 'connexion':
            #page de connexion
            (new controller)->connexion();
            break;
        case 'showBien':
            #page d'accueil
            (new controller)->showBien();
            break;
        default:
            #mauvaise action
            (new vue)->erreur404();
            break;
    }
} else {
    //page de base
    (new controller)->accueil();
}
?>