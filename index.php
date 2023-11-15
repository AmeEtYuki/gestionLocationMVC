<?php
session_start();

require("vue.php");
require("controller.php");

if(isset($GET_["action"])){
    switch ($GET_["action"]) {
        case 'accueil':
            #page d'accueil
            (new controller)->accueil();
            break;
        default:
            #mauvaise action
            (new vue)->erreur404();
            break;
    }
} else {
    (new controller)->accueil();
}
?>