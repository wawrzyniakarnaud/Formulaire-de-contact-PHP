<?php

$nomerreur = "";
$prenomerreur = "";
$subjecterreur = "";
$messageerreur = "";


//Si "POST" n'est pas vide, je récupère les valeurs des champs du formulaire

if(!empty($_POST)) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $isValid = true;

    //Si les champs du formulaire sont vide, affiche un message d'erreur    

    if (empty($nom)) {
        //        $nomerreur = '<p class="clr"> [ Champ invalide ]</p><br>';
        $nomerreur = 'Champ invalide';
        $isValid = false;
    }
    if (empty($prenom)) {
        //        $prenomerreur = '<p class="clr"> [ Champ invalide ]</p><br>';
        $prenomerreur = 'Champ invalide';
        $isValid = false;
    }
    if (empty($subject)) {
        //        $subjecterreur = '<p class="clr"> [ Champ invalide ]</p><br>';
        $subjecterreur = 'Champ invalide';
        $isValid = false;
    }
    if (empty($message)) {
        //        $messageerreur = '<p class="clr"> [ Champ invalide ]</p><br>';
        $messageerreur = 'Champ invalide';
        $isValid = false;
    }

    //Si les champs sont remplis, j'envoi le mail

    if($isValid == true) {
        $mailContent = "";
        $mailContent .= "Vous avez reçu un message de votre formualaire : <br><br>";
        $mailContent .= "Nom :".$nom."<br>";
        $mailContent .= "Prénom :".$prenom."<br>";
        $mailContent .= "Sujet :".$subject."<br>";
        $mailContent .= "Message :".$message."<br>";

        $headers = "Content-Type: text/html; charset=UTF-8\r\n";

        mail("arnaud.w@codeur.online","Nouveau message formulaire",$mailContent, $headers);
    }

}

?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>form_php</title>
        <link rel="stylesheet" href="formulaire.css">
    </head>

    <body>
        <header>
            
            <h1> FORMULAIRE DE CONTACT ( PHP )</h1>
        </header>

        <form method="post" name="formulaire" action="index.php">
            <div class="all">
                <div class="nom">
                    <label for="nom"> Nom : </label>
                    <div> <input name="nom" id="nom" type="text" placeholder="<?php if(isset($nomerreur)) echo $nomerreur; ?>"></div>

                    <!--                    <?php echo $nomerreur; ?>-->

                </div>
                <div class="prenom">
                    <label for="prenom"> Prénom : </label>
                    <div> <input name="prenom" id="prenom" type="text" placeholder="<?php if(isset($prenomerreur)) echo $prenomerreur; ?>"></div>
                    <!--                    <?php echo $prenomerreur; ?>-->
                </div>
                <div class="subject">
                    <label for="subject"> Subject : </label>
                    <div> <input name="subject" id="subject" type="text" placeholder="<?php if(isset($subjecterreur)) echo $subjecterreur; ?>"></div>

                    <!--                    <?php echo $subjecterreur; ?>-->

                </div>
                <div class="message">
                    <label class="message" for="message">Message : </label><br>
                    <textarea class="txt" id="message" name="message" placeholder="<?php if(isset($messageerreur)) echo $messageerreur; ?>"></textarea><br>

                    <!--                        <?php echo $messageerreur; ?>-->

                </div>
                <div class="bouton">
                    <div> <input class="btn" value="Envoyé" name="envoi" id="envoi" type="submit"></div>
                </div>

            </div>
        </form>


    </body>

</html>