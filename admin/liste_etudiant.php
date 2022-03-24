<?php
session_start();
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
        <h3>Liste des Étudiant</h3>
        <form action="" method="post">
            <button class="btn btn-danger mb-3" id="btn-unlog" name="btn-unlog">DECONNEXION</button>
        </form>
        
        <div class="d-flex">
            
        </div>
        <a name="add" href="inscription.php" class="btn btn-success margin-right-10 ">Ajouter</a>
        <a name="edit" class="btn btn-warning margin-right-10 ">Modifier</a>
        <a name="delete" class="btn btn-danger ">Supprimer</a>
    </div>
    

<?php
function un_log(){
    session_unset();
    session_destroy();
    header("Location: ../index.php");
}


if(isset($_POST['btn-unlog'])){
    un_log();
}
?>
</body>
</html>