<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require("vue.php");
require("controller.php");
require("database.php");
//import de tout les modeles. 
foreach ( glob( './modeles' . '/*.php' ) as $file ) {require( $file );}
if(isset($_SESSION['userID'])) {
    (new controller)->checkupUser();
}
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
        case 'deconnexion':
            #page d'accueil
            (new controller)->deconnexion();
            break;
        case 'gererBien':
            (new controller)->gererBiens();
            break;
        case 'mesBiens':
            (new controller)->voirPropreBiens();
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