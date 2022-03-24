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
$test = $db->query($sqlSelect);

//================================================================

function un_log(){
    session_unset();
    session_destroy();
    header("Location: ../index.php");
}


if(isset($_POST['btn-unlog'])){
    un_log();
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
            <div class="d-flex col-12">
                <?php
                    foreach($test as $etudiant){
                        //$delete = $db->query("DELETE FROM `utilisateurs_etudiant` WHERE `id_etudiant`");
                        ?>
                        <div class="mt-3">
                            <div class="card p-4">
                                <div class="card-title text-center">
                                    <p class="text">Adresse mail : <?= $etudiant['email']?></p>
                                    <p class="mt-1">Mot de passe : <?= $etudiant['pass']?></p>
                                    <form class="" method="get">
                                        <a name="edit" class="btn btn-warning margin-right-10 ">Modifier</a>
                                        <a href="delete.php?id_etudiant=<?= $etudiant['id_etudiant']?>" class="btn btn-danger">Supprimer</a>    
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
        <br>
        <br>
        <div class="d-flex justify-content-center">
            <a name="add" href="inscription.php" class="btn btn-success margin-right-10">Crée un compte</a>
            <form method="post">
                <button class="btn btn-danger" id="btn-unlog" name="btn-unlog">DECONNEXION</button>
            </form>
        </div>
    </div>
</body>
</html>