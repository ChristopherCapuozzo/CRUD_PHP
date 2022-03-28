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

    $sqlEtudiant ="SELECT * FROM `utilisateurs_etudiant` WHERE `id_etudiant`";
    $EtudiantTake = $db->query($sqlEtudiant);

    
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../modules/css/bootstrap.css" rel="stylesheet">
    <link href="../modules/css/style.css" rel="stylesheet" >
    <title>ADMIN - DELETE</title>
</head>
<body>

    <h5 class="text-center mt-2">Suprimer l'étudiant</h5>
    <div class="d-flex justify-content-center">
        <form method="post">
            <button name="confirm-delete" class="btn btn-success mx-2">Oui</button>
        </form>
        <form method="post">
            <button name="btn-return" class="btn btn-danger">Non</button>
        </form>
    </div>

<?php


//var_dump($slqDelete);

if(isset($_POST['confirm-delete'])){
    $sql = "DELETE FROM `utilisateurs_etudiant` WHERE `id_etudiant` = ?";
    $delete = $db->prepare($sql);
    $id_etudiant = $_GET['id_etudiant'];
    $delete->bindParam(1, $id_etudiant);
    $delete->execute();
    
    if($delete){
        ?>
        <div class="container">
            <p class='alert alert-success mt-3 container'>Étudiant supprimer !</p>
        </div>
        <?php
        sleep(1);
        header("Location: liste_etudiant.php");
    }
}

function back(){
    header("Location: liste_etudiant.php");
}

if(isset($_POST['btn-return']))
    back();
?>

</body>
</html>