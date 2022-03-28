<?php
session_start();

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

$sqlSelect ="SELECT * FROM `utilisateurs_etudiant`";
$list = $db->query($sqlSelect);

//================================================================

function back(){
    header("Location: admin_panel.php");
}

if(isset($_POST['btn-back'])){
    back();
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../modules/css/bootstrap.css" rel="stylesheet">
    <link href="../modules/css/style.css" rel="stylesheet" >
    <title>ADMIN - ETUDIANT</title>
</head>
<body>
    <div class="container mt-5 text-center">        
        <div>
        <h3>Liste des Étudiant</h3>
            <div class="d-flex justify-content-center">
                <form method="post">
                    <button class="btn btn-danger margin-right-10" id="btn-unlog" name="btn-back">Retour</button>
                </form>
                <a href="inscription.php" class="btn btn-success margin-right-10">Crée un compte</a>
            </div>
            <hr>
            <hr>
            <div class="text-center">
                <div class="d-flex justify-content-center flex-wrap">
                <?php
                    foreach($list as $etudiant){
                        ?>
                        <div class="col-5 mt-3">
                            <div class="card ">
                                <div class="card-body">
                                    <img class="img-etudiant" src="../modules/img/etudiant.png">
                                    <div class="d-flex justify-content-center">
                                        <p class="mx-2"><strong>Nom : </strong> <?= $etudiant['nom']?></p>
                                        <p class=""><strong>Prénom : </strong> <?= $etudiant['prenom']?></p>
                                    </div>
                                    <p class=""><strong>Adresse mail :</strong> <?= $etudiant['email']?></p>
                                    <p class=""><strong>Mot de passe :</strong> <?= $etudiant['pass']?></p>
                                    <div class="d-flex justify-content-center">
                                        <p class="mx-3"><strong>Date de naissance :</strong> <?= $etudiant['date_naissance']?></p>
                                        <p class=""><strong>Classe :</strong> <?= $etudiant['classe']?></p>
                                    </div>
                                    <form class="card-footer" method="get">
                                        <a href="edit.php?id_etudiant=<?= $etudiant['id_etudiant']?>" class="btn btn-warning">Modifier</a>
                                        <!--<a href="delete.php?id_etudiant=<?= $etudiant['id_etudiant']?>" class="btn btn-danger disabled">Supprimer</a>-->    
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>