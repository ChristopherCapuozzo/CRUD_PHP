<?php

    $utlisateur_phpadmin = "root";
    $mdp_phpadmin = "";
    $dbname = "ecommerce";
    $hote = "localhost";

    try {
        $db = new PDO("mysql:host=localhost;dbname=ecommerce;charset=UTF8", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Vous etes connectez a PDO MySQL";
    }catch (PDOException $exception){
        echo "erreur " .$exception->getMessage();
    }


    if($db){
        $sql ="SELECT * FROM `utilisateurs_etudiant`";
        $id_etudiant = $_GET['id_etudiant'];
        $demande = $db->prepare($sql);
        
        $demande->bindParam(1, $id_etudiant);

        $demande->execute();
        $details = $demande->fetch();
    }
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../modules/css/bootstrap.css" rel="stylesheet">
    <link href="../modules/css/style.css" rel="stylesheet" >
    <title>ADMIN - EDIT</title>
</head>
<body>


<div class="container h-100 text-center">
    <form method="post" class="form-group">
    <h3 class="">Modifier</h3>
        <div class="mb-3 display-false">
            <label for="id" class="form-label display-false">ID</label>
            <input type="text" class="form-control display-false" id="id" name="id" placeholder="">
        </div>
        <div class="d-flex mt-2">
            <div class="col">
                <label for="nom" class="form-label text-bold">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="<?= $details['nom']?>">
            </div>
            <div class="col">
                <label for="prenom" class="form-label text-bold">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="<?= $details['prenom']?>">
            </div>
        </div>
        <div class="mt-2">
            <label for="email" class="form-label text-bold">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="<?= $details['email']?>">
        </div>
        <div class="mt-2">
            <label for="pass" class="form-label text-bold">Mot de passe</label>
            <input type="text" class="form-control" id="pass" name="pass" placeholder="<?= $details['pass']?>">
        </div>
        <div class="mt-2">
          <label for="date_naissance" class="text-bold">Date de naissance</label>
          <input class="form-control" type="date" name="date_naissance" id="date_naissance">
        </div>
        <div class="mt-2">
            <label for="classe" class="form-label text-bold">Classe</label>
            <select type="text" class="form-control" id="classe" name="classe" placeholder="<?= $details['classe']?>">
                <option>6ème</option>
                <option>5ème</option>
                <option>4ème</option>
                <option>3ème</option>
            </select>
        </div>
        <button class="btn btn-success mt-2" id="btn-save" name="btn-save" type="submit">Sauvegarder</button>
    </form>
</div>
<div class="container">
    <hr>
</div>
<div class="mt-2 text-center">
    <?php require_once "delete.php";?>
</div>

<?php


if(isset($_POST['btn-save'])){
    if($db){
        $sqlUp = "UPDATE `utilisateurs_etudiant` SET `nom`= ?, `prenom`= ?, `email`= ?, `pass`= ?, `date_naissance`= ?, `classe`= ? WHERE `id_etudiant`= ?";

        $request = $db->prepare($sqlUp);  
        $request->execute(array(
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['pass'],
            $_POST['date_naissance'],
            $_POST['classe'],
            $_GET['id_etudiant']
        ));

        if($request){
            echo "<div class='container text-center'>
            <p class='alert alert-warning mt-5'>Étudiant modifier !</p>
            </div>";
            header("Location: liste_etudiant.php");
        }
    }
}

?>
</body>
</html>