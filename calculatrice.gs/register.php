<?php
require "function/app-function.php";
?>

<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method==="POST" && !empty($_POST)){

    $connexion = db_connexion();

    $prenom = !empty($_POST['prenom']) ? $_POST['prenom']:'';
    $identifiant = !empty($_POST['identifiant']) ? $_POST['identifiant']:'';
    $password = !empty($_POST['password']) ? $_POST['password']:'';
    $conf_password = !empty($_POST['conf_password']) ? $_POST['conf_password']:'';


    $prenomValide= strlen(trim($prenom)) !== 0;
    $identifiantValide= filter_input(INPUT_POST, 'identifiant', FILTER_VALIDATE_EMAIL);
    $passwordValide= strlen(trim($prenom)) !== 0;
    $conf_passwordValide= strlen(trim($prenom)) !== 0;


    if(!$prenomValide){
        $msgPrenom = "Le prénom est requis pour ce champ";
    }
    if(!$identifiantValide){
        $msgIdentifiant = "saisie non valide";
    }

    if(!$passwordValide){
        $msgPassword = "saisie non valide";
    }

    if(!$conf_passwordValide){
        $msgConf_password = "saisie non valide";
    }

    $sql = "insert into register (prenom, identifiant, password, conf_password) values (?,?,?,?)";

    $req_preparee = $connexion->prepare($sql);

    try {
        $req_preparee->execute([$prenom, $identifiant, $password, $conf_password]);
        header("Location:login.php");
    }catch (Exception $e){
        exit("<h2 class='text-danger text-center'>un probleme est survenu lors de l'execution de la requête</h2>");
    }

}

?>
<?php build_header("Page Register"); ?>


<div>

    <h1>Enregistrement</h1>


    <form method="post" autocomplete="off">
        <fieldset>

            <legend>Crée votre compte</legend>

        <div class="form-group">
            <label for="prenom">Prenom</label> <br>
            <input size="40" type="text" id="prenom" placeholder="prenom" name="prenom">
        </div>

        <?php
        if (!empty($msgPrenom)){
            echo <<<EQT
            <small class="text-danger small">($msgPrenom)</small>
EQT;
        }
        ?>

        <div class="form-group">
            <label for="email">Identifiant</label> <br>
            <input size="40" type="email" id="email" placeholder="identifiant avec @email" name="identifiant" required>
        </div>

        <?php
        if (!empty($msgIdentifiant)){
            echo <<<EQT
            <small class="text-danger small">($msgIdentifiant)</small>
EQT;
        }
        ?>

        <div class="form-group">
            <label for="password">mot de passe</label> <br>
            <input size="40" type="password" id="password" placeholder="mot de passe" name="password" required>
        </div>

        <?php
        if (!empty($msgpassword)){
            echo <<<EQT
            <small class="text-danger small">($msgpassword)</small>
EQT;
        }
        ?>

        <div class="form-group">
            <label for="conf_password">Confirmer mot de passe</label> <br>
            <input size="40" type="password" id="conf_password" placeholder="confirmer mot de passe" name="conf_password" required>
        </div>

<!--        if($_POST['conf_password'] != $_POST['password'])-->

        <button type="submit" class="bg-primary text-white">Enregistrer</button>
        <button type="submit" class="bg-danger text-white">Réinitialiser</button>
            <img src="https://img.icons8.com/nolan/100/one-free.png"/>

        </fieldset>

    </form>

</div>