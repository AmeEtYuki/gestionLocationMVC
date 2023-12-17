<?php
class controller
{
    public function accueil()
    {
        $page = (isset($_GET["page"])) ? $_GET["page"] : 1;
        $lesBiens = (new bien)->getAllBiens($page);
        if ($lesBiens == null) {
            (new vue)->erreur404();
        } else {
            (new vue)->accueil($lesBiens, $page, (new bien)->getMaxPages());
        }
    }
    public function voirPropreBiens()
    {
        $userType = (isset($_SESSION['userID'])) ? $_SESSION['usrType'] : "";
        if ($userType == "Hote") {
            $page = (isset($_GET["page"])) ? $_GET["page"] : 1;
            (new vue)->voirPropreBiens(
                (new bien)->getAllBiensProprio($page, $_SESSION['userID']),
                $page,
                (new bien)->getMaxPagesProprio($_SESSION['userID'])
            );
        }
    }

    public function inscription()
    {
        if (isset($_POST['ok'])) {
            //protection anti champ null (postman)
            $mdp1 = (isset($_POST["password"])) ? $_POST["password"] : "";
            $mdp2 = (isset($_POST["password2"])) ? $_POST["password2"] : "";
            $email = (isset($_POST["login"])) ? $_POST["login"] : "";
            $errors = [];
            if ($mdp1 == "") {
                $errors[] = "Champ mot de passe 1 vide.";
            }
            if ($mdp2 == "") {
                $errors[] = "Champ mot de passe 2 vide.";
            }
            if ($email == "") {
                $errors[] = "Champ utilisateur vide.";
            }
            if ($mdp1 != $mdp2) {
                $errors[] = "Les deux mots de passe ne correspondent pas";
            }
            if ((new utilisateur)->utilisateurExiste($email)) {
                $errors[] = "L'utilisateur existe déjà.";
            }
            $longueur_minimale = 12;
            $caractere_special_minimum = 1;
            $chiffres_minimum = 2;
            $majuscules_minimum = 3;

            if (!(
                strlen($mdp1) >= $longueur_minimale &&
                preg_match('/[^\w\d]/', $mdp1) >= $caractere_special_minimum &&
                preg_match_all('/\d/', $mdp1) >= $chiffres_minimum &&
                preg_match_all('/[A-Z]/', $mdp1) >= $majuscules_minimum
            )) {
                $errors[] = "Erreurs, le mot de passe ne corresponds pas au critères minimums.";
            }
            //var_dump($errors);
            if (count($errors) == 0) {
                if ((new utilisateur)->inscriptionUtilisateur(htmlspecialchars($email), $mdp1, htmlspecialchars($_POST["Nom"]), htmlspecialchars($_POST["Prenom"]))) {
                    $page = (isset($_GET["page"])) ? $_GET["page"] : 1;
                    $lesBiens = (new bien)->getAllBiens($page);
                    (new vue)->accueil($lesBiens, $page, (new bien)->getMaxPages());
                } else {
                    $errors[] = "Une erreur semble être survenue de nôtre côté. Veuillez nous excuser pour la gêne occasionné.";
                    (new vue)->pageInscription($errors);
                }
            } else {
                (new vue)->pageInscription($errors);
            }
        } else {
            (new vue)->pageInscription();
        }
    }

    public function connexion()
    {
        if (isset($_POST["ok"])) {
            $mdp = (isset($_POST["motdepasse"])) ? $_POST["motdepasse"] : "";
            $login = (isset($_POST["login"])) ? $_POST["login"] : "";
            $errors = [];
            if ($login == "") {
                $errors[] = "Champ email vide.";
            }
            if ($mdp == "") {
                $errors[] = "Champ mot de passe vide";
            }
            if (sizeof($errors) == 0) {
                $resp = (new utilisateur)->connexion($login, $mdp);
                switch ($resp) {
                    case 0:
                        $lesBiens = (new bien)->getAllBiens(1);
                        (new controller)->accueil($lesBiens, 1, (new bien)->getMaxPages());
                        break;
                    case 1:
                        (new vue)->pageConnexion(["Mot de passe/Utilisateur erronné."]);
                        break;
                    case 2:
                        (new vue)->pageConnexion(["L'utilisateur n'existe pas."]);
                        break;
                    default:
                        break;
                }
            } else {
                (new vue)->pageConnexion($errors);
            }
            //obtenirPage(numPage, nbLignes)
        } else {
            (new vue)->pageConnexion();
        }
    }
    public function deconnexion()
    {
        session_destroy();
        header('Location: /');
    }

