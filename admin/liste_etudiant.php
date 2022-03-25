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
            <div class="d-flex justify-content-center">
                <form method="post">
                    <button class="btn btn-danger margin-right-10" id="btn-unlog" name="btn-back">Retour</button>
                </form>
                <a href="inscription.php" class="btn btn-success margin-right-10">Crée un compte</a>
                <form method="post">
                    <button class="btn btn-danger" id="btn-unlog" name="btn-unlog">Déconnexion</button>
                </form>
            </div>
            <hr>
            <div class="d-flex justify-content-center mt-2 mb-2">
                <?php
                    foreach($test as $etudiant){
                        ?>
                        <div class="row flex-warp p-2 m-2">
                            <div class="card-etudiant-bis background-etudiant">
                                <img class="img-etudiant rounded-circle mt-2" src="../modules/img/etudiant.png" alt="">
                                <p class=""><?= $etudiant['email']?></p>
                                <p class="mt-1"><?= $etudiant['pass']?></p>
                                <form class="card" method="get">
                                    <a href="edit.php?id_etudiant=<?= $etudiant['id_etudiant']?>" class="btn btn-warning">Modifier</a>
                                    <a href="delete.php?id_etudiant=<?= $etudiant['id_etudiant']?>" class="btn btn-danger">Supprimer</a>    
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <?php
    function back(){
        header("Location: admin_panel.php");
    }

    if(isset($_POST['btn-back'])){
        back();
    }
    ?>
</body>
</html>