    public function showBien()
    {
        //en get id du bien
        $errors = [];
        if (isset($_GET["idBien"])) {
            if (is_numeric($_GET["idBien"])) {
                $infos = (new bien)->getInfosBien($_GET["idBien"]);
                if ($infos == false) {
                    $errors[] = "Ce bien n'existe pas";
                    // 404 ?
                } else {
                    //on affiche tout

                    $periodeDispo = (new periodeDispo)->getPeriodeDispoFromBien($_GET['idBien']);
                    $periodeReserve = [];
                    foreach ($periodeDispo as $p) {
                        $pr = (new periodeReserve)->getPeriodeReserveFromPeriodeDispo($p["id"]);
                        if (!empty($pr)) {
                            $periodeReserve[] = $pr;
                        }
                    }

                    function validateDate($date, $format = 'Y-m-d')
                    {
                        $d = DateTime::createFromFormat($format, $date);
                        
                        return $d && $d->format($format) === $date;
                    }

                    $photos = (new photo)->photoPresentBien($_GET["idBien"]);
                    $bien = (new bien)->getInfosBien($_GET['idBien']);
                    if(isset($_POST["reserve"]) && isset($_POST["datepickerrangestart"]) && isset($_POST["datepickerrangeend"])){
                        if(validateDate($_POST["datepickerrangestart"]) && validateDate($_POST["datepickerrangeend"])){
                            $pd = (new periodeDispo)->getPeriodeDispoFromDates($_POST["datepickerrangestart"],$_POST["datepickerrangeend"]);
                            $message = array();
                            if($pd == false){
                                $message[] = "Les dates sélectionné ne correspondent pas a une période !";
                            } else {
                                if((new periodeReserve)->creerPeriodeReserve($pd["id"],$_POST["datepickerrangestart"],$_POST["datepickerrangeend"],$_SESSION["userID"])){
                                    $message[] = "Période réservé ! En attente de validation, prix de ".$pd["prixJour"]."€ par jour.";
                                } else {
                                    $message[] = "Une erreur est survenue lors de la réservation de la période !";
                                }
                            }
                            (new vue)->pageBien(
                                $bien,
                                $photos,
                                $periodeDispo,
                                $periodeReserve,
                                $message
                            );

                        }
                    } else {
                        (new vue)->pageBien(
                            $bien,
                            $photos,
                            $periodeDispo,
                            $periodeReserve
                        );
                    }
                }
            } else {
                //redirect vers accueil ?
                $errors[] = "idBien n'est pas un nombre !";
            }
        } else {
            //redirect vers accueil ?
            $errors[] = "Il y a une erreur sur votre lien, il manque la propriété idBien !";
        }
        //var_dump($errors);
    }
    function checkupUser() {
        $_SESSION['nbR'] = (isset($_SESSION['nbR']))?$_SESSION['nbR']+1:1;
        $refresh = false;
        if (!(isset($_SESSION['nbR']) || $_SESSION['nbR'] < 10)) { $refresh = true; $_SESSION['nbR'] = 0;}}

    function gererBiens()
    {
        if (isset($_GET['idBien'])) {
            $lenzoVomit = count((new bien)->getInfosBien($_GET['idBien']));
            if ($lenzoVomit != 0) {
                (new vue)->gererBiens(
                    $_GET['idBien'],
                    (new periodeDispo)->getPeriodeDispoFromBien($_GET['idBien'])
                );
            }
        } else {
            (new vue)->erreur404();
        }
    }
        }
?>